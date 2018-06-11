@extends('layouts.dashboard')

@section('content')

<div class="container">

<div class="card">
    <div class="card-header">
        <h2>My workouts <a href="{{ url('workouts/create') }}" class="btn btn-xs btn-info pull-right">Create new workout</a></h2>
    </div>

    <div class="card-body">
        <table style="width:100%" class="w3-table w3-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                @if($userWorkouts)
                    @foreach($userWorkouts as $userWorkout)
                            <tr>
                                <td>{{$userWorkout->id}}</td>
                                <td>{{$userWorkout->title}}</td>
                                <td>{{$userWorkout->description}}</td>
                                <td> <a href="{{ url('workouts/' . $userWorkout->id . '') }}" class="btn btn-xs btn-info pull-right">Details workout</a></td>
                            </tr>
                    @endforeach
                @endif
            </table>
    </div>
</div>
        
    
</div>



    
    @endsection