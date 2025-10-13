<?php

namespace Database\Seeders;

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
                'gambar' => 'teknologinusantara.png',
            ],
            [
                'name' => 'PT. Media Kreatif Indonesia',
                'deskripsi' => 'Perusahaan yang bergerak di bidang multimedia dan desain grafis.',
                'kontak' => '021-9876543',
                'email' => 'info@mediakreatif.co.id',
                'alamat' => 'Jl. Thamrin No. 789, Jakarta Pusat',
                'kuota' => 6,
                'jurusan_id' => 3,
                'gambar' => 'mediakreatif.png',
            ],
            [
                'name' => 'PT. Panasonic Manufacturing Indonesia',
                'deskripsi' => 'Manufaktur perangkat elektronik skala nasional.',
                'kontak' => '021-6543210',
                'email' => 'hr@panasonic.co.id',
                'alamat' => 'Kawasan Industri Cikarang, Bekasi',
                'kuota' => 15,
                'jurusan_id' => 5,
                'gambar' => 'panasonic.webp',
            ],
            [
                'name' => 'Jogja Techno Park (JTP)',
                'deskripsi' => 'Inkubator teknologi, IoT, startup hub, dan pelatihan digital.',
                'kontak' => '0274-345678',
                'email' => 'admin@jtp.co.id',
                'alamat' => 'Jl. Wahid Hasyim No. 47, Sleman, Yogyakarta',
                'kuota' => 5,
                'jurusan_id' => 1,
                'gambar' => 'jogjatechnopark.jpg',
            ],
            [
                'name' => 'PT. Cargloss Pratama',
                'deskripsi' => 'Perusahaan manufaktur helm dan cat otomotif terbesar di Indonesia.',
                'kontak' => '021-9876500',
                'email' => 'info@cargloss.com',
                'alamat' => 'Jl. Raya Tajur No. 77, Bogor',
                'kuota' => 10,
                'jurusan_id' => 4,
                'gambar' => 'cargloss.png',
            ],
            [
                'name' => 'PT. Multi Integra',
                'deskripsi' => 'Perusahaan IT solusi sistem informasi & integrasi jaringan.',
                'kontak' => '0274-556677',
                'email' => 'contact@multiintegra.co.id',
                'alamat' => 'Jl. Solo Km 10, Sleman, Yogyakarta',
                'kuota' => 8,
                'jurusan_id' => 1,
                'gambar' => 'multiintegra.png',
            ],
            [
                'name' => 'PT. Nutrifood Indonesia',
                'deskripsi' => 'Perusahaan FMCG (Tropicana Slim, Nutrisari, HiLo) dengan fokus nutrisi.',
                'kontak' => '021-7654321',
                'email' => 'hr@nutrifood.co.id',
                'alamat' => 'Jl. Rawamangun No. 15, Jakarta Timur',
                'kuota' => 6,
                'jurusan_id' => 5,
                'gambar' => 'nutrifood.png',
            ],
        ];

        foreach ($mitras as $mitra) {
            Mitra::create($mitra);
        }
    }
}
