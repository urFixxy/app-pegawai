@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-check mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">
        {{-- Filter and Action Bar --}}
        <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
            <form action="{{ route('attendances.index') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    {{-- Search --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text" name="search" placeholder="Name, Email, Phone..." value="{{ request('search') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </div>

                    {{-- Date Filter --}}
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" name="date" id="date" value="{{ request('date') }}"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2">
                    </div>

                    {{-- Status Filter --}}
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2.5">
                            <option value="">All Status</option>
                            <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Present</option>
                            <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Leave</option>
                            <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sick</option>
                            <option value="alpha" {{ request('status') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                    </div>

                    {{-- Per Page --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Show</label>
                        <select name="per_page"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2.5"
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
                            <a href="{{ route('attendances.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 transition">
                                <i class="fa-solid fa-times mr-1"></i> Clear
                            </a>
                        @endif
                    </div>
                    <a href="{{ route('attendances.create') }}"
                        class="inline-flex items-center gap-2 space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 transition">
                        Add Attendance <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-auto shadow-lg sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                            Employee Name</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Check In Time
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Check Out Time
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @if($attendance->isNotEmpty())
                        @foreach($attendance as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-3 py-4 text-sm font-md text-gray-900 text-center">
                                    {{ $item->employee->nama_lengkap }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $item->waktu_masuk ?? '-' }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                    {{ $item->waktu_keluar ?? '-' }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center ">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($item->status_absensi == 'hadir') bg-green-100 text-green-800
                                                @elseif($item->status_absensi == 'izin') bg-yellow-100 text-yellow-800
                                                @elseif($item->status_absensi == 'sakit') bg-blue-100 text-blue-800
                                                @elseif($item->status_absensi == 'alpha') bg-red-100 text-red-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($item->status_absensi)  }}
                                    </span>
                                </td>
                                <td class="relative whitespace-nowrap px-3 py-4 text-sm font-medium text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('attendances.show', $item->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900" title="Detail">
                                            <i class="fa-solid fa-eye text-lg"></i></a>
                                        <a href="{{ route('attendances.edit', $item->id) }}"
                                            class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-lg"></i></a>
                                        <form action="{{ route('attendances.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                                class="text-red-600 hover:text-red-900 text-lg"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-box-open text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-sm italic">No data available.</p>
                                    @if(request()->hasAny(['search', 'date_from', 'date_to', 'status']))
                                        <p class="text-xs text-gray-400 mt-1">Try adjusting your filters</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $attendance->appends(request()->query())->links() }}
        </div>
    </div>
@endsection