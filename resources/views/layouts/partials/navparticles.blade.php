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
        <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a>                         
    </div>
</nav>