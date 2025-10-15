<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarPklController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\MitraAdminController;

// =====================================================
// ================= HALAMAN PUBLIK ====================
// =====================================================
// routes/web.php

Route::middleware('auth')->group(function () {
    Route::get('/daftar-pkl', [DaftarPklController::class, 'index'])->name('daftar-pkl.index');

    // Tambahkan ini (PUT atau PATCH, sesuaikan Blade kamu)
    Route::put  ('/daftar-pkl/update-siswa', [DaftarPklController::class, 'updateSiswa'])->name('daftar-pkl.update-siswa');
    // atau:
    // Route::patch('/daftar-pkl/update-siswa', [DaftarPklController::class, 'updateSiswa'])->name('daftar-pkl.update-siswa');
});

Route::middleware('auth')->group(function () {
    Route::get('/daftar-pkl',   [DaftarPklController::class, 'index'])->name('daftar-pkl.index');
    Route::get('/daftar-pkl-2', [DaftarPklController::class, 'index'])->name('daftar-pkl.index2'); // opsional
    Route::get('/daftar-pkl-3', [DaftarPklController::class, 'index'])->name('daftar-pkl.index3'); // opsional
    Route::get('/daftar-pkl-4', [DaftarPklController::class, 'index'])->name('daftar-pkl.index4'); // opsional
});

// Halaman utama
Route::get('/', function () {
    return view('index');
})->name('index');

// Berita publik
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'publicShow'])->name('berita.show');

// Mitra publik
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('mitra.show');

// =====================================================
// ================== HALAMAN LOGIN ====================
// =====================================================
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Daftar PKL
    Route::get('/daftar-pkl', [DaftarPklController::class, 'index'])->name('daftar-pkl.index');
});

// =====================================================
// ================== HALAMAN ADMIN ====================
// =====================================================
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/admin', fn() => view('admin.index'))->name('dashboard');

    // Siswa
    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');

    // Berita (admin)
    Route::get   ('/admin/berita',             [BeritaController::class, 'index'])->name('admin.berita');
    Route::get   ('/admin/berita/create',      [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post  ('/admin/berita',             [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get   ('/admin/berita/{berita}',    [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::delete('/admin/berita/{berita}',    [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // Perusahaan (admin)
    Route::get   ('/admin/perusahaan',         [MitraAdminController::class, 'index'])->name('admin.perusahaan');
    Route::get   ('/admin/perusahaan/create',  [MitraAdminController::class, 'create'])->name('admin.perusahaan.create');
    Route::post  ('/admin/perusahaan',         [MitraAdminController::class, 'store'])->name('admin.perusahaan.store');
    Route::delete('/admin/perusahaan/{mitra}', [MitraAdminController::class, 'destroy'])->name('admin.perusahaan.destroy');
});

// =====================================================
// ================== AUTH ROUTES ======================
// =====================================================
require __DIR__ . '/auth.php';
