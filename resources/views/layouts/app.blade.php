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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <!-- NProgress -->
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css" />
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            NProgress.configure({
                showSpinner: false,
                speed: 400,
                minimum: 0.1
            });

            document.querySelectorAll("a[href]").forEach(link => {
                link.addEventListener("click", e => {
                    const href = link.getAttribute("href");

                    if (
                        !href ||
                        href.startsWith("#") ||
                        href.startsWith("javascript:") ||
                        link.target === "_blank" ||
                        href === window.location.href
                    ) return;

                    e.preventDefault();

                    NProgress.start();

                    setTimeout(() => {
                        window.location = href;
                    }, 10);
                });
            });

            window.addEventListener("pageshow", () => {
                NProgress.done();
            });
        });
    </script>
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

        <div id="page-transition">
            <div class="spinner"></div>
        </div>

        {{-- Main Content --}}
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    @include('components.footer')

</body>

</html>