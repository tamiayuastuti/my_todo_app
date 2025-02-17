<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
// Ini mendefinisikan perintah inspire untuk Artisan (CLI Laravel). Ketika perintah ini dijalankan, ia akan menjalankan kode di dalam callback    
    $this->comment(Inspiring::quote());
    //Menampilkan kutipan inspiratif yang diambil dari kelas Inspiring menggunakan metode quote().
})->purpose('Display an inspiring quote')->hourly();
//->purpose('Display an inspiring quote'): Memberikan deskripsi pada perintah Artisan ini, yaitu "Display an inspiring quote" (Menampilkan kutipan inspiratif)
//->hourly();: Menjadwalkan perintah inspire agar dijalankan setiap jam.
