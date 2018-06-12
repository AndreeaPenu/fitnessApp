@extends('layouts.dashboard')

@section('content')


<div class="container">
    <h1>{{$workout->title}}</h1>
    <h4>{{$workout->description}}</h4>
    <a href="{{ url('workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-secondary pull-right">Edit</a>
    <a href="{{ url('workouts/'. $workout->id . '/addExercise') }}" class="btn btn-xs btn-primary pull-right">Add Exercises</a>  

    


    </br>
   <!-- show exercises here -->
    @if($exercises)
        @foreach($exercises as $exercise)
    <div class="card">
    
  
        <div class="card-header">
            <h1>{{ $exercise->name }} </h1> 
            {!! Form::open(['method'=>'DELETE', 'action'=>['ExercisesController@destroy', $exercise->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('X Delete', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}

            
        </div>

        <div class="card-body">
                <!-- show sets here -->
                   
                        
                    @foreach($sets as $set)
                    @if($set->reps == null)
                        @if($set->exercise_id == $exercise->id)
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('weight', 'Weight:') !!}
                                            {!! Form::text('weight[]',null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('reps', 'Reps:') !!}
                                            {!! Form::text('reps[]', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::hidden('exercise_id[]', $exercise->id) !!}
                                {!! Form::hidden('set_id[]', $set->id) !!}
                        @endif
                        @endif
                    @endforeach     
                    <a href="{{ url('workouts/' . $exercise->id . '/addSet') }}" class="btn btn-xs btn-primary pull-right">Add set</a>
                  

            
                       
        </div>
  
    </div>
      @endforeach
    @endif
      
  
     
</div>  
    
    {!! Form::close() !!}
@endsection