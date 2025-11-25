@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-days mr-2"></i>
    {{ $title }}
@endsection

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    {{-- Form Card --}}
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        
        <form action="{{ route('leaves.store') }}" method="POST" class="p-6">
            @csrf
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Create Leave Request</h1>

            {{-- Employee Selection --}}
            <div class="mb-4">
                <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Karyawan
                </label>
                <select name="employee_id" id="employee_id" required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3">
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Start Date --}}
            <div class="mb-4">
                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Mulai
                </label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
                    value="{{ old('tanggal_mulai', date('Y-m-d')) }}"
                    min="{{ date('Y-m-d') }}"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5">
            </div>

            {{-- End Date --}}
            <div class="mb-4">
                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Selesai
                </label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" required
                    value="{{ old('tanggal_selesai', date('Y-m-d')) }}"
                    min="{{ date('Y-m-d') }}"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5">
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi / Keterangan
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2"
                    placeholder="Masukkan alasan pengajuan cuti...">{{ old('deskripsi') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Maksimal 500 karakter</p>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('leaves.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md shadow hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Cancel
                </a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm
                            hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                            focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <i class="fa-solid fa-save mr-1"></i> Save
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startDateInput = document.getElementById('tanggal_mulai');
            const endDateInput = document.getElementById('tanggal_selesai');

            // Update end date min when start date changes
            startDateInput.addEventListener('change', function() {
                endDateInput.min = this.value;
                if (endDateInput.value && endDateInput.value < this.value) {
                    endDateInput.value = this.value;
                }
            });

            if (startDateInput.value) {
                endDateInput.min = startDateInput.value;
            }
        });
    </script>
</div>
@endsection