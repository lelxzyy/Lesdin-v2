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
                    <a href="{{ route('daftar-pkl.index') }}" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#B2C583] rounded-full mr-3"></span>
                        <span class="text-sm">Data Siswa</span>
                    </a>
                    <a href="{{ route('daftar-pkl.index2') }}" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#F4F6F4] rounded-full mr-3"></span>
                        <span class="text-sm">Pilihan Tempat PKL</span>
                    </a>
                    <a href="{{ route('daftar-pkl.index3') }}" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#F4F6F4] rounded-full mr-3"></span>
                        <span class="text-sm">Dokumen Pendukung</span>
                    </a>
                    <a href="{{ route('daftar-pkl.index4') }}" class="flex items-center text-white hover:bg-[#32453D] rounded px-3 py-2 transition">
                        <span class="w-2 h-2 bg-[#F4F6F4] rounded-full mr-3"></span>
                        <span class="text-sm">Permintaan</span>
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full max-w-3xl bg-gray-100 rounded-r-2xl shadow-lg p-8">
                <h2 class="text-xl font-semibold text-[#2E3C35] mb-6">Dokumen Pendukung</h2>

                <form action="#" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Surat Pengantar atau Surat Permohonan PKL -->
                    <div>
                        <label for="surat_pengantar" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Surat Pengantar atau Surat Permohonan PKL
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="surat_pengantar" 
                                name="surat_pengantar"
                                class="hidden"
                                accept=".pdf,.doc,.docx"
                                onchange="updateFileName(this)"
                                required
                            >
                            <button 
                                type="button"
                                onclick="document.getElementById('surat_pengantar').click()"
                                class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] transition-all duration-200 bg-white text-left text-gray-500 flex justify-between items-center"
                            >
                                <span id="surat_pengantar_label">Pilih File</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Kartu Pelajar atau KTP -->
                    <div>
                        <label for="kartu_identitas" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Kartu Pelajar atau KTP
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="kartu_identitas" 
                                name="kartu_identitas"
                                class="hidden"
                                accept="image/*,.pdf"
                                onchange="updateFileName(this)"
                                required
                            >
                            <button 
                                type="button"
                                onclick="document.getElementById('kartu_identitas').click()"
                                class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] transition-all duration-200 bg-white text-left text-gray-500 flex justify-between items-center"
                            >
                                <span id="kartu_identitas_label">Pilih File</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Curriculum Vitae (CV) atau Daftar Riwayat Hidup -->
                    <div>
                        <label for="cv" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Curriculum Vitae (CV) atau Daftar Riwayat Hidup
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="cv" 
                                name="cv"
                                class="hidden"
                                accept=".pdf,.doc,.docx"
                                onchange="updateFileName(this)"
                                required
                            >
                            <button 
                                type="button"
                                onclick="document.getElementById('cv').click()"
                                class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] transition-all duration-200 bg-white text-left text-gray-500 flex justify-between items-center"
                            >
                                <span id="cv_label">Pilih File</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Transkrip Nilai -->
                    <div>
                        <label for="transkrip" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Transkrip Nilai
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="transkrip" 
                                name="transkrip"
                                class="hidden"
                                accept=".pdf,.doc,.docx,image/*"
                                onchange="updateFileName(this)"
                                required
                            >
                            <button 
                                type="button"
                                onclick="document.getElementById('transkrip').click()"
                                class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] transition-all duration-200 bg-white text-left text-gray-500 flex justify-between items-center"
                            >
                                <span id="transkrip_label">Pilih File</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Surat Pernyataan atau Surat Kesediaan PKL -->
                    <div>
                        <label for="surat_pernyataan" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Surat Pernyataan atau Surat Kesediaan PKL
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="surat_pernyataan" 
                                name="surat_pernyataan"
                                class="hidden"
                                accept=".pdf,.doc,.docx"
                                onchange="updateFileName(this)"
                                required
                            >
                            <button 
                                type="button"
                                onclick="document.getElementById('surat_pernyataan').click()"
                                class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] transition-all duration-200 bg-white text-left text-gray-500 flex justify-between items-center"
                            >
                                <span id="surat_pernyataan_label">Pilih File</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Pas Foto Terbaru -->
                    <div>
                        <label for="pas_foto" class="block text-sm font-medium text-[#2E3C35] mb-2">
                            Pas Foto Terbaru
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="pas_foto" 
                                name="pas_foto"
                                class="hidden"
                                accept="image/*"
                                onchange="updateFileName(this)"
                                required
                            >
                            <button 
                                type="button"
                                onclick="document.getElementById('pas_foto').click()"
                                class="w-full px-4 py-2.5 border border-[#4A5A55] rounded-xl focus:outline-none ring-1 focus:ring-2 focus:ring-[#3C5148] transition-all duration-200 bg-white text-left text-gray-500 flex justify-between items-center"
                            >
                                <span id="pas_foto_label">Pilih File</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
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
                        <a href="{{ route('daftar-pkl.index4') }}"
                            class="inline-block px-8 py-2.5 bg-[#3C5148] text-white rounded-full hover:bg-[#32463D] transition duration-200 font-medium">
                            Selanjutnya
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function updateFileName(input) {
    const label = document.getElementById(input.id + '_label');
    if (input.files.length > 0) {
        label.textContent = input.files[0].name;
        label.classList.remove('text-gray-500');
        label.classList.add('text-[#2E3C35]');
    } else {
        label.textContent = 'Pilih File';
        label.classList.remove('text-[#2E3C35]');
        label.classList.add('text-gray-500');
    }
}
</script>
@endsection
