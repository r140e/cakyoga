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
<nav class="uk-navbar-container uk-navbar-transparent uk-container uk-margin uk-light uk-position-top uk-position-z-index" uk-navbar="mode: click">
        <div class="uk-navbar-left">              
        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">{{ config('app.name', 'Cakyoga') }}</a>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav navbar-primary">
                <li><a href="https://cakyoga-blog.netlify.com/">Blog</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/quotes">Quotes</a></li>                     
            </ul>
            <ul class="uk-navbar-nav">
                @guest
                <li><a class="uk-navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>                 
            @else
            <li><a href="#">{{ Auth::user()->name }}</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href='/usaha'>Home</a></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                        </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </ul>
                </div>
            </li>
            @endguest                  
            </ul>                    
            <a class="uk-navbar-toggle uk-hidden@s" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a> 
        </div>
    </nav>

    <header class="bg-header uk-light uk-position-relative">
        <div id="particles-js"></div>
        <div class='uk-section uk-section-xlarge uk-position-z-index' uk-height-viewport="expand: true">
            @yield('content')                              
        </div>
    </div>
    </header>
    
    <div id="offcanvas-slide" uk-offcanvas="mode: reveal; overlay: true; flip: true;">
        <div class="uk-offcanvas-bar"><button class="uk-offcanvas-close" type="button" uk-close=""></button>
        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">                
            <li><a href="https://cakyoga-blog.netlify.com/">Blog</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/quotes">Quotes</a></li>
        </ul>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('/js/uikit-icons.js') }}" type="text/javascript" defer>></script>
    <script src="{{ asset('/js/particles.js') }}" type="text/javascript" defer>></script>
</body>
</html>
