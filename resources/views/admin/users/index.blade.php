<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

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
            <td> <img height="50" src="{{$user->photo ? $user->photo->file : ''}}" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif
    </table>

    </body>
</html>
