@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Workouts I did</h1>
    @foreach($myWorkouts as $myWorkout)
    @if($myWorkout->deleted_at == null)
    
        <ul>
            <li>{{$myWorkout->title}} / {{$myWorkout->description}} / {{$myWorkout->created_at}}</li>
        </ul>


        @foreach($workouts as $workout)
        
            
                @foreach($workout->exercises as $exercise)
                 <!-- {{$workout->id}} -> {{$exercise->pivot->workout_id}} -->
                    @if($myWorkout->id == $exercise->pivot->workout_id)
                        <ul>
                            <li>
                            
                                {{$exercise->name}} <!-- {{$exercise->sets}} -->
                                <ul>
                                    <li>
                                        @foreach($sets as $set)
                                            @if($set->exercise_id == $exercise->id && $set->reps != null)
                                                {{$set->reps}} x {{$set->weight}}kg . {{$set->created_at}}
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            
                            </li>
                        </ul>
                    @endif
                @endforeach
           
        @endforeach
      
    @endif
    @endforeach

 

    <div id="app">
        <agenda :workouts="{{$workouts}}"></agenda>
    </div>
</div>
@endsection
