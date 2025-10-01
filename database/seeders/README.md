# Database Seeders

Seeder telah dibuat untuk semua tabel berdasarkan migration yang ada. Berikut adalah penjelasan seeder yang telah dibuat:

## Daftar Seeder

### 1. UserSeeder

-   Membuat data user dengan role: admin, guru, dan siswa
-   **Admin**: admin@lesdin.com (password: password)
-   **Guru**: 3 data guru pendamping
-   **Siswa**: 5 data siswa

### 2. JurusanSeeder

-   Membuat 5 jurusan:
    -   Teknik Komputer dan Jaringan (TKJ)
    -   Multimedia (MM)
    -   Teknik Kendaraan Ringan Otomotif (TKRO)
    -   Teknik Elektronika Industri (TEI)
    -   Rekayasa Perangkat Lunak (RPL)

### 3. GuruPendampingSeeder

-   Membuat data guru pendamping berdasarkan user dengan role 'guru'
-   Setiap guru memiliki NIP dan kontak

### 4. SiswaSeeder

-   Membuat data siswa berdasarkan user dengan role 'siswa'
-   Setiap siswa memiliki NIS, NISN, dan terhubung dengan jurusan

### 5. MitraSeeder

-   Membuat 6 perusahaan mitra dengan berbagai bidang:
    -   Teknologi Informasi
    -   Digital Solutions
    -   Media Kreatif
    -   Otomotif
    -   Elektronik Industri
    -   Multimedia

### 6. RegistrationSeeder

-   Membuat data pendaftaran magang untuk setiap siswa
-   Status acak: proses, diterima, ditolak
-   Tanggal pendaftaran dalam 1-2 bulan terakhir

### 7. BeritaSeeder

-   Membuat 6 artikel berita terkait program magang
-   Ditulis oleh admin dan guru

## Cara Menjalankan Seeder

### 1. Menjalankan Semua Seeder

```bash
php artisan db:seed
```

### 2. Menjalankan Seeder Tertentu

```bash
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=JurusanSeeder
php artisan db:seed --class=GuruPendampingSeeder
php artisan db:seed --class=SiswaSeeder
php artisan db:seed --class=MitraSeeder
php artisan db:seed --class=RegistrationSeeder
php artisan db:seed --class=BeritaSeeder
```

### 3. Reset dan Seed Ulang

```bash
php artisan migrate:fresh --seed
```

## Urutan Eksekusi

Seeder akan dijalankan dalam urutan berikut (sesuai dependency):

1. UserSeeder (basis untuk guru dan siswa)
2. JurusanSeeder (dibutuhkan untuk siswa)
3. GuruPendampingSeeder (membutuhkan user guru)
4. SiswaSeeder (membutuhkan user siswa dan jurusan)
5. MitraSeeder (independent)
6. RegistrationSeeder (membutuhkan siswa, guru, dan mitra)
7. BeritaSeeder (membutuhkan user admin/guru)

## Data Login Default

### Admin

-   Email: admin@lesdin.com
-   Password: password

### Guru

-   Email: budi.santoso@lesdin.com (Password: password)
-   Email: siti.aminah@lesdin.com (Password: password)
-   Email: ahmad.wijaya@lesdin.com (Password: password)

### Siswa

-   Email: andi.pratama@student.lesdin.com (Password: password)
-   Email: lisa.wulandari@student.lesdin.com (Password: password)
-   Email: reza.firmansyah@student.lesdin.com (Password: password)
-   Email: maya.sari@student.lesdin.com (Password: password)
-   Email: doni.setiawan@student.lesdin.com (Password: password)

## Catatan Penting

1. Pastikan migration sudah dijalankan sebelum menjalankan seeder
2. Seeder menggunakan relasi antar tabel, jadi urutan eksekusi penting
3. Data yang dibuat adalah data sample/dummy untuk development
4. Password default untuk semua user adalah "password"
5. Untuk production, ganti password dan hapus data dummy
