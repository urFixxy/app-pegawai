@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-users mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Edit Employee</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="bg-white p-3 rounded shadow-lg">
            @csrf
            @method('PUT')
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
                                    value="{{ old('email', $employee->email) }}" required maxlength="100" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
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
                                    value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
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
                                    value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
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
                                <select id="status" name="status" required class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                                        ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                                        sm:text-sm sm:leading-6">
                                    <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="Nonaktif" {{ old('status', $employee->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="department_id" class="block text-sm font-medium text-gray-900">Department</label>
                            <div class="mt-1">
                                <select name="department_id" id="department_id" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                       focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                    <option value="">-- Select Department --</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                            {{ $department->nama_department }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="jabatan_id" class="block text-sm font-medium text-gray-900">Position</label>
                            <div class="mt-1">
                                <select name="jabatan_id" id="jabatan_id" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                       focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                    <option value="">-- Select Position --</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                                            {{ $position->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('employees.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md shadow hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Cancel
                </a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                                hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <i class="fa-solid fa-save mr-1"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection