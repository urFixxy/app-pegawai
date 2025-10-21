@extends('layouts.app')

@section('title', $title)

@section('header')
    {{ $title }}
@endsection

@section('content')
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <label for="nama_jabatan" class="block text-sm font-medium leading-6 text-gray-900">Position
                            Name</label>
                        <div class="mt-1">
                            <input type="text" name="nama_jabatan" id="nama_jabatan" autocomplete="nama_jabatan" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="gaji_pokok" class="block text-sm font-medium leading-6 text-gray-900">Basic Salary</label>
                        <div class="mt-1">
                            <input id="gaji_pokok" name="gaji_pokok" type="number" autocomplete="gaji_pokok" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 flex items-center justify-end gap-x-6">
            <a href="{{ route('positions.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
@endsection