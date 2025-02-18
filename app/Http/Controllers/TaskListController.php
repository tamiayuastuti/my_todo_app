<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
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

    public function destroy($id)
    {
        TaskList::findOrFail($id)->delete();

        return redirect()->back();
    }
}
