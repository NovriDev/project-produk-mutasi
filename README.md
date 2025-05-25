<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## <b> Tentang Projek Ini </b><br>
Proyek ini adalah RESTful API Laravel 11 untuk manajemen User, Produk, Lokasi, dan Mutasi Stok. Produk dan lokasi memiliki relasi many-to-many dengan stok pada tabel pivot. Fitur meliputi:<br>
- Login dan autentikasi token (Sanctum)<br>
- CRUD untuk semua entitas<br>
- Mutasi stok masuk & keluar<br>
- Riwayat mutasi per produk & user<br>
- Format output JSON<br>
- Dokumentasi tersedia via Postman<br>

## <b> Cara Install API </b><br>
- Clone projek dengan syntax "<i>git clone <url-repo></i>"<br>
- Install dependencies dengan Composer<br>
  "composer install"<br>
- Salin environment dari <i>.env.example</i> menjadi <i>.env</i><br>
- Lalu konfigurasi <i>.env</i> sesuai dengan nama database<br>
- Generate apl keynya<br>
  "php artisan key:generate"<br>
- Jalankan migrasi database dengan seeder<br>
  "php artisan migrate --seed"<br>
- Jalankan server<br>
  "php artisan serve"<br><br>
<b>Menjalankan aplikasi dengan docker</b><br>
- Pastikan sudah terinstall <b>Docker Desktop</b> pada PC atau laptop <br>
- Konfigurasi <i>.env</i> dengan docker-compose.yml <br>
- Jalankan Docker<br>
  "docker compose up"<br>
- Masuk ke container laravelnya<br>
  "docker exec -it nama_container_app bash" atau "docker exec -it <nama_container_app> sh"<br>
- Setelah masuk ke container, jalankan migrasi dan seedernya<br>
  "php artisan migrate --seed"<br>
- Jalankan server<br>
  "php artisan serve"<br>


## <b>Link Postman :</b><br>
https://www.postman.com/novridev/workspace/laravel-api-project/collection/32242495-8ddbe450-167e-4070-8251-77d9718f8400?action=share&creator=32242495

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
