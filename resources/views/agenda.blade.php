@extends('layouts.dashboard')

@section('content')
<div class="container">
     <div id="app">
        <agenda :workouts="{{$myWorkouts}}"></agenda>
    </div>
</div>
@endsection
