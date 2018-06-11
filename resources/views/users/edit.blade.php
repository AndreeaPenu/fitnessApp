@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Edit user
        </div>

        <div class="card-body">
                   <div class="col-sm-3">
            <img width="50" src="{{ $user->photo ? $user->photo->file : '/images/placeholder.png' }}" alt="User Picture">
        </div>

        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH','action'=> ['UsersController@update', $user->id],'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id', $roles ,null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy', $user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}
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
    

 
</div>
       

    
    @endsection