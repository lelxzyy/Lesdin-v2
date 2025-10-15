<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarPklController;
use App\Http\Controllers\Admin\SiswaController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Daftar PKL
    Route::get('/daftar-pkl', [DaftarPklController::class, 'index'])->name('daftar-pkl.index');
});

// Mitra (public)
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('mitra.show');

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('dashboard');

    // Siswa
Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');

    // ===== BERITA (pakai controller) =====
Route::get   ('/admin/berita',             [BeritaController::class, 'index'])->name('admin.berita');
Route::get   ('/admin/berita/create',      [BeritaController::class, 'create'])->name('admin.berita.create'); // <- NEW
Route::post  ('/admin/berita',             [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get   ('/admin/berita/{berita}',    [BeritaController::class, 'show'])->name('admin.berita.show');     // opsional
Route::delete('/admin/berita/{berita}',    [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // Perusahaan (sementara masih view statis)
    Route::get('/admin/perusahaan', function () {
        return view('admin.perusahaan');
    })->name('admin.perusahaan');
});

// Auth routes (Breeze/Fortify/Jetstream dsb.)
require __DIR__ . '/auth.php';
