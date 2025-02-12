<?php
//migrations adalah sebuah kelas yang di gunakan oleh laravel untuk mengelola dan memodifikasi struktur database
use Illuminate\Database\Migrations\Migration; //digunakan untuk menginfor kelas mogrations yang merupakan kelas dasar dalam      laravel
use Illuminate\Database\Schema\Blueprint; //use:menggunakan ,digunkan untuk menginfor kelas blueprint:buat menggambil kolom dan tabel di database 
use Illuminate\Support\Facades\Schema; //digunkan untuk menginfor secema facade:fungi create,edit,dan menghapus, di laravel

return new class extends Migration //
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    {
        Schema::create('tasks', function (Blueprint $table) {
        // schema::create adalah metode yang di gunakan untuk membuat tabel baru didatabase
        // tasklist adalah nama tabel yang akan di buat   
        // function blueprint tabel digunkan untuk mendefinisikan kolom2 dalam tabel tasklist     
            $table->id();
            //untuk mengisi tabel id yang dimana dalam sebuah form id wajib ada
            $table->string('name');
            //untuk mencegah duplikasi (nama yang sama) dengan menambahkan unique(unik)
            $table->string('description')->nullable();
            //deskripsi digunkan untuk membuat deskripsi pada suatu task (isi deskripsi),fungsinya untuk membuat task lebih spesifik
            //nullable : opsional mau di isi atau tidak 
            $table->boolean('is_completed')->default(false);
            //digunakan untuk membuat status tugas yang belum selesai
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            //enum buat mendefinisikan,low:santai,medium:sedeng,high:harus selesai dikerjakan
            //enum digunakan untuk mendefinisikan sebuah prioritas yang di mana bawaan prioritasnya medium 
            $table->timestamps();
            //menetukan waktu untuk memberikan tanda contoh seperti saat kita menambahkan tugas
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
            //foreignid untuk menentukan id
            //constrained:delete untk menghapus seluruh data termasuk id tabel 
            //onDelete untuk mengupdate seluruh data termasuk id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    //untuk membalikan perubahan  yang bertujuan untuk membatalkan atau menghapus perubahan yang telah dilakukanoleh metode up
    {
        Schema::dropIfExists('tasks');
        // digunakan untuk menghapus tabel task (isi deskripsi) (judul misalnya:belajar) di database
    }
};