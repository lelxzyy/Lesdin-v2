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
                        <span class="w-2 h-2 bg-[#F4F6F4] rounded-full mr-3"></span>
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
            <div class="w-full max-w-3xl bg-gray-100 rounded-r-2xl shadow-lg p-8">
                <h2 class="text-xl font-semibold text-[#2E3C35] mb-6">Data Siswa</h2>

                <form action="#" method="POST" class="space-y-5">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama_lengkap" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Nama Lengkap
                        </label>
                        <input 
                            type="text" 
                            id="nama_lengkap" 
                            name="nama_lengkap"
                            placeholder="Masukkan nama lengkap"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- NIS -->
                    <div>
                        <label for="nis" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            NIS
                        </label>
                        <input 
                            type="text" 
                            id="nis" 
                            name="nis"
                            placeholder="Masukkan NIS"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- NISN -->
                    <div>
                        <label for="nisn" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            NISN
                        </label>
                        <input 
                            type="text" 
                            id="nisn" 
                            name="nisn"
                            placeholder="Masukkan NISN"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Jurusan
                        </label>
                        <input 
                            type="text" 
                            id="jurusan" 
                            name="jurusan"
                            placeholder="Masukkan Jurusan"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- Tempat, Tanggal Lahir -->
                    <div>
                        <label for="ttl" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Tempat, Tanggal Lahir
                        </label>
                        <input 
                            type="text" 
                            id="ttl" 
                            name="ttl"
                            placeholder="Contoh : Yogyakarta 17 Agustus 2001"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-medium text-[#2E3C35] mb-3">
                            Jenis Kelamin
                        </label>

                        <div class="flex gap-4">
                            <!-- Perempuan -->
                            <label class="relative flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="radio" 
                                    name="jenis_kelamin" 
                                    value="Perempuan"
                                    class="peer hidden"
                                    required
                                >
                                <div class="flex items-center gap-2 px-6 py-3 border-2 rounded-2xl border-[#3C5148] text-[#2E3C35] transition 
                                            peer-checked:bg-[#3C5148] peer-checked:text-white peer-checked:ring-2 peer-checked:ring-[#3C5148]">
                                    <span>♀</span>
                                    <span class="font-medium">Perempuan</span>
                                </div>
                            </label>

                            <!-- Laki-laki -->
                            <label class="relative flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="radio" 
                                    name="jenis_kelamin" 
                                    value="Laki-laki"
                                    class="peer hidden"
                                    required
                                >
                                <div class="flex items-center gap-2 px-6 py-3 border-2 rounded-2xl border-[#3C5148] text-[#2E3C35] transition 
                                            peer-checked:bg-[#3C5148] peer-checked:text-white peer-checked:ring-2 peer-checked:ring-[#3C5148]">
                                    <span>♂</span>
                                    <span class="font-medium">Laki-laki</span>
                                </div>
                            </label>
                        </div>
                    </div>


                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Alamat
                        </label>
                        <input 
                            type="text" 
                            id="alamat" 
                            name="alamat"
                            placeholder="Masukkan Alamat"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- Nomer Telepon -->
                    <div>
                        <label for="telepon" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Nomer Telepon
                        </label>
                        <div class="flex">
                            <input 
                                type="text" 
                                value="+62"
                                class="w-16 px-3 py-2.5 border border-[#4A5A55] rounded-l-xl bg-gray-50 text-center ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200""
                                readonly
                            >
                            <input 
                                type="tel" 
                                id="telepon" 
                                name="telepon"
                                placeholder="8xxxxxxxxx"
                                class="flex-1 px-4 py-2.5 border border-[#4A5A55] rounded-r-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200""
                                required
                            >
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            placeholder="Example@gmail.com"
                            class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] focus:border-transparent transition-all duration-200"
                            required
                        >
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center pt-4">
                        <a href="{{ route('index2') }}"
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
