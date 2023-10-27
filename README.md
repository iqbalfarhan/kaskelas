# Aplikasi YouFi Youth Financial
untuk menginsatall aplikasi ini memerlukaan
- laravel 10 (PHP 8.1)
- database mysql

## Installasi
jalankan fungsi berikut ini
- buka terminal.
- git clone https://github.com/iqbalfarhan/kaskelas.git
- masuk ke direktori kaskelas
- jalankan perintah `composer install` (install composer bila tidak ada composer)
- duplicate .env.example dan rename .env
- isi .env sesuai dengan data yang diperlukan
- buat database sesuai dengan .env
- jalankan perintah `php artisan migrate --seed` untuk migrasi database
- untuk menjalankan aplikasi secara local jalankan `php artisan serve`

## Login aplikasi
gunakan data login berikut ini:
- administrator (username : admin, password : youfi123)
- user (username : nis user, password : nis user)

## Memilih bendahara
berikut ini langkah-langkah untuk memilih bendahara
- masuk dengan akun administartor
- pilih menu data siswa
- pilih kelas
- klik pada salahsatu siswa
- klik pada tomboh hijau untuk merubah privileges
- ubah profileges ke bendahara
- klik simpan