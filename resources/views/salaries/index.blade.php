@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-sack-dollar"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">
        {{-- Filter and Action Bar --}}
        <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
            <form action="{{ route('salaries.index') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Search --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text" name="search" placeholder="Name, Email, Phone..." value="{{ request('search') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    {{-- Date Filter --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                        <select name="month"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2">
                            <option value="">All Month</option>
                            <option value="January" {{ request('month') == 'January' ? 'selected' : '' }}>January</option>
                            <option value="February" {{ request('month') == 'February' ? 'selected' : '' }}>February</option>
                            <option value="March" {{ request('month') == 'March' ? 'selected' : '' }}>March</option>
                            <option value="April" {{ request('month') == 'April' ? 'selected' : '' }}>April</option>
                            <option value="May" {{ request('month') == 'May' ? 'selected' : '' }}>May</option>
                            <option value="June" {{ request('month') == 'June' ? 'selected' : '' }}>June</option>
                            <option value="July" {{ request('month') == 'July' ? 'selected' : '' }}>July</option>
                            <option value="August" {{ request('month') == 'August' ? 'selected' : '' }}>August</option>
                            <option value="September" {{ request('month') == 'September' ? 'selected' : '' }}>September</option>
                            <option value="October" {{ request('month') == 'October' ? 'selected' : '' }}>October</option>
                            <option value="November" {{ request('month') == 'November' ? 'selected' : '' }}>November</option>
                            <option value="December" {{ request('month') == 'December' ? 'selected' : '' }}>December</option>
                        </select>
                    </div>

                    {{-- Per Page --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Show</label>
                        <select name="per_page"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            onchange="this.form.submit()">
                            <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 transition">
                            <i class="fa-solid fa-filter mr-1"></i> Apply Filter
                        </button>

                        @if(request()->hasAny(['search', 'status', 'department']))
                            <a href="{{ route('salaries.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 transition">
                                <i class="fa-solid fa-times mr-1"></i> Clear
                            </a>
                        @endif
                    </div>
                    <a href="{{ route('salaries.create') }}"
                        class="inline-flex items-center gap-2 space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 transition">
                        Add Salary <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </form>
        </div>

        {{-- Salary Table --}}
        <div class="overflow-auto shadow-lg sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:pl-6">Employee
                            Name</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Month</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Basic Salary
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Allowance</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Deduction</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Total Salary
                        </th>
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
                                    Rp {{ number_format($item->gaji_pokok, 0, ',', '.') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-green-600">
                                    + Rp {{ number_format($item->tunjangan, 0, ',', '.') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-red-600">
                                    - Rp {{ number_format($item->potongan, 0, ',', '.') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-blue-600">
                                    Rp {{ number_format($item->total_gaji, 0, ',', '.') }}
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