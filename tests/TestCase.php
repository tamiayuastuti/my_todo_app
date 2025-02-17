<?php

namespace Tests;
//Menunjukkan bahwa kelas ini berada dalam namespace Tests. Biasanya, ini adalah folder tests dalam struktur direktori Laravel tempat file pengujian diletakkan.

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
//TestCase di Laravel adalah kelas dasar untuk pengujian. Dengan menggunakan use, kita mengimpor kelas TestCase dari Illuminate\Foundation\Testing yang menyediakan berbagai fungsi dan metode untuk menjalankan tes dalam aplikasi Laravel.
//TestCase as BaseTestCase: Kita memberi alias BaseTestCase pada kelas TestCase dari Laravel agar bisa membedakannya dengan kelas TestCase yang akan kita buat sendiri.

abstract class TestCase extends BaseTestCase
//abstract berarti kelas ini tidak dapat diinstansiasi langsung, melainkan kelas lain harus mewarisi (extend) kelas ini.
//Kelas TestCase ini adalah kelas dasar yang akan diwarisi oleh semua tes yang dibuat di dalam aplikasi Laravel. Jadi, TestCase ini berfungsi untuk menyediakan fungsionalitas dasar untuk semua tes di aplikasi.
{
    //
}
