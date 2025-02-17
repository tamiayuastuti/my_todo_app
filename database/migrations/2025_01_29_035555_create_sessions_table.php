<?php
// sessions adalah pergantian dan mengatur 
use Illuminate\Database\Migrations\Migration;  //digunakan untuk menginfor kelas mogrations yang merupakan kelas dasar dalam      laravel
use Illuminate\Database\Schema\Blueprint; //digunkan untuk menginfor kelas blueprint 
use Illuminate\Support\Facades\Schema; //digunkan untuk menginfor secema facade di laravel

return new class extends Migration
//new class extends Migration: Ini adalah cara untuk membuat kelas anonim yang meng-extend kelas Migration Laravel
//Kelas anonim ini akan langsung digunakan tanpa harus mendeklarasikan kelas dengan nama tertentu.
//Migration: Ini adalah kelas dasar dari Laravel yang digunakan untuk mendefinisikan struktur database dan perubahan-perubahannya, seperti menambah atau menghapus tabel.
{
    /**
     * Run the migrations.
     */
    public function up(): void // untuk menerapkan perubahan ke database
    {
        Schema::create('sessions', function (Blueprint $table) { 
        //Kode ini digunakan untuk membuat tabel sessions di database dengan berbagai kolom yang didefinisikan di dalam fungsi. Ini adalah bagian dari migration untuk mengelola struktur database di Laravel.     
            $table->string('id')->primary();
            //v\$table->string('id')->primary(); menambahkan kolom id dengan tipe string dan menjadikannya sebagai primary key yang memastikan keunikan setiap nilai dalam kolom tersebut.
            $table->foreignId('user_id')->nullable()->index(); 
            //// user_id untuk memberikan id kepada setiap user
            $table->string('ip_address', 45)->nullable();
            //$table->string('ip_address', 45)->nullable(); menambahkan kolom ip_address dengan panjang maksimal 45 karakter untuk menyimpan alamat IP (baik IPv4 atau IPv6).
            //Kolom ini boleh bernilai NULL, artinya tidak wajib ada nilai pada kolom tersebut
            $table->text('user_agent')->nullable();
            //$table->text('user_agent')->nullable(); menambahkan kolom user_agent yang dapat menyimpan data teks panjang, yang sering digunakan untuk menyimpan informasi seperti jenis browser atau perangkat yang digunakan.
            $table->longText('payload');
            //$table->longText('payload'); menambahkan kolom payload yang bisa menyimpan teks panjang (lebih besar dari text biasa).
            $table->integer('last_activity')->index(); 
            //$table->integer('last_activity')->index(); menambahkan kolom last_activity dengan tipe integer dan membuat kolom tersebut memiliki index untuk mempercepat pencarian data.
            //Index pada kolom ini sangat berguna untuk meningkatkan performa pencarian berdasarkan nilai last_activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    //down() berfungsi untuk membatalkan atau menghapus perubahan yang dilakukan dalam up().
    {
        Schema::dropIfExists('sessions');
        // digunakan untuk menghapus tabel sessions jika tabel tersebut ada di database.
    }
};