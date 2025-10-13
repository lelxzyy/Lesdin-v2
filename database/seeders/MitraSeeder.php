<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mitras = [
            [
                'name' => 'PT. Teknologi Nusantara',
                'deskripsi' => 'Perusahaan teknologi informasi yang bergerak di bidang pengembangan software dan sistem informasi.',
                'kontak' => '021-7654321',
                'email' => 'info@teknusantara.com',
                'alamat' => 'Jl. Gatot Subroto No. 123, Jakarta Selatan',
                'kuota' => 10,
                'jurusan_id' => 1,
            ],
            [
                'name' => 'CV. Digital Solutions',
                'deskripsi' => 'Perusahaan yang fokus pada solusi digital untuk berbagai industri.',
                'kontak' => '021-8765432',
                'email' => 'contact@digitalsolutions.co.id',
                'alamat' => 'Jl. Sudirman No. 456, Jakarta Pusat',
                'kuota' => 8,
                'jurusan_id' => 2,
            ],
            [
                'name' => 'PT. Media Kreatif Indonesia',
                'deskripsi' => 'Perusahaan yang bergerak di bidang multimedia dan desain grafis.',
                'kontak' => '021-9876543',
                'email' => 'info@mediakreatif.co.id',
                'alamat' => 'Jl. Thamrin No. 789, Jakarta Pusat',
                'kuota' => 6,
                'jurusan_id' => 3,
            ],
            [
                'name' => 'Bengkel Otomotif Maju Jaya',
                'deskripsi' => 'Bengkel spesialis kendaraan ringan dengan teknologi modern.',
                'kontak' => '021-5432109',
                'email' => 'majujaya@gmail.com',
                'alamat' => 'Jl. Raya Bekasi No. 321, Bekasi',
                'kuota' => 12,
                'jurusan_id' => 4,
            ],
            [
                'name' => 'PT. Elektronik Industri Mandiri',
                'deskripsi' => 'Perusahaan manufaktur komponen elektronik industri.',
                'kontak' => '021-6543210',
                'email' => 'hrd@elektronikmandiri.com',
                'alamat' => 'Kawasan Industri Pulogadung, Jakarta Timur',
                'kuota' => 15,
                'jurusan_id' => 5,
            ],
            [
                'name' => 'Studio Kreatif Multimedia',
                'deskripsi' => 'Studio produksi video, animasi, dan konten digital.',
                'kontak' => '021-3456789',
                'email' => 'info@studiokreatif.com',
                'alamat' => 'Jl. Kemang Raya No. 567, Jakarta Selatan',
                'kuota' => 5,
                'jurusan_id' => 3,
            ],
        ];

        foreach ($mitras as $mitra) {
            Mitra::create($mitra);
        }
    }
}

