@php
$done = true;
$undone = false;
@endphp

@extends('base')


@section('content')

<h1 style="color:red">Welcome</h1>

<h2 class="mt-5">Your Tasks List :</h2>

<div class="container" style="d-flex">
    <a href="" class="btn btn-primary">New Task</a>
</div>

<form action="" method="GET">
    @csrf
    <select name="status" id="">
        <option value="">All</option>
        <option value="1">Done</option>
        <option value="0">Undone</option>
    </select>
    <button type="submit">Show</button>
</form>

@endsection