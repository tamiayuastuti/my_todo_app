<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model 
//class Task extends Model → Task adalah model Eloquent yang digunakan untuk berinteraksi dengan database.
{
    protected $fillable = [ 
    //$fillable → Menentukan kolom yang boleh diisi secara massal (mass assignment).
    //Memungkinkan input otomatis ke kolom ini tanpa create([]).    
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    protected $guarded = [
    //$guarded → Menentukan kolom yang tidak boleh diisi secara massal.
    //id, created_at, dan updated_at tidak bisa dimodifikasi langsung.    
        'id',
        'created_at',
        'updated_at'
    ];

    const PRIORITIES = [
    //PRIORITIES → Konstanta untuk tingkatan prioritas tugas.
    //Untuk menentukan nilai prioritas yang diperbolehkan.
        'low',
        'medium',
        'high'
    ];

    public function getPriorityClassAttribute() {
    //Accessor: getPriorityClassAttribute()
    //Mengembalikan kelas CSS berdasarkan tingkat prioritas (low = success, medium = warning, high = danger)    
        return match($this->attributes['priority']) {
        //$this->attributes['priority'] → Mengambil nilai kolom priority dari model Task.
        //match → Struktur kontrol yang mirip dengan switch, tetapi lebih singkat dan langsung mengembalikan hasil.    
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    }

    public function list() {
    //Menandakan bahwa Task milik satu TaskList (hubungan many-to-one).    
        return $this->belongsTo(TaskList::class, 'list_id');
    }    
}