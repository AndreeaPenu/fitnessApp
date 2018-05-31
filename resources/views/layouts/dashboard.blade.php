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
                <img src="/images/dumbel-white.svg" width="30" height="30" class="d-inline-block align-top" alt="dumbel">
                Dumbel
            </a>
            <div class="nav-links">
                <a href="{{ url('/home/') }}">Feed</a>
                <a href="{{ url('/admin/users/profile/1') }}">Profile</a>
                <a href="{{ url('/admin/plans/') }}">W Plans</a>
                <a href="">Agenda</a>
                <a href="">Settings</a>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
</body>
</html>
