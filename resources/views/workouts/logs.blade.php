@extends('layouts.dashboard')

@section('content')
<a href="{{ URL::previous() }}"><img class="arrow-back" src="{{ asset('/images/left-arrow.svg') }}" alt="left arrow"></a>
<div class="container">

   
    @foreach($myWorkouts as $myWorkout)
        @if($myWorkout->deleted_at == null)
    
            <div class="card">
                <div class="card-header">
                    <ul>
                        <li>{{ $myWorkout->title }} - {{ $myWorkout->description }}</li>
                    </ul>
                </div>
    
                <div class="card-body">
                    @foreach($workouts as $workout)
                        @foreach($workout->exercises as $exercise)
                            @if($myWorkout->id == $exercise->pivot->workout_id)
                                <ul>
                                    <li>
                                        <h5>{{ $exercise->name }}</h5>
                                        @foreach($sets as $set)
                                            @if($set->exercise_id == $exercise->id && $set->reps != null)
                                                <ul>
                                                    <li>{{ $set->reps }} x {{ $set->weight }}kg . {{ $set->created_at }}</li>
                                                </ul>
                                            @endif
                                        @endforeach
                                  
                                        <div class="app">
                                            <workout-chart chart-id="{{$exercise->id}}" :s="{{$sets}}" :eid="{{$exercise->id}}"></workout-chart>
                                        </div>
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