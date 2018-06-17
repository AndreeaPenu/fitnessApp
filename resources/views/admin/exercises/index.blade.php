@extends('layouts.dashboard')

@section('content')

<div class="container">

<div class="card">
    <div class="card-header">
        All exercises
    </div>
    <div class="card-body">
        <table style="width:100%" class="w3-table w3-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
    
            </tr>
            @if($exercises)
                @foreach($exercises as $exercise)
                <tr>
                    <td>{{ $exercise->id }}</td>
                    <td>{{ $exercise->name }}</td>
                    <td><a href="{{ url('/') }}/admin/exercises/{{ $exercise->id }}/edit" class="btn btn-secondary">Edit</a></td>
                </tr>
                @endforeach
            @endif
            </table>
    </div>
</div>
        

       
    
</div>
        
@endsection