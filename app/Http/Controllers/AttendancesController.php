<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with('employee')
            ->latest('tanggal')
            ->latest('waktu_masuk')
            ->paginate(5);
        $title = 'Attendance';
        return view('attendances.index', compact('attendance', 'title'));
    }

    public function create()
    {
        $title = 'Add Attendance';
        $employees = Employee::all();
        return view('attendances.create', compact('title', 'employees'));
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
        ]);

        // Check duplicate attendance
        $exists = Attendance::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['tanggal' => 'Data absensi untuk karyawan ini pada tanggal tersebut sudah ada.'])
                ->withInput();
        }

        // Validasi waktu masuk wajib jika status hadir
        if ($request->status_absensi === 'hadir' && !$request->waktu_masuk) {
            return back()
                ->withErrors(['waktu_masuk' => 'Waktu masuk wajib diisi untuk status Hadir.'])
                ->withInput();
        }

        // Clear waktu masuk/keluar jika status bukan hadir
        if ($request->status_absensi !== 'hadir') {
            $request->merge([
                'waktu_masuk' => null,
                'waktu_keluar' => null,
            ]);
        }

        Attendance::create($request->all());
        
        return redirect()
            ->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        $title = "Detail Attendance";
        return view('attendances.show', compact('attendance', 'title'));
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        $title = 'Edit Attendance';
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
                ->withErrors(['tanggal' => 'Data absensi untuk karyawan ini pada tanggal tersebut sudah ada.'])
                ->withInput();
        }

        // Validasi waktu masuk wajib jika status hadir
        if ($request->status_absensi === 'hadir' && !$request->waktu_masuk) {
            return back()
                ->withErrors(['waktu_masuk' => 'Waktu masuk wajib diisi untuk status Hadir.'])
                ->withInput();
        }

        // Clear waktu masuk/keluar jika status bukan hadir
        if ($request->status_absensi !== 'hadir') {
            $request->merge([
                'waktu_masuk' => null,
                'waktu_keluar' => null,
            ]);
        }

        $attendance->update($request->only([
            'karyawan_id',
            'tanggal',
            'waktu_masuk',
            'waktu_keluar',
            'status_absensi',
        ]));

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Data absensi berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        
        return redirect()
            ->route('attendances.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}