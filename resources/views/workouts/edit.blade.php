@extends('layouts.dashboard')

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
        <div class="card-header">
                Edit Workout
        </div>
        <div class="card-body">
            

            {!! Form::model($workout,['method'=>'PATCH','action'=> ['WorkoutsController@update', $workout->id]]) !!}
                


                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                            {!! Form::label('title', 'Title') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                            {!! Form::label('description', 'Description') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::text('description', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>


<div class="to-right">
            <div class="form-group">
                    {!! Form::submit('Update Workout', ['class'=>'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['WorkoutsController@destroy', $workout->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete Workout', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
</div>
        

            
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