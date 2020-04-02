<div class="uk-background-primary">
<nav class="uk-navbar uk-container uk-light" uk-navbar="mode: click">
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">Cakyoga</a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav uk-visible@s">
            <li><a href="/blog">Blog</a></li>
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
                        <li><a href='/home'>Dashboard</a></li>
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
</div>