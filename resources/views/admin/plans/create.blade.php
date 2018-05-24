<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dumbel</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Open+Sans" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
        <!-- Custom -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
    <body>
    
        <div class="left-nav">
            <a class="navbar-brand" href="#">
                <img src="/images/dumbel-white.svg" width="30" height="30" class="d-inline-block align-top" alt="dumbel">
                Dumbel
            </a>
            <div class="nav-links">
                <a href="">Feed</a>
                <a href="">Profile</a>
                <a href="">Workouts</a>
                <a href="">Agenda</a>
                <a href="">Settings</a>
            </div>
        </div>

        <div class="container">
            
            <h1>Create new Workout Plan</h1>

            {!! Form::open(['method'=>'POST','action'=>'PlansController@store']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', null, ['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('workouts', 'Workouts:') !!}
                
                    <select class="form-control" name="workouts[]">
                    @foreach($workouts as $workout)
                        <option value="{{ $workout->id }}">{{ $workout->name }}  
                  <!--           @foreach($workout->exercises as $exercise)
                                <p>{{$exercise->name}}</p>
                            @endforeach -->
                          </option>               
                    @endforeach
                    </select>
                </div> 

                <div class="form-group">
                    {!! Form::label('exercises', 'Exercises:') !!}
                
                    <select class="form-control" name="exercises[]" multiple>
                        <option>--exercises--<option>
                    </select>
                </div> 

          
                <div class="form-group">
                    {!! Form::submit('Create Workout Plan', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('select[name="workouts[]"]').on('change', function(e){
                    var workoutId = e.target.value;
                    if(workoutId) {
                        $.ajax({
                            url: '/admin/plans/create/'+workoutId,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                                $('select[name="exercises[]"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="exercises[]"]').append('<option value="'+ key +'">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="exercises[]"]').empty();
                    }
                    });

                });
        </script>
    </body>
</html>