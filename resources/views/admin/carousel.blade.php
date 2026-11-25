@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Bootstrap Carousel',
    'headerSubtitle' => 'A slideshow component for cycling through elements, like a carousel. Nested carousels are not supported.',
    'breadcrumb' => 'Carousel',
    'headerIcon' => 'pe-7s-date',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <!-- Start carousel -->
                                    <div id="carousel-1" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-1" data-slide-to="1"></li>
                                            <li data-target="#carousel-1" data-slide-to="2"></li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="{{ asset('assets/dist/img/carousel-1.jpg') }}" alt="...">
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">First slide label</h3>
                                                    <p class="text-white"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('assets/dist/img/carousel-2.jpg') }}" alt="...">
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">Second slide label</h3>
                                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('assets/dist/img/carousel-3.jpg') }}" alt="...">
                                                <div class="carousel-caption">
                                                    <div class="carousel-caption">
                                                        <h3 class="text-white">Third slide label</h3>
                                                        <p class="text-white">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>  <!-- End carousel -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <!-- Start carousel -->
                                    <div id="carousel-2" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-2" data-slide-to="1"></li>
                                            <li data-target="#carousel-2" data-slide-to="2"></li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="{{ asset('assets/dist/img/carousel-4.jpg') }}" alt="...">
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">First slide label</h3>
                                                    <p class="text-white"> Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('assets/dist/img/carousel-5.jpg') }}" alt="...">
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">Second slide label</h3>
                                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('assets/dist/img/carousel-6.jpg') }}" alt="...">
                                                <div class="carousel-caption">
                                                    <div class="carousel-caption">
                                                        <h3 class="text-white">Third slide label</h3>
                                                        <p class="text-white">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!-- End carousel -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection