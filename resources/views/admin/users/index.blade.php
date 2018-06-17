@extends('layouts.dashboard')

@section('content')

<div class="container">


 @if($user->role_id == 1)

 <div class="to-right">
        <a href="{{ url('/') }}/admin/exercises/create" class="btn btn-secondary">Add exercises</a>

 </div>
      



     @if(Session::has('deleted_user'))
     <div class="alert alert-success" role="alert">
        <p>{{session('deleted_user')}}</p>
        </div>
    @endif


<div class="card">
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
<table style="width:100%" class="w3-table w3-striped">
    <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th> 
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
        <th>Updated</th>
        <th></th>
    </tr>
    @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td> <img height="50" src="{{$user->photo ? $user->photo->file : '/images/placeholder.png'}}" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td><a href="{{ url('/') }}/admin/users/{{ $user->id }}/edit" class="btn btn-secondary">Edit</a></td>
        </tr>
        @endforeach
    @endif
    </table>
    </div>
  

    
</div>

 @else
        <h1>You are not an administrator, nice try.</h1>
    @endif
    
</div>
   
    
    @endsection