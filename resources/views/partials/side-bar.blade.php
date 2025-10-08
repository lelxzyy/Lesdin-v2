<div class="w-64 h-screen bg-[#2E4E45] text-white flex flex-col justify-between">
  <!-- Top Section -->
  <div>
    <!-- Logo -->
    <div class="flex items-center gap-2 px-6 py-4 border-b border-white/10">
      <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK" class="w-10 h-10">
      <div class="font-semibold text-sm">SMK N 2 DEPOK</div>
    </div>

    <!-- Profile -->
    <div class="flex flex-col items-center mt-6">
      <img src="{{ asset('images/admin.jpg') }}" alt="Admin" class="w-20 h-20 rounded-full object-cover border-2 border-white/20">
      <h3 class="mt-3 text-sm font-semibold">Admin</h3>
      <p class="text-xs text-gray-300">Kheyza Cesare</p>
    </div>

    <!-- Navigation -->
    <nav class="mt-10 space-y-2">
      <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-2 hover:bg-white/10 transition {{ request()->is('dashboard') ? 'bg-white/10' : '' }}">
        <i class="bi bi-grid mr-3"></i>
        Dashboard
      </a>

      <a href="{{ route('students.index') }}" class="flex items-center px-6 py-2 hover:bg-white/10 transition {{ request()->is('students*') ? 'bg-white/10' : '' }}">
        <i class="bi bi-people mr-3"></i>
        Daftar Siswa
      </a>

      <a href="{{ route('companies.index') }}" class="flex items-center px-6 py-2 hover:bg-white/10 transition {{ request()->is('companies*') ? 'bg-white/10' : '' }}">
        <i class="bi bi-briefcase mr-3"></i>
        Daftar Perusahaan
      </a>
    </nav>
  </div>

  <!-- Logout -->
  <div class="px-6 py-4 border-t border-white/10">
    <a href="{{ route('logout') }}" class="flex items-center text-sm hover:text-gray-300">
      <i class="bi bi-box-arrow-left mr-2"></i>
      Log out
    </a>
  </div>
</div>
