<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

    @if(Session::has('deleted_plan'))
        <p>{{session('deleted_plan')}}</p>
    @endif

    <h1>Workout plans</h1>

    <table style="width:100%" class="w3-table w3-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Made by</th>
        <th>Add to plans</th>
    </tr>
    @if($plans)
        @foreach($plans as $plan)
        <tr>
            <td>{{$plan->id}}</td>
            <td>{{$plan->title}}</td>
            <td>{{$plan->description}}</td>
            <td>{{$plan->user->name}}</td>
            <td><a href="{{ url('/admin/plans/' . $plan->id . '/add') }}" class="btn btn-xs btn-info pull-right">Add plan</a></td>
        </tr>
        @endforeach
    @endif
    </table>

    </body>
</html>