<?php

namespace App\Models;

use App\Models\GuruPendamping;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    // Relasi ke Guru Pendamping
    public function guruPendamping()
    {
        return $this->hasOne(GuruPendamping::class);
    }

    // Relasi ke Berita
    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}
