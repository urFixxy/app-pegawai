@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-sack-dollar"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Salary's Detail</h1>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <dl class="divide-y divide-gray-200">
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Employee ID</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $salary->karyawan_id }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Total Salary</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $salary->total_gaji }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Month</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $salary->bulan }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Allowance</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $salary->tunjangan }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Deduction</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $salary->potongan }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Total Salary</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $salary->total_gaji }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('salaries.index') }}"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
        </div>
    </div>
@endsection