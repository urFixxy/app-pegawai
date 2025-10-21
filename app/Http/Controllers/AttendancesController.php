<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
     public function index()
    {
        $attendance = Attendance::latest()->paginate(5);
        $title = 'Attendance';
        return view('attendances.index', compact('attendance', 'title'));
    }

    public function create()
    {
        $title = 'Attendance';
        return view('attendances.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);
        Attendance::create($request->all());
        return redirect()->route('attendances.index');
    }

    public function show(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $title = "Attendance";
        return view('attendances.show', compact('attendance', 'title'));
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $title = 'Attendance';
        return view('attendances.edit', compact('attendance', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only([
            'karyawan_id',
            'tanggal',
            'waktu_masuk',
            'waktu_keluar',
            'status_absensi',
        ]));
        return redirect()->route('attendances.index');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index');
    }
}
