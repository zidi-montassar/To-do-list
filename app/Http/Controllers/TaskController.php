<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexFormRequest;
use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexFormRequest $request)
    {
        //dd($request->validated());
        if($request->validated('status') === '1'){
            $tasks = Task::done(true)->recent()->paginate(7);
        }else if($request->validated('status') === '0'){
            $tasks = Task::done(false)->recent()->paginate(7);
        }else{
            $tasks = Task::recent()->paginate(7);
        }
        /* $tasks = Task::orderBy('created_at', 'desc')->paginate(7);*/ 
        //dd($filter);
        /*if($done_filter = '1'){
            return view('index', [
                'tasks' => Task::done(true)->recent()->paginate(7)
            ]);
        }else if($done_filter = '0'){
            return view('index', [
                'tasks' => Task::done(false)->recent()->paginate(7)
            ]);
        }else{*/
            return view('index', [
                'tasks' => $tasks
            ]);
        //}
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskFormRequest $request)
    {
        //dd($request->validated());
        $task = Task::create($request->validated());
        //$task = Task::find($tassk->id);
        return to_route('Task.index')->with('success', 'Your new task is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $Task)
    {
        //$task = Task::find($task);
        //dd($task);
        return view('taskshow', ['Task' => $Task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $Task)
    {
        return view('taskupdate', ['Task' => $Task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskFormRequest $request, Task $Task)
    {
        $Task->update($request->validated());
        return to_route('Task.index')->with('success', 'Your new task is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $Task)
    {
        $Task->delete();
        return to_route('Task.index')->with('success', 'The task has been deleted successfully');
    }

    /**
     * Direct status change.
     */
    public function statusupdate(Task $Task)
    {
        $new_status = $Task->done == '1' ? '0' : '1';
        $Task->update(['done' => $new_status]);
        return to_route('Task.index')->with('success', 'The task status is updated successfully');
    }
}
