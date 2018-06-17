@extends('layouts.dashboard')

@section('content')
<a href="{{ URL::previous() }}"><img class="arrow-back" src="{{ asset('/images/left-arrow.svg') }}" alt="left arrow"></a>
<div class="container">

<div class="card">
    <div class="card-header">
      My workouts   
    </div>

    <div class="card-body">
        <table style="width:100%" class="w3-table w3-striped">
                <tr>
             
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                @if($userWorkouts)
                    @foreach($userWorkouts as $userWorkout)
                            <tr>
                                <td>{{ $userWorkout->title }}</td>
                                <td>{{ $userWorkout->description }}</td>
                                <td> <a href="{{ url('workouts/' . $userWorkout->id . '') }}" class="btn btn-xs btn-primary pull-right">start</a>
                     <a href="{{ url('workouts/' . $userWorkout->id . '/change') }}" class="btn btn-xs btn-secondary pull-right">edit</a></td>
                            </tr>
                    @endforeach
                @endif
            </table>
    </div>
</div>

</div>
@endsection