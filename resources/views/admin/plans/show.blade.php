@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Title: {{$plan->title}}</h1>
    <h4>Description: {{$plan->description}}</h4>
    <h6>Made by: {{$plan->user->name}}</h6>
    <hr>


</br>


    <div class="card">
    @if($workouts)
        @foreach($workouts as $workout)
        <div class="card-header">
            <h1>{{$workout->name}}  <a href="{{ url('/admin/workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-primary pull-right">Edit</a> <a href="{{ url('/admin/workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Do this workout now</a></h1> 
        </div>

        <div class="card-body">
            <!-- show exercises here -->

            @if($exercises)

                    @foreach($exercises as $exercise)
                    <h3>{{$exercise->name}}</h3>
               
                <!-- show sets here -->

            @foreach($sets as $set)
                @if($set->exercise_id == $exercise->id)
   
                    {!! Form::model($set,['method'=>'PATCH','action'=> ['PlansController@updateSet', $set->id]]) !!}
                    {{ csrf_field() }}
                        
                                   <div class="form-group">
                                            {!! Form::label('weight', 'Weight:') !!}
                                            {!! Form::text('weight',null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                        </div>
                          <div class="form-group">
                                            {!! Form::label('reps', 'Reps:') !!}
                                            {!! Form::text('reps', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                        </div>
                            
                            
                              
                      

                     
                      <a href="{{ url('/admin/plans/' . $exercise->id . '/addSet') }}" class="btn btn-xs btn-info pull-right">Add set</a>
                        <div class="form-group">
                            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

  @endif
                            @endforeach
                 @endforeach
          
            @endif
                       
        </div>
        @endforeach
    @endif
    </div>
     
</div>
    
    
    @endsection