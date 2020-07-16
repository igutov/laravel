<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $this->UserId = Auth::user()->id;
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $list = DB::table('tasks')->where('user_id', '=', Auth::user()->id)->get();
        return view('task', ['list' => $list]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $tasks = new Task;
        $tasks->task = $request->input('task');
        $tasks->user_id = Auth::user()->id;
        $tasks->save();

        return back()->withInput();
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function show(Task $task)
    {

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function edit(Task $task)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function destroy(Task $task)
    {
        // $task = new Task;
        // $task_id = $request->input('one_task');
        // $task = Task::find($task_id);
        // $task->delete();
        // return back()->withInput();
        // DB::delete('delete from student where id = ?',[$id]);
    }
}
