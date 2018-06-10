@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Friends</div>
                <div class="card-body">   
                    <ul>
                    @foreach($allFriends as $friend)
                        <li>{{$friend->user_requested}}
                            @foreach($users as $user)
                                @if($user->id == $friend->user_requested)
                                <a href="{{ url('/admin/users/profile/1') }}">{{$user->name}}</a> 
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