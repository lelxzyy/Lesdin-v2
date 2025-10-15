<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Mitra;

class DaftarPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data siswa berdasarkan user yang login
        $siswa = Siswa::where('user_id', Auth::id())->with('jurusan')->first();
        
        return view('daftar-pkl.index', compact('siswa'));
    }

    /**
     * Update data siswa
     */
    public function updateSiswa(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'nisn' => 'required|string|max:20',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tempat_tanggal_lahir' => 'required|string',
            'gender' => 'required|in:Perempuan,Laki-Laki',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
        ]);

        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();
        $siswa->update($validated);

        return redirect()->route('daftar-pkl.index2')
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Show step 2: Pilihan Tempat PKL
     */
    public function index2()
    {
        // Ambil semua mitra yang aktif
        $mitras = Mitra::orderBy('name')->get();
        
        return view('daftar-pkl.index2', compact('mitras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
