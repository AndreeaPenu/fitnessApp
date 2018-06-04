@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Workout category: {{$workout->name}}</h1>
        </div>

        <div class="card-body">
           
            {!! Form::model($workout,['method'=>'POST','action'=> ['WorkoutsController@storeExercises', $workout->id]]) !!}
            {{ Form::hidden('id', $workout->id) }}
                {{ csrf_field() }}

                @if($exercises)
                    @foreach($exercises as $exercise)
                        <div>
                            <input type="checkbox" id="exerises" name="exercises[]" value="{{$exercise->name}}">
                            <label for="exercises[]">{{$exercise->name}}</label>
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