@extends('layouts.dashboard')

@section('content')
        <h1>Create new Workout</h1>

        {!! Form::open(['method'=>'POST','action'=>'WorkoutsController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <h2>Exercises</h2>

            <div class="form-group">
                {!! Form::label('exercises', 'Exercises:') !!}
                <select class="form-control" name="exercises[]" multiple>
                    @foreach($exercises as $exercise)
                        <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                    @endforeach
                </select>
            </div> 


            <div class="form-group">
                {!! Form::submit('Create Workout', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    
    @endsection