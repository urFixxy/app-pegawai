@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-days mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto  px-4 py-6 sm:px-6 lg:px-8">
        {{-- Form Card --}}
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">

            <form action="{{ route('leaves.update', $leave->id) }}" method="POST" class="p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Edit Leave</h1>
                @csrf
                @method('PUT')

                <!-- Employee Info (Read-only) -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-900 mb-1">
                        Employee Name
                    </label>
                    <div class="block w-full p-2.5 rounded-md border border-gray-300 bg-gray-50 text-gray-700">
                        {{ $leave->employee->nama_lengkap }}
                    </div>
                </div>

                {{-- Start Date --}}
                <div class="mb-4">
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai
                    </label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
                        value="{{ old('tanggal_mulai', $leave->tanggal_mulai->format('Y-m-d')) }}" min="{{ date('Y-m-d') }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5">
                </div>

                {{-- End Date --}}
                <div class="mb-4">
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" required
                        value="{{ old('tanggal_selesai', $leave->tanggal_selesai->format('Y-m-d')) }}"
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
                        placeholder="Masukkan alasan pengajuan cuti...">{{ old('deskripsi', $leave->deskripsi) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Maksimal 500 karakter</p>
                </div>

                {{-- Current Info --}}
                <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-md">
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Informasi Saat Ini:</h4>
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-gray-500">Total Hari Sebelumnya:</p>
                            <p class="font-semibold text-gray-900">{{ $leave->total_hari }} hari</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Status:</p>
                            <p class="font-semibold text-yellow-600">{{ ucfirst($leave->status) }}</p>
                        </div>
                    </div>
                </div>

                {{-- Total Days Info --}}
                <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-md">
                    <p class="text-sm text-blue-800">
                        <i class="fa-solid fa-info-circle mr-2"></i>
                        <strong>Catatan:</strong> Total hari cuti akan dihitung ulang otomatis berdasarkan tanggal mulai dan
                        selesai yang baru.
                    </p>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('leaves.show', $leave->id) }}"
                        class="px-6 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-500">
                        <i class="fa-solid fa-eye mr-2"></i>
                        Lihat Detail
                    </a>

                    <div class="flex gap-3">
                        <a href="{{ route('leaves.index') }}"
                            class="px-6 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500">
                            <i class="fa-solid fa-save mr-2"></i>
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- JavaScript for Date Validation --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const startDateInput = document.getElementById('tanggal_mulai');
                const endDateInput = document.getElementById('tanggal_selesai');

                // Update end date min when start date changes
                startDateInput.addEventListener('change', function () {
                    endDateInput.min = this.value;
                    if (endDateInput.value && endDateInput.value < this.value) {
                        endDateInput.value = this.value;
                    }
                });

                // Set initial min for end date
                if (startDateInput.value) {
                    endDateInput.min = startDateInput.value;
                }
            });
        </script>
    </div>
@endsection