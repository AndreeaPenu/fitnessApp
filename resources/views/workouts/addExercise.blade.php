@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Workout: {{ $workout->title }}</h1>
        </div>

        <div class="card-body">
           
            {!! Form::model($workout,['class'=>'form','method'=>'POST','action'=> ['WorkoutsController@storeExercises', $workout->id]]) !!}
            {{ Form::hidden('id', $workout->id) }}
                {{ csrf_field() }}

                @if($exercises)
                    @foreach($exercises as $key => $exercise)
                          <div class="inputGroup">
                            <input id="exercises{{$key+1}}" name="exercises[]" type="checkbox" value="{{$exercise->name}}"/>
                            <label for="exercises{{$key+1}}">{{ $exercise->name }}</label>
                        </div>
                    @endforeach
                @endif

                <div>
                    <input id="submit" type="submit" name="submit" value="Add exercises to my workout plan" />
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
