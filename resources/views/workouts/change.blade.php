@extends('layouts.dashboard')

@section('content')

<a href="{{ URL::previous() }}"><img class="arrow-back" src="{{ asset('/images/left-arrow.svg') }}" alt="left arrow"></a>
<div class="container">

            @if(Session::has('updated_workout'))
            <div class="alert alert-success" role="alert">
                <p>{{ session('updated_workout') }}</p>
            </div>
            @endif
            
    <h1>{{$workout->title}}</h1>
    <h4>{{$workout->description}}</h4>

    <div class="to-right">
        <a href="{{ url('workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-secondary pull-right">Edit</a>
        <a href="{{ url('workouts/'. $workout->id . '/addExercise') }}" class="btn btn-xs btn-primary pull-right">Add Exercises</a>  
    </div>
 
    


    </br>
   <!-- show exercises here -->
    @if($exercises)
        @foreach($exercises as $exercise)
    <div class="card">
    
  
        <div class="card-header">
         {{ $exercise->name }}

            <div class="to-right">
                {!! Form::open(['method'=>'DELETE', 'action'=>['ExercisesController@destroy', $exercise->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('X Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
   

            
        </div>

  
    </div>
      @endforeach
    @endif
      
  
     
</div>  
    
    {!! Form::close() !!}
@endsection