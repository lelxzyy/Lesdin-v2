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
        'image',
    ];

    // Relasi ke Registrasi
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
