<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller //task controller untuk judul tugas
{
    public function index(Request $request)
    //public Menunjukkan bahwa metode ini bisa diakses dari luar kelas, yaitu ketika route memanggilnya.
    //function index Metode bernama index() ini biasanya digunakan untuk menampilkan daftar data. Dalam konvensi Laravel, metode index() sering digunakan dalam CRUD untuk menampilkan semua data.
    //(Request $request)Request adalah kelas yang digunakan untuk menangani data dari permintaan HTTP (GET, POST, dsb.).
    //$request adalah objek yang membawa semua data yang dikirim dari pengguna, seperti query string, form input, dll.
    {
        $query = $request->input('query');

        if ($query) {
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest()
                ->get();

            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks')
                ->get();


            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        $data = [
            'title' => 'Home',
            'lists' => $lists,
            'tasks' => $tasks,
            'priorities' => Task::PRIORITIES
        ];

        return view('pages.home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me',
        ];

        return view('pages.about', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high',
            'list_id' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id

        ]);


        return redirect()->back();
    }

    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('home');
    }

    public function show($id)
    {
        $data = [
            'title' => 'Task',
            'lists' => TaskList::all(),
            'task' => Task::findOrFail($id),
        ];

        return view('pages.details', $data);
    }

    public function changeList(Request $request, Task $task)
    //public function changeList → Method yang bisa diakses secara publik.
    //Request $request → Parameter untuk menangkap data yang dikirim oleh pengguna
    //Task $task → Model Task, yang otomatis mengambil data task berdasarkan ID yang diberikan.
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    public function update(Request $request, Task $task)
    //public function update → Method yang dapat diakses secara publik.
    //Request $request → Menangkap data yang dikirim oleh pengguna melalui form atau API.
    //Task $task → Model Task, yang otomatis mengambil data task berdasarkan ID yang diberikan.
    {
        $request->validate([ 
        //Method ini digunakan untuk memvalidasi data yang dikirim oleh pengguna sebelum diproses lebih lanjut    
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
        //de ini digunakan untuk mencari data tugas (task) berdasarkan ID dan memperbarui nilainya    
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
