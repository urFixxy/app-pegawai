@extends('layouts.app')

@section('title', $title)

@section('header')
    {{ $title }}
@endsection

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Attendance Detail</h1>

        <div class="bg-white shadow rounded-xl overflow-hidden border border-gray-200">
            <dl class="divide-y divide-gray-200">
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Employee ID</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $attendance->karyawan_id }}</dd>
                </div>

                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Date</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $attendance->tanggal }}</dd>
                </div>

                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Check In Time</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $attendance->waktu_masuk ?? '-' }}</dd>
                </div>

                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Check Out Time</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $attendance->waktu_keluar ?? '-' }}</dd>
                </div>

                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Attendance Status</dt>
                    <dd class="text-sm text-gray-900 col-span-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($attendance->status_absensi == 'hadir') bg-green-100 text-green-800
                            @elseif($attendance->status_absensi == 'izin') bg-blue-100 text-blue-800
                            @elseif($attendance->status_absensi == 'sakit') bg-yellow-100 text-yellow-800
                            @elseif($attendance->status_absensi == 'alpha') bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($attendance->status_absensi) }}
                        </span>
                    </dd>
                </div>
            </dl>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('attendances.index') }}"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
        </div>
    </div>
@endsection