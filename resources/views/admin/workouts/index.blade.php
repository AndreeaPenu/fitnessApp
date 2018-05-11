<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

        <h1>Workouts</h1>

        <h2>All workouts</h2>

        <table style="width:100%" class="w3-table w3-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @if($workouts)
            @foreach($workouts as $workout)
            <tr>
                <td>{{$workout->id}}</td>
                <td><a href="{{ url('/admin/workouts/' . $workout->id . '') }}" class="btn btn-xs btn-info pull-right">{{$workout->name}}</a></td>              
            </tr>
            @endforeach
        @endif
        </table>
    </body>
</html>