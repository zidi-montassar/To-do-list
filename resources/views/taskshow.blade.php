@extends('base')

@section('title', $task->name)


@section('content')

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1 class="mt-2">Task :{{ $task->name }}</h1>
    <div class="form-group mt-5">
        <div class="form-control mt-2">
            <h3>Description :</h3>
            <p>{{ $task->description }}</p>
        </div>
        <div class="form-control mt-2">
            <h3>Deadline :</h3>
            <p>{{ $task->deadline }}</p>
        </div>
        <div class="form-control mt-2">
            <h3>Done :</h3>
            <p>{{ $task->done }}</p>
        </div>
    </div>
</div>

@endsection