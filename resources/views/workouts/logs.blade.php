@extends('layouts.dashboard')

@section('content')

<div class="container">

    <h1>Workouts I did</h1>
    @foreach($myWorkouts as $myWorkout)
    @if($myWorkout->deleted_at == null)
    
    <div class="card">
        <div class="card-header">
            <ul>
                <li> <h1>{{ $myWorkout->title }} - {{ $myWorkout->description }}</h1> </li>
            </ul>
        </div>
    
    <div class="card-body">
         @foreach($workouts as $workout)
            
                @foreach($workout->exercises as $exercise)
                 <!-- {{$workout->id}} -> {{$exercise->pivot->workout_id}} -->
                    @if($myWorkout->id == $exercise->pivot->workout_id)
                        <ul>
                            <li>
                            
                             <h3>{{ $exercise->name }} </h3>   <!-- {{$exercise->sets}} -->

                                        @foreach($sets as $set)
                                            @if($set->exercise_id == $exercise->id && $set->reps != null)
                                            <ul>
                                                <li> {{ $set->reps }} x {{ $set->weight }}kg . {{ $set->created_at }}</li>
                                            </ul>
                                            @endif
                                        @endforeach
                                        <h6>Every set</h6>
                                        <workout-chart :s="{{$sets}}" :eid="{{$exercise->id}}"></workout-chart>
                            </li>
                        </ul>
                    @endif
                @endforeach
           
        @endforeach
    </div>
    </div>


        

   
      
    @endif
    @endforeach


    

    </div>

    @endsection