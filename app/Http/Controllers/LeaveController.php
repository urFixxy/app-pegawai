<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $title = 'Leaves';
        $leaves = Leave::with('employee', 'approver')
            ->latest()
            ->paginate(10);
        return view('leaves.index', compact('leaves', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Leave::create($request->all());

        return back()->with('success', 'Leave request added.');
    }

    public function approve($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->update([
            'status' => 'approved',
            'disetujui_oleh' => Auth::id(),
        ]);

        return back()->with('success', 'Leave approved.');
    }

    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->update([
            'status' => 'rejected',
            'disetujui_oleh' => Auth::id(),
        ]);

        return back()->with('success', 'Leave rejected.');
    }
}
