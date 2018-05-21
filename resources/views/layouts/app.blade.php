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
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="/images/dumbel-white.svg" width="30" height="30" class="d-inline-block align-top" alt="dumbel">
                Dumbel
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
