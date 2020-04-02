@extends('layouts.uikit')

@section('content')
	<header class="uk-section-large uk-light uk-background-cover uk-background-secondary uk-background-blend-multiply" style="background-image:url({{ url($data['post']['featured_image']) }});">
	<div class="uk-container">
		<div class="uk-card uk-text-center animate-box" data-animate-effect="fadeIn">
			<h1 class="uk-h1">{{ $data['post']['title'] }}</h1>
		</div>
	</div>
	</header>
	<section class="uk-section uk-section-muted uk-dark">
    <div class="uk-container uk-container-small">	
	{!! $data['post']['body'] !!}
	</div>
	</section>
@endsection