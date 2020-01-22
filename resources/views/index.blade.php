<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cak Yoga</title>

        <link href="{{ asset('/css/uikit.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/uikit.min.js') }}" type="text/javascript"></script>
    </head>
    <body>
            <nav class="uk-navbar-container uk-navbar-transparent uk-container uk-margin uk-light uk-position-top uk-position-z-index" uk-navbar="mode: click">
                    <div class="uk-navbar-left">              
                        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
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
                        <a class="uk-navbar-toggle uk-hidden@s" href="#offcanvas-slide" uk-navbar-toggle-icon="" uk-toggle=""></a>                         
                    </div>
                </nav>
        <header class="uk-background-secondary uk-light uk-position-relative">
            <div id="particles-js"></div>
            <div class='uk-section  uk-section-xlarge'>
                <div class='uk-container uk-container-xsmall'>
                    <div class="intro">
                    <h2 class="section__title section__title--intro">
                        Hi, I am <strong>Yoga Arif Rohman</strong>
                    </h2>
                    <p class="section__subtitle section__subtitle--intro">student college</p>
                    <img src="img/mas-yoga.jpg" alt="a picture of Jane Smith smiling" class="intro__img">
                    </div>                   
                </div>
            </div>
        </header>
        <section class="uk-section uk-section-primary uk-light">
        <div class="uk-container">
        <div class='uk-card uk-child-width-1-5@s uk-grid uk-grid-collapse uk-flex-middle' uk-grid=''>
            <div class='uk-card-body uk-width-3-5@s'>
                <div class="uk-grid-margin uk-grid uk-grid-stack">
                    <div class="uk-width-1-1@m uk-first-column">                        
                    <h2 class='uk-heading-bullet'>Tentang</h2>
                    </div>
                </div>                
                <p>Yoga Arif Rohman, Asal Jember yang sedang melanjutkan studi S1 Teknik Geomatika di ITS, Pribadi yang ingin berguna bagi lingkungan sekitar</p>
            </div>
            <div class='uk-flex-last@s uk-card-media-left uk-cover-container uk-width-2-5@s'>
                <div class="uk-background-cover uk-flex uk-flex-center uk-flex-middle" style="background-image: url('/img/thumbnail-video.png')"  uk-lightbox>
                    <a href="https://www.youtube.com/watch?v=XRrl0-xv1Bo" class="uk-position-center uk-position-z-index" uk-icon="icon: play; ratio: 3;" data-caption="Trailer">
                    <div class="a-video"></div></a>
                    <canvas height='300' width='480'></canvas>
                    </a>
                </div>
            </div>               
        </div>
        </section>
        <section class="uk-section uk-background-secondary uk-light">
        <div class="uk-container">
        <h2 id="c1" class="uk-text-center">Projects</h2>
        <hr class="uk-divider-small uk-text-center"/>        
        <div class="uk-grid-large uk-margin uk-flex-center uk-flex-middle" uk-grid>            
            <div class="uk-width-expand@s" uk-grid>
                <div class="uk-card uk-grid-collapse">
                    <div class="uk-background-primary uk-card-body">
                        <div class="uk-card-badge uk-label">More</div>
                        <h3 class="uk-card-title">{{ $p1->name }}</h3>
                        <p>{{ $p1->description }}</p>
                    </div>
                    <div class="uk-card-media-bottom uk-cover-container">
                        <img src="/img/default-image-post.jpg" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="uk-width-2-3@s" uk-grid>
                <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-card-media-left uk-cover-container">
                        <img src="/img/default-image-post.jpg" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </div>
                    <div class="uk-background-primary uk-card-body">
                        <div class="uk-card-badge uk-label">More</div>
                        <h3 class="uk-card-title">{{ $p2->name }}</h3>
                        <p>{{ $p2->description }}</p>
                    </div>                 
                </div>
                <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-background-primary uk-card-body uk-panel">
                        <div class="uk-card-badge uk-label">More</div>
                        <h3 class="uk-card-title">{{ $p1->name }}</h3>
                        <p>{{ $p1->description }}</p>
                    </div>
                    <div class="uk-card-media-right uk-cover-container">
                        <img src="/img/default-image-post.jpg" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </div>
                </div>                         
            </div>            
        </div>     
        </section>
        <section class="uk-section uk-background-muted">
            <div class="uk-container">
                <h2 id="c1" class="uk-text-center">Informasi</h2>
                <hr class="uk-divider-small uk-text-center"/>
                <div class="post-feed uk-child-width-1-3@m  uk-child-width-1-2@s uk-grid uk-grid-divider" uk-grid="masonry: true">
                    @foreach($posts as $p)
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">                                
                                <img src="{{ $p->thumbnail }}" alt="">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title"><a class="post-card" href={{ $p->guid }}>{{ $p->post_title }}</a></h3>
                                <p>{{ $p->post_excerpt }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="uk-section uk-section-muted uk-dark">
        <div class="uk-container uk-container-small">
        <h2 class="uk-text-center">Agenda</h2>
        <hr class="uk-divider-small uk-text-center"/>
        <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="connect: .switcher-container;">
                <li><a href="#">November</a></li>
                <li><a href="#">Desember</a></li>
                <li><a href="#">Januari</a></li>
        </ul>
        <ul class="uk-switcher switcher-container uk-margin">
                <li><table class="uk-table uk-table-middle uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-width-small">Tanggal</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1-16</td>
                                <td>Sosialisasi dari BPJS Kabupaten</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                <li><table class="uk-table uk-table-middle uk-table-divider">
                        <thead class="uk-text-center">
                            <tr>
                                <th class="uk-width-small">Tanggal</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20-25</td>
                                <td>Kerja bakti desa menyambut tahun baru</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                <li><table class="uk-table uk-table-middle uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-width-small">Tanggal</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>26</td>
                                <td>Salaman</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        </section>
        <section class='uk-section-small uk-background-primary uk-light'>
        <div class='uk-container uk-container-xsmall'>
            <div class='uk-text-center'>                
                @foreach($quotes as $q)
                <h3>"{{ $q->quote }}" - {{ $q->author }}</h3>
                @endforeach
            </div>
        </section>      
        <section class='uk-section-xsmall uk-background-secondary uk-light'>
        <div class='uk-container uk-container-small'>
        <div class='uk-flex uk-flex-center uk-margin uk-grid-small'>           
                <a class='uk-icon-button-default' uk-icon='icon: github'></a>
                <a class='uk-icon-button-default' uk-icon='icon: linkedin'></a>
                <a class='uk-icon-button-default' uk-icon='icon: youtube'></a>
            </div>
        <div class='uk-text-center'>
        <span>Cak Yoga &#169; Copyright 2019. All Rights Reserved.</span>
        </div>
        </div>
        </section>

        <div id="offcanvas-slide" uk-offcanvas="mode: reveal; overlay: true; flip: true;">
            <div class="uk-offcanvas-bar"><button class="uk-offcanvas-close" type="button" uk-close=""></button>
            <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">                
                <li><a href="/blog">Blog</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/quotes">Quotes</a></li>
            </ul>
            </div>
        </div>
        <script src="{{ asset('/js/uikit-icons.min.js') }}" type="text/javascript"></script>        
        <script src="{{ asset('/js/particles.js') }}" type="text/javascript"></script>
    </body>
</html>
