@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div id="app">
        <agenda :workouts="{{$workouts}}"></agenda>
    </div>
</div>
@endsection
