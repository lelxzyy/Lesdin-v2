@extends('layouts.admin-layouts')

@section('title', 'Tambah Berita | SMK N 2 Depok Sleman')

@section('content')
<div class="max-w-5xl mx-auto">
    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <i data-lucide="newspaper" class="w-7 h-7 text-[#2F463F]"></i>
        <h2 class="text-3xl font-extrabold tracking-wide text-[#2F463F]">Daftar Berita</h2>
    </div>

    {{-- Notifikasi --}}
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-50 text-red-700 px-4 py-3 ring-1 ring-red-200">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-50 text-green-700 px-4 py-3 ring-1 ring-green-200">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM TAMBAH BERITA --}}
    <div class="bg-[#E8ECEB] rounded-2xl shadow-md p-8">
        <h3 class="text-center font-semibold text-[#2F463F] mb-6">Tambahkan Berita Baru</h3>

        <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- FOTO BERITA --}}
            <div>
                <label class="block text-sm text-[#2F463F] mb-1 font-medium">Foto Berita</label>
                <div class="relative flex items-center justify-center bg-white rounded-xl border border-gray-300 hover:border-[#2F463F] transition-colors duration-200">
                    <input type="file" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                    <div class="flex flex-col items-center py-6 text-gray-400">
                        <i data-lucide="image-plus" class="w-8 h-8 mb-2"></i>
                        <p class="text-sm">Klik untuk memilih gambar</p>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">.jpg, .jpeg, .png — max 2MB</p>
            </div>

            {{-- JUDUL --}}
            <div>
                <label class="block text-sm text-[#2F463F] mb-1 font-medium">Judul Berita</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full rounded-xl border-gray-300 bg-white text-gray-800 focus:border-[#2F463F] focus:ring-[#2F463F]"
                    placeholder="Masukkan judul berita">
            </div>

            {{-- ISI BERITA --}}
            <div>
                <label class="block text-sm text-[#2F463F] mb-1 font-medium">Isi Berita</label>
                <textarea name="isi" rows="6"
                    class="w-full rounded-xl border-gray-300 bg-white text-gray-800 focus:border-[#2F463F] focus:ring-[#2F463F]"
                    placeholder="Tulis isi berita di sini...">{{ old('isi') }}</textarea>
            </div>

            {{-- TOMBOL --}}
            <div class="flex justify-center">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-[#2F463F] text-white font-medium hover:opacity-90 transition">
                    <i data-lucide="upload" class="w-5 h-5"></i>
                    Unggah
                </button>
            </div>
        </form>
    </div>
</div>

<script>lucide.createIcons();</script>
@endsection

