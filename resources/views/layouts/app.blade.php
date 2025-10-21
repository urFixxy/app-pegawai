<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-full">
    {{-- Navbar --}}
    @include('components.navbar')
    <div class="min-h-full">

        {{-- Header --}}
        <header class="bg-white shadow-md sticky -top-17 z-30">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl text-center font-bold tracking-tight text-gray-900 mt-17">
                    @yield('header')
                </h1>
            </div>
        </header>

        {{-- Main Content --}}
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>

</html>