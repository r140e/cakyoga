@extends('layouts.app')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>      
<div class="uk-card-header uk-card-title">{{ __('Register') }}</div>

<div class="uk-card-body">
    <form class="uk-form-horizontal" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="uk-margin">
            <label for="name" class="uk-form-label">{{ __('Name') }}</label>

            <div class="uk-form-controls">
                <input id="name" type="text" class="uk-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>

            <div class="uk-form-controls">
                <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label for="password" class="uk-form-label">{{ __('Password') }}</label>

            <div class="uk-form-controls">
                <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label for="password-confirm" class="uk-form-label">{{ __('Confirm Password') }}</label>

            <div class="uk-form-controls">
                <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection
