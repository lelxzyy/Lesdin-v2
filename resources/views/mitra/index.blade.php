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
<body class="font-poppins antialiased bg-[#3C5148]">

    {{-- Navbar --}}
    @include('partials.navbar')

    <section class="max-w-5xl mx-auto mt-40 px-4">
        {{-- Header Card --}}
        <div class="bg-white text-gray-800 rounded-2xl p-8 flex justify-between items-center shadow-lg">
            <div>
                <h1 class="text-3xl font-bold text-[#3C5148]">Mitra PKL</h1>
                <p class="text-lg text-[#3C5148] opacity-70 mt-1">Unggul, Berkarakter, Kompeten</p>
            </div>
            <div class="ml-6">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Sekolah" class="w-24 h-24 object-contain">
            </div>
        </div>

        {{-- Search Bar --}}
        <div class="-mt-6 max-w-[85%] mx-auto w-full">
            <form action="" method="GET" class="relative">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Temukan mitra industri di sini…" 
                    class="w-full pl-10 pr-10 py-3 rounded-lg bg-gray-200 text-gray-700 placeholder-gray-500 focus: outline-none"
                >
                <button type="submit" aria-label="Cari" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#3C5148]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>
                </button>
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap-icon lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                </span>
            </form>
        </div>
    </section>

    {{--  Berita Card --}}
    <section class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-12">
            @foreach($beritas as $berita)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden text-gray-800 hover:scale-105 transition-transform duration-300">
                    {{-- Gambar --}}
                    <div class="relative w-full h-48">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full" />
                    </div>

                    {{-- Konten --}}
                    <div class="p-4">
                        <h3 class="font-bold text-sm">{{ $berita->judul }}</h3>
                        <p class="text-xs text-gray-600">{{ Str::limit($berita->isi, 100) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

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