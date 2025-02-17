<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');
//Route::get('/'): Mendefinisikan route untuk halaman home (URL /).
//[TaskController::class, 'index']: Mengarahkan permintaan ke metode index pada TaskController
//->name('home'): Menetapkan nama untuk route ini sebagai home. Bisa digunakan untuk mengarahkan atau membuat URL dengan nama tersebut.
Route::resource('lists', TaskListController::class);
//Mendefinisikan route untuk resource controller yang otomatis membuat route untuk berbagai operasi CRUD (Create, Read, Update, Delete) pada TaskListController. Ini berarti Laravel akan membuat beberapa route otomatis

Route::resource('tasks', TaskController::class);
//Route::resource('tasks', TaskController::class): Sama seperti sebelumnya, tetapi untuk TaskController, yang menyediakan operasi CRUD untuk tasks
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
//Route::patch('/tasks/{task}/complete'): Menangani permintaan PATCH ke URL /tasks/{task}/complete untuk menandai task dengan ID tertentu sebagai selesai.
//[TaskController::class, 'complete']: Mengarah ke metode complete dalam TaskController.
//[TaskController::class, 'complete']: Mengarah ke metode complete dalam TaskController.

Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');
//Route::patch('/tasks/{task}/change-list'): Menangani permintaan PATCH untuk mengubah daftar (list) yang terkait dengan task tertentu.
//[TaskController::class, 'changeList']: Mengarah ke metode changeList dalam TaskController.
//->name('tasks.changeList'): Menetapkan nama untuk route ini sebagai tasks.changeList.
