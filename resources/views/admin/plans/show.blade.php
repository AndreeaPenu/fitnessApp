@extends('layouts.dashboard')

@section('content')


    <h1>Title: {{$plan->title}}</h1>
    <h2>Description: {{$plan->description}}</h2>
    <h3>Made by: {{$plan->user->name}}</h3>
    <p>Hieronder komen de Workouts die bij dit Workout Plan horen</p>
    <hr>
    <a href="{{ url('/admin/workouts/create') }}" class="btn btn-xs btn-info pull-right">Add new workout</a>

        @if($workouts)
        @foreach($workouts as $workout)
           <p>{{$workout->id}}. <a href="{{ url('/admin/workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-info pull-right">{{$workout->name}}</a></p> 
        @endforeach
    @endif
    
    @endsection