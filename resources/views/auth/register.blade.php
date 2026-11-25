@extends('layouts.guest-admin', ['title' => __('Register')])

@section('content')
<div class="register-wrapper">
    <div class="container-center lg">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-pen"></i>
                    </div>
                    <div class="header-title">
                        <h3>{{ __('Register') }}</h3>
                        <small><strong>{{ __('Please enter your data to register.') }}</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <x-admin.input
                        name="name"
                        label="Name"
                        type="text"
                        :value="old('name')"
                        placeholder="Your name"
                        icon="glyphicon glyphicon-user"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <x-admin.input
                        name="email"
                        label="Email Address"
                        type="email"
                        :value="old('email')"
                        placeholder="you@example.com"
                        icon="fa fa-envelope"
                        required
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
                        <x-admin.button type="submit" variant="primary" class="pull-right">
                            {{ __('Register') }}
                        </x-admin.button>
                        <x-admin.button href="{{ route('login') }}" variant="success" class="pull-right m-r-5">
                            {{ __('Login') }}
                        </x-admin.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
