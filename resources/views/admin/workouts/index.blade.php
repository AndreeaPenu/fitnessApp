@extends('layouts.dashboard')

@section('content')

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
    
        @endsection