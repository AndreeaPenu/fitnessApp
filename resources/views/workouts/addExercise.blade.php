@extends('layouts.dashboard')

@section('content')

<div class="container"> 
            {!! Form::model($workout,['class'=>'form','method'=>'POST','action'=> ['WorkoutsController@storeExercises', $workout->id]]) !!}
            {{ Form::hidden('id', $workout->id) }}
                {{ csrf_field() }}

                <div>
                    <input id="submit" class="btn btn-primary mb-3" type="submit" name="submit" value="Add to workout" />
                </div>

                @if($exercises)
                    @foreach($exercises as $key => $exercise)
    <div class="card">
        <!--   <div class="card-header">
         <h1>Workout: {{ $workout->title }}</h1> 
        </div>-->

        <div class="card-body">
          
                          <div class="inputGroup">
                            <input id="exercises{{$key+1}}" name="exercises[]" type="checkbox" value="{{$exercise->name}}"/>
                            <label for="exercises{{$key+1}}">{{ $exercise->name }}</label>
                        </div>
             
        </div>
    </div>       @endforeach
                @endif

         

            {!! Form::close() !!}
</div>
@endsection
