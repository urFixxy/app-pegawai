@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-check mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-4">
            @include('components.search-bar', [
            'action' => route('attendances.index'),
            'name' => 'search',
            'clearUrl' => route('attendances.index')
            ])
            <!-- <h1 class="text-xl font-bold tracking-tight text-gray-900">List Attendances</h1> -->
            <a href="{{ route('attendances.create') }}"
                class="inline-flex items-center space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
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
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm font-md text-gray-900 text-center">
                                {{ $item->employee->nama_lengkap }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}
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
                                {{ $item->status_absensi  }}
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
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $attendance->links() }}
        </div>
    </div>
@endsection