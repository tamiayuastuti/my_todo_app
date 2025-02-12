<?php
//migrations adalah sebuah kelas yang di gunakan oleh laravel untuk mengelola dan memodifikasi struktur database
use Illuminate\Database\Migrations\Migration; //digunakan untuk menginfor kelas mogrations yang merupakan kelas dasar dalam      laravel
use Illuminate\Database\Schema\Blueprint;
//use:menggunakan ,digunkan untuk menginfor kelas blueprint:buat menggambil kolom dan tabel di database 
use Illuminate\Support\Facades\Schema;
//digunkan untuk menginfor secema facade:fungi create,edit,dan menghapus, di laravel 

return new class extends Migration //
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    // untuk menerapkan perubahan ke database ,untuk menampilkan perubahan di database
    {
        Schema::create('task_lists', function (Blueprint $table) { 
        // schema::create adalah metode yang di gunakan untuk membuat tabel baru didatabase
        // tasklist adalah nama tabel yang akan di buat   
        // function blueprint tabel digunkan untuk mendefinisikan kolom2 dalam tabel tasklist 
            $table->id(); 
            //untuk mengisi tabel id yang dimana dalam sebuah form id wajib ada
            $table->string('name')->unique();
            //untuk mencegah duplikasi dengan menambahkan unique(unik)
            $table->timestamps();
            //untuk menentukan waktu 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    //untuk membalikan perubahan  yang bertujuan untuk membatalkan atau menghapus perubahan yang telah dilakukanoleh metode up
    {
        Schema::dropIfExists('task_lists');
        // digunakan untuk menghapus tabel (tasklist:judul misalnya:belajar) di database  
    }
};
