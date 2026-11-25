@extends('layouts.guest-admin', ['title' => __('Login')])

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
                        <h3>{{ __('Login') }}</h3>
                        <small><strong>{{ __('Please enter your credentials to login.') }}</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <x-admin.alert variant="success">{{ session('status') }}</x-admin.alert>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-admin.input
                        name="email"
                        label="Email Address"
                        type="email"
                        :value="old('email')"
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
                        autocomplete="current-password"
                    />

                    <div>
                        <x-admin.button type="submit" variant="primary" class="pull-right">
                            {{ __('Login') }}
                        </x-admin.button>

                        <div class="checkbox checkbox-success">
                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="bottom_text">
            {{ __("Don't have an account?") }} <a href="{{ route('register') }}">{{ __('Sign Up') }}</a><br>
            @if (Route::has('password.request'))
                {{ __('Remind') }} <a href="{{ route('password.request') }}">{{ __('Password') }}</a>
            @endif
        </div>
    </div>
</div>
@endsection
