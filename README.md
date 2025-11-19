<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

**Proyek**

- **Nama:** `junior-web-programmer-perpustakaan` — aplikasi web perpustakaan sederhana berbasis Laravel, dibuat sebagai latihan Junior Web Programmer.

**Ringkasan**

- **Deskripsi:** Aplikasi manajemen perpustakaan bergaya CRUD yang dibuat dengan Laravel. Projek ini berisi model, migration, controller, dan view Blade untuk mengelola data perpustakaan (lihat `app/Models/perpustakaan.php`).

**Persyaratan**

- **PHP:** PHP 8.0+ (atau versi yang didukung instalasi Laravel Anda).
- **Composer:** untuk mengelola dependensi PHP.
- **Node.js & npm/yarn:** untuk tooling frontend (Vite).
- **Basis data:** MySQL / MariaDB / SQLite (dikonfigurasi melalui `.env`).

**Mulai Cepat — Pengaturan Lokal**

1. Clone repository dan masuk ke direktori proyek:

```
git clone <repo-url> junior-web-programmer-perpustakaan
cd junior-web-programmer-perpustakaan
```

2. Install dependensi PHP:

```
composer install
```

3. Salin file environment dan konfigurasi (database, APP_URL, mail, dll):

```
cp .env.example .env
```

Edit file `.env` dan atur nilai `DB_` sesuai pengaturan database Anda.

4. Generate application key:

```
php artisan key:generate
```

5. Jalankan migration database:

```
php artisan migrate
```

6. Install dependensi frontend dan build aset:

```
npm install
npm run dev        # pengembangan (hot-reload)
npm run build      # build produksi
```

7. Jalankan aplikasi secara lokal:

```
php artisan serve
```

Buka alamat server yang dicetak oleh perintah (biasanya `http://127.0.0.1:8000`).

**Menjalankan Tes**

- Jalankan tes Laravel/PHP dengan:

```
php artisan test
```

- Atau jalankan langsung dengan PHPUnit:

```
vendor/bin/phpunit
```

**Struktur Proyek (file utama)**

- **`app/Models/`**: Model Eloquent (mis. `perpustakaan.php`, `User.php`).
- **`app/Http/Controllers/`**: Controller yang menangani request HTTP.
- **`database/migrations/`**: File migration untuk membuat tabel database (lihat `2025_11_18_235730_create_perpustakaan_table.php`).
- **`resources/views/`**: Template Blade dan file layout (termasuk tampilan `layouts/perpustakaan`).
- **`routes/web.php`**: Route web aplikasi.
**Basis Data**

- File migration sudah ada; setelah `.env` dikonfigurasi jalankan `php artisan migrate` untuk membuat tabel. Terdapat migration `create_perpustakaan_table` untuk menyimpan data perpustakaan.

**Catatan Penempatan (Deployment)**

- Atur variabel environment yang sesuai pada file `.env` di produksi dan konfigurasikan web server (Apache/Nginx) untuk melayani direktori `public/`.
- Jalankan `php artisan migrate --force` saat deploy untuk menerapkan perubahan database di lingkungan produksi.

**Kontribusi**

- Silakan buka issue atau PR. Ikuti langkah dasar berikut:

```
git checkout -b feature/your-feature
make changes
composer test or php artisan test
git commit -am "Add: description"
git push origin feature/your-feature
```