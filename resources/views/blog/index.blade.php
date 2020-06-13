@extends('layouts.blog')

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
	<div class="uk-container uk-margin">
		<style type="text/css">
		.pagination {
			display:flex;flex-wrap:wrap;margin-left:-20px;padding:0;list-style:none;justify-content: center;
		}
		.pagination > * {
			flex: none;
			padding-left: 20px;
			position: relative;
		}
		.pagination > * > * {
			display: block;
			color: #999;
			transition: color .1s ease-in-out;
		}
		</style>
		{{ $data['posts']->links() }}
	</div>
</section>
@endsection