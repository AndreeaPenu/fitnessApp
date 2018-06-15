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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="/images/Dumbel-Logo-White.svg" width="80" height="50" class="d-inline-block align-top" alt="dumbel">
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" onclick="openNav()" href="#">Menu</a>
                </li>
            </ul>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
</body>
</html>
