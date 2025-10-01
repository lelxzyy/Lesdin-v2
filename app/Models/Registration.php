<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'guru_pendamping_id',
        'mitra_id',
        'status',
        'tanggal_daftar',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke Guru Pendamping
    public function guruPendamping()
    {
        return $this->belongsTo(GuruPendamping::class);
    }

    // Relasi ke Mitra
    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
