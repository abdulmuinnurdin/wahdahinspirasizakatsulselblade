@extends('layouts.guest-admin', ['title' => __('Verify Your Email Address')])

@section('content')
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-mail"></i>
                    </div>
                    <div class="header-title">
                        <h3>{{ __('Verify Your Email Address') }}</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if (session('resent'))
                    <x-admin.alert variant="success">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </x-admin.alert>
                @endif

                <p>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </p>

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <x-admin.button type="submit" variant="link" class="p-0 m-0">
                        {{ __('click here to request another') }}
                    </x-admin.button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
