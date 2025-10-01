<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin System',
            'email' => 'admin@lesdin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Guru Users
        $gurus = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'guru',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'guru',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Ahmad Wijaya',
                'email' => 'ahmad.wijaya@lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'guru',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($gurus as $guru) {
            User::create($guru);
        }

        // Siswa Users
        $siswas = [
            [
                'name' => 'Andi Pratama',
                'email' => 'andi.pratama@student.lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lisa Wulandari',
                'email' => 'lisa.wulandari@student.lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Reza Firmansyah',
                'email' => 'reza.firmansyah@student.lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya.sari@student.lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Doni Setiawan',
                'email' => 'doni.setiawan@student.lesdin.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($siswas as $siswa) {
            User::create($siswa);
        }
    }
}