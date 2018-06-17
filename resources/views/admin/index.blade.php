@extends('layouts.dashboard')

@section('content')

<div class="container">
    @if($user->role_id == 1)
        <a href="{{ url('/') }}/admin/users" class="btn btn-primary">Users</a>
        <a href="{{ url('/') }}/admin/exercises/create" class="btn btn-secondary">Add exercises</a>
    @else
        <h1>You are not an administrator, nice try.</h1>
    @endif
</div>

@endsection
