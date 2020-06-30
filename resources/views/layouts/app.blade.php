<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


</head>
<body>
    <div id="app">
    <nav class="navbar navbar-light navbar-expand-lg static-top header_links">
            <div class="container">
                    Admin
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item">
                                <a class="nav-link header_links "  href="#"  >Home
                                        <span class="header_links sr-only">(current)</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                <a class=" nav-link" href="#">About</a>
                                </li>

                                <li class="nav-item">
                                <a class="header_links nav-link" href="#">Services</a>
                                </li>

                                <li class="nav-item">
                                <a class="header_links nav-link" href="#">Contact</a>
                                </li>
                            </ul>

                    </div>
            </div>
       </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
