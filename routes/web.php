<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarPklController;
use App\Http\Controllers\Admin\MitraAdminController;

// =====================================================
// ================== ROUTE ADMIN =======================
// =====================================================
Route::middleware(['auth','admin'])->group(function () {

    // === DASHBOARD ===
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('dashboard');

    // === DAFTAR SISWA ===
    Route::get('/admin/siswa', function (\Illuminate\Http\Request $request) {
        $q         = $request->q;
        $jurusanId = $request->jurusan_id;
        $gender    = $request->gender;

        $siswas = DB::table('siswas')
            ->leftJoin('jurusans', 'jurusans.id', '=', 'siswas.jurusan_id')
            ->when($q, function ($sql) use ($q) {
                $sql->where(function ($w) use ($q) {
                    $w->where('siswas.name', 'like', "%{$q}%")
                      ->orWhere('siswas.nis', 'like', "%{$q}%");
                });
            })
            ->when($jurusanId, fn($sql) => $sql->where('siswas.jurusan_id', $jurusanId))
            ->when($gender,    fn($sql) => $sql->where('siswas.gender', $gender))
            ->select('siswas.*', 'jurusans.nama_jurusan as jurusan_nama')
            ->orderBy('siswas.name')
            ->paginate(10);

        $jurusans = DB::table('jurusans')->orderBy('nama_jurusan')->get();

        return view('admin.siswa', compact('siswas', 'jurusans'));
    })->name('admin.siswa');

    // === BERITA ===
    Route::get   ('/admin/berita',             [BeritaController::class, 'index'])->name('admin.berita');
    Route::get   ('/admin/berita/create',      [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post  ('/admin/berita',             [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get   ('/admin/berita/{berita}',    [BeritaController::class, 'show'])->name('admin.berita.show');
    Route::delete('/admin/berita/{berita}',    [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // === PERUSAHAAN (MitraAdminController) ===
    Route::get   ('/admin/perusahaan',            [MitraAdminController::class, 'index'])->name('admin.perusahaan');
    Route::get   ('/admin/perusahaan/create',     [MitraAdminController::class, 'create'])->name('admin.perusahaan.create');
    Route::post  ('/admin/perusahaan',            [MitraAdminController::class, 'store'])->name('admin.perusahaan.store');
    Route::delete('/admin/perusahaan/{mitra}',    [MitraAdminController::class, 'destroy'])->name('admin.perusahaan.destroy');
});

// =====================================================
// ================= ROUTE UMUM / AUTH =================
// =====================================================

// === HALAMAN UTAMA ===
Route::get('/', function () {
    return view('index');
})->name('index');

// === PROFILE (user login) ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // === DAFTAR PKL ===
    Route::get('/daftar-pkl', [DaftarPklController::class, 'index'])->name('daftar-pkl.index');
    Route::get('/index2', function () {
    return view('daftar-pkl.index2');
})->name('index2');
    Route::get('/index3', function () {
    return view('daftar-pkl.index3');
})->name('index3');
Route::get('/index4', function () {
    return view('daftar-pkl.index4');
})->name('index4');


});

// === MITRA (untuk user biasa) ===
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('mitra.show');

   // === AUTH ROUTES ===
require __DIR__ . '/auth.php';

// === BERITA (publik) ===
Route::get('/berita', [BeritaController::class, 'publicIndex'])->name('berita.index');   // opsional: list berita publik
Route::get('/berita/{berita}', [BeritaController::class, 'publicShow'])->name('berita.show'); // detail berita publik
