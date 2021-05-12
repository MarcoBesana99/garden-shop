<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top" id="navbarMenu">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
                    {{ __('Eurazijos agro') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                Home
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Test
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Test
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <select class="form-control" onchange="location = this.value">
                                <option value="{{ route(Route::currentRouteName(), 'en') }}"
                                    {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                                <option value="{{ route(Route::currentRouteName(), 'ru') }}"
                                    {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>RU</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
    @yield('scripts')
    @stack('scripts')
</body>

</html>
