<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Siswa extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'nis',
        'nisn',
        'jurusan_id',
        'tempat_tanggal_lahir',
        'kontak',
        'alamat',
        'gender',
    ];

    /**
     * Relationship dengan User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship dengan Jurusan
     */
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Relationship dengan Registration
     */
    public function registration(): HasOne
    {
        return $this->hasOne(Registration::class);
    }
}
