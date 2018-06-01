@extends('layouts.dashboard')

@section('content')

<div class="container">
     <div class="card">
        <div class="card-header">
            <h1>Edit Exercise</h1>
        </div>
        <div class="card-body">
    <div class="col-sm-9">

                {!! Form::model($exercise,['method'=>'PATCH','action'=> ['ExercisesController@update', $exercise->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('sets', 'Sets:') !!}
                    {!! Form::text('sets', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('reps', 'Reps:') !!}
                    {!! Form::text('reps', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('weight', 'Weight:') !!}
                    {!! Form::text('weight', null, ['class'=>'form-control']) !!}
                </div>


                    <div class="form-group">
                        {!! Form::submit('Update exercise', ['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE', 'action'=>['ExercisesController@destroy', $exercise->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete exercise', ['class'=>'btn btn-danger']) !!}
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