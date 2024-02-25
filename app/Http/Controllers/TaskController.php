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
    public function index()
    {
        return view('index', [
            'tasks' => Task::orderBy('created_at', 'desc')->paginate(7)
        ]);
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
        $tassk = Task::create($request->validated());
        $task = Task::find($tassk->id);
        return to_route('Task.show', ['Task' => $task])->with('success', 'Your new task is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //dd($task);
        return view('taskshow', ['task' => $task]);
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
