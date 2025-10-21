@extends('layouts.app')

@section('title', $title)

@section('header')
    {{ $title }}
@endsection

@section('content')
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">Full
                            Name</label>
                        <div class="mt-1">
                            <input type="text" name="nama_lengkap" id="nama_lengkap" autocomplete="nama_lengkap" 
                                value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required maxlength="100"
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('nama_lengkap')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" 
                                value="{{ old('email', $employee->email) }}" required maxlength="100"
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="nomor_telepon" class="block text-sm font-medium leading-6 text-gray-900">Phone
                            Number</label>
                        <div class="mt-1">
                            <input id="nomor_telepon" name="nomor_telepon" type="text" autocomplete="nomor_telepon" 
                                value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required maxlength="15"
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('nomor_telepon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Date of
                            Birth</label>
                        <div class="mt-1">
                            <input id="tanggal_lahir" name="tanggal_lahir" type="date" 
                                value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('tanggal_lahir')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-1">
                            <textarea id="alamat" name="alamat" rows="3" required
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('alamat', $employee->alamat) }}</textarea>
                            @error('alamat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="tanggal_masuk" class="block text-sm font-medium leading-6 text-gray-900">Entry
                            Date</label>
                        <div class="mt-1">
                            <input id="tanggal_masuk" name="tanggal_masuk" type="date" 
                                value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('tanggal_masuk')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-1">
                            <select id="status" name="status" required
                                class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                    sm:text-sm sm:leading-6">
                                <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Nonaktif" {{ old('status', $employee->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 flex items-center justify-end gap-x-6">
            <a href="{{ route('employees.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
@endsection