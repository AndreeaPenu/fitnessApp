<h1>Add workout</h1>

@if($workouts)
@foreach($workouts as $workout)
    <a href="{{ url('/admin/workouts/' . $workout->id .'/addExercise') }}" class="btn btn-xs btn-danger pull-right">{{$workout->title}}</a>
@endforeach
@endif