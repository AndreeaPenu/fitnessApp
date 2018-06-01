@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Title: {{$plan->title}}     <a href="{{ url('/admin/workouts/create') }}" class="btn btn-xs btn-info pull-right">Add new workout</a></h1>
    <h4>Description: {{$plan->description}}</h4>
    <h6>Made by: {{$plan->user->name}}</h6>
    <p>Hieronder komen de Workouts die bij dit Workout Plan horen</p>
    <hr>


</br>


    <div class="card">
    @if($workouts)
        @foreach($workouts as $workout)
        <div class="card-header">
            <p>{{$workout->id}}. {{$workout->name}}  <a href="{{ url('/admin/workouts/'. $workout->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a></p> 
        </div>

        <div class="card-body">
            <!-- show exercises here -->
            @if($exercises)
                @foreach($exercises as $exercise)
                    <p>{{$exercise->id}} . {{$exercise->name}} -> Sets: {{$exercise->sets}} x  Reps: {{$exercise->reps}} x Weight: {{$exercise->weight}} </p>
                @endforeach
            @endif
                       
        </div>
        @endforeach
    @endif
    </div>
     
</div>
    
    
    @endsection