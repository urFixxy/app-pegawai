@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-check mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Create Attendance</h1>
        <form action="{{ route('attendances.store') }}" method="POST" class="bg-white p-6 rounded shadow-lg">
            @csrf

            <!-- Alert Info -->
            <div class="mb-4 bg-blue-50 border-l-4 border-blue-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-info-circle text-blue-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            <strong>Guidelines:</strong>
                            For status <strong>Present</strong>, check-in time is mandatory.
                            For status <strong>Leave/Sick/Alpha</strong>, check-in and check-out times are not required.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Employee Selection -->
                    <div class="sm:col-span-2">
                        <label for="karyawan_id" class="block text-sm font-medium text-gray-900 mb-1">
                            Employee Name
                        </label>
                        <select name="karyawan_id" id="karyawan_id"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('karyawan_id') border-red-500 @enderror"
                            required>
                            <option value="">-- Select Employee --</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }} @if(isset($employee->jabatan)) -
                                    {{ $employee->jabatan }}@endif
                                </option>
                            @endforeach
                        </select>
                        @error('karyawan_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-900 mb-1">
                            Date
                        </label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $today) }}"
                            max="{{ $today }}"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tanggal') border-red-500 @enderror"
                            required>
                        @error('tanggal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status_absensi" class="block text-sm font-medium text-gray-900 mb-1">
                            Status
                        </label>
                        <select name="status_absensi" id="status_absensi"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('status_absensi') border-red-500 @enderror"
                            required>
                            <option value="">-- Select Status --</option>
                            <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Present</option>
                            <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Leave</option>
                            <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sick</option>
                            <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                        @error('status_absensi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Check In Time -->
                    <div id="waktu_masuk_container">
                        <label for="waktu_masuk" class="block text-sm font-medium text-gray-900 mb-1">
                            Check In Time
                        </label>
                        <input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk') }}"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('waktu_masuk') border-red-500 @enderror">
                        @error('waktu_masuk')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Normal working hours: 08:00</p>
                    </div>

                    <!-- Check Out Time -->
                    <div id="waktu_keluar_container">
                        <label for="waktu_keluar" class="block text-sm font-medium text-gray-900 mb-1">
                            Check Out Time
                        </label>
                        <input type="time" name="waktu_keluar" id="waktu_keluar" value="{{ old('waktu_keluar') }}"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('waktu_keluar') border-red-500 @enderror">
                        @error('waktu_keluar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Leave blank if not yet returned</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('attendances.index') }}"
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
        // Toggle waktu masuk/keluar based on status
        document.getElementById('status_absensi').addEventListener('change', function () {
            const status = this.value;
            const waktuMasukContainer = document.getElementById('waktu_masuk_container');
            const waktuKeluarContainer = document.getElementById('waktu_keluar_container');
            const waktuMasukInput = document.getElementById('waktu_masuk');
            const waktuKeluarInput = document.getElementById('waktu_keluar');
            const requiredMasuk = document.getElementById('required_masuk');

            if (status === 'hadir') {
                // Jika hadir, tampilkan dan wajibkan waktu masuk
                waktuMasukContainer.style.display = 'block';
                waktuKeluarContainer.style.display = 'block';
                waktuMasukInput.required = true;
                requiredMasuk.style.display = 'inline';

                // Set default waktu masuk jika kosong
                if (!waktuMasukInput.value) {
                    const now = new Date();
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');
                    waktuMasukInput.value = `${hours}:${minutes}`;
                }
            } else if (status !== '') {
                // Jika izin/sakit/alpha, sembunyikan waktu
                waktuMasukContainer.style.display = 'none';
                waktuKeluarContainer.style.display = 'none';
                waktuMasukInput.required = false;
                waktuMasukInput.value = '';
                waktuKeluarInput.value = '';
            } else {
                // Jika belum pilih status, tampilkan tapi tidak required
                waktuMasukContainer.style.display = 'block';
                waktuKeluarContainer.style.display = 'block';
                waktuMasukInput.required = false;
                requiredMasuk.style.display = 'none';
            }
        });

        // Trigger on page load
        document.getElementById('status_absensi').dispatchEvent(new Event('change'));
    </script>
@endsection