@extends('layouts.dashboard')

@section('content')
        <h1>Edit Workout Plan</h1>

        <div class="col-sm-9">

            {!! Form::model($plan,['method'=>'PATCH','action'=> ['PlansController@update', $plan->id]]) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update Workout Plan', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['PlansController@destroy', $plan->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete Workout Plan', ['class'=>'btn btn-danger']) !!}
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