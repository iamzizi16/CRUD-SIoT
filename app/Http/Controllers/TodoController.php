<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $todos = Todo::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%$search%");
        })
        ->orderBy('tanggal')
        ->orderBy('jam')
        ->paginate(10);

        return view('todos.index', compact('todos', 'search'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'prioritas' => 'required'
        ]);

        Todo::create($request->all());

        return back()->with('success', 'Kegiatan ditambahkan');
    }


    public function toggle($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->is_done = !$todo->is_done;
        $todo->save();

        return back();
    }


    public function destroy($id)
    {
        Todo::destroy($id);

        return back()->with('success', 'Kegiatan dihapus');
    }
}
