# BankKu - Financial Web Dashboard 🚀

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![Tailwind CSS Version](https://img.shields.io/badge/TailwindCSS-4.x-38bdf8.svg)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-6.x-646cff.svg)](https://vitejs.dev)

Aplikasi Web Dashboard Finansial yang responsif dan interaktif, dikembangkan menggunakan **Laravel 12**, **Blade Templates**, dan **Tailwind CSS v4** (terintegrasi dengan Vite). Proyek ini merupakan hasil *slicing* figma dengan tingkat presisi tinggi (pixel-perfect) untuk kebutuhan Technical Test Frontend Developer.

---

## 🌟 Fitur Utama & Keunggulan Slicing

### 1. Dashboard Overview
* **Interactive Summary Cards**: Tampilan balance card premium dengan mode gelap (dark theme) dan terang (light theme) lengkap dengan pattern SVG chip.
* **Custom SVG Weekly Activity Chart**: Grafik batang interaktif dua warna yang diurutkan dari hari Sabtu hingga Jumat (Sat-Fri) sesuai spesifikasi Figma.
* **Exploded Pie Chart (Expense Statistics)**: Grafik lingkaran interaktif yang memiliki efek terpisah (exploded) pada setiap sektornya dengan teks label persentase dinamis di dalam sektor.
* **Bezier Wave & Dashed Grid (Balance History)**: Grafik garis berlekuk halus (smooth bezier path) dengan grid bergaris kotak putus-putus.
* **Quick Transfer**: Slider profil pengguna interaktif untuk mempermudah transfer cepat.

### 2. Loans Management Page
* **Statistic Widgets**: Widget ringkasan finansial (active loans, total debt, dll) dengan icon minimalis.
* **Responsive Loans Table**: Tabel informasi pinjaman dengan layout yang menyesuaikan secara otomatis di mobile view (menggunakan card layout).
* **Live Search**: Fitur penyaringan data pinjaman secara dinamis.

### 3. Settings Page (Tab-Based Forms)
* **Tab Panel Switcher**: Perpindahan tab yang mulus tanpa refresh halaman (Edit Profile, Preferences, Security).
* **Profile Image Preview**: Preview instan saat mengunggah foto profil baru.
* **Session Persistence**: Semua perubahan data pada form disimpan secara aman di dalam file session Laravel, sehingga data tetap tersimpan saat navigasi halaman.

---

## 🛠️ Detail Arsitektur & Struktur Kode

Kode program dirancang menggunakan pendekatan modular dan reusable:
* **Layouts**: Menggunakan system layout komponen `<x-layouts-app>` pada `resources/views/components/layouts-app.blade.php`.
* **Components**: Komponen reusable terpisah pada direktori `resources/views/components/` (seperti `sidebar`, `navbar`, `card`, dan `credit-card`).
* **Controllers**: Logika pengolahan data dipisahkan secara rapi di dalam controller:
  * `DashboardController` untuk data keuangan dan grafik.
  * `LoanController` untuk data pinjaman dan fitur pencarian.
  * `SettingsController` untuk manajemen session profil pengguna.

---

## 🚀 Cara Menjalankan Proyek (Zero-Config Setup)

Proyek ini menggunakan driver session berbasis **file** untuk menyimpan perubahan data profile secara lokal tanpa memerlukan instalasi/konfigurasi database SQL eksternal.

### Langkah-langkah:
1. **Clone repository**:
   ```bash
   git clone https://github.com/khoirkanzura/frontend-dashboard.git
   cd frontend-dashboard
   ```
2. **Install dependensi PHP**:
   ```bash
   composer install
   ```
3. **Install dependensi JavaScript**:
   ```bash
   npm install
   ```
4. **Salin Environment Configuration**:
   ```bash
   cp .env.example .env
   ```
5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
6. **Jalankan Aplikasi & Asset Compiler**:
   * Jalankan server lokal Laravel:
     ```bash
     php artisan serve
     ```
   * Jalankan Vite compiler (pilih salah satu):
     * Mode Development (Hot-Reload): `npm run dev`
     * Mode Production (Pre-compiled assets): `npm run build`

Aplikasi dapat diakses di browser melalui alamat: `http://127.0.0.1:8000`

---

## 👤 Author
* **Khoir Karol Nurzuraidah** - [GitHub Profile](https://github.com/khoirkanzura)
