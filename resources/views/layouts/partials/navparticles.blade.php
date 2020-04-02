<nav class="uk-navbar-container uk-navbar-transparent uk-container uk-margin uk-light uk-position-top uk-position-z-index" uk-navbar="mode: click">
    <div class="uk-navbar-left">              
        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">{{ config('app.name', 'Cakyoga') }}</a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav navbar-primary">
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
                    <li><a href='/home'>Home</a></li>
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
        <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a>                         
    </div>
</nav>