<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Panel Admin Travel Indo

## Menjalankan proyek di laptop lain

Kebutuhan: Git, PHP 8.2 atau lebih baru, Composer, Node.js/NPM, serta MySQL
(Laragon sudah menyediakan PHP dan MySQL untuk Windows).

```sh
git clone <alamat-repository-GitHub>
cd web-compro
composer install
npm install
copy .env.example .env
php artisan key:generate
npm run build
```

Buat database MySQL bernama `travel_indo` melalui Laragon atau HeidiSQL. Untuk
konfigurasi Laragon bawaan, pengaturan database pada `.env` sudah sesuai. Jika
komputer teman memakai nama database, username, atau password lain, ubah bagian
`DB_*` di file `.env` miliknya.

Untuk membuat tabel dan konten contoh:

```sh
php artisan migrate --seed
php artisan admin:create admin@example.com "Nama Admin"
php artisan serve
```

Buka `http://127.0.0.1:8000`, lalu gunakan `/admin/login` untuk panel admin.
Perintah `admin:create` akan meminta kata sandi secara aman di terminal.

### Membawa data website yang sudah ada

File `.env`, kata sandi, dan isi database tidak diunggah ke GitHub. Bila teman
harus meneruskan website dengan artikel, teks, akun admin, dan perubahan yang
sudah Anda buat, ekspor database `travel_indo` dari HeidiSQL sebagai file SQL.
Simpan file tersebut di tempat privat, misalnya Google Drive, lalu teman
mengimpornya ke database `travel_indo` di laptopnya. Setelah itu cukup jalankan
`composer install`, `npm install`, `php artisan key:generate`, dan `npm run build`.

Jangan unggah file `.env` atau file SQL berisi data produksi ke repository publik.

Jalankan migrasi dan seed konten awal, lalu buat akun admin:

```sh
php artisan migrate
php artisan db:seed
php artisan admin:create admin@example.com "Nama Admin"
```

Perintah pembuatan admin meminta kata sandi secara interaktif. Setelah itu, masuk
melalui `/admin/login`. Admin dapat mengubah teks dan gambar halaman, serta
membuat, mengedit, menerbitkan, atau menghapus artikel dari panel. Gambar dapat
diunggah (JPG, PNG, atau WebP, maksimal 10 MB) atau menggunakan URL HTTP/HTTPS.
Pastikan `public/uploads` dapat ditulisi oleh aplikasi di server produksi.

### Keamanan produksi

Website sudah mengirimkan header keamanan (CSP, anti-clickjacking, `nosniff`,
policy referrer, dan pembatasan fitur browser) melalui middleware global.
Halaman `/admin` juga tidak boleh disimpan oleh cache browser maupun proxy.

Sebelum rilis, ubah `.env` produksi menjadi `APP_ENV=production` dan
`APP_DEBUG=false`. Setelah domain dan semua subdomain sudah selalu menggunakan
HTTPS, aktifkan `SESSION_SECURE_COOKIE=true` dan
`SECURITY_HSTS_ENABLED=true`, lalu jalankan `php artisan config:cache`.
Jangan aktifkan HSTS pada server lokal atau domain yang masih dapat diakses
melalui HTTP.

Folder `public/uploads` sudah memiliki aturan Apache untuk mencegah eksekusi
berkas skrip. Jika memakai Nginx, terapkan aturan setara pada konfigurasi
server: tolak ekstensi skrip (`php`, `phtml`, `phar`, `cgi`, dan sejenisnya)
di bawah `/uploads/`, serta nonaktifkan directory listing.

### Web Resource Management (WRM)

Aset yang dipakai situs—CSS, JavaScript, ikon WhatsApp, dan koneksi font—
dikelola melalui registry `config/web-resources.php`. Panggil aset dari Blade
dengan `$webResources->url('nama-aset')`, bukan `asset()` langsung. URL aset
lokal otomatis memperoleh parameter versi berdasarkan waktu perubahan berkas.
Dengan demikian browser dapat menyimpannya hingga satu tahun, tetapi langsung
mengunduh versi baru ketika berkas berubah.

Untuk menambah aset baru, daftarkan dahulu di `config/web-resources.php`, lalu
gunakan nama tersebut di view. Konfigurasi Apache pada `public/.htaccess`
mengaktifkan cache immutable dan kompresi untuk aset statis; konfigurasi Nginx
di produksi perlu menerapkan header cache dan gzip/brotli yang setara.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
