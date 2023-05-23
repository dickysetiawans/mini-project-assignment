# Mini Project Assignment
merupakan website sederhana,menggunakan Framwork Laravel.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Installation
Untuk pertama-tama silahkan buat file terlebih dahulu untuk menyimpan hasil clone, setelah itu masuk ke folder tersebut 
```
1. cd /path/to/Projects
```
Setelah berada di direktori yang tepat, jalankan perintah `git clone` diikuti dengan URL repositori yang telah Anda salin sebelumnya.
```
2. git clone https://github.com/sawirricardo/realworld-laravel-inertia-vue.git
```
Tekan Enter untuk menjalankan perintah. Git akan mengunduh proyek Laravel ke direktori yang ditentukan.

Setelah proses selesai, navigasikan ke direktori proyek Laravel yang baru dibuat dengan perintah `cd`
```
3. cd mini-project-assignment
```
Setelah Anda berada di direktori proyek Laravel, jalankan perintah composer install untuk menginstal dependensi yang diperlukan oleh proyek Laravel.
```
3. composer install
```
Salin file `.env.example` dan beri nama file hasil salinan sebagai `.env.`
```
4. cp .env.example .env
```
Selanjutnya, silahkan jalankan xampp atau server localhost dan databasenya.Buat database sesuai dengan nama yang ada di `.env`
Contohnya seperti ini
```
5. DB_DATABASE=db_project_dicky
```
Setelah itu silahkan migrate
```
6. php artisan migrate
```
Generate kunci aplikasi dengan menjalankan perintah:
```
7. php artisan key:generate
```
Terakhir anda bisa menjalankan servernya dengan menjalankan perintah:
```
8. php artisan serve
```

Sebelum masuk kedalam website silahkan registger terlebih dahulu.Untuk pusername dan password bisa memasukannya sesuai kenginan anda, `catatan password harus lebih dari 8 huruf`, jika anda ingin mendaftar kembali memang bisa terdaftar tetapi tidak bisa masuk karena sistem login menggunakan unverified.Dan website bisa di digunakan