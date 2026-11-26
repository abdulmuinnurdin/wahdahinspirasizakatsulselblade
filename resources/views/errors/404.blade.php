@extends('layouts.guest-admin', ['title' => __('404 - Page Not Found')])

@section('content')
<div class="middle-box">
    <div class="row">
        <div class="col-sm-12">
            <div class="error-text">
                <h1>4<span class="error bounce">0</span><span class="m-l-90">4</span></h1>
                <h3><span>Page</span><br class="hidden-xs"> Not Found</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="error-desc">
                <p>{{ __('Sorry, but the page you are looking for has not been found. Try checking the URL for error, then hit the refresh button on your browser or go back to the homepage.') }}</p>
                <a href="{{ url('/') }}" class="btn btn-success">{{ __('Go to Homepage') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
