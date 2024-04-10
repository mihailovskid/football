<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('components.header');

        <main class="container">
            @if(session()->has('success'))
                <div class="alert alert-success d-flex align-items-center mb-0" role="alert">
                    <div>{{ session()->get('success') }}</div>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger d-flex align-items-center mb-0" role="alert">
                    <div>{{ session()->get('error') }}</div>
                </div>
            @endif
            <div class="row justify-content-center py-5">
                @yield('content')
            </div>
        </main>
    </div>
    
    <script src="https://kit.fontawesome.com/3b2a155ba0.js" crossorigin="anonymous"></script>
</body>
</html>
