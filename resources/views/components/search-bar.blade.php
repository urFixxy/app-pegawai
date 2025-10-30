<form action="{{ $action ?? route('employees.index') }}" method="GET" class="flex-1 max-w-md">
    <div class="flex items-center justify-center sm:justify-start w-full sm:w-auto">
        <div class="relative flex items-center w-[80%] sm:w-64 md:w-72">
            <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-xs sm:text-sm"></i>
            <input 
                type="text" 
                name="{{ $name ?? 'search' }}" 
                placeholder="{{ $placeholder ?? 'Search...' }}"
                value="{{ request($name ?? 'search') }}"
                class="bg-white w-full pl-8 sm:pl-9 pr-3 py-1.5 text-xs sm:text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 transition" 
            />
            @if(request($name ?? 'search'))
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <a href="{{ $clearUrl ?? $action ?? route('employees.index') }}" class="text-gray-400 hover:text-gray-600">
                        <i class="fa-solid fa-xmark text-xs sm:text-sm"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</form>