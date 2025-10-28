<div>
    <nav
        class="bg-gradient-to-r from-gray-800 to-gray-600 mx-5 rounded-full mt-2 fixed inset-x-5 z-50 shadow-md shadow-gray-900/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="shrink-0">
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
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-1">
                        <a href="/employees" aria-current="page"
                            class="{{ request()->is('employees*') ? 'bg-white text-gray-900' : 'text-white'}} rounded-full  px-3 py-2 text-sm">Employees</a>
                        <a href="/departments"
                            class="{{ request()->is('departments*') ? 'bg-white text-gray-900' : 'text-white'}} rounded-full  px-3 py-2 text-sm">Departments</a>
                        <a href="/attendances"
                            class="{{ request()->is('attendances*') ? 'bg-white text-gray-900' : 'text-white'}} rounded-full  px-3 py-2 text-sm">Attendances</a>
                        <a href="/positions"
                            class="{{ request()->is('positions*') ? 'bg-white text-gray-900' : 'text-white'}} rounded-full  px-3 py-2 text-sm">Positions</a>
                        <a href="/salaries"
                            class="{{ request()->is('salaries*') ? 'bg-white text-gray-900' : 'text-white'}} rounded-full  px-3 py-2 text-sm">Salaries</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <button id="profile-menu-button" type="button"
                                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img src="{{ asset('/images/default-profile.jpg') }}" alt=""
                                    class="size-12 rounded-full outline -outline-offset-1 object-cover object-top outline-white/10" />
                            </button>

                            <!-- Dropdown menu -->
                            <div id="profile-dropdown"
                                class="hidden absolute left-1/2 -translate-x-1/2 z-10 mt-3 w-60 origin-top rounded-md bg-white py-1 shadow-lg ring-opacity-5 focus:outline-none"
                                role="menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Your profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" id="mobile-menu-button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg id="menu-open-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg id="menu-close-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute left-0 right-0 top-full mt-2 mx-5">
            <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <a href="/employees"
                        class="{{ request()->is('employees') ? 'bg-white text-gray-900' : 'text-white' }} block rounded-md px-3 py-2 text-base font-medium">Employees</a>
                    <a href="/departments"
                        class="{{ request()->is('departments') ? 'bg-white text-gray-900' : 'text-white' }} block rounded-md px-3 py-2 text-base font-medium">Departments</a>
                    <a href="/attendances"
                        class="{{ request()->is('attendances') ? 'bg-white text-gray-900' : 'text-white' }} block rounded-md px-3 py-2 text-base font-medium">Attendances</a>
                    <a href="/positions"
                        class="{{ request()->is('positions') ? 'bg-white text-gray-900' : 'text-white' }} block rounded-md px-3 py-2 text-base font-medium">Positions</a>
                    <a href="/salaries"
                        class="{{ request()->is('salaries') ? 'bg-white text-gray-900' : 'text-white' }} block rounded-md px-3 py-2 text-base font-medium">Salaries</a>
                </div>
                <div class="border-t border-white/10 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img src="{{ asset('/images/default-profile.jpg') }}" alt=""
                                class="size-12 rounded-full outline -outline-offset-1 object-cover object-top outline-white/10" />
                        </div>
                        <button type="button"
                            class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your
                            profile</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign
                                out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Notification Toast - Create -->
<div id="toast-success"
    class="hidden fixed top-20 right-5 z-[9999] flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-lg border border-green-300"
    role="alert">
    <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ms-3 text-sm font-medium text-green-700" id="toast-message">
        Data berhasil ditambahkan!
    </div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-green-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        id="toast-close-btn">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7 1 13" />
        </svg>
    </button>
</div>
<!-- Notification Toast - Delete -->
<div id="toast-delete"
    class="hidden fixed top-20 right-5 z-[9999] flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-lg border border-red-300"
    role="alert">
    <svg class="flex-shrink-0 w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M8.257 3.099c.366-.446.958-.665 1.543-.53l6 1.333A1 1 0 0117 4.89V16a2 2 0 01-2 2H5a2 2 0 01-2-2V4.89a1 1 0 01.2-.59l6-1.333a1 1 0 01.957.132zM8 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 112 0v6a1 1 0 11-2 0V8z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ms-3 text-sm font-medium text-red-700" id="toast-delete-message">
        Data berhasil dihapus!
    </div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        id="toast-delete-close-btn">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7 1 13" />
        </svg>
    </button>
</div>

<script>
    // Profile dropdown functionality
    const profileButton = document.getElementById('profile-menu-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    profileButton.addEventListener('click', function (e) {
        e.stopPropagation();
        profileDropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('hidden');
        }
    });

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOpenIcon = document.getElementById('menu-open-icon');
    const menuCloseIcon = document.getElementById('menu-close-icon');

    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
        menuOpenIcon.classList.toggle('hidden');
        menuCloseIcon.classList.toggle('hidden');
    });

    function showToast(message = "Data berhasil ditambahkan!") {
        const toast = document.getElementById("toast-success");
        const toastMsg = document.getElementById("toast-message");
        const closeBtn = document.getElementById("toast-close-btn");

        toastMsg.textContent = message;
        toast.classList.remove("hidden");
        toast.classList.add("flex");

        // Auto-hide after 3 seconds
        setTimeout(() => {
            toast.classList.add("hidden");
            toast.classList.remove("flex");
        }, 3000);

        // Close button
        closeBtn.addEventListener("click", () => {
            toast.classList.add("hidden");
            toast.classList.remove("flex");
        });
    }

    function showDeleteToast(message = "Data berhasil dihapus!") {
        const toast = document.getElementById("toast-delete");
        const toastMsg = document.getElementById("toast-delete-message");
        const closeBtn = document.getElementById("toast-delete-close-btn");

        toastMsg.textContent = message;
        toast.classList.remove("hidden");
        toast.classList.add("flex");

        // Auto-hide setelah 3 detik
        setTimeout(() => {
            toast.classList.add("hidden");
            toast.classList.remove("flex");
        }, 3000);

        // Tombol close
        closeBtn.addEventListener("click", () => {
            toast.classList.add("hidden");
            toast.classList.remove("flex");
        });
    }

    // === Cek dari session Laravel ===
    @if (session('success'))
        document.addEventListener("DOMContentLoaded", () => {
            showToast("{{ session('success') }}");
        });
    @endif

    @if (session('deleted'))
        document.addEventListener("DOMContentLoaded", () => {
            showDeleteToast("{{ session('deleted') }}");
        });
    @endif
</script>