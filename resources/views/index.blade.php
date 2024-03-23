@php
$color = '';
$msg = '';
$status = null;
//dd($tasks)
//dd($_GET['status']);
if(!empty($_GET['status'])){
    $status = $_GET['status'];
}
@endphp

@extends('base')


@section('content')

<h1 style="color:red">Welcome</h1>

<h2 class="mt-5">Your Tasks List :</h2>

@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('Task.index', ['
    filter' => $status]) }}" method="GET">
    @csrf
    <select name="status" id="">
        <option value="">All</option>
        <option value="1">Done</option>
        <option value="0">Undone</option>
    </select>
    <button type="submit">Show</button>
</form>

<div class="container mt-5" style="position: relative;">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task) 
                <tr>
                    <td><a href="{{ route('Task.show', ['Task' => $task]) }}">{{ $task->name }}</a></td>
                    <td>{{ $task->description }}</td>
                    <td style="color: blue;">{{ $task->deadline }}</td>
                    <td style="color: {{ $task->done == '1' ? 'green' : 'red' }}">{{ $task->done == '1' ? "Done" : "Not done yet" }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Change status</a>
                        <form action="" method="POST"
                            onsubmit="return confirm('Do you really want to delete this task ?')" style="display:inline">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
</div>

<!-- 
 
            -->

@endsection