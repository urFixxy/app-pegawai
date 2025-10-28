<div class="flex items-center justify-center sm:justify-start w-full sm:w-auto">
    <div class="relative flex items-center w-[80%] sm:w-64 md:w-72">
        <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-sm sm:text-base"></i>
        <input
            type="text"
            name="search"
            placeholder="Search..."
            value="{{ request('search') }}"
            class="w-full pl-9 sm:pl-10 pr-3 py-2 text-sm sm:text-base border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
        />
    </div>
</div>