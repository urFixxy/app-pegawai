<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Leaves';
        
        $query = Leave::with('employee', 'approver');

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('employee', function($q) use ($search) {
                $q->where('nama_lengkap', 'like', '%' . $search . '%');
            });
        }

        // Filter status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $perPage = $request->get('per_page', 10);

        $leaves = $query->latest()
            ->paginate($perPage)
            ->appends($request->query());

        return view('leaves.index', compact('leaves', 'title'));
    }

    public function create()
    {
        $title = 'Leaves';
        $employees = Employee::where('status', 'Aktif')
            ->orderBy('nama_lengkap')
            ->get();
        return view('leaves.create', compact('title', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        $startDate = Carbon::parse($request->tanggal_mulai);
        $endDate = Carbon::parse($request->tanggal_selesai);
        $totalDays = $startDate->diffInDays($endDate) + 1;

        // Cek tabrakan
        $overlapping = Leave::where('employee_id', $request->employee_id)
            ->where('status', '!=', 'Ditolak')
            ->where(function($query) use ($request) {
                $query->whereBetween('tanggal_mulai', [$request->tanggal_mulai, $request->tanggal_selesai])
                      ->orWhereBetween('tanggal_selesai', [$request->tanggal_mulai, $request->tanggal_selesai])
                      ->orWhere(function($q) use ($request) {
                          $q->where('tanggal_mulai', '<=', $request->tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $request->tanggal_selesai);
                      });
            })
            ->exists();

        if ($overlapping) {
            return back()
                ->withErrors(['tanggal_mulai' => 'Karyawan sudah memiliki pengajuan cuti pada rentang tanggal tersebut.'])
                ->withInput();
        }

        Leave::create([
            'employee_id' => $request->employee_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_hari' => $totalDays,
            'deskripsi' => $request->deskripsi,
            'status' => 'Ditunda',
        ]);

        return redirect()
            ->route('leaves.index')
            ->with('success', 'Pengajuan cuti berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $leave = Leave::with(['employee', 'approver'])->findOrFail($id);
        $title = "Leaves";
        return view('leaves.show', compact('leave', 'title'));
    }

    public function edit(string $id)
    {
        $leave = Leave::with('employee')->findOrFail($id);
        
        if ($leave->status !== 'Ditunda') {
            return redirect()
                ->route('leaves.index')
                ->with('error', 'Hanya pengajuan cuti dengan status Ditunda yang bisa diedit.');
        }

        $title = 'Leaves';
        $employees = Employee::where('status', 'Aktif')
            ->orderBy('nama_lengkap')
            ->get();
        
        return view('leaves.edit', compact('leave', 'title', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $leave = Leave::findOrFail($id);

        if ($leave->status !== 'Ditunda') {
            return redirect()
                ->route('leaves.index')
                ->with('error', 'Hanya pengajuan cuti dengan status Ditunda yang bisa diupdate.');
        }

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        $startDate = Carbon::parse($request->tanggal_mulai);
        $endDate = Carbon::parse($request->tanggal_selesai);
        $totalDays = $startDate->diffInDays($endDate) + 1;

        $overlapping = Leave::where('employee_id', $request->employee_id)
            ->where('id', '!=', $id)
            ->where('status', '!=', 'Ditolak')
            ->where(function($query) use ($request) {
                $query->whereBetween('tanggal_mulai', [$request->tanggal_mulai, $request->tanggal_selesai])
                      ->orWhereBetween('tanggal_selesai', [$request->tanggal_mulai, $request->tanggal_selesai])
                      ->orWhere(function($q) use ($request) {
                          $q->where('tanggal_mulai', '<=', $request->tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $request->tanggal_selesai);
                      });
            })
            ->exists();

        if ($overlapping) {
            return back()
                ->withErrors(['tanggal_mulai' => 'Karyawan sudah memiliki pengajuan cuti pada rentang tanggal tersebut.'])
                ->withInput();
        }

        $leave->update([
            'employee_id' => $request->employee_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_hari' => $totalDays,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('leaves.index')
            ->with('success', 'Pengajuan cuti berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $leave = Leave::with('employee')->findOrFail($id);
        $employeeName = $leave->employee->nama_lengkap;
        
        $leave->delete();
        
        return redirect()
            ->route('leaves.index')
            ->with('success', "Pengajuan cuti $employeeName berhasil dihapus.");
    }

    public function approve($id)
    {
        $leave = Leave::findOrFail($id);
        
        if ($leave->status !== 'Ditunda') {
            return back()->with('error', 'Pengajuan cuti ini sudah diproses.');
        }

        $leave->update([
            'status' => 'Disetujui',
            'disetujui_oleh' => Auth::id(),
        ]);

        return back()->with('success', 'Pengajuan cuti berhasil disetujui.');
    }

    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        
        if ($leave->status !== 'Ditunda') {
            return back()->with('error', 'Pengajuan cuti ini sudah diproses.');
        }

        $leave->update([
            'status' => 'Ditolak',
            'disetujui_oleh' => Auth::id(),
        ]);

        return back()->with('success', 'Pengajuan cuti berhasil ditolak.');
    }
}
