<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jurusan',
        'kode_jurusan',
    ];

    // Relasi ke Siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
