@extends('layouts.dashboard')

@section('content')


<div class="container">
<div id="app">
        <workout-chart :s="{{$sets}}"></workout-chart>
    </div>
</div>
@endsection