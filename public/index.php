<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
// Menyimpan waktu mulai eksekusi aplikasi untuk mengukur performa

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
//Jika ada file maintenance.php, aplikasi masuk mode maintenance (diblokir sementara)    
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';
//Memuat semua library yang dibutuhkan aplikasi melalui Composer.

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
//Memuat Laravel (bootstrap/app.php) untuk menyiapkan aplikasi.
//Menangkap request HTTP, lalu mengarahkannya ke controller yang sesuai.
    
