@extends('layouts.uikitparticles')

@section('content')
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
        <div class="uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-background-secondary uk-background-blend-multiply" style="background-image: url('img/thumbnail-video.jpg')"  uk-lightbox>
            <a href="https://www.youtube.com/watch?v=XRrl0-xv1Bo" class="uk-position-center uk-position-z-index" uk-icon="icon: play; ratio: 3;" data-caption="Trailer">
            <div class="a-video"></div></a>
            <canvas height='300' width='480'></canvas>
            </a>
        </div>
    </div>               
</div>
</section>
<section class="uk-section uk-background-secondary">
    <div class="uk-container">
    <h2 class="uk-light uk-text-center">Projects</h2>
    <hr class="uk-divider-small uk-text-center"/>
    <div class="uk-grid-large uk-margin uk-flex-center uk-flex-middle" uk-grid>
        @if ($p->count() >= 3)
            <div class="uk-width-expand@s" uk-grid>
                <div class="uk-card uk-grid-collapse">
                    <div class="uk-background-muted uk-card-body">                        
                        <h3 class="uk-card-title">{{ $p->first()->name }}</h3>
                        <p>{{ $p->first()->description }}</p>
                    </div>
                    <div class="uk-card-media-bottom uk-cover-container">
                        <img src="/img/default-image-post.jpg" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>
                        <span class="uk-card-badge uk-label">{{ $p->first()->place }}</span>
                    </div>
                </div>
            </div>
            <div class="uk-width-2-3@s" uk-grid>
                <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-card-media-left uk-cover-container">
                        <img src="/img/default-image-post2.jpg" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>                        
                        <span class="uk-card-badge uk-label">{{ $p->skip(1)->first()->place }}</span>
                    </div>
                    <div class="uk-background-muted uk-card-body">
                        <h3 class="uk-card-title">{{ $p->skip(1)->first()->name }}</h3>
                        <p>{{ $p->skip(1)->first()->description }}</p>
                    </div>
                </div>
                <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                    <div class="uk-background-muted uk-card-body uk-panel">
                        <h3 class="uk-card-title">{{ $p->skip(2)->first()->name }}</h3>
                        <p>{{ $p->skip(2)->first()->description }}</p>
                    </div>
                    <div class="uk-card-media-right uk-cover-container">
                        <img src="/img/default-image-post3.jpg" alt="" uk-cover>
                        <canvas width="600" height="400"></canvas>                        
                        <span class="uk-card-badge uk-label">{{ $p->skip(2)->first()->place }}</span>
                    </div>
                </div>                         
            </div>
            @elseif ($p->count() == 2)
            <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                <div class="uk-card-media-left uk-cover-container">
                    <img src="/img/default-image-post2.jpg" alt="" uk-cover>
                    <canvas width="600" height="400"></canvas>                        
                    <span class="uk-card-badge uk-label">{{ $p->first()->place }}</span>
                </div>
                <div class="uk-background-muted uk-card-body">
                    <h3 class="uk-card-title">{{ $p->first()->name }}</h3>
                    <p>{{ $p->first()->description }}</p>
                </div>
            </div>
            <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                <div class="uk-background-muted uk-card-body uk-panel">
                    <h3 class="uk-card-title">{{ $p->skip(1)->first()->name }}</h3>
                    <p>{{ $p->skip(1)->first()->description }}</p>
                </div>
                <div class="uk-card-media-right uk-cover-container">
                    <img src="/img/default-image-post3.jpg" alt="" uk-cover>
                    <canvas width="600" height="400"></canvas>                        
                    <span class="uk-card-badge uk-label">{{ $p->skip(1)->first()->place }}</span>
                </div>
            </div>
            @elseif ($p->count() == 1)
            <div class="uk-card uk-child-width-1-2@s uk-grid-collapse uk-margin" uk-grid>
                <div class="uk-background-muted uk-card-body uk-panel">
                    <h3 class="uk-card-title">{{ $p->first()->name }}</h3>
                    <p>{{ $p->first()->description }}</p>
                </div>
                <div class="uk-card-media-right uk-cover-container">
                    <img src="/img/default-image-post3.jpg" alt="" uk-cover>
                    <canvas width="600" height="400"></canvas>                        
                    <span class="uk-card-badge uk-label">{{ $p->first()->place }}</span>
                </div>
            </div>
        @endif
    </div>
    
    <div uk-slider="center: true">

        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

            <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                @foreach($projects as $p)
                <li>
                    <div class="uk-card uk-card-primary uk-card-body">
                        <div class="uk-card-badge uk-label">{{ $p->place }}</div>
                        <h3 class="uk-card-title">{{ $p->name }}</h3>
                        <p>{{ $p->description }}</p>
                    </div>
                </li>
                @endforeach
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

        </div>

        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

    </div> 
</section>
<section class="uk-section uk-section-muted uk-dark">
	<div class="uk-container">
        <h2 class="uk-text-center">Blog</h2>
        <hr class="uk-divider-small uk-text-center"/>
		<div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid="masonry: true">
		@foreach($data['posts'] as $d)
		<div>
			<div class="uk-card uk-card-default">
				<div class="uk-card-media-top">
					<img src="{!! $d['featured_image'] !!}&fm=jpg&w=610&fit=max" alt="{!! $d['featured_image_caption'] !!}">
                    <div class="uk-card-badge uk-label">{!! $d['read_time'] !!}</div>
				</div>
				<div class="uk-card-body">
					<h3 class="uk-card-title"><a href="{{url($d['slug'])}}">{{ $d['title'] }}</a></h3>
					<p>{!! $d['summary'] !!}</p>
				</div>
			</div>
		</div>
		@endforeach
		</div>
	</div>
</section>
<section class='uk-section-small uk-background-primary uk-light'>
<div class='uk-container uk-container-xsmall'>    
    <div class='uk-text-center'>
    <div class="uk-icon" uk-icon="icon: quote-right"></div>
        @foreach($quotes as $q)
        <h3>{{ $q->quote }} - {{ $q->author }}</h3>
        @endforeach
    </div>
</section>      
@endsection