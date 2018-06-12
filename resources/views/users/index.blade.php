@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Friends</div>
             
                <div class="card-body">   
                   
                    @foreach($users as $u)
                        @if($u->id != Auth::user()->id)
                        <div class="row">
                            <img height="50" src="{{$u->photo ? $u->photo->file : '/images/placeholder.png'}}" alt="">
                        <div class="col-md">
                            <a href="{{ url('/') }}/users/{{ $u->id }}">{{$u->name}}</a> 
                        </div>
                        <div class="col-md">
                                 <p>Since {{$u->created_at}}</p>
                        </div>
                    
            
                        
                        <?php 
                            $check = DB::table('friendships')
                            ->where('user_requested', '=', $u->id)
                            ->where('requester', '=', Auth::user()->id)
                            ->first();
                            if($check == '') {
                                ?>   
                            
                            
                            <a href="{{ url('/') }}/addFriend/{{ $u->id }}" class="btn btn-success">Send request</a>
                                <?php } else { ?>
                                    <p>Request already sent</p>
                                <?php  }?>
                               
                     </div>
                     @endif
                    @endforeach
                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection