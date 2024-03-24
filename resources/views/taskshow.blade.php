@extends('base')

@section('title', $Task->name)


@section('content')

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @php
    //dd($task)
    @endphp
    <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="mt-2">Task :{{ $Task->name }}</h1>
        <a href="{{ route('Task.edit', ['Task' => $Task]) }}" class="btn btn-primary">Edit</a>
    </div>
    
    <div class="form-group mt-5">
        <div class="form-control mt-2">
            <h3>Description :</h3>
            <p>{{ $Task->description }}</p>
        </div>
        <div class="form-control mt-2">
            <h3>Deadline :</h3>
            <p>{{ $Task->deadline }}</p>
        </div>
        <div class="form-control mt-2">
            <h3>Done :</h3>
            <p>{{ $Task->done == '1' ? 'Yes' : 'Not yet' }}</p>
        </div>
    </div>
</div>

@endsection