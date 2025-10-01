# Panduan Login - Sistem Magang Industri

## Masalah "419 Page Expired" - SUDAH DIPERBAIKI ✅

Masalah "419 Page Expired" telah diperbaiki dengan mengubah sistem authentication untuk mendukung login dengan **Email** atau **NIS**.

## Cara Login

### 1. **Login dengan Email** (Untuk Admin & Guru)

```
Email: admin@lesdin.com
Password: password
```

```
Email: budi.santoso@lesdin.com
Password: password
```

### 2. **Login dengan NIS** (Untuk Siswa)

```
NIS: 2023001
Password: password
```

```
NIS: 2023002
Password: password
```

## Data Login Lengkap

### 👑 **Admin**

-   **Email**: admin@lesdin.com
-   **Password**: password

### 👨‍🏫 **Guru Pendamping**

1. **Email**: budi.santoso@lesdin.com | **Password**: password
2. **Email**: siti.aminah@lesdin.com | **Password**: password
3. **Email**: ahmad.wijaya@lesdin.com | **Password**: password

### 👨‍🎓 **Siswa**

1. **NIS**: 2023001 | **Email**: andi.pratama@student.lesdin.com | **Password**: password
2. **NIS**: 2023002 | **Email**: lisa.wulandari@student.lesdin.com | **Password**: password
3. **NIS**: 2023003 | **Email**: reza.firmansyah@student.lesdin.com | **Password**: password
4. **NIS**: 2023004 | **Email**: maya.sari@student.lesdin.com | **Password**: password
5. **NIS**: 2023005 | **Email**: doni.setiawan@student.lesdin.com | **Password**: password

## Perubahan yang Dilakukan

### 1. **Form Login** (`resources/views/auth/login.blade.php`)

-   ✅ Field input diubah dari `name="nis"` menjadi `name="login"`
-   ✅ Placeholder diubah menjadi "Email atau NIS"
-   ✅ Error handling untuk field `login`

### 2. **LoginRequest** (`app/Http/Requests/Auth/LoginRequest.php`)

-   ✅ Validation rules diubah untuk field `login`
-   ✅ Authentication logic untuk mendukung email dan NIS
-   ✅ Auto-detect apakah input adalah email atau NIS
-   ✅ Jika NIS, sistem akan mencari email dari tabel siswa

### 3. **Sistem Authentication**

-   ✅ Support login dengan email (admin & guru)
-   ✅ Support login dengan NIS (siswa)
-   ✅ Rate limiting tetap berfungsi
-   ✅ CSRF protection tetap aktif

## Cara Testing

1. **Buka browser** dan akses: `http://localhost:8000/login`

2. **Test Login Admin:**

    - Input: `admin@lesdin.com`
    - Password: `password`

3. **Test Login Siswa:**

    - Input: `2023001`
    - Password: `password`

4. **Test Login Guru:**
    - Input: `budi.santoso@lesdin.com`
    - Password: `password`

## Troubleshooting

### Jika masih error 419:

```bash
# Clear semua cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Regenerate app key jika diperlukan
php artisan key:generate

# Restart server
php artisan serve
```

### Jika NIS tidak ditemukan:

-   Pastikan data seeder sudah dijalankan: `php artisan db:seed`
-   Cek data siswa: `php artisan tinker` → `App\Models\Siswa::all()`

### Jika session bermasalah:

-   Pastikan `SESSION_DRIVER=database` di `.env`
-   Jalankan: `php artisan migrate` (untuk table sessions)

## Fitur Keamanan

-   ✅ **CSRF Protection**: Form menggunakan `@csrf` token
-   ✅ **Rate Limiting**: Maksimal 5 attempt login per IP
-   ✅ **Session Management**: Session otomatis regenerate setelah login
-   ✅ **Password Hashing**: Password di-hash dengan bcrypt
-   ✅ **Remember Me**: Checkbox "Ingat saya" tersedia

## Notes

-   Semua password default adalah `password` untuk development
-   Untuk production, ganti semua password default
-   Session lifetime default adalah 120 menit
-   Login berhasil akan redirect ke route `index`
