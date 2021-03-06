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
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        
        <!-- Custom -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
    <body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="/images/Dumbel-Logo-White.svg" width="80" height="50" class="d-inline-block align-top" alt="dumbel">
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn-menu" onclick="openNav()" href="#">Menu</a>
            </li>
        </ul>
    </nav>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="{{ url('/')}}">Home</a>
            <a href="{{ url('about')}}">About Us</a>
            @auth
            <a href="{{ url('workouts')}}">Dashboard</a>
            @endauth
            @guest
            <a href="{{ url('login')}}">Dashboard</a>
            @endguest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    <div class="hero">
        <div class="container">
            <h3>Three months</h3> <br>
            <h3>from now</h3> <br>
            <h3>you will</h3> <br>
            <h3>thank yourself.</h3>
       

            <div class="to-right">
                    <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Get started</a>
            </div>
        </div>
    </div>
    



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
        <script>
            function openNav() {
                document.getElementById("myNav").style.width = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
            }
        </script>
    </body>
</html>
