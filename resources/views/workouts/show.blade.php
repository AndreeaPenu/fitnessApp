@extends('layouts.dashboard')

@section('content')

{!! Form::open(['method'=>'POST', 'id'=>'setForm', 'action'=>['WorkoutsController@updateSet', $workout->id]]) !!}
                    {{ csrf_field() }}

<a href="{{ URL::previous() }}"><img class="arrow-back" src="{{ asset('/images/left-arrow.svg') }}" alt="left arrow"></a>
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">

        <div class="col-md-11">
            <h1>{{$workout->title}}</h1>
            <h4>{{$workout->description}}</h4>
        </div>

    </div>
    </br>
    <!-- show exercises here -->
    @if($exercises)
        @foreach($exercises as $exercise)
    <div class="card">
        <div class="card-header">
            {{ $exercise->name }}
        </div>
        <div class="card-body">
                <!-- show sets here -->
                            <div class="row">
                                <input type="hidden" name="exercise_id[]" value="{{$exercise->id}}"/>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="weight">Weight:</label> 
                                        <input class="form-control" type="number" name="weight[]" value=""/> 
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="reps">Reps:</label>
                                        <input class="form-control" type="number" name="reps[]" value=""/>
                                    </div>
                                </div> 

                            </div>          
                        <input type="button" class="btn btn-primary" onclick="addSet({{$exercise->id}})" id="{{$exercise->id}}" value="Add set"/>            
          </div>
    </div>
       @endforeach
    @endif
      
    <div class="to-right">

{!! Form::submit('Save', ['class'=>'btn btn-success']) !!}

</div>
     
</div>  
    
    {!! Form::close() !!}
@endsection