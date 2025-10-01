<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Jurusan;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaUsers = User::where('role', 'siswa')->get();
        $jurusans = Jurusan::all();

        $siswaData = [
            [
                'name' => 'Andi Pratama',
                'nis' => '2023001',
                'nisn' => '0061234567',
                'tempat_tanggal_lahir' => 'Jakarta, 15 Maret 2005',
                'kontak' => '081234567893',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Lisa Wulandari',
                'nis' => '2023002',
                'nisn' => '0061234568',
                'tempat_tanggal_lahir' => 'Bandung, 22 Juli 2005',
                'kontak' => '081234567894',
                'alamat' => 'Jl. Sudirman No. 25, Bandung',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Reza Firmansyah',
                'nis' => '2023003',
                'nisn' => '0061234569',
                'tempat_tanggal_lahir' => 'Surabaya, 10 Januari 2006',
                'kontak' => '081234567895',
                'alamat' => 'Jl. Thamrin No. 15, Surabaya',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Maya Sari',
                'nis' => '2023004',
                'nisn' => '0061234570',
                'tempat_tanggal_lahir' => 'Medan, 5 September 2005',
                'kontak' => '081234567896',
                'alamat' => 'Jl. Ahmad Yani No. 30, Medan',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Doni Setiawan',
                'nis' => '2023005',
                'nisn' => '0061234571',
                'tempat_tanggal_lahir' => 'Yogyakarta, 18 November 2005',
                'kontak' => '081234567897',
                'alamat' => 'Jl. Malioboro No. 45, Yogyakarta',
                'gender' => 'Laki-Laki',
            ],
        ];

        foreach ($siswaUsers as $index => $user) {
            if (isset($siswaData[$index])) {
                Siswa::create([
                    'user_id' => $user->id,
                    'name' => $siswaData[$index]['name'],
                    'nis' => $siswaData[$index]['nis'],
                    'nisn' => $siswaData[$index]['nisn'],
                    'jurusan_id' => $jurusans->random()->id,
                    'tempat_tanggal_lahir' => $siswaData[$index]['tempat_tanggal_lahir'],
                    'kontak' => $siswaData[$index]['kontak'],
                    'alamat' => $siswaData[$index]['alamat'],
                    'gender' => $siswaData[$index]['gender'],
                ]);
            }
        }
    }
}