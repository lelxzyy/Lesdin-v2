{{-- resources/views/admin/siswa.blade.php --}}
@extends('layouts.admin-layouts')

@section('title', 'Daftar Siswa | SMK N 2 Depok Sleman')

@section('content')
@php
    // fallback supaya aman kalau variabel belum dikirim
    $siswas   = $siswas   ?? collect();
    $jurusans = $jurusans ?? collect();
@endphp

<div class="max-w-6xl mx-auto">
    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <i data-lucide="file-stack" class="w-7 h-7 text-[#2F463F]"></i>
        <h2 class="text-3xl font-extrabold tracking-wide text-[#2F463F]">Daftar Siswa</h2>
    </div>

    {{-- Filter & Search --}}
    <form method="GET" class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-3">
        {{-- Search nama / NIS --}}
        <div>
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Cari nama / NIS…"
                class="w-full rounded-lg border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]"
            />
        </div>

        {{-- Filter Jurusan --}}
        <div>
            <select
                name="jurusan_id"
                class="w-full rounded-lg border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]"
            >
                <option value="">Semua Jurusan</option>
                @foreach ($jurusans as $j)
                    <option value="{{ $j->id }}" {{ (string)request('jurusan_id') === (string)$j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan ?? ('Jurusan #'.$j->id) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- (Opsional) Filter gender --}}
        <div class="flex gap-2">
            <select
                name="gender"
                class="flex-1 rounded-lg border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]"
            >
                <option value="">Semua Gender</option>
                <option value="Laki-Laki"  {{ request('gender')==='Laki-Laki'  ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan"  {{ request('gender')==='Perempuan'  ? 'selected' : '' }}>Perempuan</option>
            </select>
            <button type="submit" class="px-4 rounded-lg bg-[#2F463F] text-white hover:opacity-90">
                Terapkan
            </button>
        </div>
    </form>

    {{-- Kartu Tabel --}}
    <div class="bg-white rounded-2xl shadow p-4 md:p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500">
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">NIS</th>
                        <th class="py-3 px-4">Jurusan</th>
                        <th class="py-3 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($siswas as $i => $s)
                        <tr class="text-gray-800">
                            <td class="py-3 px-4">
                                {{ method_exists($siswas, 'firstItem') ? $siswas->firstItem() + $i : $i + 1 }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $s->name ?? '-' }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $s->nis ?? '-' }}
                            </td>

                            {{-- Jurusan: dukung relasi Eloquent (->jurusan) atau hasil join (jurusan_nama) --}}
                            <td class="py-3 px-4">
                                {{ optional($s->jurusan)->nama_jurusan ?? ($s->jurusan_nama ?? '-') }}
                            </td>

                            {{-- Status/aksi ringan (sesuai desain: "lihat") --}}
                            <td class="py-3 px-4">
                                <a href="#"
                                   class="inline-flex items-center text-emerald-700 hover:underline">
                                    lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 px-4 text-center text-gray-500">
                                Belum ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if (method_exists($siswas, 'links'))
            <div class="mt-4">
                {{ $siswas->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>

<script>lucide.createIcons();</script>
@endsection
