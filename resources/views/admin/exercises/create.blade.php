@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create new Exercise</h1>

        </div>
        <div class="card-body">
             {!! Form::open(['method'=>'POST','action'=>'ExercisesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <!-- SETS -->

            <div class="form-group">
                {!! Form::submit('Create Exercise', ['class'=>'btn btn-primary']) !!}
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

       


    
    @endsection