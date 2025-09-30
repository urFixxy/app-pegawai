<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Detail Pegawai</h1>

        <div class="bg-white shadow rounded-xl overflow-hidden border border-gray-200">
            <dl class="divide-y divide-gray-200">
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->nama_lengkap }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->email }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Nomor Telepon</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->nomor_telepon }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Tanggal Lahir</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->tanggal_lahir }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->alamat }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->tanggal_masuk }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Department</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->department_id }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Jabatan</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->jabatan_id }}</dd>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-4">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $employee->status }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('employees.index') }}"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
        </div>
    </div>
</x-layout>