<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $filter=null)
    {
        if($filter === '1'){
            $tasks = Task::done(true)->recent()->paginate(7);
        }else if($filter === '0'){
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
