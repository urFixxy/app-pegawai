@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-days"></i>
    {{ $title }}
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-md rounded-lg border border-gray-200 p-2">
        <div class="px-6 py-4 flex items-center justify-between">
            <h3 class="text-2xl font-bold text-gray-800">Leave's Detail</h3>

            <span class="px-3 py-1 rounded-full text-sm font-medium
                @if($leave->status == 'Ditunda') bg-yellow-100 text-yellow-800
                @elseif($leave->status == 'Disetujui') bg-green-100 text-green-800
                @else bg-red-100 text-red-800 @endif">
                @if($leave->status == 'Ditunda')
                    <i class="fa-solid fa-clock mr-1"></i> Pending
                @elseif($leave->status == 'Disetujui')
                    <i class="fa-solid fa-check mr-1"></i> Approved
                @else
                    <i class="fa-solid fa-times mr-1"></i> Rejected
                @endif
            </span>
        </div>

        {{-- Body --}}
        <div class="p-6">

            {{-- Data Karyawan --}}
            <h4 class="text-md font-semibold text-gray-800 mb-3 border-b pb-2">
                <i class="fa-solid fa-user mr-2 text-indigo-600"></i> Informasi Karyawan
            </h4>

            <dl class="divide-y divide-gray-200 mb-6">
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Nama Lengkap</dt>
                    <dd class="col-span-2 text-sm text-gray-900">{{ $leave->employee->nama_lengkap }}</dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Email</dt>
                    <dd class="col-span-2 text-sm text-gray-900">{{ $leave->employee->email }}</dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Departemen</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->employee->department->nama_department ?? '-' }}
                    </dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Jabatan</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->employee->position->nama_jabatan ?? '-' }}
                    </dd>
                </div>
            </dl>

            {{-- Data Cuti --}}
            <h4 class="text-md font-semibold text-gray-800 mb-3 border-b pb-2">
                <i class="fa-solid fa-calendar mr-2 text-indigo-600"></i> Detail Cuti
            </h4>

            <dl class="divide-y divide-gray-200 mb-6">
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Tanggal Mulai</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->tanggal_mulai->format('d F Y') }}
                    </dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Tanggal Selesai</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->tanggal_selesai->format('d F Y') }}
                    </dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Total Hari</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->total_hari }} hari
                    </dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Tanggal Pengajuan</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->created_at->format('d F Y, H:i') }}
                    </dd>
                </div>
            </dl>

            {{-- Deskripsi --}}
            <h4 class="text-md font-semibold text-gray-800 mb-3 border-b pb-2">
                <i class="fa-solid fa-file-lines mr-2 text-indigo-600"></i> Deskripsi
            </h4>
            <div class="p-4 bg-gray-50 rounded-md mb-6">
                <p class="text-sm text-gray-900">
                    {{ $leave->deskripsi ?? 'Tidak ada keterangan' }}
                </p>
            </div>

            {{-- Approval --}}
            @if($leave->status != 'pending')
            <h4 class="text-md font-semibold text-gray-800 mb-3 border-b pb-2">
                <i class="fa-solid fa-user-check mr-2 text-indigo-600"></i> Informasi Persetujuan
            </h4>

            <dl class="divide-y divide-gray-200 mb-6">
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Disetujui oleh</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->approver->name ?? '-' }}
                    </dd>
                </div>
                <div class="py-3 grid grid-cols-3 gap-4">
                    <dt class="text-sm text-gray-500">Tanggal Persetujuan</dt>
                    <dd class="col-span-2 text-sm text-gray-900">
                        {{ $leave->updated_at->format('d F Y, H:i') }}
                    </dd>
                </div>
            </dl>
            @endif

            <div class="mt-4 flex justify-end">
                <a href="{{ route('employees.index') }}"
                    class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
