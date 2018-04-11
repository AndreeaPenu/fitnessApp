<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

    @if(Session::has('deleted_user'))
        <p>{{session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <table style="width:100%" class="w3-table w3-striped">
    <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th> 
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
        <th>Updated</th>
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
        </tr>
        @endforeach
    @endif
    </table>

    </body>
</html>
