@extends('layouts.dashboard')

@section('content')


        <div class="container">
            
            <h1>Create new Workout Plan</h1>

             {!! Form::open(['method'=>'POST','action'=>'PlansController@store']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('workouts', 'Workouts:') !!}
                
                    <select class="form-control" name="workouts[]">
                    @foreach($workouts as $workout)
                        <option value="{{ $workout->id }}">{{ $workout->name }}  
                  <!--           @foreach($workout->exercises as $exercise)
                                <p>{{$exercise->name}}</p>
                            @endforeach -->
                          </option>               
                    @endforeach

                     </select>
                </div> 

                <div class="form-group">
                    {!! Form::label('exercises', 'Exercises:') !!}
                
                    <select class="form-control" name="exercises[]" multiple>
                        <option>--exercises--<option>
                    </select>
                </div> 

          
                <div class="form-group">
                    {!! Form::submit('Create Workout Plan', ['class'=>'btn btn-primary']) !!}
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
