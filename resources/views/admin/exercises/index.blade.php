<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

        <h1>Exercises</h1>

        <h2>All exercises</h2>

        <table style="width:100%" class="w3-table w3-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Sets</th>
            <th>Reps</th>
            <td>Weight</td>
        </tr>
        @if($exercises)
            @foreach($exercises as $exercise)
            <tr>
                <td>{{$exercise->id}}</td>
                <td>{{$exercise->name}}</td>
                <td>{{$exercise->sets}}</td>
                <td>{{$exercise->reps}}</td>
                <td>{{$exercise->weight}}</td>
            </tr>
            @endforeach
        @endif
        </table>
    </body>
</html>