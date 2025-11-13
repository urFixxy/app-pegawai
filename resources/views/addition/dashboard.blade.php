@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    <i class="fa-solid fa-chart-line mr-2"></i>
    Dashboard
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Welcome to HR Management System</h1>
            <p class="mt-1 text-sm text-gray-600">Overview of your organization's data and statistics</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <!-- Total Employees Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-indigo-600">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-users text-3xl text-indigo-600"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Employees</dt>
                                <dd class="text-2xl font-bold text-gray-900">{{ $totalEmployees }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('employees.index') }}" 
                           class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            View all <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Departments Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-green-600">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-landmark text-3xl text-green-600"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Departments</dt>
                                <dd class="text-2xl font-bold text-gray-900">{{ $totalDepartments }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('departments.index') }}" 
                           class="text-sm font-medium text-green-600 hover:text-green-500">
                            View all <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Total Positions Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-yellow-600">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-user-tie text-3xl text-yellow-600"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Positions</dt>
                                <dd class="text-2xl font-bold text-gray-900">{{ $totalPositions }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('positions.index') }}" 
                           class="text-sm font-medium text-yellow-600 hover:text-yellow-500">
                            View all <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Today's Attendance Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-blue-600">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-calendar-check text-3xl text-blue-600"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Today's Attendance</dt>
                                <dd class="text-2xl font-bold text-gray-900">{{ $todayAttendance }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('attendances.index') }}" 
                           class="text-sm font-medium text-blue-600 hover:text-blue-500">
                            View all <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            <!-- Employee Status Overview -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Employee Status</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
                            </div>
                            <span class="text-2xl font-bold text-gray-900">{{ $activeEmployees }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            </div>
                            <span class="text-2xl font-bold text-gray-900">{{ $inactiveEmployees }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Summary -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Today's Attendance Summary</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Present
                                </span>
                            </div>
                            <span class="text-lg font-semibold text-gray-900">{{ $presentToday }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Leave
                                </span>
                            </div>
                            <span class="text-lg font-semibold text-gray-900">{{ $leaveToday }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Sick
                                </span>
                            </div>
                            <span class="text-lg font-semibold text-gray-900">{{ $sickToday }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Alpha
                                </span>
                            </div>
                            <span class="text-lg font-semibold text-gray-900">{{ $alphaToday }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
            <!-- Recent Employees -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Employees</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @if($recentEmployees->isNotEmpty())
                        @foreach($recentEmployees as $employee)
                            <div class="px-6 py-4 hover:bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $employee->nama_lengkap }}</p>
                                        <p class="text-xs text-gray-500">{{ $employee->department->nama_department ?? '-' }} - {{ $employee->position->nama_jabatan ?? '-' }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $employee->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $employee->status }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="px-6 py-8 text-center text-gray-500">
                            <i class="fa-solid fa-box-open text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm italic">No recent employees</p>
                        </div>
                    @endif
                </div>
                <div class="px-6 py-3 bg-gray-50 text-right">
                    <a href="{{ route('employees.index') }}" 
                       class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                        View all employees <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Recent Attendance -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Attendance</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @if($recentAttendance->isNotEmpty())
                        @foreach($recentAttendance as $attendance)
                            <div class="px-6 py-4 hover:bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $attendance->employee->nama_lengkap }}</p>
                                        <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }} - {{ $attendance->waktu_masuk ?? '-' }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($attendance->status_absensi == 'hadir') bg-green-100 text-green-800
                                        @elseif($attendance->status_absensi == 'izin') bg-yellow-100 text-yellow-800
                                        @elseif($attendance->status_absensi == 'sakit') bg-blue-100 text-blue-800
                                        @elseif($attendance->status_absensi == 'alpha') bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($attendance->status_absensi) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="px-6 py-8 text-center text-gray-500">
                            <i class="fa-solid fa-box-open text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm italic">No recent attendance</p>
                        </div>
                    @endif
                </div>
                <div class="px-6 py-3 bg-gray-50 text-right">
                    <a href="{{ route('attendances.index') }}" 
                       class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                        View all attendance <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                    <a href="{{ route('employees.create') }}" 
                       class="flex flex-col items-center justify-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition">
                        <i class="fa-solid fa-user-plus text-2xl text-indigo-600 mb-2"></i>
                        <span class="text-sm font-medium text-indigo-900">Add Employee</span>
                    </a>
                    <a href="{{ route('attendances.create') }}" 
                       class="flex flex-col items-center justify-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                        <i class="fa-solid fa-calendar-plus text-2xl text-blue-600 mb-2"></i>
                        <span class="text-sm font-medium text-blue-900">Add Attendance</span>
                    </a>
                    <a href="{{ route('departments.create') }}" 
                       class="flex flex-col items-center justify-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                        <i class="fa-solid fa-building text-2xl text-green-600 mb-2"></i>
                        <span class="text-sm font-medium text-green-900">Add Department</span>
                    </a>
                    <a href="{{ route('positions.create') }}" 
                       class="flex flex-col items-center justify-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
                        <i class="fa-solid fa-briefcase text-2xl text-yellow-600 mb-2"></i>
                        <span class="text-sm font-medium text-yellow-900">Add Position</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection