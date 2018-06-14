@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create new Workout</h1>
        </div>
        <div class="card-body">
    {!! Form::open(['method'=>'POST','action'=>'WorkoutsController@store']) !!}
    {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', null, ['class'=>'form-control']) !!}
                </div>

                <h2>Exercises</h2>

                @if($exercises)
                    @foreach($exercises as $key => $exercise)
                    <div class="inputGroup">
                            <input id="exercises{{$key+1}}" name="exercises[]" type="checkbox" value="{{$exercise->name}}"/>
                            <label for="exercises{{$key+1}}">{{ $exercise->name }}</label>
                        </div>
                        {!! Form::hidden('muscle_group[]', $exercise->muscle_group) !!}
                    @endforeach
                @endif

                <div class="form-group">
                    {!! Form::submit('Create Workout', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>   
@endsection