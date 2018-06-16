@extends('layouts.dashboard')

@section('content')
<a href="{{ URL::previous() }}"><img class="arrow-back" src="{{ asset('/images/left-arrow.svg') }}" alt="left arrow"></a>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            Edit user
        </div>

        <div class="card-body text-center">
        

    

            {!! Form::model($user,['method'=>'PATCH','action'=> ['UsersController@update', $user->id],'files'=>true]) !!}
            

     
            <img class="round-pic mb-3" width="80" src="{{ $user->photo ? $user->photo->file : '/images/placeholder.png' }}" alt="User Picture">
               
            
            <div class="form-group row">
                <div class="col-md-4">
                     {!! Form::label('photo_id', 'Photo') !!}
                </div>
                <div class="col-md-6">
                     {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
            </div>
        
             
            <div class="form-group row">
                <div class="col-md-4">
                     {!! Form::label('name', 'Name') !!}
                </div>
                <div class="col-md-6">
                     {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                     {!! Form::label('email', 'Email') !!}
                </div>
                <div class="col-md-6">
                     {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>
            </div>
              
            <div class="form-group row">
                <div class="col-md-4">
                     {!! Form::label('password', 'Password') !!}
                </div>
                <div class="col-md-6">
                     {!! Form::password('password', null, ['class'=>'form-control']) !!}
                </div>
            </div>
       

                <div class="to-right">
                     <div class="form-group">
                    {!! Form::submit('Update profile', ['class'=>'btn btn-primary']) !!}
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
</div>
</div>
       

    
    @endsection