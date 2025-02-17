<?php

use Illuminate\Foundation\Application;
//Mengimpor kelas utama Laravel yang digunakan untuk membuat dan mengatur aplikasi.
use Illuminate\Foundation\Configuration\Exceptions;
//Mengimpor konfigurasi untuk menangani error dan exception dalam aplikasi
use Illuminate\Foundation\Configuration\Middleware;
//Mengimpor konfigurasi untuk mengelola middleware, seperti autentikasi atau logging

return Application::configure(basePath: dirname(__DIR__))
//Application::configure() digunakan untuk mengatur direktori utama aplikasi.
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        //web → Menghubungkan aplikasi dengan file web routes (routes/web.php).
        //commands → Menghubungkan dengan perintah konsol (routes/console.php).
        //health → Endpoint /up untuk mengecek apakah aplikasi berjalan.
    )
    ->withMiddleware(function (Middleware $middleware) {
    //Tempat untuk menambahkan middleware (misalnya autentikasi atau log request).    
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    //Tempat untuk mengatur bagaimana aplikasi menangani error dan exception.    
    })->create();
    //Membuat instance aplikasi Laravel dan menjalankannya.
