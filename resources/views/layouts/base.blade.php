<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ __('Eurazijos agro is a company specialized in delivering greenhouses, mini greenhouses, garden arbors, summer garden showers and other goods from 150 units.') }}"/>

    <title>Eurazijos agro - @yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('img/seedling.png') }}"/>
    <link href="{{ asset('img/seedling.png') }}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div id="app">

        <x-navbar :enParam="$enParam" :ruParam="$ruParam" />

        <main>
            @yield('content')
        </main>

        <x-footer />
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
    <script type="text/javascript">
        $(function() {
            //parallax
            new Rellax('.rellax');
            if ($(window).width() > 767) {
                $(document).scroll(() => {
                    let $nav = $("#navbarMenu");
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                });
            }
        })

    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
