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

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Tambahan CSS per-halaman --}}
    @stack('styles')
</head>
<body class="font-poppins antialiased bg-[#3C5148]">

    {{-- Navbar --}}
    @include('partials.navbar')

    <section class="max-w-[78%] mx-auto mt-40 px-4">
        {{-- Header Card --}}
        <div class="bg-white text-gray-800 rounded-2xl p-15 flex justify-between items-center shadow-lg">
            <div>
                <h1 class="text-5xl font-bold text-[#3C5148]">Mitra PKL</h1>
                <p class="text-2xl text-[#3C5148] opacity-70 mt-1">Unggul, Berkarakter, Kompeten</p>
            </div>
            <div class="ml-6">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Sekolah" class="w-24 h-24 object-contain">
            </div>
        </div>

        {{-- Search Bar --}}
        <div class="-mt-6 max-w-[90%] mx-auto w-full">
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
    <section class="max-w-[78%] mx-auto px-4 mt-12">
        <div class="swiper mitraSwiper">
            <div class="swiper-wrapper">
                @foreach($beritas as $berita)
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden text-gray-800 hover:scale-105 transition-transform duration-300 flex flex-col h-80">
                            {{-- Gambar --}}
                            <div class="relative w-full h-36 flex-shrink-0">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full" />
                            </div>

                            {{-- Konten --}}
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <h3 class="font-bold text-sm">{{ $berita->judul }}</h3>
                                <p class="text-xs text-gray-600 mt-2">{{ Str::limit($berita->isi, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- List Perusahaan Section --}}
    <section class="max-w-[78%] mx-auto px-4 mt-16 mb-16">
            {{-- Header --}}
            <h2 class="text-white text-2xl font-bold mb-6">List Perusahaan</h2>

            {{-- Filter Buttons --}}
            <div class="flex flex-wrap gap-3 mb-8">
                <button class="filter-btn active px-6 py-2 bg-[#D9D9D9] text-white rounded-full font-medium hover:bg-[#5a7842] transition-colors" data-filter="all">
                    SEMUA
                </button>
                @foreach($jurusans as $jurusan)
                    <button class="filter-btn px-6 py-2 bg-[#D9D9D9] text-[#2D3E34] rounded-full font-medium hover:bg-[#5a7842] transition-colors" data-filter="{{ $jurusan->kode_jurusan }}">
                        {{ $jurusan->kode_jurusan }}
                    </button>
                @endforeach
            </div>
            {{-- Company Cards Grid --}}
            <div class="space-y-6">
                @foreach($mitras as $mitra)
                    <div class="company-card relative flex items-center w-full justify-center mx-auto" data-category="{{ $mitra->jurusan->kode_jurusan ?? 'all' }}">
                        {{-- Lingkaran logo --}}
                        <div class="bg-white rounded-full shadow-xl w-[200px] h-[200px] flex items-center justify-center z-10 absolute left-0">
                            {{-- @if($mitra->image) --}}
                                <img src="{{ asset('images/gama.png') }}" alt="{{ $mitra->name }} Logo" class="w-[140px] h-[140px] object-contain rounded-full">
                            {{-- @else
                                <div class="w-[140px] h-[140px] bg-gradient-to-br from-[#3C5148] to-[#678E4D] rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-3xl">{{ strtoupper(substr($mitra->name, 0, 2)) }}</span>
                                </div>
                            @endif --}}
                        </div>

                        {{-- Kartu perusahaan --}}
                        <div class="bg-white rounded-2xl shadow-md w-full h-[210px] pl-[175px] pr-10 flex flex-col justify-center relative overflow-hidden ml-[110px]">
                            <h2 class="text-xl font-bold text-black">{{ $mitra->name }}</h2>
                            <p class="text-gray-500 text-base mt-2 leading-relaxed line-clamp-2">
                                {{ $mitra->deskripsi }}
                            </p>
                            <div class="flex items-center mt-3 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span class="text-base line-clamp-1">{{ $mitra->alamat }}</span>
                            </div>

                            {{-- Badge Kuota & Jurusan --}}
                            <div class="absolute top-4 right-4 flex gap-2">
                                <span class="text-xs px-3 py-1.5 bg-[#3C5148] text-white rounded-full font-semibold">
                                    {{ $mitra->jurusan->kode_jurusan ?? 'N/A' }}
                                </span>
                                <span class="text-xs px-3 py-1.5 bg-[#678E4D] text-white rounded-full font-semibold">
                                    Kuota: {{ $mitra->kuota }}
                                </span>
                            </div>

                            {{-- Lengkungan kiri ke dalam --}}
                            <div class="absolute top-0 left-0 h-full w-[100px] bg-[#3f544a] rounded-r-full"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Swiper JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // durasi animasi default
            once: true,    // hanya animasi sekali saat scroll
        });

        // Swiper Initialization
        const swiper = new Swiper('.mitraSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const companyCards = document.querySelectorAll('.company-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active', 'bg-[#678E4D]', 'text-white'));
                filterBtns.forEach(b => b.classList.add('bg-[#D9D9D9]', 'text-[#2D3E34]'));

                // Add active class to clicked button
                btn.classList.add('active', 'bg-[#678E4D]', 'text-white');
                btn.classList.remove('bg-[#D9D9D9]', 'text-[#2D3E34]');

                const filterValue = btn.getAttribute('data-filter');

                companyCards.forEach(card => {
                    if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                        card.style.display = 'flex';
                        card.classList.add('animate-fade-in');
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <style>
        .filter-btn.active {
            background-color: #678E4D;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
    </style>

    {{-- Tambahan script per-halaman --}}
    @stack('scripts')
</body>
</html>
