@extends('layouts.quotes')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>

<form class="uk-grid-small" method="post" action="/quote/update/{{ $quotes_tables->id }}" uk-grid>

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="uk-width-1-1">
        <label>Author</label>
        <input type="text" name="author" class="uk-input" placeholder="Nama usaha .." value=" {{ $quotes_tables->author }}">

        @if($errors->has('author'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('author')}}
            </div>
        @endif

    </div>

    <div class="uk-width-1-1">
        <label>Quote</label>
        <textarea name="quote" class="uk-textarea" rows="5" placeholder="type quote here ..">{{ $quotes_tables->quote }}</textarea>

            @if($errors->has('quote'))
            <div class="uk-alert-danger" role="alert">
                {{ $errors->first('quote')}}
            </div>
        @endif

    </div>

    <div class="uk-margin">
        <input type="submit" class="uk-button uk-button-primary" value="Save">
        <a href="/quotes" class="uk-button uk-button-default">Back</a>
    </div>

</form>

</div>
</div>
</div>
@endsection