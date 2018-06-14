@extends('layouts.dashboard')

@section('content')

{!! Form::open(['method'=>'POST', 'id'=>'setForm', 'action'=>['WorkoutsController@updateSet', $workout->id]]) !!}
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
            <h1>{{ $exercise->name }}</h1> 
        </div>
        <div class="card-body">
                <!-- show sets here -->
               
                     
                        
                            <div>
                                <input type="hidden" name="exercise_id[]" value="{{$exercise->id}}"/>
                               
                                <label for="weight">Weight:</label> 
                                <input type="text" name="weight[]" value=""/> 
                                
                                <label for="reps">Reps:</label>
                                <input type="text" name="reps[]" value=""/>
                                

                            </div>
                
                               
                           
                    <input type="button" class="btn btn-primary" onclick="addSet({{$exercise->id}})" id="{{$exercise->id}}" value="Add set"/>            
        </div>
    </div>
       @endforeach
    @endif
      
  
     
</div>  
    
    {!! Form::close() !!}
@endsection