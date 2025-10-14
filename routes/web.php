<?php

use Phiki\Phast\Root;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarPklController;

Route::get('/', function () {
    return view('index');
})->name('index');

// 🔹 Hapus duplikat, cukup satu definisi saja
Route::middleware('auth')->group(function () {
    // tampilkan profil (index)
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // kalau mau edit/update/hapus profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //daftar-pkl
    Route::get('/daftar-pkl', [DaftarPklController::class, 'index'])->name('daftar-pkl.index');
});


//Mitra
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('mitra.show');

// Admin Panel - Hanya role admin yang bisa akses
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index'); // Dashboard admin
    })->name('dashboard');
    
    Route::get('/admin/siswa', function () {
        return view('admin.siswa'); // Halaman siswa
    })->name('admin.siswa');
    
    Route::get('/admin/perusahaan', function () {
        return view('admin.perusahaan'); // Halaman perusahaan
    })->name('admin.perusahaan');
});

require __DIR__.'/auth.php';
