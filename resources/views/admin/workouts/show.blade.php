<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>


    <h1>Title: {{$workout->name}}</h1>

    <p>Hieronder komen de exercises die bij dit Workout Plan horen</p>
    <hr>
    <a href="{{ url('/admin/exercises/create') }}" class="btn btn-xs btn-info pull-right">Add new exercise</a>

        @if($exercises)
        @foreach($exercises as $exercise)
           <p>{{$exercise->id}}. {{$exercise->name}}</p> 
        @endforeach
    @endif
    </body>
</html>