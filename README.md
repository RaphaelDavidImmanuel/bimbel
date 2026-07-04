# Les Privat Depok

Sistem Informasi Manajemen Bimbingan Belajar (Bimbel) berbasis web yang dibangun menggunakan Laravel 10. Aplikasi ini digunakan untuk membantu pengelolaan data guru, murid, mata pelajaran, jadwal pembelajaran, serta laporan kegiatan belajar mengajar.

---

## Fitur Aplikasi

### Admin

Admin memiliki hak akses penuh untuk mengelola seluruh data dalam sistem, meliputi:

- Login ke sistem
- Mengelola Data Guru (Tambah, Ubah, Hapus, Lihat)
- Mengelola Data Murid (Tambah, Ubah, Hapus, Lihat)
- Mengelola Data Mata Pelajaran (Tambah, Ubah, Hapus, Lihat)
- Mengelola Data Jadwal Pembelajaran
- Menerima dan Melihat Laporan dari Guru
- Dashboard Monitoring Data

### Guru

Guru memiliki akses untuk melihat informasi yang berkaitan dengan proses pembelajaran, meliputi:

- Login ke sistem
- Melihat Jadwal Mengajar
- Melihat Data Murid yang Diajar
- Mengirim atau Membuat Laporan Pembelajaran

---

## Teknologi yang Digunakan

- Laravel 10
- PHP 8.1.10
- MySQL
- Tailwind CSS
- Laravel Breeze
- Vite
- JavaScript

---

## Spesifikasi Minimum

| Software | Versi Minimum |
|-----------|-----------|
| PHP | 8.1.10 |
| Composer | 2.8.12 |
| Laravel | 10.x |
| Node.js | 18.x atau lebih baru |
| MySQL | 5.7+ / 8.0+ |

---

## Instalasi Project

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/NAMA_REPOSITORY.git
```

Masuk ke folder project:

```bash
cd NAMA_REPOSITORY
```

---

### 2. Install Dependency PHP

```bash
composer install
```

---

### 3. Install Dependency JavaScript

```bash
npm install
```

---

### 4. Copy File Environment

```bash
cp .env.example .env
```

Atau pada Windows:

```bash
copy .env.example .env
```

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

### 6. Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=les_privat_depok
DB_USERNAME=root
DB_PASSWORD=
```

---

### 7. Jalankan Migrasi Database

```bash
php artisan migrate
```

Jika menggunakan seeder:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate --seed
```

---

## Menjalankan Aplikasi

### Menjalankan Laravel Server

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

---

### Menjalankan Vite

Buka terminal baru lalu jalankan:

```bash
npm run dev
```

---

## Struktur Hak Akses

### Admin

```text
Login
│
├── Kelola Data Guru
├── Kelola Data Murid
├── Kelola Data Mata Pelajaran
├── Kelola Jadwal
└── Melihat Laporan Guru
```

### Guru

```text
Login
│
├── Melihat Jadwal Mengajar
└── Melihat Data Murid yang Diajar
```

---

## Pengembang

Aplikasi ini dibuat sebagai proyek Sistem Informasi Bimbingan Belajar (Les Privat Depok) menggunakan Laravel 10.
