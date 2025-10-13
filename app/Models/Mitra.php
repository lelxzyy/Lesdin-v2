<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deskripsi',
        'kontak',
        'email',
        'alamat',
        'kuota',
        'jurusan_id',
        'image',
    ];

    // Relasi ke Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    // Relasi ke Registrasi
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
