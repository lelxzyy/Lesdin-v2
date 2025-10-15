<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            JurusanSeeder::class,
            GuruPendampingSeeder::class,
            SiswaSeeder::class,
            MitraSeeder::class,
            JadwalPendaftaranSeeder::class, // Harus sebelum RegistrationSeeder
            RegistrationSeeder::class,
            BeritaSeeder::class,
        ]);
    }
}
