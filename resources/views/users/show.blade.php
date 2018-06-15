@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                Profile
            </div>

            <div class="card-body profile-card text-center">
                <div class="row">
            <div class="col-md-12">
                <img class="round-pic" height="150" src="{{$user->photo ? $user->photo->file : '/images/placeholder.png'}}" alt="">
              
            </div>
                          
              
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                         <p>Hi, my name is {{ $user->name }}</p>
                <p>Gender: {{ $user->gender }}</p>
                <p>Age: {{ $user->age }}</p>

  @if($user->id != Auth::user()->id)
                  <?php 
                                            $check = DB::table('friendships')
                                            ->where('user_requested', '=', $user->id)
                                            ->where('requester', '=', Auth::user()->id)
                                            ->first();
                                            if($check == '') {
                                                ?>   
                                            
                                            
                                            <a href="{{ url('/') }}/addFriend/{{ $user->id }}" class="btn btn-secondary">Send request</a>
                                                <?php } else { ?>
                                                   <p>Request sent</p>
                                                <?php  }?>

                            @endif

               
                    </div>
               
                </div>
                    
               

            @if($user->id == Auth::user()->id)

                <p>Height: {{ $user->height }} cm</p>
                @if($weight)
                <p>Weight: {{ $weight->weight }} kg</p> 
                @endif
               <!-- <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-xs btn-primary pull-right">Edit</a> -->
                <!-- Button trigger modal -->
                <div class="to-right">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        New weight entry
                    </button>
                </div>
               
                
                  <div id="app" class="mt-4">
                    <line-chart :w="{{ $weights }}"></line-chart>
                  </div>
            @endif
            </div>
        </div>
        @if($user->id != Auth::user()->id)
        <div class="card">
            <div class="card-header">
                My workouts
            </div>
            <div class="card-body">
            <table style="width:100%" class="w3-table w3-striped">
                <tr>
              
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                @if($workouts)
                    @foreach($workouts as $workout)
                     @if($workout->user_id == $user->id)
                    <tr>
                      
                        <td>{{ $workout->title }}</td>
                        <td>{{ $workout->description }}</td>
                       
                        <td><a href="{{ url('workouts/' . $workout->id . '/add') }}" class="btn btn-xs btn-secondary pull-right">+ ADD</a></td>
                    </tr>
                    @endif
                    @endforeach
                @endif
                </table>
            </div>
        </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Weight entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {!! Form::open(['method'=>'POST','action'=>'HomeController@addWeight','files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('weight', 'Weight:') !!}
                        {!! Form::text('weight', null, ['class'=>'form-control']) !!}
                    </div>

                    
                <div class="form-group">
                    {!! Form::submit('Add weight entry', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <!--  <a href="{{ url('/admin/users/' . $user->id . '/addWeight') }}" class="btn btn-xs btn-primary pull-right">Add weight entry</a>-->
                </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
