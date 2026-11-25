@extends('layouts.guest-admin', ['title' => __('Confirm Password')])

@section('content')
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-lock"></i>
                    </div>
                    <div class="header-title">
                        <h3>{{ __('Confirm Password') }}</h3>
                        <small><strong>{{ __('Please confirm your password before continuing.') }}</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <x-admin.input
                        name="password"
                        label="Password"
                        type="password"
                        placeholder="******"
                        icon="fa fa-key"
                        required
                        autofocus
                        autocomplete="current-password"
                    />

                    <div>
                        <x-admin.button type="submit" variant="success" class="pull-right">
                            {{ __('Confirm Password') }}
                        </x-admin.button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
