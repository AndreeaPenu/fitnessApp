@extends('layouts.dashboard')

@section('content')

    <h1>Title: {{$workout->name}}</h1>

    <p>Hieronder komen de exercises die bij dit Workout Plan horen</p>
    <hr>
    <a href="{{ url('/admin/exercises/create') }}" class="btn btn-xs btn-info pull-right">Add new exercise</a>

        @if($exercises)
        @foreach($exercises as $exercise)
           <p>{{$exercise->id}}. {{$exercise->name}}</p> 
        @endforeach
    @endif
    
    @endsection