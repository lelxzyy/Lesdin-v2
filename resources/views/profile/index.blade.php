{{-- resources/views/profile.blade.php --}}
@extends('layouts.app') {{-- kalau pakai layout, sesuaikan --}}

@section('content')
<div class="min-h-screen flex flex-col bg-white">

    {{-- Header Background --}}
    <div class="relative h-52 md:h-60 bg-gradient-to-r from-[#3C5148] to-[#678E4D]">
        {{-- Pattern background --}}
        <div class="absolute inset-0 bg-[url('/image/bg-dots.png')] bg-cover opacity-70"></div>

        {{-- Bagian profil --}}
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-[92%] md:w-[80%] bg-white rounded-xl shadow-lg px-6 py-6 flex items-center justify-between">
            {{-- Foto + Info --}}
            <div class="flex items-center gap-5">
                <div class="w-28 h-28 rounded-full overflow-hidden border-2 border-gray-300 shadow-md hover:scale-105 transition">
                    <img src="{{ asset('images/gama.png') }}" alt="Foto Profil" class="object-cover w-full h-full">
                </div>
                <div>
                    <h2 class="text-xl font-bold text-black">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-700">
                        @if(Auth::user()->role === 'siswa' && Auth::user()->siswa)
                            {{ Auth::user()->siswa->jurusan->nama_jurusan ?? 'Jurusan tidak ditemukan' }}
                        @elseif(Auth::user()->role === 'guru')
                            Guru Pendamping
                        @else
                            Administrator
                        @endif
                    </p>
                </div>
            </div>

            {{-- Tombol Edit --}}
            <button class="px-5 py-2 bg-gray-200 text-black rounded-lg text-sm transition hover:scale-105 hover:bg-gray-300">
                Edit Profil
            </button>
        </div>
    </div>

    {{-- Konten Utama --}}
    <main class="flex-1 px-6 md:px-40 mt-28 mb-20">
        <hr class="mb-10 border-gray-300">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Data Diri --}}
            <div>
                <h3 class="font-bold text-lg mb-6 text-black">Data Diri</h3>
                <div class="space-y-5">
                    <div>
                        <p class="text-sm font-medium text-black">Nama</p>
                        <div class="bg-gray-100 rounded-md px-4 py-2 text-sm text-black">{{ Auth::user()->name }}</div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-black">
                            @if(Auth::user()->role === 'siswa')
                                NIS
                            @elseif(Auth::user()->role === 'guru')
                                NIP
                            @else
                                ID
                            @endif
                        </p>
                        <div class="bg-gray-100 rounded-md px-4 py-2 text-sm text-black">
                            @if(Auth::user()->role === 'siswa' && Auth::user()->siswa)
                                {{ Auth::user()->siswa->nis }}
                            @elseif(Auth::user()->role === 'guru' && Auth::user()->guruPendamping)
                                {{ Auth::user()->guruPendamping->nip }}
                            @else
                                {{ Auth::user()->id }}
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-black">Jurusan/Role</p>
                        <div class="bg-gray-100 rounded-md px-4 py-2 text-sm text-black">
                            @if(Auth::user()->role === 'siswa' && Auth::user()->siswa)
                                {{ Auth::user()->siswa->jurusan->nama_jurusan ?? 'Jurusan tidak ditemukan' }}
                            @elseif(Auth::user()->role === 'guru')
                                Guru Pendamping
                            @else
                                Administrator
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-black">Email</p>
                        <div class="bg-gray-100 rounded-md px-4 py-2 text-sm text-black">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            {{-- Status Pendaftaran --}}
            <div>
                <h3 class="font-bold text-lg mb-6 text-black">Status Pendaftaran</h3>
                <div class="space-y-7">
                    <div>
                        <p class="text-sm font-medium text-black mb-2">Perusahaan 1</p>
                        <div class="flex justify-between items-center bg-gray-100 px-4 py-3 rounded-md">
                            <span class="font-medium text-black">PT Cargloss</span>
                            <span class="px-3 py-1 text-xs md:text-sm bg-red-600 text-white rounded-md">Ditolak</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-black mb-2">Perusahaan 2</p>
                        <div class="flex justify-between items-center bg-gray-100 px-4 py-3 rounded-md">
                            <span class="font-medium text-black">PT Gamatechno</span>
                            <span class="px-3 py-1 text-xs md:text-sm bg-green-600 text-white rounded-md">Diterima</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection
