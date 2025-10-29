@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-landmark mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="{{ route('departments.store') }}" method="POST" class="bg-white p-3 rounded shadow-lg">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="sm:col-span-1">
                        <label for="nama_department" class="block text-sm font-medium leading-6 text-gray-900">
                            Department Name
                        </label>
                        <div class="mt-1">
                            <input type="text" name="nama_department" id="nama_department" autocomplete="nama_department"
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                           ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                           focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 flex items-center justify-end gap-x-6">
                <a href="{{ route('departments.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                               hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                               focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection