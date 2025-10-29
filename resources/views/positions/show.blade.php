@extends('layouts.app')

@section('title', $title)

@section('header')
    {{ $title }}
@endsection

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Position's Detail</h1>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <dl class="divide-y divide-gray-200">
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Position Name</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $position->nama_jabatan }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Basic Salary</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $position->gaji_pokok }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('positions.index') }}"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
        </div>
    </div>
@endsection