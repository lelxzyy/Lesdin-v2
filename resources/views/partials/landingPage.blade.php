<div class="font-poppins text-gray-800">
    {{-- Hero Section --}}
    <section class="relative h-screen w-full overflow-hidden">
        <img src="{{ asset('images/bg-sekolah.png') }}" alt="Hero Image"
             class="absolute inset-0 w-full h-full object-cover object-center" />
        <div class="absolute inset-0 bg-black/50"></div>

        <div data-aos="fade-up" data-aos-duration="1000"
             class="relative z-10 flex flex-col items-start justify-center h-full text-white max-w-6xl px-18">
            <a href="{{ url('/mitra') }}"
               class="bg-[#3C5148] hover:bg-[#678E4D] text-sm font-semibold px-6 py-2 rounded-full shadow-md transition mb-6 inline-flex items-center">
                Info PKL Baca Selengkapnya
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight drop-shadow-lg"
                data-aos="fade-up" data-aos-delay="300">
                SMK NEGERI 2 DEPOK
            </h1>

            <p class="text-lg font-light mt-2 drop-shadow"
               data-aos="fade-up" data-aos-delay="500">
                Unggul, Berkarakter, Kompeten
            </p>
        </div>
    </section>

    {{-- Running Logo Section - Pure CSS Animation --}}
    <section class="bg-white py-6 overflow-hidden">
        <div class="logo-slider">
            <div class="logo-track">
                @php
                    $logos = [
                        'citra.png','multiintegra.png','gama.png', 'mediakreatif.png', 
                        'nutrifood.png', 'panasonic.webp', 'teknologinusantara.png', 'jogjatechnopark.jpg',
                    ];
                @endphp
                @for($i = 0; $i < 2; $i++)
                    @foreach($logos as $logo)
                        <div class="logo-item">
                            <img src="{{ asset('images/'.$logo) }}" alt="Logo Mitra" 
                                 class="w-20 h-10 object-contain">
                        </div>
                    @endforeach
                @endfor
            </div>
        </div>
    </section>

    <style>
        .logo-slider {
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        
        .logo-track {
            display: flex;
            width: max-content;
            animation: scroll 20s linear infinite;
        }
        
        .logo-item {
            flex-shrink: 0;
            margin: 0 2rem;
        }
        
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        /* Pause on hover (optional) */
        .logo-track:hover {
            animation-play-state: paused;
        }
    </style>

   {{-- Tentang Sekolah + Visi Misi --}}
<section class="w-full relative pb-24 md:pb-0"> {{-- ✅ tambahkan pb-24 untuk spasi di mobile --}}
  <div class="relative w-full h-[300px] md:h-[400px] overflow-hidden">
    <img src="{{ asset('images/bg-sekolah-2.png') }}" alt="Foto Sekolah"
         class="absolute inset-0 w-full h-full object-cover object-center" />

    <div data-aos="fade-left" class="absolute top-8 right-8 md:right-24 bg-[#3C5148] bg-opacity-95 rounded-xl shadow-lg p-6 max-w-md text-white">
      <h3 class="text-lg md:text-2xl font-bold mb-2">SMK Negeri 2 Depok Sleman</h3>
      <p class="text-sm md:text-base leading-relaxed">
        SMK Negeri 2 Depok Sleman adalah sebuah sekolah menengah kejuruan yang berlokasi di Kabupaten Sleman, Daerah Istimewa Yogyakarta. Sekolah ini, dahulu bernama STM Pembangunan Yogyakarta, diresmikan pada tanggal 29 Juni 1972 oleh Presiden Soeharto. 
      </p>
    </div>
  </div>

  <div class="container mx-auto px-4 md:px-0 md:-mt-16 -mt-0 relative z-10 flex justify-center"> {{-- ✅ -mt hanya di md+ --}}
    <div data-aos="zoom-in" class="bg-white rounded-2xl shadow-xl p-4 md:p-6 text-center max-w-xl w-full">
      <p class="text-[#B2C583] font-medium mb-2 flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path d="M12 14l9-5-9-5-9 5 9 5z"/>
          <path d="M12 14l6.16-3.422A12.083 12.083 0 016 8.36"/>
        </svg>
        Visi dan Misi
      </p>
      <h3 class="text-2xl md:text-3xl font-bold text-[#678E4D] mb-6">Visi Membangun Masa Depan</h3>
      <p class="text-[#3C5148] text-lg md:text-xl mb-8">
        Menghasilkan peserta didik yang unggul, berkarakter, kompeten, dan berwawasan lingkungan.
      </p>
      <a href="#misi" class="inline-flex items-center text-base font-semibold text-[#3C5148] hover:text-[#678E4D]">
        Misi
        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  </div>
</section>


    {{-- Info PKL --}}
    <section class="py-20 px-6 md:px-12 lg:px-16 bg-white relative">
        <div class="absolute left-0 top-0 w-[25%] h-full bg-[#B7CDB0] z-0"></div>

        <div class="flex flex-col md:flex-row items-center max-w-5xl mx-auto gap-8 md:gap-12 relative z-10">
            <div data-aos="fade-right" class="relative md:w-1/2 w-full flex-shrink-0 flex justify-start">
                <div class="absolute right-32 bottom-0 w-[90%] h-[100%] bg-[#B7CDB0] rounded-lg z-0"></div>
                <img src="{{ asset('images/bg-sekolah-3.png') }}" alt="Foto Sekolah 3"
                    class="rounded-lg shadow-lg relative z-10 w-[370px] h-[300px] object-cover" />
            </div>

            <div data-aos="fade-left" class="p-8 mt-8 md:mt-0 md:w-1/2 w-full">
                <p class="text-[#678E4D] text-sm font-medium flex items-center gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    Info Praktik Kerja Lapangan
                </p>
                <h2 class="text-xl md:text-2xl font-bold mb-4 text-[#2D4A32]">
                    Pengalaman Nyata untuk Masa Depan Karier
                </h2>
                <p class="text-[#2D4A32] text-sm leading-relaxed mb-6">
                   Setiap langkah pembelajaran dirancang untuk membawa peserta lebih dekat pada dunia profesional. Melalui proyek nyata, kerja tim, dan kolaborasi dengan industri, proses belajar tidak berhenti di ruang kelas. Pengalaman tersebut menjadi fondasi penting dalam mengasah kemampuan dan kesiapan menghadapi tantangan karier di masa depan.
                </p>
            </div>
        </div>
    </section>

    {{-- Statistik Mitra --}}
    <section class="py-12 bg-white">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-[#B2C583] text-sm font-medium flex items-center gap-2 justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                </svg>
                Jumlah Mitra Industri
            </p>

            <div class="bg-[#3C5148] rounded-xl shadow-lg flex flex-col md:flex-row justify-center items-center px-4 py-8 gap-6 md:gap-12 text-[#D5DDDF]">
                <div class="flex-1 text-center">
                    <h3 class="text-2xl md:text-3xl font-bold mb-1">100 +</h3>
                    <p class="opacity-80">Jumlah Mitra</p>
                </div>
                <div class="flex-1 text-center">
                    <h3 class="text-2xl md:text-3xl font-bold mb-1">80 +</h3>
                    <p class="opacity-80">Dalam Provinsi</p>
                </div>
                <div class="flex-1 text-center">
                    <h3 class="text-2xl md:text-3xl font-bold mb-1">20 +</h3>
                    <p class="opacity-80">Luar Provinsi</p>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ url('/mitra') }}"
                   class="bg-[#3C5148] hover:bg-[#678E4D] text-white font-semibold py-3 px-8 rounded-lg shadow transition inline-flex items-center gap-2 text-lg">
                    Mitra PKL
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
