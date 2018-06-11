<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Custom -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">

        <div class="left-nav">
            <a class="navbar-brand" href="#">
                <img src="images/dumbel-white.svg" width="30" height="30" class="d-inline-block align-top" alt="dumbel">
                Dumbel
            </a>
            <div class="nav-links">
                <a href="{{ url('home') }}">Feed</a>
                <a href="{{ url('profile/1') }}">Profile</a>
                <a href="{{ url('findFriends') }}">Find Friends</a>
                <a href="{{ url('showFriends') }}">Show Friends</a>
                <a href="{{ url('requests') }}">My Friend Requests</a>
                <a href="{{ url('workouts') }}">Workouts</a>
                <a href="{{ url('agenda')}}">Agenda</a>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
</body>
</html>
