<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendancesController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with('employee');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('employee', function($q) use ($search) {
                $q->where('nama_lengkap', 'like', '%' . $search . '%');
            })->orWhere('tanggal', 'like', '%' . $search . '%')
              ->orWhere('status_absensi', 'like', '%' . $search . '%');
        }

        // Filter by date range if needed
        if ($request->has('date_from') && $request->date_from != '') {
            $query->where('tanggal', '>=', $request->date_from);
        }
        if ($request->has('date_to') && $request->date_to != '') {
            $query->where('tanggal', '<=', $request->date_to);
        }

        // Filter by status if needed
        if ($request->has('status') && $request->status != '') {
            $query->where('status_absensi', $request->status);
        }

        $attendance = $query->latest('tanggal')
            ->latest('waktu_masuk')
            ->paginate(10);

        $title = 'Attendance';
        return view('attendances.index', compact('attendance', 'title'));
    }

    public function create()
    {
        $title = 'Attendance';
        $employees = Employee::orderBy('nama_lengkap')->get();
        $today = Carbon::today()->format('Y-m-d');
        return view('attendances.create', compact('title', 'employees', 'today'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date|before_or_equal:today',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ], [
            'tanggal.before_or_equal' => 'Tanggal tidak boleh di masa depan.',
            'waktu_keluar.after' => 'Waktu keluar harus setelah waktu masuk.',
            'karyawan_id.exists' => 'Karyawan tidak ditemukan.',
            'karyawan_id.required' => 'Karyawan harus dipilih.',
            'status_absensi.required' => 'Status absensi harus dipilih.',
        ]);

        // Check duplicate attendance for same employee on same date
        $exists = Attendance::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['tanggal' => 'Absensi untuk karyawan ini pada tanggal tersebut sudah tercatat.'])
                ->withInput();
        }

        // Logic for attendance status
        if ($request->status_absensi === 'hadir') {
            // Jika hadir, waktu masuk wajib
            if (!$request->waktu_masuk) {
                return back()
                    ->withErrors(['waktu_masuk' => 'Waktu masuk wajib diisi untuk status Hadir.'])
                    ->withInput();
            }
        } else {
            // Jika tidak hadir (izin/sakit/alpha), waktu masuk dan keluar otomatis null
            $request->merge([
                'waktu_masuk' => null,
                'waktu_keluar' => null,
            ]);
        }

        Attendance::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
            'status_absensi' => $request->status_absensi,
        ]);
        
        return redirect()
            ->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        $title = "Attendance";

        return view('attendances.show', compact('attendance', 'title'));
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::orderBy('nama_lengkap')->get();
        $title = 'Attendance';
        return view('attendances.edit', compact('attendance', 'title', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $attendance = Attendance::findOrFail($id);

        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date|before_or_equal:today',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ], [
            'tanggal.before_or_equal' => 'Tanggal tidak boleh di masa depan.',
            'waktu_keluar.after' => 'Waktu keluar harus setelah waktu masuk.',
            'karyawan_id.exists' => 'Karyawan tidak ditemukan.',
        ]);

        // Check duplicate (exclude current record)
        $exists = Attendance::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['tanggal' => 'Absensi untuk karyawan ini pada tanggal tersebut sudah tercatat.'])
                ->withInput();
        }

        // Logic for attendance status
        if ($request->status_absensi === 'hadir') {
            if (!$request->waktu_masuk) {
                return back()
                    ->withErrors(['waktu_masuk' => 'Waktu masuk wajib diisi untuk status Hadir.'])
                    ->withInput();
            }
        } else {
            // Clear waktu masuk/keluar jika status bukan hadir
            $request->merge([
                'waktu_masuk' => null,
                'waktu_keluar' => null,
            ]);
        }

        $attendance->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
            'status_absensi' => $request->status_absensi,
        ]);

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Data absensi berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employeeName = $attendance->employee->nama_lengkap;
        $attendance->delete();
        
        return redirect()
            ->route('attendances.index')
            ->with('success', "Data absensi $employeeName berhasil dihapus.");
    }
}