@extends('layouts.dashboard')

@section('content')

    <div class="container">
            @if(Session::has('deleted_workout'))
            <p>{{ session('deleted_workout') }}</p>
        @endif


        <h1>Workouts <a href="{{ url('workouts/create') }}" class="btn btn-xs btn-info pull-right">Create new workout</a>
                <a href="{{ url('workouts/myworkouts/1') }}" class="btn btn-xs btn-secondary pull-right">All my workouts</a>
</h1>
             @if($userWorkouts)
                        @foreach($userWorkouts as $userWorkout)
        <div class="card">
            

            <div class="card-header">
            <div class="circle"><img src="/images/dumbel-white.svg" width="24" height="24"/></div>
                        <h3 class="card-title">{{ $userWorkout->title }}</h3>
            </div>
            <div class="card-body">

               
                        @if($userWorkout->deleted_at == null && $userWorkout->original == 1)
                        
                        <p class="card-description">{{ $userWorkout->description }}</p>
                        <a href="{{ url('workouts/' . $userWorkout->id . '') }}" class="btn btn-xs btn-primary pull-right">start</a>
                        <a href="{{ url('workouts/' . $userWorkout->id . '/change') }}" class="btn btn-xs btn-primary pull-right">edit</a>      
                        @endif
                   
                
            </div>
            
        </div>     @endforeach
                    @endif
        </div>

        
    
    @endsection