<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarPklController;

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

    Route::get('/admin/siswa', function () {
        return view('admin.siswa');
    })->name('admin.siswa');
  
  Route::get('/admin/berita', function () {
        return view('admin.berita');
    })->name('admin.berita');
    Route::get('/admin/perusahaan', function () {
        return view('admin.perusahaan');
    })->name('admin.perusahaan');
});

// Auth routes (Breeze/Fortify/Jetstream dsb.)
require __DIR__ . '/auth.php';
