@extends('layouts.guest-admin', ['title' => __('403 - Forbidden')])

@section('content')
<div class="middle-box2 text-center">
    <div class="row">
        <div class="col-sm-12">
            <div class="error-text2"><h1>403</h1></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="error-desc2">
                <p>{{ __('Sorry, you are not authorized to access this page. We apologize for the inconvenience. You can go back to main page:') }}</p>
                <a href="{{ url('/') }}" class="btn btn-success">{{ __('Homepage') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
