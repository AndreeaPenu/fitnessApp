@extends('layouts.dashboard')

@section('content')
        <h1>Edit Workout</h1>

        <div class="col-sm-9">

            {!! Form::model($workout,['method'=>'PATCH','action'=> ['WorkoutsController@update', $workout->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::label('exercises', 'Exercises:') }}
			        {{ Form::select('exercises[]', $exercises2, null, ['multiple' => 'multiple']) }}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update Workout', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['WorkoutsController@destroy', $workout->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete Workout', ['class'=>'btn btn-danger']) !!}
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
        </div>

    
    @endsection