<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function store(Request $request) { 
        // sebuah metode controller yang di gunakan untuk menanggani permintaan request 
        $request->validate([
        // digunakan untuk memvalidasi data-data     
            'name' => 'required|max:100' 
        ]);

        TaskList::create([
        // digunakan untuk membuat tasklist
        // mambuat tasklist berdasarkan nama    
            'name' => $request->name
            //digunakan untuk mengambil data yang dikirimkan melalui form (atau request) dengan nama name, dan menyimpannya dalam array dengan key 'name'.
        ]);

        return redirect()->back();
        // digunakan untuk mengembalikan ke halaman awal 
    }

    public function destroy($id) {
    // untuk mengapus berdasarkan $id tasklist     
        TaskList::findOrFail($id)->delete();
        // untuk memastikan user menghapus data atau tidak

        return redirect()->back();
        // untuk mengembalikan ke halaman awal
    }
}