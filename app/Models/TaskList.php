<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//TaskList adalah model yang digunakan untuk menyimpan dan mengelola data daftar tugas.
class TaskList extends Model
{
    protected $fillable = ['name'];
    //$fillable → Menentukan kolom yang boleh diisi secara massal
    //Hanya kolom name yang bisa diisi langsung.
    protected $guarded = [
    //$guarded → Menentukan kolom yang tidak boleh diisi secara massal.    
    //Mencegah perubahan langsung pada id, created_at, dan updated_at.
        'id',
        'created_at',
        'updated_at'
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
        //Relasi: hasMany()
        //TaskList memiliki banyak Task (one-to-many relationship).
        //Menghubungkan TaskList dengan Task melalui list_id.
    }
}