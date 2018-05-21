@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>My workouts</h3>
                    <a class="btn btn-primary" href="{{ url('/admin/workouts/create') }}">Add workout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
