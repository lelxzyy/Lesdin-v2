<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/css-test', function () {
    return view('css-test');
})->name('css.test');

// 🔹 Hapus duplikat, cukup satu definisi saja
Route::middleware('auth')->group(function () {
    // tampilkan profil (index)
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // kalau mau edit/update/hapus profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
