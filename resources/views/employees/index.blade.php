@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-users mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-4">
            @include('components.search-bar', [
                'action' => route('employees.index'),
                'name' => 'search',
                'clearUrl' => route('employees.index')
            ])

            <a href="{{ route('employees.create') }}"
               class="inline-flex items-center space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 transition">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="overflow-auto shadow-lg sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Full Name</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Email</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Phone</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date of Birth</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Address</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Entry Date</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status</th>
                        <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @if ($employee->isNotEmpty())
                        @foreach ($employee as $item)
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900 text-center">
                                    {{ $item->nama_lengkap }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $item->email }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $item->nomor_telepon }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ Str::limit($item->alamat, 30) }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        {{ $item->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap py-4 text-sm text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('employees.show', $item->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900" title="Detail">
                                            <i class="fa-solid fa-eye text-lg"></i>
                                        </a>
                                        <a href="{{ route('employees.edit', $item->id) }}"
                                           class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-lg"></i>
                                        </a>
                                        <form action="{{ route('employees.destroy', $item->id) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="text-red-600 hover:text-red-900"
                                                    title="Hapus">
                                                <i class="fa-solid fa-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-box-open text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-sm italic">No data available.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $employee->links() }}
        </div>
    </div>
@endsection