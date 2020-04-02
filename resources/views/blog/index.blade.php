@extends('layouts.uikit')

@section('content')
<section class="uk-section uk-section-muted uk-dark">
	<div class="uk-container">
        <h1 class="uk-text-center">Blog</h1>
        <hr class="uk-divider-small uk-text-center"/>
		<div class="uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid="masonry: true">
		@foreach($data['posts'] as $d)
		<div>
			<div class="uk-card uk-card-default">
				<div class="uk-card-media-top">
					<img src="{!! $d['featured_image'] !!}" alt="{!! $d['featured_image_caption'] !!}">
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
@endsection