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



      <form method="post" action="{{action('PlansController@create')}}"> <!-- {{action('PlansController@create')}} -->
      {{ csrf_field() }}
      @foreach($exercises as $exercise)
        <div>
          <input type="checkbox" id="myCheckboxes" name="myCheckboxes[]" value="{{$exercise->name}}">
          <label for="myCheckboxes[]">{{$exercise->name}}</label>
        </div>
        @endforeach
        <div>
          <input id="submit" type="submit" name="submit" value="Add exercises to my workout plan" />
        </div>
      </form>


  @if($checked)
      @foreach($checked as $check)
        <p>{{$check}}</p>
      @endforeach
    @endif



        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>


<?php
  if(isset($_POST["submit"])){
    if(!empty($_POST["myCheckboxes"])){
      echo '<h3> You have selected : </h3>';
      foreach($_POST["myCheckboxes"] as $checkbox){
        echo '<p>' . $checkbox . '</p>';
      }
    } else {
      echo 'Please select at least one exercise';
    }

  }

?>