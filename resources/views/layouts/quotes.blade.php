<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cakyoga') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/uikit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/uikit.min.js') }}" type="text/javascript" defer>></script>
</head>
<body>
<nav class="uk-navbar uk-navbar-container uk-navbar-transparent uk-container uk-margin uk-light uk-position-top uk-position-z-index">
    <div class="uk-navbar-left">              
        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">{{ config('app.name', 'Cakyoga') }}</a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav uk-visible@s">
            <li><a href="/blog">Blog</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/quotes">Quotes</a></li>
            <li><a href="/home">Home</a></li>
        </ul>                
        <a class="uk-navbar-toggle uk-hidden@s" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a>                         
    </div>
</nav>

<header class="uk-background-primary uk-light uk-position-relative">
    <div class='uk-section uk-section-large@m uk-section-xlarge uk-position-z-index' uk-height-viewport="expand: true">
        @yield('content')                              
    </div>
</div>
</header>

<div id="offcanvas-slide" uk-offcanvas="mode: reveal; overlay: true; flip: true;">
    <div class="uk-offcanvas-bar"><button class="uk-offcanvas-close" type="button" uk-close=""></button>
    <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
        <li><a href="/quotes">Quotes</a></li>
        <li><a href="/list-usaha">List Usaha</a></li>
        <li><a href="/blog">Blog</a></li>
    </ul>
    </div>
</div>
</body>
</html>
