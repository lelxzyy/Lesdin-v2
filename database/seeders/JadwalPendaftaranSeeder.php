<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPendaftaran;
use Carbon\Carbon;

class JadwalPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalPendaftarans = [
            [
                'mitra_id' => 1, // PT. Teknologi Nusantara
                'mulai_pendaftaran' => Carbon::now()->subDays(30),
                'akhir_pendaftaran' => Carbon::now()->addDays(30),
                'tanggal_pengumuman' => Carbon::now()->addDays(45),
            ],
            [
                'mitra_id' => 2, // PT. Media Kreatif Indonesia
                'mulai_pendaftaran' => Carbon::now()->subDays(20),
                'akhir_pendaftaran' => Carbon::now()->addDays(25),
                'tanggal_pengumuman' => Carbon::now()->addDays(40),
            ],
            [
                'mitra_id' => 3, // PT. Panasonic
                'mulai_pendaftaran' => Carbon::now()->subDays(15),
                'akhir_pendaftaran' => Carbon::now()->addDays(20),
                'tanggal_pengumuman' => Carbon::now()->addDays(35),
            ],
            [
                'mitra_id' => 4, // Jogja Techno Park
                'mulai_pendaftaran' => Carbon::now()->subDays(10),
                'akhir_pendaftaran' => Carbon::now()->addDays(15),
                'tanggal_pengumuman' => Carbon::now()->addDays(30),
            ],
            [
                'mitra_id' => 5, // PT. Cargloss
                'mulai_pendaftaran' => Carbon::now()->subDays(5),
                'akhir_pendaftaran' => Carbon::now()->addDays(35),
                'tanggal_pengumuman' => Carbon::now()->addDays(50),
            ],
        ];

        foreach ($jadwalPendaftarans as $jadwal) {
            JadwalPendaftaran::create($jadwal);
        }
    }
}
