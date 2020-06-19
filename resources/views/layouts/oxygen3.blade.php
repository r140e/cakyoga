<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/css/uikit.min.css"/>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
	<style>
	body {
		background-color: #f8f8f8;
	}
	.uk-divider-small::after {
    	border: 2px solid #1e87f0;
	}
	@media screen and (min-width: 960px) {
		.inverse-color {
			color: #f8f8f8;
		}
	}
	</style>
</head>
<body">
	<div class="uk-background-primary" uk-sticky="sel-target: .uk-navbar; cls-active: uk-navbar-sticky">
	@component('layouts.partials.nav')
		@slot('navbarModel')
			uk-navbar uk-margin-remove
        @endslot
	@endcomponent
	</div>
    @yield('content')
	@include('layouts.partials.modalnav')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit-icons.min.js" type="text/javascript"></script>
</body>
</html>