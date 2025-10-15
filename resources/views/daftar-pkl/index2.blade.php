@extends('layouts.app')
@section('content')
<div class="mt-24 min-h-screen bg-white py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <h1 class="my-4 text-center text-2xl font-bold text-[#2E3C35] mb-8">
            Pendaftaran Praktik Kerja Lapangan
        </h1>

        <div class="flex flex-col md:flex-row max-w-6xl justify-center mx-auto">
            <!-- Sidebar -->
            <div class="w-full md:w-64 bg-[#3C5148] rounded-l-2xl p-6">
                <nav class="space-y-4">
                    <a href="#" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#B2C583] rounded-full mr-3"></span>
                        <span class="text-sm">Data Siswa</span>
                    </a>
                    <a href="#" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#B2C583] rounded-full mr-3"></span>
                        <span class="text-sm">Pilihan Tempat PKL</span>
                    </a>
                    <a href="#" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#F4F6F4] rounded-full mr-3"></span>
                        <span class="text-sm">Dokumen Pendukung</span>
                    </a>
                    <a href="#" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#F4F6F4] rounded-full mr-3"></span>
                        <span class="text-sm">Permintaan</span>
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full max-w-3xl bg-gray-100 rounded-r-2xl shadow-lg p-8 min-h-[50vh]">
                <h2 class="text-xl font-semibold text-[#2E3C35] mb-6">Pilihan Tempat PKL</h2>

                <form action="#" method="POST" class="space-y-5">
                    @csrf

                    <!-- Pilihan 1 -->
                    <div>
                        <label for="pilihan1" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Pilihan 1
                        </label>
                        <select 
                            id="pilihan1" 
                            name="pilihan1"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200 bg-white appearance-none cursor-pointer"
                            style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;"
                            required
                        >
                            <option value="" disabled selected>Pilih Perusahaan</option>
                            <option value="perusahaan1">Perusahaan 1</option>
                            <option value="perusahaan2">Perusahaan 2</option>
                            <option value="perusahaan3">Perusahaan 3</option>
                        </select>
                    </div>

                    <!-- Pilihan 2 -->
                    <div>
                        <label for="pilihan2" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Pilihan 2
                        </label>
                        <select 
                            id="pilihan2" 
                            name="pilihan2"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200 bg-white appearance-none cursor-pointer"
                            style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1em;"
                            required
                        >
                            <option value="" disabled selected>Pilih Perusahaan</option>
                            <option value="perusahaan1">Perusahaan 1</option>
                            <option value="perusahaan2">Perusahaan 2</option>
                            <option value="perusahaan3">Perusahaan 3</option>
                        </select>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-center gap-4 pt-4">
                        <button 
                            type="button"
                            onclick="window.history.back()"
                            class="px-8 py-2.5 bg-gray-300 text-[#2E3C35] rounded-full hover:bg-gray-400 transition duration-200 font-medium"
                        >
                            Kembali
                        </button>
                        <a href="{{ route('index3') }}"
                            class="inline-block px-8 py-2.5 bg-[#3C5148] text-white rounded-full hover:bg-[#32463D] transition duration-200 font-medium">
                            Selanjutnya
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection