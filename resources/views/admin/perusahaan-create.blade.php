{{-- resources/views/admin/perusahaan-create.blade.php --}}
@extends('layouts.admin-layouts')
@section('title','Tambah Perusahaan | SMK N 2 Depok Sleman')

@section('content')
<div class="max-w-5xl mx-auto">
  <div class="flex items-center gap-3 mb-6">
    <i data-lucide="building-2" class="w-7 h-7 text-[#2F463F]"></i>
    <h2 class="text-3xl font-extrabold tracking-wide text-[#2F463F]">Daftar Perusahaan</h2>
  </div>

  @if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-50 text-red-700 px-4 py-3 ring-1 ring-red-200">
      <ul class="list-disc list-inside">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <div class="bg-[#E8ECEB] rounded-2xl shadow p-8">
    <h3 class="text-center font-semibold text-[#2F463F] mb-6">Tambahkan Perusahaan Baru</h3>

    <form action="{{ route('admin.perusahaan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf

      {{-- Gambar/Logo (kolom DB: image) --}}
      <div>
        <label class="block text-sm text-[#2F463F] mb-1 font-medium">Logo / Gambar Perusahaan</label>

        {{-- preview --}}
        <div class="mb-2">
          <div class="w-full md:w-64 aspect-[4/3] bg-white rounded-xl border border-gray-200 grid place-items-center overflow-hidden">
            <img id="preview-image" alt="Preview" class="hidden object-contain max-h-56">
            <div id="preview-placeholder" class="flex flex-col items-center text-gray-400">
              <i data-lucide="image" class="w-8 h-8 mb-1"></i>
              <p class="text-xs">Belum ada gambar</p>
            </div>
          </div>
        </div>

        <div class="relative flex items-center justify-center bg-white rounded-xl border border-gray-300 hover:border-[#2F463F]">
          <input
            type="file"
            name="image"
            id="image-input"
            accept="image/*"
            class="absolute inset-0 opacity-0 cursor-pointer"
          >
          <div class="flex flex-col items-center py-5 text-gray-500">
            <i data-lucide="image-plus" class="w-7 h-7 mb-2"></i>
            <p class="text-xs">Klik untuk memilih gambar (.jpg/.png/.webp, maks 2MB)</p>
          </div>
        </div>
        @error('image')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm text-[#2F463F] mb-1 font-medium">Nama Perusahaan</label>
        <input name="name" value="{{ old('name') }}" class="w-full rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
      </div>

      <div>
        <label class="block text-sm text-[#2F463F] mb-1 font-medium">Lokasi</label>
        <input name="alamat" value="{{ old('alamat') }}" class="w-full rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
      </div>

      <div>
        <label class="block text-sm text-[#2F463F] mb-1 font-medium">Deskripsi Singkat</label>
        <textarea name="deskripsi" rows="4" class="w-full rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">{{ old('deskripsi') }}</textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm text-[#2F463F] mb-1 font-medium">Kuota</label>
          <input type="number" name="kuota" value="{{ old('kuota') }}" class="w-full rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
        </div>
        <div>
          <label class="block text-sm text-[#2F463F] mb-1 font-medium">Jurusan</label>
          <select name="jurusan_id" class="w-full rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
            <option value="">Pilih Jurusan</option>
            @foreach($jurusans as $j)
              <option value="{{ $j->id }}" @selected(old('jurusan_id')==$j->id)>{{ $j->nama_jurusan }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <label class="block text-sm text-[#2F463F] mb-1 font-medium">Posisi Pekerjaan</label>
        <input name="posisi" value="{{ old('posisi') }}" class="w-full rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
      </div>

      {{-- Kontak --}}
      <div>
        <label class="block text-sm text-[#2F463F] mb-2 font-medium">Kontak</label>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
          <input name="instagram" placeholder="Instagram" value="{{ old('instagram') }}" class="rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
          <input name="telepon" placeholder="Telepon" value="{{ old('telepon') }}" class="rounded-xl border-gray-300 bg-white focus:border-[#2F463F] focus:ring-[#2F463F]">
        </div>
      </div>

      <div class="flex justify-center">
        <button class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-[#2F463F] text-white hover:opacity-90">
          <i data-lucide="upload" class="w-5 h-5"></i> Simpan
        </button>
      </div>
    </form>
  </div>
</div>

{{-- Preview script --}}
<script>
  const input = document.getElementById('image-input');
  const img   = document.getElementById('preview-image');
  const ph    = document.getElementById('preview-placeholder');

  input?.addEventListener('change', (e) => {
    const file = e.target.files?.[0];
    if (!file) {
      img.classList.add('hidden');
      ph.classList.remove('hidden');
      img.src = '';
      return;
    }
    const url = URL.createObjectURL(file);
    img.src = url;
    img.onload = () => URL.revokeObjectURL(url);
    img.classList.remove('hidden');
    ph.classList.add('hidden');
  });

  lucide.createIcons();
</script>
@endsection
