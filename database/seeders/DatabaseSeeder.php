<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder 
{
    /**
     * Seed the application's database.
     */
    public function run(): void // digunakan untuk menentukan data apa yang akan di masukan kedalam database
    {
        $this->call(TaskListSeeder::class);  
        $this->call(TaskSeeder::class); 
        // this : merujuk pada objek dari kelas database seeder yang sedang di eksekusi
        // call : digunakan untuk memanggil seeder lain
    }
}
