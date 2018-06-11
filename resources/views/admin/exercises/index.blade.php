@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Exercises</h1>

        <h2>All exercises</h2>

        <table style="width:100%" class="w3-table w3-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
 
        </tr>
        @if($exercises)
            @foreach($exercises as $exercise)
            <tr>
                <td>{{ $exercise->id }}</td>
                <td>{{ $exercise->name }}</td>
            </tr>
            @endforeach
        @endif
        </table>
    
</div>
        
@endsection