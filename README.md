# Aplikasi Data Buku — MVC PHP Native

## Deskripsi
Aplikasi web sederhana untuk mengelola data buku menggunakan PHP Native dengan pola arsitektur Model-View-Controller (MVC).

## Teknologi
- PHP Native
- MySQL
- PDO
- HTML dan CSS
- Git dan GitHub

## Fitur
- Menampilkan daftar buku
- Menambahkan data buku
- Mengedit data buku
- Menghapus data buku
- Validasi input
- Prepared statements untuk operasi database

## Struktur Folder
- `app/controllers`: mengatur alur permintaan aplikasi
- `app/models`: mengelola operasi data buku
- `app/views`: menampilkan halaman aplikasi
- `config`: konfigurasi koneksi database
- `database`: file SQL database
- `public`: halaman utama dan router aplikasi

## Cara Menjalankan
1. Jalankan Laragon.
2. Buat database `db_buku` melalui phpMyAdmin atau jalankan file SQL.
3. Sesuaikan konfigurasi database pada `config/Database.php`.
4. Letakkan project di folder `C:\laragon\www\mvc-buku056`.
5. Buka `http://localhost/mvc-buku056/public/` melalui browser.