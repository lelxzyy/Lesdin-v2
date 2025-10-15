<?php
// app/Http/Controllers/Admin/SiswaController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $q          = $request->input('q');
        $jurusanId  = $request->input('jurusan_id');
        $status     = $request->input('status'); // kalau ada kolom status, sesuaikan

        $siswas = Siswa::with('jurusan')
            ->when($q, function ($sql) use ($q) {
                $sql->where(function ($w) use ($q) {
                    $w->where('name', 'like', "%{$q}%")
                      ->orWhere('nis', 'like', "%{$q}%");
                });
            })
            ->when($jurusanId, fn($sql) => $sql->where('jurusan_id', $jurusanId))
            // ->when($status, fn($sql) => $sql->where('status', $status)) // aktifkan jika punya kolom "status"
            ->orderBy('name')
            ->paginate(10);

        $jurusans = Jurusan::orderBy('name')->get(); // atau ->orderBy('jurusan')

        return view('admin.siswa', compact('siswas', 'jurusans'));
    }
}
