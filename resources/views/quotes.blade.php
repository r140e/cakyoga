<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cakyoga') }}</title>

    <!-- Styles -->
<style type='text/css'>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
body {
    overflow-y: hidden;
}
.slider {
    font-family: sans-serif;
    scroll-snap-type: x mandatory;  
    display: flex;
    -webkit-overflow-scrolling: touch;
    overflow-x: scroll;
}
section {
    border-right: 1px solid white;
    padding: 1rem;
    min-width: 100vw;
    height: 100vh;
    scroll-snap-align: start;
    text-align: center;
    position: relative;
}
h1  {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    color: white;
    width: 100%;
    left: 0;
    font-size: calc(1rem + 3vw);
}        
</style>
</head>
<body>

<div class="slider">
    @foreach($quotes_tables as $p)
    <section>
        <h1>"{{ $p->quote }}" - {{ $p->author }}</h1>
    </section>
    @endforeach
</div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.5.2/randomColor.js" type="text/javascript"></script>
    <script src="https://bundle.run/css-scroll-snap-polyfill@0.1.2" type="text/javascript"></script>
    <script>
    const init = function(){
        let items = document.querySelectorAll('section');
        for (let i = 0; i < items.length; i++){
            items[i].style.background = randomColor({luminosity: 'light'});
        }
        cssScrollSnapPolyfill()
    }
    init();
    </script>
</body>
</html>
