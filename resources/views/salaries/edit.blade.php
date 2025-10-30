@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-sack-dollar"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Edit Position</h1>
        <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="bg-white p-6 rounded shadow-lg">
            @csrf
            @method('PUT')

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-2">

                        <div class="sm:col-span-1">
                            <label for="karyawan_id" class="block text-sm font-medium leading-6 text-gray-900">
                                Employee ID</label>
                            <div class="mt-1">
                                <input type="text" name="karyawan_id" id="karyawan_id"
                                    value="{{ old('karyawan_id', $salary->karyawan_id) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="bulan" class="block text-sm font-medium leading-6 text-gray-900">
                                Month</label>
                            <div class="mt-1">
                                <input id="bulan" name="bulan" type="text" value="{{ old('bulan', $salary->bulan) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="gaji_pokok" class="block text-sm font-medium leading-6 text-gray-900">
                                Basic Salary</label>
                            <div class="mt-1">
                                <input id="gaji_pokok" name="gaji_pokok" type="number"
                                    value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="tunjangan" class="block text-sm font-medium leading-6 text-gray-900">
                                Allowance</label>
                            <div class="mt-1">
                                <input id="tunjangan" name="tunjangan" type="number"
                                    value="{{ old('tunjangan', $salary->tunjangan) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="potongan" class="block text-sm font-medium leading-6 text-gray-900">
                                Deduction</label>
                            <div class="mt-1">
                                <input id="potongan" name="potongan" type="number"
                                    value="{{ old('potongan', $salary->potongan) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="total_gaji" class="block text-sm font-medium leading-6 text-gray-900">
                                Total Salary</label>
                            <div class="mt-1">
                                <input id="total_gaji" name="total_gaji" type="number"
                                    value="{{ old('total_gaji', $salary->total_gaji) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('salaries.index') }}"
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