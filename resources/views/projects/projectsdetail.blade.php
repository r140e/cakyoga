@extends('layouts.oxygen3')

@section('content')
	<div class="uk-visible@m uk-section uk-light uk-background-secondary uk-height-medium uk-position-top uk-width-1-1">
	</div>
	<section class="uk-section uk-margin">
		<div class="uk-container uk-margin">
			<div class="uk-child-width-1-3@s" uk-grid>
				<div class="uk-width-expand@m" uk-grid>
					<div class="uk-card uk-width-medium@s uk-width-1-2">
						<div class="uk-card-media-top">
							<img src="{{ $entry->featuredImage->getFile()->getUrl() }}?fit=crop&w=300&h=300" alt=""/>
						</div>
						<div class="uk-card-badge uk-label">
						@if ($entry->selesai == true)
							Completed
						@else
							On-Going
						@endif
						</div>
					</div>
					<div class="uk-width-expand uk-card uk-padding uk-padding-remove-vertical">
						<div class="uk-height-max-small">
							<h3 class="inverse-color">{{ $entry->namaProject }}</h3>
							<h2 class="inverse-color">{{ $entry->tempat }}</h2>
						</div>
						<h4>Overview</h4>
						<p>{{ $entry->keteranganSingkat }}</p>
						@foreach ($entry->alat as $a)
						<button class="uk-button uk-button-small uk-button-default">{{ $a }}</button>
						@endforeach
					</div>
				</div>
				<div class="uk-width-1-3@m uk-card uk-card-default uk-card-body">
					<ul class="uk-list">
					<h3>Anggota</h3>
					@foreach ($entry->anggota as $a)
						<li>{{ $a }}</li>
					@endforeach
					</ul>
				</div>					
			</div>
		</div>
		<div class="uk-container uk-margin">
			<h2>Keterangan</h2>
			<hr class="uk-divider-small">
			<div class="uk-background-default uk-padding-remove">
				<div class="uk-padding">
					<div class="uk-child-width-1-3@s" uk-grid>
						<div class="uk-width-2-3@s">
							{!! $renderer->render($entry->keterangan) !!}
						</div>
						<div class="uk-width-1-3@s">
							<h3>Hasil</h3>
							{!! $renderer->render($entry->hasil) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-container uk-margin">
			<h2>Lokasi Pengukuran</h2>
			<hr class="uk-divider-small">
			<div id="map" class="uk-height-large"></div>
		</div>
		<script type="text/javascript">
			var map = L.map('map').setView([-6.877413889,112.4486361], 17);
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
			var lokasi = <?php echo json_encode($entry->lokasi); ?>;
			L.geoJSON(lokasi).addTo(map);
		</script>
		<div class="uk-container uk-margin">
			<h2>Dokumentasi</h2>
			<hr class="uk-divider-small">
			<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
				<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
					@foreach ($entry->dokumentasi as $d)
					<li>
						<div class="uk-panel" uk-lightbox>
							<a href="{{ $d->getFile()->getUrl() }}"><img src="{{ $d->getFile()->getUrl() }}"/></a>
						</div>
					</li>
					@endforeach
				</ul>
				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
			</div>
		</div>
		<div class="uk-container uk-margin">
			<h2>Project Lainnya</h2>
			<hr class="uk-divider-small">
			<div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-margin" uk-grid>
			@if( count($entries) > 0 )
			@php $index = 0; @endphp
			@foreach($entries as $entry)
			<div>
				<div class="uk-card uk-card-body uk-card-primary uk-text-center">
					<h3 class="uk-card-title"><a href="/projects/{{ $entry->slug }}">{{ $entry->namaProject }}</a></h3>
				</div>
			</div>
			@endforeach
			@endif
			</div>
		</div>
	</section>
@endsection