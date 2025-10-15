@extends('layouts.app')
@section('content')
<div class="mt-24 min-h-screen bg-white py-8 relative">
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
                <h2 class="text-xl font-semibold text-[#2E3C35] mb-6">Persetujuan</h2>

                <form action="#" method="POST" class="space-y-6">
                    @csrf

                    <!-- Informasi Text -->
                    <div class="bg-white p-6 rounded-xl border border-[#4A5A55]">
                        <p class="text-sm text-[#2E3C35] leading-relaxed">
                            Pastikan seluruh data sudah benar sebelum menekan tombol kirim. Setelah pendaftaran dikirm, data tidak dapat diubah tanpa persetujuan admin.
                        </p>
                    </div>

                    <!-- Checkbox Persetujuan -->
                    <div class="flex items-start gap-3">
                        <input 
                            type="checkbox" 
                            id="persetujuan" 
                            name="persetujuan"
                            class="mt-1 w-4 h-4 text-[#3C5148] border-[#4A5A55] rounded focus:ring-[#3C5148] focus:ring-2"
                            required
                        >
                        <label for="persetujuan" class="text-sm text-[#2E3C35] cursor-pointer">
                            Saya menyetujui data yang saya isi sudah benar
                        </label>
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
                        <button 
                            type="button"
                            onclick="showSuccessModal()"
                            class="px-8 py-2.5 bg-[#3C5148] text-white rounded-full hover:bg-[#32463D] transition duration-200 font-medium"
                        >
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full text-center transform transition-all">
            <!-- Success Icon -->
            <div class="flex justify-center mb-6">
                <div class="w-20 h-20 bg-[#6B8E6F] rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            <!-- Success Title -->
            <h3 class="text-2xl font-bold text-[#6B8E6F] mb-4">
                Pendaftaran Berhasil!
            </h3>

            <!-- Success Message -->
            <p class="text-sm text-[#2E3C35] mb-8">
                Silakan cek secara berkala website dan email Anda untuk informasi tahap berikutnya.
            </p>

            <!-- Close Button (Optional) -->
            <button 
                onclick="closeSuccessModal()"
                class="px-8 py-2.5 bg-[#3C5148] text-white rounded-full hover:bg-[#32463D] transition duration-200 font-medium"
            >
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
function showSuccessModal() {
    // Validate checkbox first
    const checkbox = document.getElementById('persetujuan');
    if (!checkbox.checked) {
        alert('Mohon centang persetujuan terlebih dahulu');
        return;
    }
    
    const modal = document.getElementById('successModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
function closeSuccessModal() {
    const modal = document.getElementById('successModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    // Redirect ke halaman mitra
    window.location.href = "{{ route('mitra.index') }}";
    // window.location.href = '/';
}
    // window.location.href = '/';
}
</script>
@endsection
