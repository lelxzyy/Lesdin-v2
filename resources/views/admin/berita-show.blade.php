@extends('layouts.admin-layouts')

@section('title', $berita->judul . ' | Berita')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <i data-lucide="newspaper" class="w-7 h-7 text-[#2F463F]"></i>
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-[#2F463F] leading-tight">
                    {{ $berita->judul }}
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                    @if(method_exists($berita, 'author') && $berita->author)
                        · oleh <span class="font-medium text-gray-700">{{ $berita->author->name }}</span>
                    @endif
                </p>
            </div>
        </div>

        <a href="{{ route('admin.berita') }}"
           class="inline-flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
    </div>

    {{-- Gambar (opsional) --}}
    @php
        $img = $berita->gambar
            ? (\Illuminate\Support\Str::startsWith($berita->gambar, ['http://','https://'])
                ? $berita->gambar
                : \Illuminate\Support\Facades\Storage::url($berita->gambar))
            : null;
    @endphp

    @if($img)
        <img src="{{ $img }}" alt="{{ $berita->judul }}" class="w-full rounded-xl mb-5 object-cover max-h-[420px]">
    @endif

    {{-- Isi --}}
    <article class="prose max-w-none bg-white rounded-2xl shadow p-6">
        {!! nl2br(e($berita->isi)) !!}
    </article>

    {{-- Aksi --}}
    <div class="mt-6 flex items-center justify-end gap-2">
        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
              onsubmit="return confirm('Hapus berita ini?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
            </button>
        </form>
    </div>
</div>

<script>lucide.createIcons();</script>
@endsection

