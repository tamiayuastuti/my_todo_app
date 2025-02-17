<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
//AppServiceProvider adalah service provider dalam Laravel yang digunakan untuk mendaftarkan layanan dan mengatur konfigurasi aplikasi.
//Service Provider → Mengelola layanan yang digunakan dalam aplikasi.
{
    /**
     * Register any application services.
     */
    public function register(): void
    //register() → Mendaftarkan layanan ke dalam container Laravel.
    //Digunakan untuk mendaftarkan service yang tidak langsung digunakan saat aplikasi dijalankan.
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    //boot() → Menjalankan konfigurasi atau logika awal saat aplikasi berjalan.
    //
    {
        //
    }
}
