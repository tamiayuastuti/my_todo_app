<?php

namespace Database\Seeders;
//namespace adalah cara utuk mengelompokan kelas agar tidak terjadi konflik nama antara kelas yang berbeda dalam suatu project
//database seeder adalah namespace default yang di gunakan untuk semua kelas seeder di laravel

use Illuminate\Database\Console\Seeds\WithoutModelEvents; 
//kode ini berfungsi untuk menonaktifkan event model saat menjalankan seeder
use Illuminate\Database\Seeder;
//di gunakan untuk menginfor file yang ada didalam kelas seeder 
use App\Models\TaskList;
// use:menggunkan ,digunkan untuk menginfor semua model tasklist di semua folder

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void // digunakan untuk menentukan data apa yang akan di masukan kedalam database
    {
        $lists = [
            [
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ]
        ];

        TaskList::insert($lists);
        //Tasklist merujuk pada model yang beruhubungan dengan tabel tasklist di database
        //insert lists di gunakan untuk menambahkan beberapa data kedalam datbase
    }
}
