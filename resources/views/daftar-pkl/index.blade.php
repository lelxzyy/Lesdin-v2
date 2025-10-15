@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Daftar ke {{ $jadwal->perusahaan->nama }}</h2>

    <p class="text-gray-600 mb-4">
        Periode pendaftaran: 
        <strong>{{ $jadwal->mulai_pendaftaran->format('d M Y') }}</strong> -
        <strong>{{ $jadwal->akhir_pendaftaran->format('d M Y') }}</strong>
    </p>

    <form method="POST" action="{{ route('daftar.store', $jadwal->id) }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Alasan memilih perusahaan ini</label>
            <textarea name="alasan" class="w-full border rounded p-2" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Kirim Pendaftaran
        </button>
    </form>
</div>

@section('content')
