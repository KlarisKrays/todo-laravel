<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::all();

        return view('app', [
            'todos' => $todos
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        Todo::create($attributes);

        return redirect('/');
    }

    public function update($id)
    {

        $data = Todo::findOrFail($id);

        if ($data->isDone == true) {
            $data->update(['isDone' => false]);
        } else {
            $data->update(['isDone' => true]);
        }

        // if ($todo->isDone === true) {
        //     $todo->update(['isDone' => false]);
        // } else {
        //     $todo->update(['isDone' => true]);
        // };

        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }
}
