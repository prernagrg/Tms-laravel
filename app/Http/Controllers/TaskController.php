<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()->paginate(5);
        return view('Tms.admin.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tms.admin.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $task = new Task;
        $request->validate([
            'title'=>'string|max:100|min:1|required',
            'description'=>'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        return redirect('/admin/task')->with('message','Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $task = Task::query()->where('id', $id)->get()->first();
        return view('Tms.admin.task.view', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::query()->where('id', $id)->get()->first();
        return view('Tms.admin.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = new Task;
        $task = $task->where('id',$id)->get()->first();
        $request->validate([
            'title'=>'string|max:100|min:1|required',
            'description'=>'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->update();
        return redirect('/admin/task')->with('message','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::query()->where('id', $id)->get()->first();
        $task->delete();
        return redirect('/admin/task')->with('message','Deleted successfully');
    }
}
