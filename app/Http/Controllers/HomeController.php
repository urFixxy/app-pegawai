<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Attendance;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions = Position::count();
        
        // Get employee status counts
        $activeEmployees = Employee::where('status', 'Aktif')->count();
        $inactiveEmployees = Employee::where('status', 'Nonaktif')->count();
        
        // Get today's attendance
        $today = Carbon::today()->format('Y-m-d');
        $todayAttendance = Attendance::whereDate('tanggal', $today)->count();
        
        // Get today's attendance by status
        $presentToday = Attendance::whereDate('tanggal', $today)
            ->where('status_absensi', 'hadir')
            ->count();
        
        $leaveToday = Attendance::whereDate('tanggal', $today)
            ->where('status_absensi', 'izin')
            ->count();
        
        $sickToday = Attendance::whereDate('tanggal', $today)
            ->where('status_absensi', 'sakit')
            ->count();
        
        $alphaToday = Attendance::whereDate('tanggal', $today)
            ->where('status_absensi', 'alpha')
            ->count();
        
        // Get recent employees (last 5)
        $recentEmployees = Employee::with(['department', 'position'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get recent attendance (last 5)
        $recentAttendance = Attendance::with('employee')
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('addition.home', compact(
            'totalEmployees',
            'totalDepartments',
            'totalPositions',
            'todayAttendance',
            'activeEmployees',
            'inactiveEmployees',
            'presentToday',
            'leaveToday',
            'sickToday',
            'alphaToday',
            'recentEmployees',
            'recentAttendance'
        ));
    }
}