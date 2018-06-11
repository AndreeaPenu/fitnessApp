@extends('layouts.dashboard')

@section('content')

<div class="container">
<div class="card">
        <div class="card-header">
            <h1>Edit Workout</h1>
        </div>
        <div class="card-body">
             <div class="col-sm-9">

            {!! Form::model($workout,['method'=>'PATCH','action'=> ['WorkoutsController@update', $workout->id]]) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', null, ['class'=>'form-control']) !!}
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
        </div>
    </div>


       
</div>
        

    
    @endsection