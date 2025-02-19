<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home'); //untuk url -> http://127.0.0.1:8000/


Route::resource('lists', TaskListController::class);


Route::resource('tasks', TaskController::class);

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');


Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');


Route::get('/about', [TaskController::class, 'about'])->name('about');  