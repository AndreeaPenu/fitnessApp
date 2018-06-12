@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Friend requests</div>
             
                <div class="card-body">   
                    <ul>
                    @foreach($FriendRequests as $u)
                        <li>{{$u->name}} 
                            <a href="{{ url('/') }}/accept/{{ $u->id }}" class="btn btn-success">Accept request</a>
                        </li>
                    @endforeach
                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection