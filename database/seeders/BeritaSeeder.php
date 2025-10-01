<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\User;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUsers = User::where('role', 'admin')->get();
        $guruUsers = User::where('role', 'guru')->get();
        $authors = $adminUsers->merge($guruUsers);

        $beritas = [
            [
                'judul' => 'Pembukaan Program Magang Industri Tahun 2025',
                'isi' => 'Program magang industri tahun 2025 resmi dibuka dengan berbagai perusahaan mitra yang siap menerima siswa untuk pengalaman kerja nyata. Program ini bertujuan untuk memberikan pengalaman praktis kepada siswa di dunia industri yang sesungguhnya.',
            ],
            [
                'judul' => 'Kerjasama Baru dengan PT. Teknologi Nusantara',
                'isi' => 'Sekolah menjalin kerjasama baru dengan PT. Teknologi Nusantara untuk program magang di bidang teknologi informasi. Kerjasama ini diharapkan dapat memberikan kesempatan yang lebih luas bagi siswa jurusan TKJ dan RPL.',
            ],
            [
                'judul' => 'Tips Sukses Mengikuti Program Magang',
                'isi' => 'Berikut adalah beberapa tips untuk sukses mengikuti program magang: 1) Persiapkan diri dengan baik, 2) Pelajari profil perusahaan, 3) Tunjukkan sikap positif dan semangat belajar, 4) Jalin komunikasi yang baik dengan pembimbing.',
            ],
            [
                'judul' => 'Testimoni Siswa Peserta Magang Batch Sebelumnya',
                'isi' => 'Beberapa siswa alumni program magang berbagi pengalaman mereka selama mengikuti program. Mereka menyatakan bahwa program magang sangat membantu dalam mempersiapkan diri menghadapi dunia kerja yang sesungguhnya.',
            ],
            [
                'judul' => 'Jadwal Bimbingan dan Monitoring Magang',
                'isi' => 'Guru pembimbing akan melakukan monitoring dan bimbingan secara berkala kepada siswa yang sedang menjalani program magang. Jadwal monitoring akan diinformasikan lebih lanjut kepada siswa peserta magang.',
            ],
            [
                'judul' => 'Persyaratan dan Dokumen yang Diperlukan',
                'isi' => 'Untuk mengikuti program magang, siswa harus melengkapi beberapa dokumen seperti: CV, surat lamaran, fotokopi KTP, pas foto, dan surat keterangan sehat. Pastikan semua dokumen lengkap sebelum mendaftar.',
            ],
        ];

        foreach ($beritas as $beritaData) {
            Berita::create([
                'user_id' => $authors->random()->id,
                'judul' => $beritaData['judul'],
                'isi' => $beritaData['isi'],
                'gambar' => null, // Bisa ditambahkan path gambar jika diperlukan
            ]);
        }
    }
}