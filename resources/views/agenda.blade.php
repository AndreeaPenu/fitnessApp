@extends('layouts.dashboard')

@section('content')
<div class="container">

@foreach($workouts as $workout)
<ul>
    <li>{{$workout->id}} {{ $workout->title}} {{$workout->created_at}}</li>
</ul>
   
@endforeach

    <div id="app">
        <agenda :workouts="{{$workouts}}"></agenda>
    </div>
</div>
@endsection
