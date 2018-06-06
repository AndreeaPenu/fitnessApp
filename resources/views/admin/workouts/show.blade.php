@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Title: {{$workout->title}}</h1>
    <h4>Description: {{$workout->description}}</h4>
   <!--   <h6>Made by: {{$workout->user->name}}</h6>-->
  <a href="{{ url('/admin/workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-primary pull-right">Edit</a>
  <a href="{{ url('/admin/workouts/'. $workout->id . '/addExercise') }}" class="btn btn-xs btn-primary pull-right">Add Exercises</a>  
    <hr>


</br>


    <div class="card">
     <!-- show exercises here -->
    @if($exercises)
        @foreach($exercises as $exercise)
        <div class="card-header">
            <h1>{{$exercise->name}} </h1> 
            {!! Form::open(['method'=>'DELETE', 'action'=>['ExercisesController@destroy', $exercise->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('X Delete', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
        </div>

        <div class="card-body">
          

               
                <!-- show sets here -->

            @foreach($sets as $set)
                @if($set->exercise_id == $exercise->id)
   
                    {!! Form::model($set,['method'=>'PATCH','action'=> ['WorkoutsController@updateSet', $set->id]]) !!}
                    {{ csrf_field() }}
                        

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                                {!! Form::label('weight', 'Weight:') !!}
                                                {!! Form::text('weight',null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                        </div>
                            </div>

                            <div class="col">
                                
                                        <div class="form-group">
                                                {!! Form::label('reps', 'Reps:') !!}
                                                {!! Form::text('reps', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                        </div>
                                
                            </div>
                        </div>
                                   
                            
                      <a href="{{ url('/admin/workouts/' . $exercise->id . '/addSet') }}" class="btn btn-xs btn-info pull-right">Add set</a>
                        
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                @endif
            @endforeach
            
                       
        </div>
        @endforeach
    @endif
    </div>
     
</div>
    
    
    @endsection