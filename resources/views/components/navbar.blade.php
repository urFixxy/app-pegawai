<div>
    <nav class="bg-gradient-to-r from-gray-800 to-gray-600 mx-5 rounded-full mt-2 fixed inset-x-5 z-50 shadow-md shadow-gray-900/50">
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
                        <button type="button"
                            class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6">
                                <path
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <el-dropdown class="relative ml-3">
                            <button
                                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                            </button>

                            <el-menu anchor="bottom" popover
                                class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Your
                                    profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Settings</a>
                            </el-menu>
                        </el-dropdown>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                            aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                            aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="md:hidden absolute left-0 right-0 top-full mt-2 mx-5">
            <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                    <a href="/employees"
                        class="{{ request()->is('employees') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Employees</a>
                    <a href="/departments"
                        class="{{ request()->is('departments') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Departments</a>
                    <a href="/attendances"
                        class="{{ request()->is('attendances') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Attendances</a>
                    <a href="/positions"
                        class="{{ request()->is('positions') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Positions</a>
                    <a href="/salaries"
                        class="{{ request()->is('salaries') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Salaries</a>
                </div>
                <div class="border-t border-white/10 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                        </div>
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">Tom Cook</div>
                            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button"
                            class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6">
                                <path
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your
                            profile</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </el-disclosure>
    </nav>
</div>