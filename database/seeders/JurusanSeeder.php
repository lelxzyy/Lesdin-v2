<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            [
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
                'kode_jurusan' => 'TKJ',
            ],
            [
                'nama_jurusan' => 'Multimedia',
                'kode_jurusan' => 'MM',
            ],
            [
                'nama_jurusan' => 'Teknik Kendaraan Ringan Otomotif',
                'kode_jurusan' => 'TKRO',
            ],
            [
                'nama_jurusan' => 'Teknik Elektronika Industri',
                'kode_jurusan' => 'TEI',
            ],
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'kode_jurusan' => 'RPL',
            ],
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}