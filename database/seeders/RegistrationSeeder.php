<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\Siswa;
use App\Models\GuruPendamping;
use App\Models\Mitra;
use App\Models\JadwalPendaftaran;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswas = Siswa::all();
        $gurus = GuruPendamping::all();
        $mitras = Mitra::all();
        $jadwalPendaftarans = JadwalPendaftaran::all();

        $statuses = ['proses', 'diterima', 'ditolak'];

        // Buat registrasi untuk setiap siswa
        foreach ($siswas as $siswa) {
            Registration::create([
                'siswa_id' => $siswa->id,
                'guru_pendamping_id' => $gurus->random()->id,
                'mitra_id' => $mitras->random()->id,
                'jadwal_pendaftaran_id' => $jadwalPendaftarans->random()->id,
                'status' => $statuses[array_rand($statuses)],
                'tanggal_daftar' => now()->subDays(rand(1, 30)),
            ]);
        }

        // Buat beberapa registrasi tambahan
        for ($i = 0; $i < 10; $i++) {
            Registration::create([
                'siswa_id' => $siswas->random()->id,
                'guru_pendamping_id' => $gurus->random()->id,
                'mitra_id' => $mitras->random()->id,
                'jadwal_pendaftaran_id' => $jadwalPendaftarans->random()->id,
                'status' => $statuses[array_rand($statuses)],
                'tanggal_daftar' => now()->subDays(rand(1, 60)),
            ]);
        }
    }
}