@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="to-right">
                    <a href="{{ url('/') }}/users" class="btn btn-secondary">Find Friends</a>
            </div>
    

        <div class="card">
            <div class="card-header">
          My Requests ({{App\Friendship::where('status',0)->where('user_requested',Auth::user()->id)->count()}})
            </div>
            <div class="card-body">
            <ul>
                    @foreach($FriendRequests as $u)
                        <li> <a href="{{ url('/') }}/users/{{ $u->id }}">{{$u->name}} </a> 
                            <a href="{{ url('/') }}/accept/{{ $u->id }}" class="btn btn-success">Accept request</a>
                        </li>
                    @endforeach
                    </ul>
            </div>
            
        </div>
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