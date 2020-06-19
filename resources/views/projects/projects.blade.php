@extends('layouts.oxygen3')

@section('content')
	<section class="uk-section">
		<div class="uk-container">
			<div class="uk-margin-large">
				<h2 class="uk-text-center">List Project</h2>
				<hr class="uk-divider-small uk-text-center">
			</div>
			<div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2" uk-grid>
			@if( count($entries) > 0 )
			@php $index = 0; @endphp
			@foreach($entries as $entries)
			<div>
				<div class="uk-card uk-card-body uk-card-primary uk-text-center">
					<a href="/projects/{{ $entries->slug }}">
						<h3 class="uk-card-title">{{ $entries->namaProject }}</h3>
						<h2 class="uk-card-title">{{ $entries->tempat }}</h2>
					</a>
				</div>
			</div>
			@endforeach
			@endif
			</div>
		</div>
	</section>
@endsection