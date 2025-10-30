@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-sack-dollar"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-4">
            @include('components.search-bar')
            <!-- <h1 class="text-xl font-bold tracking-tight text-gray-900">List Salaries</h1> -->
            <a href="{{ route('salaries.create') }}"
                class="inline-flex items-center space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="overflow-auto shadow-lg sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:pl-6">Employee Name</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Month</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Basic Salary</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Allowance</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Deduction</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Total Salary</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @if($salary->isNotEmpty())
                    @foreach($salary as $item)
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 sm:pl-6 text-center">
                                {{ $item->employee->nama_lengkap }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                {{ $item->bulan }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                {{ $item->gaji_pokok }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center text-green-600">
                                + Rp {{ $item->tunjangan }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center text-red-600">
                                - Rp {{ $item->potongan }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                {{ $item->total_gaji }}
                            </td>
                            <td class="relative whitespace-nowrap py-4 px-3 text-center text-sm font-medium sm:pr-6">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('salaries.show', $item->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900" title="Detail">
                                        <i class="fa-solid fa-eye text-lg"></i>
                                    </a>
                                    <a href="{{ route('salaries.edit', $item->id) }}"
                                        class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                    </a>
                                    <form action="{{ route('salaries.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                            class="text-red-600 hover:text-red-900" title="Hapus">
                                            <i class="fa-solid fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="py-10 text-center text-gray-500">
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
            {{ $salary->links() }}
        </div>
    </div>
@endsection