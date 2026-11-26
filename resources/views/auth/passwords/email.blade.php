@extends('layouts.guest-admin', ['title' => __('Reset Password')])

@section('content')
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-refresh-2"></i>
                    </div>
                    <div class="header-title">
                        <h3>{{ __('Reset Password') }}</h3>
                        <small><strong>{{ __('Fill with your mail to receive instructions on how to reset your password.') }}</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <x-admin.alert variant="success">{{ session('status') }}</x-admin.alert>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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

                    <div>
                        <x-admin.button type="submit" variant="success" class="btn-block">
                            {{ __('Send Password Reset Link') }}
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
