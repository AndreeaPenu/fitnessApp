@extends('layouts.dashboard')

@section('content')

    <div class="container">
            @if(Session::has('deleted_workout'))
            <p>{{ session('deleted_workout') }}</p>
        @endif


        <h1>Workouts</h1>

        <div class="card">
            <div class="card-header">All workouts</div>
            <div class="card-body">
                <table style="width:100%" class="w3-table w3-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                @if($workouts)
                    @foreach($workouts as $workout)
                    <tr>
                        <td>{{ $workout->id }}</td>
                        <td>{{ $workout->title }}</td>
                        <td>{{ $workout->description }}</td>
                       
                        <td><a href="{{ url('workouts/' . $workout->id . '/add') }}" class="btn btn-xs btn-info pull-right">+ ADD</a></td>
                    </tr>
                    @endforeach
                @endif
                </table>
            </div>
            
        </div>

        <div class="card">
            <div class="card-header">
                My workouts <a href="{{ url('workouts/create') }}" class="btn btn-xs btn-info pull-right">Create new workout</a>
                <a href="{{ url('workouts/myworkouts/1') }}" class="btn btn-xs btn-secondary pull-right">All my workouts</a>
            </div>

            <div class="card-body">
                
             <!--   <a href="{{ url('/admin/exercises/create') }}" class="btn btn-xs btn-info pull-right">Add new exercise</a> -->

                <table style="width:100%" class="w3-table w3-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    @if($userWorkouts)
                        @foreach($userWorkouts as $userWorkout)
                        @if($userWorkout->deleted_at == null && $userWorkout->original == 1)
                                <tr>
                                    <td>{{ $userWorkout->id }}</td>
                                    <td>{{ $userWorkout->title }}</td>
                                    <td>{{ $userWorkout->description }}</td>
                                    <td><a href="{{ url('workouts/' . $userWorkout->id . '') }}" class="btn btn-xs btn-primary pull-right">start</a></td>
                                  <!--  <td><a href="{{ url('workouts/' . $userWorkout->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a></td> -->
                                  <!--  <td> <a href="{{ url('workouts/' . $userWorkout->id .'/addWorkout') }}" class="btn btn-xs btn-danger pull-right">Add exercises</a></td> -->
                                </tr>
                        @endif
                        @endforeach
                    @endif
                </table>
            </div>
            
        </div>
        </div>

        
    
    @endsection