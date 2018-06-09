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
                @foreach($weights as $weight)
                <p>Weight: {{ $weight->weight }} kg</p> 
                @endforeach
                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn btn-xs btn-primary pull-right">Edit</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                New weight entry
                </button>
                
                  <div id="app" class="mt-4">
                    <line-chart :w="{{$weights}}"></line-chart>
                  </div>
                  
            </div>
        </div>

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
                {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@addWeight','files'=>true]) !!}
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
