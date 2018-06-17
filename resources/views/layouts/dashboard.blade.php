<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dumbel</title>

    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>

        <nav class="navbar navbar-expand-md navbar-light bg-dark sticky-top ">
             <a class="navbar-brand py-2" href="/">
            <img src="/images/Dumbel-Logo-Color.svg" width="80" height="50" class="d-inline-block align-top" alt="dumbel">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggle" aria-controls="navToggle" aria-expanded="false" aria-label="Toggle navigation">
           MENU
        </button>

        <div class="collapse navbar-collapse" id="navToggle">
       
            <ul class="nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('workouts*')) active @endif" href="/workouts">Workouts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('agenda')) active @endif" href="/agenda">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('showFriends')) active @endif" href="/showFriends">Friends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('users*')) active @endif" href="/users/{{Auth::user()->id}}">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if (Request::is('admin*')) active @endif" href="/admin">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

    
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="footer">
      <div class="container">
        <span>Dumbel &copy;2018</span>
      </div>
    </footer>
    
    <script>

        function addSet(id){
            $("#setForm").find('#'+id).before('<div class="row"><input type="hidden" name="exercise_id[]" value="'+ id + '"/><div class="col"><div class="form-group"><label for="weight">Weight:</label><input class="form-control" type="text" name="weight[]"></div></div><div class="col"><div class="form-group"><label for="reps">Reps:</label><input class="form-control" type="text" name="reps[]"></div></div></div>');
        }

    </script>
</body>
</html>
