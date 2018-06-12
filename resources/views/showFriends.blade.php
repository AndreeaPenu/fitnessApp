@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ url('/') }}/users" class="btn btn-success">Find Friends</a>
            <div class="card">
                <div class="card-header">My Friends</div>
                <div class="card-body">   
                    <ul>
                    @foreach($allFriends as $friend)
                        <li class="mb-3">
                            @foreach($users as $user)
                                @if($user->id == $friend->user_requested)
                                <img class="round-pic" height="50" src="{{$user->photo ? $user->photo->file : '/images/placeholder.png'}}" alt="">
                                <a href="{{ url('/') }}/users/{{ $user->id }}">{{$user->name}}</a> 
                                @endif
                            @endforeach
                            </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection