@extends('layouts.dashboard')

@section('content')

{!! Form::open(['method'=>'POST', 'action'=>['WorkoutsController@updateSet', $workout->id]]) !!}
                    {{ csrf_field() }}
<div class="container">
    <div class="row">

        <div class="col-md-11">
            <h1>{{$workout->title}}</h1>
            <h4>{{$workout->description}}</h4>
        </div>

        <div class="col-md-1">

        {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        
        </div>
    </div>
   
  

    


    </br>
    <!-- show exercises here -->
    @if($exercises)
        @foreach($exercises as $exercise)
    <div class="card">
    
 
        <div class="card-header">
            <h1>{{ $exercise->name }} </h1> 


            
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