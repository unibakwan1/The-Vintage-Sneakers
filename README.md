# The Vintage Sneakers — Versi Laravel

Paket ini berisi **file-file inti Laravel** hasil konversi dari situs statis kamu
(routes, controller, Blade views, dan aset CSS/JS). Ini BUKAN project Laravel
lengkap (tidak ada folder `vendor/`, `bootstrap/`, `.env`, dll.) karena environment
saya tidak punya akses internet untuk menjalankan Composer. Jadi kamu perlu
membuat project Laravel kosong dulu di komputer kamu, lalu menimpakan (copy)
file-file di paket ini ke dalamnya.

## 1. Yang perlu di-install di komputer kamu

| Kebutuhan | Untuk apa | Catatan |
|---|---|---|
| **PHP** (≥ 8.2) | Menjalankan Laravel | Laravel 11/12 butuh PHP 8.2+ |
| **Composer** | Package manager PHP, buat install Laravel & dependency | Wajib |
| **Node.js + npm** | Compile asset (kalau nanti mau pakai Vite/Tailwind) | Untuk situs ini sebenarnya opsional karena CSS masih plain CSS |
| **Laravel Installer** (opsional) | `composer global require laravel/installer` lalu `laravel new` | Bisa juga langsung pakai `composer create-project laravel/laravel` |
| **Web server lokal** | Menjalankan project | Paling gampang pakai `php artisan serve` bawaan Laravel — tidak wajib install Apache/Nginx |
| Database (opsional) | Situs ini masih pakai Firebase untuk auth & data, jadi **tidak wajib** pakai MySQL. Kalau nanti mau pindah dari Firebase ke database Laravel sendiri, baru perlu MySQL/PostgreSQL/SQLite | SQLite paling simpel untuk mulai |
| Editor kode | VS Code, PhpStorm, dll | Bebas |

Cara paling mudah untuk pemula: install **Laravel Herd** (Mac/Windows) atau
**Laragon** (Windows) — keduanya sudah membawa PHP + Composer + web server
jadi satu paket, tinggal install sekali.

## 2. Membuat project Laravel baru

```bash
composer create-project laravel/laravel vintage-sneakers
cd vintage-sneakers
```

## 3. Menimpakan file dari paket ini

Salin isi paket ini ke project barumu, timpa file yang sudah ada:

```
routes/web.php                          -> routes/web.php
app/Http/Controllers/PageController.php -> app/Http/Controllers/PageController.php
resources/views/*                       -> resources/views/*
public/css/*                            -> public/css/*
public/js/*                             -> public/js/*
```

Lalu **salin folder `images/` dari situs HTML lamamu** ke `public/images/`
di project Laravel (gambar produk, logo, ikon, dll — file itu tidak ikut
ter-upload ke saya jadi tidak ada di paket ini).

## 4. Menjalankan

```bash
php artisan serve
```

Buka `http://127.0.0.1:8000` — halaman Home, Workshop (`/workshop`), Shop
(`/shop`), dan Events (`/events`) sudah bisa diakses lewat routing Laravel.

## Apa yang sudah diubah dari versi HTML statis

- Nav & footer yang tadinya diulang di 4 file HTML sekarang jadi satu
  **layout Blade** (`resources/views/layouts/app.blade.php`) yang dipakai
  bareng lewat `@extends` — jadi kalau ubah footer, cukup ubah satu file.
- Daftar produk shop, langkah-langkah workshop, dan daftar event yang
  tadinya di-hardcode di HTML sekarang jadi **data di `PageController.php`**
  dan di-loop pakai `@foreach` di Blade — lebih mudah ditambah/diubah tanpa
  utak-atik HTML.
- Semua link antar halaman (`shop.html`, `workshop.html`, dst.) diganti jadi
  `route('shop')`, `route('workshop')`, dst., biar tidak hardcode URL.
- Semua path CSS/JS/gambar diganti pakai helper `asset()` Laravel.

## Yang belum diubah (sengaja dipertahankan)

- **Firebase Auth & Firestore** (`public/js/firebase-init.js`) dibiarkan
  seperti aslinya — proses sign in/sign up, diskon member, dsb. tetap
  jalan di sisi browser (client-side), tidak lewat backend Laravel.
  Kalau suatu saat kamu mau pindah ke sistem login bawaan Laravel
  (Breeze/Fortify + database sendiri), itu perubahan arsitektur yang
  lebih besar dan bisa kita kerjakan terpisah.
- Form "Vault Access Request" masih submit langsung ke FormSubmit.co
  dari JavaScript, belum lewat route Laravel.

## Kalau mau dilanjutkan lebih jauh

Beberapa langkah lanjutan yang bisa dikerjakan kalau kamu mau:
- Pindahkan data produk/event dari controller ke **database** (migration +
  model Eloquent), supaya bisa dikelola lewat admin panel.
- Buat route POST untuk form vault-request supaya email dikirim dari
  server (pakai Laravel Mail) alih-alih fetch ke FormSubmit dari browser.
- Ganti Firebase Auth dengan auth bawaan Laravel kalau ingin semuanya
  dalam satu sistem.
