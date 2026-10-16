# UTS Web I - Pemesanan Kantin Kampus

## Identitas Mahasiswa

- Nama: Miftahul Zannah
- NIM: 25102078
- Kelas: 25M31

## Deskripsi Aplikasi

Aplikasi Pemesanan Kantin Kampus dibuat menggunakan PHP native.
Aplikasi menyediakan fitur daftar menu, pencarian menu, pemesanan,
keranjang belanja, perhitungan diskon, dan preferensi kategori.

## Kebutuhan Sistem

- PHP
- XAMPP
- Web browser
- Git

## Cara Menjalankan

1. Simpan folder proyek di direktori htdocs XAMPP.
2. Jalankan Apache melalui XAMPP Control Panel.
3. Buka browser.
4. Akses http://localhost/uts-web1-25012078/

## Teknologi

- PHP Native
- HTML
- CSS
- Session
- Cookie

# Dokumentasi Pengujian

## Identitas

- Nama: Budi Santoso
- NIM: 25000001
- Kelas: 25M11

## Hasil Pengujian

| ID | Langkah dan Input | Hasil yang Diharapkan | Hasil Aktual | Status | Bukti |
|---|---|---|---|---|---|
| U01 | Buka halaman menu | Minimal 5 menu tampil | 5 menu tampil | Lulus | [Screenshot](U01-daftar-menu.png) |
| U02a | Cari "Nasi Goreng" | Menu yang sesuai tampil | Nasi Goreng tampil | Lulus | [Screenshot](U02a-pencarian-ditemukan.png) |
| U02b | Cari "Pizza" | Pesan tidak ditemukan | Pesan tidak ditemukan tampil | Lulus | [Screenshot](U02b-pencarian-kosong.png) |
| U03a | Kirim jumlah kosong | Ditolak, keranjang tetap | Pesan kesalahan tampil, keranjang tetap | Lulus | [Screenshot](U03a-jumlah-kosong.png) |
| U08a | Buat subtotal Rp49.000 | Diskon Rp0, total Rp49.000 | Sesuai harapan | Lulus | [Screenshot](U08a-subtotal-49000.png) |
| U08b | Buat subtotal Rp50.000 | Diskon Rp5.000, total Rp45.000 | Diskon belum diterapkan | Gagal | [Screenshot](U08b-diskon-gagal.png) |
| U08b-ulang | Uji ulang setelah perbaikan | Diskon Rp5.000, total Rp45.000 | Sesuai harapan | Lulus | [Screenshot](U08b-diskon-perbaikan.png) |

## Catatan Perbaikan

- U08b: kondisi diskon diperbaiki agar berlaku ketika subtotal
  sama dengan atau lebih dari Rp50.000.
- Pengujian ulang berhasil.