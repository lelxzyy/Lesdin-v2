<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | SMK N 2 Depok Sleman')</title>
    
    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/logo-sekolah.png') }}" type="image/png">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Icon Library --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="fixed left-0 top-0 h-screen w-64 bg-[#2F463F] text-white flex flex-col justify-between shadow-lg z-50">
        {{-- Top Section --}}
        <div>
            <div class="flex items-center gap-3 px-6 py-5">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                <h1 class="text-lg font-semibold leading-tight">SMK N 2 DEPOK</h1>
            </div>

            {{-- Profile --}}
            <div class="text-center mt-6">
                <img src="{{ asset('images/gama.png') }}" alt="Profile" class="w-20 h-20 mx-auto rounded-full">
                <p class="mt-3 font-semibold text-sm">Admin</p>
                <p class="text-xs text-gray-300">Kheyza Cesare</p>
            </div>

            {{-- Navigation --}}
            <nav class="mt-8 flex flex-col space-y-1 px-4">
                {{-- Dashboard --}}
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-md transition-all duration-200
                   {{ request()->routeIs('dashboard') 
                       ? 'bg-white/20 text-white shadow-inner' 
                       : 'text-gray-200 hover:bg-white/10 hover:text-white' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>

                {{-- Daftar Siswa --}}
                <a href="{{ route('siswa') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-md transition-all duration-200
                   {{ request()->routeIs('siswa*') 
                       ? 'bg-white/20 text-white shadow-inner' 
                       : 'text-gray-200 hover:bg-white/10 hover:text-white' }}">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span>Daftar Siswa</span>
                </a>

                {{-- Daftar Perusahaan --}}
                <a href="{{ route('perusahaan') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-md transition-all duration-200
                   {{ request()->routeIs('perusahaan*') 
                       ? 'bg-white/20 text-white shadow-inner' 
                       : 'text-gray-200 hover:bg-white/10 hover:text-white' }}">
                    <i data-lucide="building" class="w-5 h-5"></i>
                    <span>Daftar Perusahaan</span>
                </a>
            </nav>
        </div>

        {{-- Logout --}}
        <div class="px-4 py-5">
            <a href="{{ route('logout') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-md transition-all duration-200 text-gray-300 hover:bg-white/10 hover:text-white">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                <span>Log out</span>
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 ml-64 p-8 overflow-y-auto">
        @yield('content')
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
