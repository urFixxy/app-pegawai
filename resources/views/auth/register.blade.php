<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HR Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="shrink-0 flex items-center justify-center">
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
                <p class="mt-2 text-center text-sm text-white">
                    Create New Account
                </p>
            </div>
            
            <div class="bg-white py-8 px-6 shadow rounded-lg">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nama Lengkap
                        </label>
                        <div class="mt-1">
                            <input id="name" 
                                   name="name" 
                                   type="text" 
                                   autocomplete="name" 
                                   required 
                                   value="{{ old('name') }}"
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <div class="mt-1">
                            <input id="email" 
                                   name="email" 
                                   type="email" 
                                   autocomplete="email" 
                                   required 
                                   value="{{ old('email') }}"
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" 
                                   name="password" 
                                   type="password" 
                                   autocomplete="new-password" 
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter</p>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Konfirmasi Password
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" 
                                   name="password_confirmation" 
                                   type="password" 
                                   autocomplete="new-password" 
                                   required
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Daftar
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                            Sudah punya akun? Login di sini
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>