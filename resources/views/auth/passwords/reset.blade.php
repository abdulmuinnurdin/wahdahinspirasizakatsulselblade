@extends('layouts.guest-admin', ['title' => __('Reset Password')])

@section('content')
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>{{ __('Reset Password') }}</h3>
                        <small><strong>{{ __('Enter your new password below.') }}</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <x-admin.input
                        name="email"
                        label="Email Address"
                        type="email"
                        :value="$email ?? old('email')"
                        placeholder="you@example.com"
                        icon="glyphicon glyphicon-user"
                        required
                        autofocus
                        autocomplete="email"
                    />

                    <x-admin.input
                        name="password"
                        label="Password"
                        type="password"
                        placeholder="******"
                        icon="fa fa-key"
                        required
                        autocomplete="new-password"
                    />

                    <x-admin.input
                        name="password_confirmation"
                        label="Confirm Password"
                        type="password"
                        placeholder="******"
                        icon="fa fa-key"
                        required
                        autocomplete="new-password"
                    />

                    <div>
                        <x-admin.button type="submit" variant="success" class="btn-block">
                            {{ __('Reset Password') }}
                        </x-admin.button>
                    </div>
                </form>
            </div>
        </div>
        <div id="bottom_text">
            {{ __('Remembered your password?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
    </div>
</div>
@endsection
