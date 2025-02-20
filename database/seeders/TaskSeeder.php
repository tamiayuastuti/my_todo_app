<?php

namespace Database\Seeders; 
//namespace adalah cara utuk mengelompokan kelas agar tidak terjadi konflik nama antara kelas yang berbeda dalam suatu project
//database seeder adalah namespace default yang di gunakan untuk semua kelas seeder di laravel

use App\Models\Task; //untuk menginfor model task yang berada didalam direktory app/models/task.php
use App\Models\TaskList; // use:menggunkan ,digunkan untuk menginfor semua model tasklist di semua folder
use Illuminate\Database\Console\Seeds\WithoutModelEvents; //kode ini berfungsi untuk menonaktifkan event model saat menjalankan seeder
use Illuminate\Database\Seeder; //di gunakan untuk menginfor file yang ada didalam kelas seeder 

class TaskSeeder extends Seeder 
//untuk mengisi tabel tasks dengan data awal secara otomatis di Laravel.
{
    /**
     * Run the database seeds.
     */
    public function run(): void // digunakan untuk menentukan data apa yang akan di masukan kedalam database
    {
        $tasks = [
            [
                'name' => 'Belajar Laravel',
                'description' => 'Belajar Laravel di santri koding',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke Villa bersama teman sekolah',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,
            ],
            [
                'name' => 'Matematika',
                'description' => 'Tugas Matematika bu Nina',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi pa budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todo App untuk ujikom',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
        ];

        Task::insert($tasks);  
        //Tasklist merujuk pada model yang beruhubungan dengan tabel task di database
        //insert lists di gunakan untuk menambahkan beberapa data kedalam datbase
    }
}
