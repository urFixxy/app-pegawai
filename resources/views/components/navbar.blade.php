<nav
    class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 mx-5 rounded-full mt-2 fixed inset-x-5 z-50 shadow-lg shadow-gray-900/30">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="shrink-0 flex gap-3 hover:scale-110 transition-transform duration-200 cursor-pointer">
                <svg fill="#6366f1" height="30px" width="30px" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="-271 290.1 256 220.9" xml:space="preserve" stroke="white">
                    <g id="SVGRepo_bgCarrier" stroke-width="30"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M-15.1,341.2c-1.1,24.9-18.5,58.9-52.2,102.1c-34.8,45.2-64.3,67.7-88.4,67.7c-14.9,0-27.5-13.7-37.8-41.3 c-6.9-25.3-13.8-50.5-20.7-75.7c-7.7-27.6-15.9-41.3-24.7-41.3c-1.9,0-8.6,4-20.1,12.1l-12-15.5c12.6-11.1,25-22.2,37.3-33.2 c16.8-14.6,29.4-22.2,37.9-23c19.9-1.9,32.1,11.7,36.7,40.7c4.9,31.4,8.4,50.9,10.3,58.5c5.7,26,12,39,18.9,39 c5.3,0,13.4-8.4,24.1-25.2c10.7-16.8,16.4-29.6,17.2-38.5c1.5-14.5-4.2-21.8-17.2-21.8c-6.1,0-12.4,1.3-18.9,4 c12.6-40.9,36.7-60.8,72.3-59.7C-25.9,291-13.5,308-15.1,341.2z">
                        </path>
                    </g>
                </svg>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:block">
                <div class="ml-10 flex items-baseline space-x-1">
                    <a href="/home" aria-current="page"
                        class="{{ request()->is('home*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Home</a>
                    <a href="/employees"
                        class="{{ request()->is('employees*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Employees</a>
                    <a href="/attendances"
                        class="{{ request()->is('attendances*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Attendances</a>
                    <a href="/salaries"
                        class="{{ request()->is('salaries*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Salaries</a>
                    <a href="/departments"
                        class="{{ request()->is('departments*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Departments</a>
                    <a href="/positions"
                        class="{{ request()->is('positions*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Positions</a>
                    <a href="/leaves"
                        class="{{ request()->is('leaves*') ? 'bg-white/10 border-b-2 border-indigo-400 text-white' : 'text-gray-100 hover:bg-white/5' }} px-4 py-2 rounded-md text-sm font-medium transition-all duration-200">Leaves</a>
                </div>
            </div>

            <!-- Profile Dropdown (Desktop) -->
            <div class="hidden lg:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="relative ml-3">
                        <button id="profile-menu-button" type="button"
                            class="relative flex max-w-xs items-center rounded-full hover:ring-2 hover:ring-indigo-400 hover:ring-offset-2 hover:ring-offset-gray-800 transition-all duration-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                            <span class="sr-only">Open user menu</span>
                            <img src="{{ asset('/images/default-profile.jpg') }}" alt=""
                                class="size-10 rounded-full shadow-md object-cover object-top" />
                        </button>

                        <!-- Dropdown menu -->
                        <div id="profile-dropdown"
                            class="hidden absolute p-2 left-1/2 -translate-x-1/2 z-10 mt-3 w-56 origin-top-right bg-white shadow-xl rounded-md focus:outline-none"
                            role="menu">
                            <div class="px-4 py-2 border-b border-gray-200">
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'user@example.com' }}</p>
                            </div>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 transition-colors"
                                role="menuitem">Reports</a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-200">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium"
                                    role="menuitem">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex lg:hidden">
                <button type="button" id="mobile-menu-button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-300 hover:bg-white/10 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-400 transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <svg id="menu-open-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        aria-hidden="true" class="size-6 transition-transform">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg id="menu-close-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        aria-hidden="true" class="size-6 hidden transition-transform">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden absolute left-0 right-0 top-full mt-2 mx-5">
        <div
            class="bg-gradient-to-r from-gray-800 to-gray-600 rounded-2xl shadow-xl overflow-hidden border border-white/10">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <a href="/home"
                    class="{{ request()->is('home') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Home</a>
                <a href="/employees"
                    class="{{ request()->is('employees') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Employees</a>
                <a href="/attendances"
                    class="{{ request()->is('attendances') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Attendances</a>
                <a href="/salaries"
                    class="{{ request()->is('salaries') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Salaries</a>
                <a href="/departments"
                    class="{{ request()->is('departments') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Departments</a>
                <a href="/positions"
                    class="{{ request()->is('positions') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Positions</a>
                <a href="/leaves"
                    class="{{ request()->is('leaves') ? 'bg-indigo-600 text-white' : 'text-gray-200 hover:bg-white/10' }} block rounded-lg px-3 py-2 text-base font-medium transition-all">Leaves</a>
            </div>
            <div class="border-t border-white/10 pt-4 pb-3">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img src="{{ asset('/images/default-profile.jpg') }}" alt=""
                            class="size-10 rounded-full shadow-md object-cover object-top" />
                    </div>
                    <div class="ml-3">
                        <div class="text-sm font-semibold text-white">{{ Auth::user()->name ?? 'User' }}</div>
                        <div class="text-xs text-gray-400">{{ Auth::user()->email ?? 'user@example.com' }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                        class="block rounded-lg px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all">
                        My Profile</a>
                    <a href="#"
                        class="block rounded-lg px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all">Reports</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left rounded-lg px-3 py-2 text-base font-medium text-red-400 hover:bg-red-600/20 hover:text-red-300 transition-all">Sign
                            out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Profile dropdown functionality
    const profileButton = document.getElementById('profile-menu-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', function (e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    }

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOpenIcon = document.getElementById('menu-open-icon');
    const menuCloseIcon = document.getElementById('menu-close-icon');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            });
        });
    }
</script>