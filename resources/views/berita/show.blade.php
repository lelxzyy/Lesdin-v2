<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} | SMK N 2 Depok Sleman</title>

    {{-- Vite (CSS & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/logo-sekolah.png') }}" type="image/png">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="font-poppins bg-[#F5F7F4] text-gray-800 antialiased">
    {{-- Navbar --}}
    @include('partials.navbar')

    <main class="px-4 sm:px-6 lg:px-8 mt-32 sm:mt-36 mb-16">
        <div class="max-w-4xl mx-auto">
            {{-- Tombol kembali (arah ke halaman mitra) --}}
            <a href="{{ route('mitra.index') }}" 
               class="flex items-center text-[#2F463F] hover:underline mb-6 font-medium">
                <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i> 
                Kembali
            </a>

            {{-- Kartu berita --}}
            <article class="bg-white rounded-2xl shadow p-5 sm:p-8">
                {{-- Gambar utama --}}
                <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/news-placeholder.jpg') }}"
                     alt="{{ $berita->judul }}"
                     class="w-full rounded-lg object-cover max-h-[400px] mb-6">

                {{-- Judul --}}
                <h1 class="text-2xl sm:text-3xl font-extrabold mb-2 text-[#2F463F]">
                    {{ $berita->judul }}
                </h1>

                {{-- Tanggal --}}
                <p class="text-sm text-[#678E4D] mb-6">
                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                </p>

                {{-- Isi berita --}}
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($berita->isi)) !!}
                </div>
            </article>

            {{-- Berita lain (opsional) --}}
            @if(isset($latest) && $latest->count())
                <div class="mt-12">
                    <h2 class="text-lg sm:text-xl font-bold mb-4 text-[#2F463F]">Berita Lainnya</h2>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($latest as $b)
                            <a href="{{ route('berita.show', $b->id) }}" 
                               class="block bg-white rounded-xl shadow hover:scale-105 transition overflow-hidden">
                                <img src="{{ $b->gambar ? asset('storage/' . $b->gambar) : asset('images/news-placeholder.jpg') }}" 
                                     class="w-full h-32 object-cover">
                                <div class="p-4">
                                    <p class="text-xs text-[#678E4D] font-semibold mb-1">
                                        {{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('d F Y') }}
                                    </p>
                                    <h3 class="text-sm font-bold text-gray-900 line-clamp-2">{{ $b->judul }}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Aktifkan Lucide --}}
    <script>lucide.createIcons();</script>
</body>
</html>
