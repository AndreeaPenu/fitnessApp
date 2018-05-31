@extends('layouts.dashboard')

@section('content')

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
    
        @endsection