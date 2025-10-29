@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-check mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <form action="{{ route('attendances.store') }}" method="POST" class="bg-white p-3 rounded shadow-lg">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <label for="karyawan_id" class="block text-sm font-medium leading-6 text-gray-900">Employee ID</label>
                        <div class="mt-1">
                            <input type="number" name="karyawan_id" id="karyawan_id" autocomplete="karyawan_id" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="tanggal" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                        <div class="mt-1">
                            <input id="tanggal" name="tanggal" type="date" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="waktu_masuk" class="block text-sm font-medium leading-6 text-gray-900">Check In Time</label>
                        <div class="mt-1">
                            <input id="waktu_masuk" name="waktu_masuk" type="time" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="waktu_keluar" class="block text-sm font-medium leading-6 text-gray-900">Check Out Time</label>
                        <div class="mt-1">
                            <input id="waktu_keluar" name="waktu_keluar" type="time" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="status_absensi" class="block text-sm font-medium leading-6 text-gray-900">Attendance Status</label>
                        <div class="mt-1">
                            <select id="status_absensi" name="status_absensi" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                    ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                    sm:text-sm sm:leading-6" required>
                                <option value="">Select Status</option>
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 flex items-center justify-end gap-x-6">
            <a href="{{ route('attendances.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
@endsection