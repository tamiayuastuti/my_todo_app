<?php
// sessions adalah pergantian dan mengatur 
use Illuminate\Database\Migrations\Migration;  //digunakan untuk menginfor kelas mogrations yang merupakan kelas dasar dalam      laravel
use Illuminate\Database\Schema\Blueprint; //digunkan untuk menginfor kelas blueprint 
use Illuminate\Support\Facades\Schema; //digunkan untuk menginfor secema facade di laravel

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // untuk menerapkan perubahan ke database
    {
        Schema::create('sessions', function (Blueprint $table) { 
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); // user_id untuk memberikan id kepada setiap user
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};