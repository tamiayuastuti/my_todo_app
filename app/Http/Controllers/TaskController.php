<?php
//fungsi:taskcontroller digunkan untuk menampilkan daftar tugas,menambah tugas baru,mengedit tugas menandai tugas selesai dan menghapus tugas
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() { // berfungsi untuk mengambil data dari database 
        $data = [ // 
            'title' => 'Home', 
            'lists' => TaskList::all(), //list untuk mengambil semua yang ada di dalam database 
            'tasks' => Task::orderBy('created_at', 'desc')->get(), // mendapatkan data task yang nantinya akan di buat berurutan sesuai urutan descending
            //desceding dari besar ke kecil
            //ascending dari kecil ke besar
            'priorities' => Task::PRIORITIES // digunakan untuk mengambil data prioritis/prioritas di database
        ];

        return view('pages.home', $data); //return view:kembali ke halaman home ,setelah mengambil data akan di arahkan ke halaman home
    }

    public function store(Request $request) {  // digunakan untuk menyimpan data baru kedalam database 
        $request->validate([                   // digunakan untuk memvalidasi data yang di kirim oleh pengguna 
            'name' => 'required|max:100', // required:wajib di isi // max:100 tidak lebih dari 100 huruf
            'deskripsi' => 'max:255',
            'priority' => 'required|in:low,medium,high',                                     
            'list_id' => 'required' // list_id adalah id tambahan // required:wajib di isi
        ]);

        Task::create([ // membuat tugas baru
            'name' => $request->name,
            'description' =>$request->deskripsi,
            'priority' =>$request->priority,
            'list_id' => $request->list_id
        ]);


        return redirect()->back(); // setelah menambahkan data task akan di arahkan kembali ke halaman home
    }

    public function complete($id) {  // fungsinya untuk membuat status tugas selesai
        Task::findOrFail($id)->update([  // find or fail di gunain tugasnya selesai apa belum
            'is_completed' => true // tugas selesai 
        ]);

        return redirect()->back(); 
    }

    public function destroy($id) {  // digunakan untuk menghapus tugas berdasarkan id
        Task::findOrFail($id)->delete(); 

        return redirect()->back(); 
    }    
    public function show($id) {
        $task = Task::findOrFail($id);
        
        $data = [
            'title' => 'Details',
            'task' => $task,
        ];

        return view('pages.details', $data);
    }   
    
}