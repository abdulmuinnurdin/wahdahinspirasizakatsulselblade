@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Weather Icons',
    'headerSubtitle' => '22 Weather Themed Icons and CSS',
    'breadcrumb' => 'Fixed',
    'headerIcon' => 'pe-7s-cloud',
])

@push('css')
    <link href="{{ asset('assets/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/weather-icons/css/weather-icons-wind.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Getting Started</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p class="m-b-15">To use the Weather Icons, place the main CSS files in your CSS directory, and the font files in a "font" 
                                        directory on the same folder level as the CSS director. Once you've done that, all you need to do to 
                                        reference an icon in your HTML is type  <code>&lt;i class="wi wi-night-sleet"&gt;&lt;/i&gt;</code></p>
                                    <div class="weather-icon-inner">
                                        <ul class="icon_list">
                                            <li>
                                                <i class="wi wi-day-cloudy-high"></i>
                                                <span class="icon_name">wi-day-cloudy-high</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-light-wind"></i>
                                                <span class="icon_name">wi-day-light-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-sleet"></i>
                                                <span class="icon_name">wi-day-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-haze"></i>
                                                <span class="icon_name">wi-day-haze</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-cloudy-high"></i>
                                                <span class="icon_name">wi-night-cloudy-high</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-partly-cloudy"></i>
                                                <span class="icon_name">wi-night-alt-partly-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sleet"></i>
                                                <span class="icon_name">wi-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moonrise"></i>
                                                <span class="icon_name">wi-moonrise</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moonset"></i>
                                                <span class="icon_name">wi-moonset</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-sleet"></i>
                                                <span class="icon_name">wi-night-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-sleet"></i>
                                                <span class="icon_name">wi-night-alt-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-raindrop"></i>
                                                <span class="icon_name">wi-raindrop</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-barometer"></i>
                                                <span class="icon_name">wi-barometer</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-humidity"></i>
                                                <span class="icon_name">wi-humidity</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-na"></i>
                                                <span class="icon_name">wi-na</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-flood"></i>
                                                <span class="icon_name">wi-flood</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sandstorm"></i>
                                                <span class="icon_name">wi-sandstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-tsunami"></i>
                                                <span class="icon_name">wi-tsunami</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-earthquake"></i>
                                                <span class="icon_name">wi-earthquake</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-fire"></i>
                                                <span class="icon_name">wi-fire</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-volcano"></i>
                                                <span class="icon_name">wi-volcano</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-train"></i>
                                                <span class="icon_name">wi-train</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-small-craft-advisory"></i>
                                                <span class="icon_name">wi-small-craft-advisory</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-gale-warning"></i>
                                                <span class="icon_name">wi-gale-warning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-storm-warning"></i>
                                                <span class="icon_name">wi-storm-warning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-hurricane-warning"></i>
                                                <span class="icon_name">wi-hurricane-warning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-sunny"></i>
                                                <span class="icon_name">wi-day-sunny</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-cloudy"></i>
                                                <span class="icon_name">wi-day-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-cloudy-gusts"></i>
                                                <span class="icon_name">wi-day-cloudy-gusts</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-cloudy-windy"></i>
                                                <span class="icon_name">wi-day-cloudy-windy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-fog"></i>
                                                <span class="icon_name">wi-day-fog</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-hail"></i>
                                                <span class="icon_name">wi-day-hail</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-haze"></i>
                                                <span class="icon_name">wi-day-haze</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-lightning"></i>
                                                <span class="icon_name">wi-day-lightning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-rain"></i>
                                                <span class="icon_name">wi-day-rain</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-rain-mix"></i>
                                                <span class="icon_name">wi-day-rain-mix</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-rain-wind"></i>
                                                <span class="icon_name">wi-day-rain-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-showers"></i>
                                                <span class="icon_name">wi-day-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-sleet"></i>
                                                <span class="icon_name">wi-day-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-sleet-storm"></i>
                                                <span class="icon_name">wi-day-sleet-storm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-snow"></i>
                                                <span class="icon_name">wi-day-snow</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-snow-thunderstorm"></i>
                                                <span class="icon_name">wi-day-snow-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-snow-wind"></i>
                                                <span class="icon_name">wi-day-snow-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-sprinkle"></i>
                                                <span class="icon_name">wi-day-sprinkle</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-storm-showers"></i>
                                                <span class="icon_name">wi-day-storm-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-sunny-overcast"></i>
                                                <span class="icon_name">wi-day-sunny-overcast</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-thunderstorm"></i>
                                                <span class="icon_name">wi-day-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-windy"></i>
                                                <span class="icon_name">wi-day-windy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-solar-eclipse"></i>
                                                <span class="icon_name">wi-solar-eclipse</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-hot"></i>
                                                <span class="icon_name">wi-hot</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-cloudy-high"></i>
                                                <span class="icon_name">wi-day-cloudy-high</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-day-light-wind"></i>
                                                <span class="icon_name">wi-day-light-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-clear"></i>
                                                <span class="icon_name">wi-night-clear</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-cloudy"></i>
                                                <span class="icon_name">wi-night-alt-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-cloudy-gusts"></i>
                                                <span class="icon_name">wi-night-alt-cloudy-gusts</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-cloudy-windy"></i>
                                                <span class="icon_name">wi-night-alt-cloudy-windy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-hail"></i>
                                                <span class="icon_name">wi-night-alt-hail</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-lightning"></i>
                                                <span class="icon_name">wi-night-alt-lightning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-rain"></i>
                                                <span class="icon_name">wi-night-alt-rain</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-rain-mix"></i>
                                                <span class="icon_name">wi-night-alt-rain-mix</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-rain-wind"></i>
                                                <span class="icon_name">wi-night-alt-rain-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-showers"></i>
                                                <span class="icon_name">wi-night-alt-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-sleet"></i>
                                                <span class="icon_name">wi-night-alt-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-sleet-storm"></i>
                                                <span class="icon_name">wi-night-alt-sleet-storm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-snow"></i>
                                                <span class="icon_name">wi-night-alt-snow</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-snow-thunderstorm"></i>
                                                <span class="icon_name">wi-night-alt-snow-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-snow-wind"></i>
                                                <span class="icon_name">wi-night-alt-snow-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-sprinkle"></i>
                                                <span class="icon_name">wi-night-alt-sprinkle</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-storm-showers"></i>
                                                <span class="icon_name">wi-night-alt-storm-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-thunderstorm"></i>
                                                <span class="icon_name">wi-night-alt-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-cloudy"></i>
                                                <span class="icon_name">wi-night-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-cloudy-gusts"></i>
                                                <span class="icon_name">wi-night-cloudy-gusts</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-cloudy-windy"></i>
                                                <span class="icon_name">wi-night-cloudy-windy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-fog"></i>
                                                <span class="icon_name">wi-night-fog</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-hail"></i>
                                                <span class="icon_name">wi-night-hail</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-lightning"></i>
                                                <span class="icon_name">wi-night-lightning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-partly-cloudy"></i>
                                                <span class="icon_name">wi-night-partly-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-rain"></i>
                                                <span class="icon_name">wi-night-rain</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-rain-mix"></i>
                                                <span class="icon_name">wi-night-rain-mix</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-rain-wind"></i>
                                                <span class="icon_name">wi-night-rain-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-showers"></i>
                                                <span class="icon_name">wi-night-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-sleet"></i>
                                                <span class="icon_name">wi-night-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-sleet-storm"></i>
                                                <span class="icon_name">wi-night-sleet-storm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-snow"></i>
                                                <span class="icon_name">wi-night-snow</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-snow-thunderstorm"></i>
                                                <span class="icon_name">wi-night-snow-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-snow-wind"></i>
                                                <span class="icon_name">wi-night-snow-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-sprinkle"></i>
                                                <span class="icon_name">wi-night-sprinkle</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-storm-showers"></i>
                                                <span class="icon_name">wi-night-storm-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-thunderstorm"></i>
                                                <span class="icon_name">wi-night-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-lunar-eclipse"></i>
                                                <span class="icon_name">wi-lunar-eclipse</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-stars"></i>
                                                <span class="icon_name">wi-stars</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-storm-showers"></i>
                                                <span class="icon_name">wi-storm-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-thunderstorm"></i>
                                                <span class="icon_name">wi-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-cloudy-high"></i>
                                                <span class="icon_name">wi-night-alt-cloudy-high</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-cloudy-high"></i>
                                                <span class="icon_name">wi-night-cloudy-high</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-night-alt-partly-cloudy"></i>
                                                <span class="icon_name">wi-night-alt-partly-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloud"></i>
                                                <span class="icon_name">wi-cloud</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloudy"></i>
                                                <span class="icon_name">wi-cloudy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloudy-gusts"></i>
                                                <span class="icon_name">wi-cloudy-gusts</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloudy-windy"></i>
                                                <span class="icon_name">wi-cloudy-windy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-fog"></i>
                                                <span class="icon_name">wi-fog</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-hail"></i>
                                                <span class="icon_name">wi-hail</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-rain"></i>
                                                <span class="icon_name">wi-rain</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-rain-mix"></i>
                                                <span class="icon_name">wi-rain-mix</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-rain-wind"></i>
                                                <span class="icon_name">wi-rain-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-showers"></i>
                                                <span class="icon_name">wi-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sleet"></i>
                                                <span class="icon_name">wi-sleet</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-snow"></i>
                                                <span class="icon_name">wi-snow</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sprinkle"></i>
                                                <span class="icon_name">wi-sprinkle</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-storm-showers"></i>
                                                <span class="icon_name">wi-storm-showers</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-thunderstorm"></i>
                                                <span class="icon_name">wi-thunderstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-snow-wind"></i>
                                                <span class="icon_name">wi-snow-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-snow"></i>
                                                <span class="icon_name">wi-snow</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-smog"></i>
                                                <span class="icon_name">wi-smog</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-smoke"></i>
                                                <span class="icon_name">wi-smoke</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-lightning"></i>
                                                <span class="icon_name">wi-lightning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-raindrops"></i>
                                                <span class="icon_name">wi-raindrops</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-raindrop"></i>
                                                <span class="icon_name">wi-raindrop</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-dust"></i>
                                                <span class="icon_name">wi-dust</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-snowflake-cold"></i>
                                                <span class="icon_name">wi-snowflake-cold</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-windy"></i>
                                                <span class="icon_name">wi-windy</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-strong-wind"></i>
                                                <span class="icon_name">wi-strong-wind</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sandstorm"></i>
                                                <span class="icon_name">wi-sandstorm</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-earthquake"></i>
                                                <span class="icon_name">wi-earthquake</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-fire"></i>
                                                <span class="icon_name">wi-fire</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-flood"></i>
                                                <span class="icon_name">wi-flood</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-meteor"></i>
                                                <span class="icon_name">wi-meteor</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-tsunami"></i>
                                                <span class="icon_name">wi-tsunami</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-volcano"></i>
                                                <span class="icon_name">wi-volcano</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-hurricane"></i>
                                                <span class="icon_name">wi-hurricane</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-tornado"></i>
                                                <span class="icon_name">wi-tornado</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-small-craft-advisory"></i>
                                                <span class="icon_name">wi-small-craft-advisory</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-gale-warning"></i>
                                                <span class="icon_name">wi-gale-warning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-storm-warning"></i>
                                                <span class="icon_name">wi-storm-warning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-hurricane-warning"></i>
                                                <span class="icon_name">wi-hurricane-warning</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind-direction"></i>
                                                <span class="icon_name">wi-wind-direction</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-alien"></i>
                                                <span class="icon_name">wi-alien</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-celsius"></i>
                                                <span class="icon_name">wi-celsius</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-fahrenheit"></i>
                                                <span class="icon_name">wi-fahrenheit</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-degrees"></i>
                                                <span class="icon_name">wi-degrees</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-thermometer"></i>
                                                <span class="icon_name">wi-thermometer</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-thermometer-exterior"></i>
                                                <span class="icon_name">wi-thermometer-exterior</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-thermometer-internal"></i>
                                                <span class="icon_name">wi-thermometer-internal</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloud-down"></i>
                                                <span class="icon_name">wi-cloud-down</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloud-up"></i>
                                                <span class="icon_name">wi-cloud-up</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-cloud-refresh"></i>
                                                <span class="icon_name">wi-cloud-refresh</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-horizon"></i>
                                                <span class="icon_name">wi-horizon</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-horizon-alt"></i>
                                                <span class="icon_name">wi-horizon-alt</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sunrise"></i>
                                                <span class="icon_name">wi-sunrise</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-sunset"></i>
                                                <span class="icon_name">wi-sunset</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moonrise"></i>
                                                <span class="icon_name">wi-moonrise</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moonset"></i>
                                                <span class="icon_name">wi-moonset</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-refresh"></i>
                                                <span class="icon_name">wi-refresh</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-refresh-alt"></i>
                                                <span class="icon_name">wi-refresh-alt</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-umbrella"></i>
                                                <span class="icon_name">wi-umbrella</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-barometer"></i>
                                                <span class="icon_name">wi-barometer</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-humidity"></i>
                                                <span class="icon_name">wi-humidity</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-na"></i>
                                                <span class="icon_name">wi-na</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-train"></i>
                                                <span class="icon_name">wi-train</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-new"></i>
                                                <span class="icon_name">wi-moon-new</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-crescent-1"></i>
                                                <span class="icon_name">wi-moon-waxing-crescent-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-crescent-2"></i>
                                                <span class="icon_name">wi-moon-waxing-crescent-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-crescent-3"></i>
                                                <span class="icon_name">wi-moon-waxing-crescent-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-crescent-4"></i>
                                                <span class="icon_name">wi-moon-waxing-crescent-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-crescent-5"></i>
                                                <span class="icon_name">wi-moon-waxing-crescent-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-crescent-6"></i>
                                                <span class="icon_name">wi-moon-waxing-crescent-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-first-quarter"></i>
                                                <span class="icon_name">wi-moon-first-quarter</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-gibbous-1"></i>
                                                <span class="icon_name">wi-moon-waxing-gibbous-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-gibbous-2"></i>
                                                <span class="icon_name">wi-moon-waxing-gibbous-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-gibbous-3"></i>
                                                <span class="icon_name">wi-moon-waxing-gibbous-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-gibbous-4"></i>
                                                <span class="icon_name">wi-moon-waxing-gibbous-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-gibbous-5"></i>
                                                <span class="icon_name">wi-moon-waxing-gibbous-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waxing-gibbous-6"></i>
                                                <span class="icon_name">wi-moon-waxing-gibbous-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-full"></i>
                                                <span class="icon_name">wi-moon-full</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-gibbous-1"></i>
                                                <span class="icon_name">wi-moon-waning-gibbous-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-gibbous-2"></i>
                                                <span class="icon_name">wi-moon-waning-gibbous-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-gibbous-3"></i>
                                                <span class="icon_name">wi-moon-waning-gibbous-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-gibbous-4"></i>
                                                <span class="icon_name">wi-moon-waning-gibbous-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-gibbous-5"></i>
                                                <span class="icon_name">wi-moon-waning-gibbous-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-gibbous-6"></i>
                                                <span class="icon_name">wi-moon-waning-gibbous-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-third-quarter"></i>
                                                <span class="icon_name">wi-moon-third-quarter</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-crescent-1"></i>
                                                <span class="icon_name">wi-moon-waning-crescent-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-crescent-2"></i>
                                                <span class="icon_name">wi-moon-waning-crescent-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-crescent-3"></i>
                                                <span class="icon_name">wi-moon-waning-crescent-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-crescent-4"></i>
                                                <span class="icon_name">wi-moon-waning-crescent-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-crescent-5"></i>
                                                <span class="icon_name">wi-moon-waning-crescent-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-waning-crescent-6"></i>
                                                <span class="icon_name">wi-moon-waning-crescent-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-new"></i>
                                                <span class="icon_name">wi-moon-alt-new</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-crescent-1"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-crescent-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-crescent-2"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-crescent-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-crescent-3"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-crescent-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-crescent-4"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-crescent-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-crescent-5"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-crescent-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-crescent-6"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-crescent-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-first-quarter"></i>
                                                <span class="icon_name">wi-moon-alt-first-quarter</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-gibbous-1"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-gibbous-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-gibbous-2"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-gibbous-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-gibbous-3"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-gibbous-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-gibbous-4"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-gibbous-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-gibbous-5"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-gibbous-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waxing-gibbous-6"></i>
                                                <span class="icon_name">wi-moon-alt-waxing-gibbous-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-full"></i>
                                                <span class="icon_name">wi-moon-alt-full</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-gibbous-1"></i>
                                                <span class="icon_name">wi-moon-alt-waning-gibbous-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-gibbous-2"></i>
                                                <span class="icon_name">wi-moon-alt-waning-gibbous-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-gibbous-3"></i>
                                                <span class="icon_name">wi-moon-alt-waning-gibbous-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-gibbous-4"></i>
                                                <span class="icon_name">wi-moon-alt-waning-gibbous-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-gibbous-5"></i>
                                                <span class="icon_name">wi-moon-alt-waning-gibbous-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-gibbous-6"></i>
                                                <span class="icon_name">wi-moon-alt-waning-gibbous-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-third-quarter"></i>
                                                <span class="icon_name">wi-moon-alt-third-quarter</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-crescent-1"></i>
                                                <span class="icon_name">wi-moon-alt-waning-crescent-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-crescent-2"></i>
                                                <span class="icon_name">wi-moon-alt-waning-crescent-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-crescent-3"></i>
                                                <span class="icon_name">wi-moon-alt-waning-crescent-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-crescent-4"></i>
                                                <span class="icon_name">wi-moon-alt-waning-crescent-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-crescent-5"></i>
                                                <span class="icon_name">wi-moon-alt-waning-crescent-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-moon-alt-waning-crescent-6"></i>
                                                <span class="icon_name">wi-moon-alt-waning-crescent-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-1"></i>
                                                <span class="icon_name">wi-time-1</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-2"></i>
                                                <span class="icon_name">wi-time-2</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-3"></i>
                                                <span class="icon_name">wi-time-3</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-4"></i>
                                                <span class="icon_name">wi-time-4</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-5"></i>
                                                <span class="icon_name">wi-time-5</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-6"></i>
                                                <span class="icon_name">wi-time-6</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-7"></i>
                                                <span class="icon_name">wi-time-7</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-8"></i>
                                                <span class="icon_name">wi-time-8</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-9"></i>
                                                <span class="icon_name">wi-time-9</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-10"></i>
                                                <span class="icon_name">wi-time-10</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-11"></i>
                                                <span class="icon_name">wi-time-11</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-time-12"></i>
                                                <span class="icon_name">wi-time-12</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-up"></i>
                                                <span class="icon_name">wi-direction-up</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-up-right"></i>
                                                <span class="icon_name">wi-direction-up-right</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-right"></i>
                                                <span class="icon_name">wi-direction-right</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-down-right"></i>
                                                <span class="icon_name">wi-direction-down-right</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-down"></i>
                                                <span class="icon_name">wi-direction-down</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-down-left"></i>
                                                <span class="icon_name">wi-direction-down-left</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-left"></i>
                                                <span class="icon_name">wi-direction-left</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-direction-up-left"></i>
                                                <span class="icon_name">wi-direction-up-left</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-0-deg"></i>
                                                <span class="icon_name">towards-0-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-23-deg"></i>
                                                <span class="icon_name">towards-23-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-45-deg"></i>
                                                <span class="icon_name">towards-45-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-68-deg"></i>
                                                <span class="icon_name">towards-68-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-90-deg"></i>
                                                <span class="icon_name">towards-90-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-113-deg"></i>
                                                <span class="icon_name">towards-113-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-135-deg"></i>
                                                <span class="icon_name">towards-135-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-158-deg"></i>
                                                <span class="icon_name">towards-158-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-180-deg"></i>
                                                <span class="icon_name">towards-180-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-203-deg"></i>
                                                <span class="icon_name">towards-203-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-225-deg"></i>
                                                <span class="icon_name">towards-225-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-248-deg"></i>
                                                <span class="icon_name">towards-248-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-270-deg"></i>
                                                <span class="icon_name">towards-270-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-293-deg"></i>
                                                <span class="icon_name">towards-293-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-313-deg"></i>
                                                <span class="icon_name">towards-313-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind towards-336-deg"></i>
                                                <span class="icon_name">towards-336-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-180-deg"></i>
                                                <span class="icon_name">from-180-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-203-deg"></i>
                                                <span class="icon_name">from-203-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-225-deg"></i>
                                                <span class="icon_name">from-225-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-248-deg"></i>
                                                <span class="icon_name">from-248-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-270-deg"></i>
                                                <span class="icon_name">from-270-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-293-deg"></i>
                                                <span class="icon_name">from-293-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-313-deg"></i>
                                                <span class="icon_name">from-313-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-336-deg"></i>
                                                <span class="icon_name">from-336-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-0-deg"></i>
                                                <span class="icon_name">from-0-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-23-deg"></i>
                                                <span class="icon_name">from-23-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-45-deg"></i>
                                                <span class="icon_name">from-45-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-68-deg"></i>
                                                <span class="icon_name">from-68-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-90-deg"></i>
                                                <span class="icon_name">from-90-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-113-deg"></i>
                                                <span class="icon_name">from-113-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-135-deg"></i>
                                                <span class="icon_name">from-135-deg</span>
                                            </li>
                                            <li>
                                                <i class="wi wi-wind from-158-deg"></i>
                                                <span class="icon_name">from-158-deg</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection