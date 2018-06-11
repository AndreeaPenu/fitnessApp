@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Friends</div>
             
                <div class="card-body">   
                    <ul>
                    @foreach($allUsers as $u)
                        <li>{{ $u->name }} 
                        
                        <?php 
                            $check = DB::table('friendships')
                            ->where('user_requested', '=', $u->id)
                            ->where('requester', '=', Auth::user()->id)
                            ->first();
                            if($check == '') {
                                ?>   
                            
                            
                            <a href="{{ url('/') }}/addFriend/{{ $u->id }}" class="btn btn-success">Add to friends</a>
                                <?php } else { ?>
                                    <p>Request already sent</p>
                                <?php  }?>
                               
                        </li>
                    @endforeach
                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection