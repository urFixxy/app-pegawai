<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-xl font-bold tracking-tight text-gray-900">List Employees</h1>
                <a href="{{ route('employees.create') }}"
                    class="inline-flex items-center space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>

            <div class="overflow-auto shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                Full Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Email
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Phone</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date of Birth</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Address
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Entry Date</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                Department</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Position
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($employees as $employee)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ $employee->nama_lengkap }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->email }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->nomor_telepon }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->tanggal_lahir }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->alamat }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->tanggal_masuk }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->department_id }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->jabatan_id }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $employee->status }}</td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('employees.show', $employee->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Detail</a> |
                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a> |
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                            class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-layout>