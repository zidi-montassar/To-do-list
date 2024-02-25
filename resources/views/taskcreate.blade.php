@extends('base')

@section('title', 'New Task')


@section('content')
<h1 class="container mt-5">Create a new task</h1>

<div class="container mt-5">
    <form action="{{ route('Task.store') }}" method="POST">
    @csrf
    @method('post')
        <div class="form-group">
            <label for="name"><strong>Task :</strong></label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description"><strong>Description :</strong></label>
            <textarea class="form-control" name="description" id="description" placeholder="describe the task here"></textarea>
        </div>
        <div class="form-group">
            <label for="deadline"><strong>Deadline :</strong></label>
            <input class="form-control" type="date" id="deadline" name="deadline">
        </div>

        <div class="form-group">
            <div class="form-check form-switch">
                <input type="hidden" value="0" name="done">
                <input type="checkbox" value="1" name="done"class="form-check-input @error('done') is-invalid @enderror" role="switch" id="done">
                <label class="form-check-label" for="done">Done</label>
                @error('done')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Create</button>
    </form>
</div>


@endsection