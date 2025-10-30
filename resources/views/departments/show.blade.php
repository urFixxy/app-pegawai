@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-landmark mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Department's Detail</h1>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <dl class="divide-y divide-gray-200">
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Department Name</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $department->nama_department }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $department->id }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $department->created_at->format('d F Y, H:i') }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $department->updated_at->format('d F Y, H:i') }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('departments.index') }}"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
        </div>
    </div>
@endsection