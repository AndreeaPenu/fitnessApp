@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>404 - Oops </h1>
            <h5>not sure what you are looking for..</h5>
            <a href="{{ URL::previous() }}"><img class="arrow-back" src="{{ asset('/images/left-arrow.svg') }}" alt="left arrow">Let's go back</a>
        </div>
    </div>
</div>



@endsection