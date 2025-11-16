@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-calendar-days mr-2"></i>
    {{ $title }}
@endsection

@section('content')
<div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">

   <div class="flex items-center justify-between mb-4">
        @include('components.search-bar', [
            'action' => route('leaves.index'),
            'name' => 'search',
            'clearUrl' => route('leaves.index')
        ])
        <a href="{{ route('leaves.create') }}"
            class="inline-flex gap-2 items-center space-x-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500">
            Add leave<i class="fa-solid fa-plus"></i>
        </a>
    </div>

    {{-- Leaves Table --}}
    <div class="overflow-auto shadow-lg sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Employee</th>
                    <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Dates</th>
                    <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Days</th>
                    <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status</th>
                    <th class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($leaves as $item)
                    <tr>
                        <td class="px-3 py-4 text-sm text-center text-gray-900">
                            {{ $item->employee->name }}
                        </td>

                        <td class="px-3 py-4 text-sm text-center text-gray-500">
                            {{ $item->start_date }} → {{ $item->end_date }}
                        </td>

                        <td class="px-3 py-4 text-sm text-center text-gray-500">
                            {{ $item->total_days }}
                        </td>

                        <td class="px-3 py-4 text-sm text-center">
                            @if($item->status == 'pending')
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($item->status == 'approved')
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Approved
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            @endif
                        </td>

                        <td class="px-3 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">

                                {{-- Detail --}}
                                <a href="{{ route('leaves.show', $item->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900" title="Detail">
                                    <i class="fa-solid fa-eye text-lg"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('leaves.edit', $item->id) }}"
                                    class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('leaves.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this leave request?')"
                                        class="text-red-600 hover:text-red-900" title="Delete">
                                        <i class="fa-solid fa-trash text-lg"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-box-open text-4xl text-gray-400 mb-2"></i>
                                <p class="text-sm italic">No leave requests found.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $leaves->links() }}
    </div>

</div>
@endsection