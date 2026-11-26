@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Horizontal Timeline',
    'headerSubtitle' => 'An easy to customize, horizontal timeline powered by CSS and jQuery.',
    'breadcrumb' => 'Timeline',
    'headerIcon' => 'pe-7s-timer',
])

@push('css')
    <link href="{{ asset('assets/plugins/horizontal-timeline/horizontal-timeline.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="cd-horizontal-timeline">
                                <div class="timeline">
                                    <div class="events-wrapper">
                                        <div class="events">
                                            <ol>
                                                <li><a href="#0" data-date="16/01/2017" class="selected">16 Jan</a></li>
                                                <li><a href="#0" data-date="28/02/2017">28 Feb</a></li>
                                                <li><a href="#0" data-date="20/04/2017">20 Mar</a></li>
                                                <li><a href="#0" data-date="20/05/2017">20 May</a></li>
                                                <li><a href="#0" data-date="09/07/2017">09 Jul</a></li>
                                                <li><a href="#0" data-date="30/08/2017">30 Aug</a></li>
                                                <li><a href="#0" data-date="15/09/2017">15 Sep</a></li>
                                                <li><a href="#0" data-date="01/11/2017">01 Nov</a></li>
                                                <li><a href="#0" data-date="10/12/2017">10 Dec</a></li>
                                                <li><a href="#0" data-date="19/01/2018">29 Jan</a></li>
                                                <li><a href="#0" data-date="03/03/2018">3 Mar</a></li>
                                            </ol>

                                            <span class="filling-line" aria-hidden="true"></span>
                                        </div> <!-- .events -->
                                    </div> <!-- .events-wrapper -->

                                    <ul class="cd-timeline-navigation">
                                        <li><a href="#0" class="prev inactive">Prev</a></li>
                                        <li><a href="#0" class="next">Next</a></li>
                                    </ul> <!-- .cd-timeline-navigation -->
                                </div> <!-- .timeline -->

                                <div class="events-content">
                                    <ol>
                                        <li class="selected" data-date="16/01/2017">
                                            <h2>Horizontal Timeline</h2>
                                            <em>January 16th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="28/02/2017">
                                            <h2>Event title here</h2>
                                            <em>February 28th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="20/04/2017">
                                            <h2>Event title here</h2>
                                            <em>March 20th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="20/05/2017">
                                            <h2>Event title here</h2>
                                            <em>May 20th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="09/07/2017">
                                            <h2>Event title here</h2>
                                            <em>July 9th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="30/08/2017">
                                            <h2>Event title here</h2>
                                            <em>August 30th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="15/09/2017">
                                            <h2>Event title here</h2>
                                            <em>September 15th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="01/11/2017">
                                            <h2>Event title here</h2>
                                            <em>November 1st, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="10/12/2017">
                                            <h2>Event title here</h2>
                                            <em>December 10th, 2017</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="19/01/2018">
                                            <h2>Event title here</h2>
                                            <em>January 19th, 2018</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>

                                        <li data-date="03/03/2018">
                                            <h2>Event title here</h2>
                                            <em>March 3rd, 2018</em>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa,
                                                quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, 
                                                ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam
                                                quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                        </li>
                                    </ol>
                                </div> <!-- .events-content -->
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/horizontal-timeline/modernizr.js') }}"></script>
    <script src="{{ asset('assets/plugins/horizontal-timeline/main.js') }}"></script>
@endpush
