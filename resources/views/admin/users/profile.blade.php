@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                Profile
            </div>

            <div class="card-body">
                        
                <p>Picture: <img height="50" src="{{$user->photo ? $user->photo->file : '/images/placeholder.png'}}" alt=""></p>
                <p>Name: {{ Auth::user()->name }}</p>
                <p>Gender: {{ Auth::user()->gender }}</p>
                <p>Age: {{ Auth::user()->age }}</p>
                <p>Height: {{ Auth::user()->height }} cm</p>
                <p>Weight: {{ Auth::user()->weight }} kg</p>

                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-xs btn-primary pull-right">Edit</a>
            
                <div id="app">
                    <line-chart></line-chart>
                </div>
            </div>
        </div>

     

    </div>

@endsection
