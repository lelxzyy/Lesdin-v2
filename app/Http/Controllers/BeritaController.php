<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * LIST BERITA (admin)
     */
    public function index()
    {
        $beritas = Berita::latest()->paginate(6);
        return view('admin.berita', compact('beritas'));
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        return view('admin.berita-create');
    }

    /**
     * SIMPAN BERITA BARU
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required','string','max:200'],
            'isi'   => ['required','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'],
        ]);

        $path = $request->hasFile('image')
            ? $request->file('image')->store('berita', 'public') // storage/app/public/berita
            : null;

        Berita::create([
            'user_id' => Auth::id(),
            'judul'   => $data['judul'],
            'isi'     => $data['isi'],
            'gambar'  => $path,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * DETAIL (opsional)
     */
    public function show(Berita $berita)
    {
        return view('admin.berita-show', compact('berita'));
    }

    /**
     * HAPUS
     */
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
