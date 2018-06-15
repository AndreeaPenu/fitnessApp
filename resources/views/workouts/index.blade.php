@extends('layouts.dashboard')

@section('content')

    <div class="container">
            @if(Session::has('deleted_workout'))
            <p>{{ session('deleted_workout') }}</p>
        @endif

 
            <div class="to-right">
       
                    <a href="{{ url('workouts/create') }}" class="btn btn-xs btn-primary">Create new workout</a>
                                
         
                    <a href="{{ url('workouts/myworkouts/1') }}" class="btn btn-xs btn-secondary">All my workouts</a>
               
          
                    <a href="{{ url('workouts/logs/1') }}" class="btn btn-xs btn-secondary">Logs</a>
                  
            </div>
          

            

             @if($userWorkouts)
                        @foreach($userWorkouts as $userWorkout)
        <div class="card">
            

            <div class="card-header">
            <div class="circle"><img src="/images/dumbel-white.svg" width="24" height="24"/></div>
                        <h3 class="card-title">{{ $userWorkout->title }}</h3>
            </div>
            <div class="card-body">

               
                        
                        
                        <p class="card-description">{{ $userWorkout->description }}</p>
                        <a href="{{ url('workouts/' . $userWorkout->id . '') }}" class="btn btn-xs btn-primary pull-right">start</a>
                        <a href="{{ url('workouts/' . $userWorkout->id . '/change') }}" class="btn btn-xs btn-secondary pull-right">edit</a>      
                  
                   
                
            </div>
            
        </div>     @endforeach
                    @endif
        </div>

        
    
    @endsection