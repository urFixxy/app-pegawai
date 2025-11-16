@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-sack-dollar"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-6 shadow-lg rounded-lg">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Salary's Detail</h1>
            <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
                <dl class="divide-y divide-gray-200">
                    <div class="px-6 py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Employee Name</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ $salary->employee->nama_lengkap }}</dd>
                    </div>
                    <div class="px-6 py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Basic Salary</dt>
                        <dd class="text-sm text-gray-900 col-span-2">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</dd>
                    </div>
                    <div class="px-6 py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Month</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ $salary->bulan }}</dd>
                    </div>
                    <div class="px-6 py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Allowance</dt>
                        <dd class="text-sm text-gray-900 col-span-2">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</dd>
                    </div>
                    <div class="px-6 py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Deduction</dt>
                        <dd class="text-sm text-gray-900 col-span-2">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</dd>
                    </div>
                    <div class="px-6 py-4 grid grid-cols-3 gap-4">
                        <dt class="text-sm font-medium text-gray-500">Total Salary</dt>
                        <dd class="text-sm text-gray-900 col-span-2">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-4 flex justify-end">
                <a href="{{ route('salaries.index') }}"
                    class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection