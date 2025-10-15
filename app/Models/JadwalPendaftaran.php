<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPendaftaran extends Model
{
    protected $table = 'jadwal_pendaftarans';

    protected $fillable = [
        'mitra_id',
        'mulai_pendaftaran',
        'akhir_pendaftaran',
        'tanggal_pengumuman',
    ];
}
