<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cakyoga') }}</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/css/uikit.min.css">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">    

</head>
<body>
	@include('layouts.partials.nav')
        @yield('content')
	@include('layouts.partials.footer')
	@include('layouts.partials.modalnav')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit-icons.min.js" type="text/javascript"></script>

</body>
</html>