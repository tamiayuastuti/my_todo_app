<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller //tasklistcontroller untuk deskripsi tugas
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        $list = TaskList::create([
            'name' => $request->name
        ]);

        // Redirect ke halaman yang menampilkan notifikasi dan memberikan data lists
        return redirect()->route('home')->with("success", "List $list->name berhasil dibuat.")
            ->with('newTaskList', $list); // Kirim data task list baru
    }

    public function destroy($id)//public function destroy($id) biasanya digunakan dalam Controller untuk menghapus data berdasarkan ID dari database.
    {
        TaskList::findOrFail($id)->delete();
        //Kode ini digunakan untuk mencari dan menghapus data berdasarkan ID dalam database

        return redirect()->back();
        //Kode ini digunakan untuk mengembalikan pengguna ke halaman sebelumnya setelah suatu proses dijalank
        //redirect() → Mengarahkan pengguna ke halaman lain.
        //back() → Mengembalikan pengguna ke halaman sebelumnya
    }
}
