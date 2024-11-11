<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDoList;

class ToDoListController extends Controller
{
    public function index()
    {
        $toDoLists = ToDoList::all();
        return view('home', compact('toDoLists'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $toDoList = new ToDoList();
        $toDoList->kegiatan = $request->kegiatan;
        $toDoList->deadline = $request->deadline;
        $toDoList->status = false;
        $toDoList->save();
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $toDoList = ToDoList::find($id);
        return view('edit', compact('toDoList'));
    }

    public function update(Request $request, $id)
{
    $toDoList = ToDoList::find($id);
    $toDoList->kegiatan = $request->kegiatan;
    $toDoList->deadline = $request->deadline;
    $toDoList->status = $request->status === 'on' ? 1 : 0;
    $toDoList->save();
    return redirect()->route('home');
}

    public function destroy($id)
    {
        $toDoList = ToDoList::find($id);
        $toDoList->delete();
        return redirect()->route('home');
    }
}