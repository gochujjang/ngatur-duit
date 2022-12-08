<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# NgaturDuit

Aplikasi untuk management uang kas dengan menggunakan framework Laravel 9. Dengan implementasi simple CRUD\
Aplikasi ini bertujuan untuk mempermudah Bendahara kelas dalam mengelola uang kas kelas

## Pre-requisite
Adapun hal yang perlu disiapkan untuk menjalankan aplikasi ini :
- Composer
- NodeJS
- PHP 8.1
- MySQL 
- xampp

Jika menggunakan xampp, sudah terinstall PHP dan MySQL nya

___

## Langka Instalasi
Clone Repository ini
```
git clone https://github.com/gochujjang/ngatur-duit.git
```
Masuk kedalam folder repository yang sudah di clone tadi
```
cd ngatur-duit
```
Install semua dependencies menggunakan composer
```
composer install
```
Siapkan database kosong dan koneksikan database di dalam file .env\
Jika sudah jalankan perintah migrasi data beserta seeding data nya
```
php artisan migrate --seed
```
Setelah itu jalankan local server
```
php artisan serve
```
dan
```
npm run dev
```
Anda dapat mengakses server di 
```
http://127.0.0.1:8000/pemasukan
```

---
Notes from Dev

> Aplikasi ini masih dalam tahap pengembangan

## Dependencies
- Laravel - Sebagai Backend
- Bootstrap 5 - Sebagai Frontend Framework
- Bootstrap Icons - Icons
- Vite - Bundling Frontend untuk Laravel

## Contributor
- Kelompok 2