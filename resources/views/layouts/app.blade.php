<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SMK NEGERI 2 DEPOK SLEMAN')</title>

    {{-- Vite (CSS & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/logo-sekolah.png') }}" type="image/png">

    {{-- Google Fonts: Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Tambahan CSS per-halaman --}}
    @stack('styles')
</head>
<body class="font-poppins antialiased text-gray-800">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Konten Halaman --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // durasi animasi default
            once: true,    // hanya animasi sekali saat scroll
        });
    </script>

    {{-- Tambahan script per-halaman --}}
    @stack('scripts')
</body>
</html>
