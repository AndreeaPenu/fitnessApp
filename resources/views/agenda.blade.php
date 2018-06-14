@extends('layouts.dashboard')

@section('content')

<div class="container">
     <div id="app">
        <agenda :sets="{{$sets}}" :exercises="{{$exercises}}"></agenda>
    </div>
</div>

@endsection
