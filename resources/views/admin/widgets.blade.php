@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Widgets',
    'headerSubtitle' => 'Present your events in timeline style.',
    'breadcrumb' => 'Widgets',
    'headerIcon' => 'pe-7s-date',
])

@push('css')
    <link href="{{ asset('assets/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-1">
                                <h2><span class="count-number">696</span>K <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +28%</span></h2>
                                <div class="small">Visitors this Month</div>
                                <i class="ti-server statistic_icon"></i>
                                <div class="sparkline1 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-2">
                                <h2><span class="count-number">321</span>M <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +10%</span> </h2>
                                <div class="small">Total users</div>
                                <i class="ti-user statistic_icon"></i>
                                <div class="sparkline2 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-3">
                                <h2><span class="count-number">789</span>K <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +29%</span></h2>
                                <div class="small">Social users </div>
                                <i class="ti-world statistic_icon"></i>
                                <div class="sparkline3 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-4">
                                <h2><span class="count-number">5489</span>$ <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +24%</span></h2>
                                <div class="small">Total Sales</div>
                                <i class="ti-bag statistic_icon"></i>
                                <div class="sparkline4 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-1 outline">
                                <h2><span class="count-number">696</span>K <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +28%</span></h2>
                                <div class="small">Visitors this Month</div>
                                <i class="ti-server statistic_icon"></i>
                                <div class="sparkline5 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-2 outline">
                                <h2><span class="count-number">321</span>M <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +10%</span> </h2>
                                <div class="small">Total users</div>
                                <i class="ti-user statistic_icon"></i>
                                <div class="sparkline6 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-3 outline">
                                <h2><span class="count-number">789</span>K <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +29%</span></h2>
                                <div class="small">Social users </div>
                                <i class="ti-world statistic_icon"></i>
                                <div class="sparkline7 text-center"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="statistic-box statistic-filled-4 outline">
                                <h2><span class="count-number">5489</span>$ <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +24%</span></h2>
                                <div class="small">Total Sales</div>
                                <i class="ti-bag statistic_icon"></i>
                                <div class="sparkline8 text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
                            <!-- Social Media widget -->
                            <div class="social-media-inner">
                                <ul class="social-media clearfix">
                                    <li>
                                        <a href="#" class="rss">
                                            <i class="fa fa-rss"></i>
                                            <div>2,035</div>
                                            <p>Subscribers</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="fb">
                                            <i class="fa fa-facebook"></i>
                                            <div>3,794</div>
                                            <p>Fans</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="g_plus">
                                            <i class="fa fa-google-plus"></i>
                                            <div>941</div>
                                            <p>Followers</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="you_tube">
                                            <i class="fa fa-youtube-play"></i>
                                            <div>7,820</div>
                                            <p>Subscribers</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="twitter">
                                            <i class="fa fa-twitter"></i>
                                            <div>1,562</div>
                                            <p>Followers</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="pint">
                                            <i class="fa fa-pinterest"></i>
                                            <div>1,310</div>
                                            <p>Followers</p>
                                        </a>
                                    </li>
                                </ul> <!-- /.social icon -->     
                            </div>
                            <!-- Graph Widget -->
                            <div class="graph-widget">
                                <div class="section section-graph">
                                    <div class="graph-info">
                                        <i class="graph-arrow"></i>
                                        <span class="graph-info-big">956.53</span>
                                        <span class="graph-info-small">+2.18 (3.71%)</span>
                                    </div>
                                    <!--<div id="graph"></div>-->
                                    <div class="graph text-center"></div>
                                </div>
                                <div class="section section-info">
                                    <span class="info-time">Today 2:25 PM</span>
                                    <h3 class="info-title">Salt Lake City, Utah</h3>
                                    <div class="info-block">
                                        <dl>
                                            <dt>13.5 M</dt>
                                            <dd>Shares Traded</dd>
                                        </dl>
                                    </div>
                                    <div class="info-block last">
                                        <dl>
                                            <dt>28.44</dt>
                                            <dd>Market Cap</dd>
                                        </dl>
                                    </div>
                                    <div class="info-aapl">
                                        <h4>AAPL</h4>
                                        <ul>
                                            <li><span class="orange" style="height: 37.5%"></span></li>
                                            <li><span class="orange" style="height: 47.5%"></span></li>
                                            <li><span class="orange" style="height: 70%"></span></li>
                                            <li><span class="orange" style="height: 85%"></span></li>
                                            <li><span class="orange" style="height: 40%"></span></li>
                                            <li><span class="green" style="height: 75%"></span></li>
                                            <li><span class="green" style="height: 50%"></span></li>
                                            <li><span class="green" style="height: 15%"></span></li>
                                            <li><span class="green" style="height: 25%"></span></li>
                                        </ul>
                                    </div>
                                    <div class="yearly-change">
                                        <h4>Yearly Change</h4>
                                        <span><em>+</em> 127.01</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
                            <!-- Weather widget -->
                            <div class="weather-widget">
                                <div class="weather-city">
                                    <div class="city-name">
                                        San Francisco, CA
                                    </div>
                                    <div class="time">16:08 GMT</div>
                                </div>
                                <div class="temp">
                                    <span class="icon rainy-2"></span>
                                    <span class="value">62</span>
                                    <span class="wind" style="transform: rotate(170deg)"><img src="{{ asset('assets/dist/img/weather/weather_sagittarius.svg') }}" alt=""></span>
                                </div>
                                <div class="meta">
                                    <span class="sunrise">Sunrise 09:33</span>
                                    <span class="icon">
                                        <img src="{{ asset('assets/dist/img/sunrise.svg') }}" alt="img">
                                    </span>
                                    <span class="sunset">Sunset 24:46</span>
                                </div>
                                <div class="weather-week">
                                    <div class="weather-days">
                                        <div class="day-0">Sun</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/cloudy.svg') }}" alt="">
                                            <!--<i class="wi wi-day-sunny"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-0">45</span>
                                            <span class="td-circle">°</span>
                                        </div>
                                    </div>
                                    <div class="weather-days">
                                        <div class="day-1">Mon</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/cloudy-day-1.svg') }}" alt="">
                                            <!--<i class="wi wi-day-cloudy-high"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-1">21</span>
                                            <span class="circle">°</span>
                                        </div>
                                    </div>
                                    <div class="weather-days">
                                        <div class="day-2">Tue</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/thunder.svg') }}" alt="">
                                            <!--<i class="wi wi-day-sleet"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-2">29</span>
                                            <span class="circle">°</span>
                                        </div>
                                    </div>
                                    <div class="weather-days">
                                        <div class="day-3">Wed</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/night.svg') }}" alt="">
                                            <!--<i class="wi wi-day-lightning"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-3">19</span>
                                            <span class="circle">°</span>
                                        </div>
                                    </div>
                                    <div class="weather-days">
                                        <div class="day-4">Thu</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/cloudy-night-1.svg') }}" alt="">
                                            <!--<i class="wi wi-sleet"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-4">54</span>
                                            <span class="circle">°</span>
                                        </div>
                                    </div>
                                    <div class="weather-days">
                                        <div class="day-4">Fri</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/snowy-6.svg') }}" alt="">
                                            <!--<i class="wi wi-smog"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-5">68</span>
                                            <span class="circle">°</span>
                                        </div>
                                    </div>
                                    <div class="weather-days">
                                        <div class="day-4">Sat</div>
                                        <div class="day-icon">
                                            <img src="{{ asset('assets/dist/img/weather/rainy-3.svg') }}" alt="">
                                            <!--<i class="wi wi-lightning"></i>-->
                                        </div>
                                        <div class="day-degrees">
                                            <span class="degrees-6">28</span>
                                            <span class="circle">°</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile widget -->
                            <div class="profile-widget">
                                <div class="panel panel-bd">
                                    <div class="panel-heading"> </div>
                                    <div class="panel-body">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="{{ asset('assets/dist/img/avatar.png') }}" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="media-heading">John Raymons</h2>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="btn-group btn-group-justified">
                                            <a class="btn btn-default" role="button"><i class="fa fa-eye"></i> 172</a>
                                            <a class="btn btn-default" role="button"><i class="fa fa-comment"></i> 34</a>
                                            <a class="btn btn-default highlight" role="button"><i class="fa fa-heart"></i> 210</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Login widget --> 
                            <div class="login-widget">
                                <div class="panel panel-bd" >
                                    <div class="panel-heading">
                                        <h4>Login to your account</h4>
                                    </div>
                                    <form id="loginform" class="form-horizontal">
                                        <div class="panel-body">
                                            <label for="login-email">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input id="login-email" type="text" class="form-control" name="email" value="" placeholder="Email">  
                                            </div>
                                            <label for="login-email">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input id="login-password" type="password" class="form-control" name="password" placeholder="******">
                                            </div>
                                        </div>
                                        <div class="panel-footer text-center">
                                            <div class="login-btn">
                                                <a href="#" class="btn btn-danger btn-block m-b-10"><i class="fa fa-play-circle"></i> Sign In</a>
                                                <a href="#"><small>Forgot Username or Password?</small></a>
                                            </div>
                                            <a href="#" class="facebook"><i class="fa fa-lg fa-facebook-square"></i> Login with Facebook</a>             
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <!-- Todo list -->
                            <div class="panel panel-bd">
                                <div class="panel-heading">
                                    <h4>Todo list</h4>
                                </div>
                                <div class="panel-body">
                                    <ul class="todo-list">
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo1" type="checkbox">
                                                <label for="todo1">Lorem ipsum dolor sit amet.</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo2" type="checkbox">
                                                <label for="todo2">Aenean sit amet tellus ornare eros.</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo3" type="checkbox">
                                                <label for="todo3">Donec vestibulum quam vel euismod tempus.</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo4" type="checkbox">
                                                <label for="todo4">Nullam ornare est et sem semper.</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo5" type="checkbox">
                                                <label for="todo5">Fusce volutpat justo id nulla malesuada.</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo6" type="checkbox">
                                                <label for="todo6">Phasellus non arcu at massa viverra varius.</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input id="todo7" type="checkbox">
                                                <label for="todo7">Vestibulum a elit id nisi venenatis lobortis.</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Monthly calender widget -->
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="monthly_calender">
                                        <div class="monthly" id="m_calendar"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pie chart Widget --> 
                            <div class="pie-chart-widget">
                                <div class="panel panel-bd">
                                    <div class="panel-heading"><h4>Data Transfer</h4> </div>
                                    <div class="panel-body">
                                        <canvas id="doughutChart" height="180"></canvas>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="list-block">
                                            <ul class="text-center legend">
                                                <li>Video<h2>62%</h2></li>
                                                <li>Photo<h2>21%</h2></li>
                                                <li>Audio<h2>10%</h2></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group btn-group-justified text-center">
                                            <a class="btn btn-default"><i class="fa fa-cloud-upload fa-lg"></i><br><small>Upload Files</small></a>
                                            <a class="btn btn-default"><i class="fa fa-share-alt fa-lg"></i><br><small>Share Link</small></a>
                                            <a class="btn btn-default"><i class="fa fa-history fa-lg"></i><br><small>Back Up</small></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.row -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/sparkline/sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartJs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/waypoints.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/monthly/monthly.js') }}"></script>
    <script>
            $(document).ready(function () {

                "use strict"; // Start of use strict

                //counter
                $('.count-number').counterUp({
                    delay: 10,
                    time: 5000
                });

                //Sparklines Charts
                $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5, 7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5, 6, 7, 2, 3, 4], {
                    type: 'bar',
                    barColor: '#fff',
                    height: '40',
                    barWidth: '3',
                    barSpacing: 2
                });

                $(".sparkline2").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7, 6, 8, 3, 2, 6], {
                    type: 'discrete',
                    lineColor: '#fff',
                    width: '200',
                    height: '40'
                });

                $(".sparkline3").sparkline([5, 6, 7, 2, 0, -4, -2, -3, -4, 4, 5, 6, 3, 2, 4, -6, -5, -4, 6, 5, 4, 3, 4, -3, -5, -4, 5, 4, 3, 6, -2, -3, -4, -5, 5, 6, 3, 4, 5], {
                    type: 'bar',
                    barColor: '#fff',
                    negBarColor: '#c6c6c6',
                    width: '200',
                    height: '40'
                });

                $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
                    type: 'line',
                    height: '40',
                    width: '100%',
                    lineColor: '#fff',
                    fillColor: 'rgba(255,255,255,0.1)'
                });


                $('.sparkline5').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5, 7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5, 6, 7, 2, 3, 4], {
                    type: 'bar',
                    barColor: '#558B2F',
                    height: '40',
                    barWidth: '3',
                    barSpacing: 2
                });

                $(".sparkline6").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7, 6, 8, 3, 2, 6], {
                    type: 'discrete',
                    lineColor: '#E5343D',
                    width: '200',
                    height: '40'
                });

                $(".sparkline7").sparkline([5, 6, 7, 2, 0, -4, -2, -3, -4, 4, 5, 6, 3, 2, 4, -6, -5, -4, 6, 5, 4, 3, 4, -3, -5, -4, 5, 4, 3, 6, -2, -3, -4, -5, 5, 6, 3, 4, 5], {
                    type: 'bar',
                    barColor: '#5b69bc',
                    negBarColor: '#5b69bc',
                    width: '200',
                    height: '40'
                });

                $(".sparkline8").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
                    type: 'line',
                    height: '40',
                    width: '100%',
                    lineColor: '#EF6C00',
                    fillColor: '#EF6C00'
                });

                //monthly calender
                $('#m_calendar').monthly({
                    mode: 'event',
                    //jsonUrl: 'events.json',
                    //dataType: 'json'
                    xmlUrl: 'events.xml'
                });

                //graph
                $(".graph").sparkline([5, 6, 7, 2, 0, -4, -2, -3, -4, 4, 5, 6, 3, 2, 4, -6, -5, -4, 6, 5, 4, 3, 4, -3, -5, -4, 5, 4, 3, 6, -2, -3, -4, -5, 5, 6, 3, 4, 5, 6, -6, -5, -4, -3, -3, -4, -5, 6, 5, 4, 3, 3, 4, 5, 6, -6, -4, -5, -3, -6], {
                    type: 'bar',
                    barColor: '#fff',
                    negBarColor: '#c6c6c6',
                    width: '200',
                    height: '110'
                });

                //doughut chart
                var ctx = document.getElementById("doughutChart");
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                                data: [45, 25, 20, 10],
                                backgroundColor: [
                                    "rgba(55,160,0,0.9)",
                                    "rgba(55,160,0,0.7)",
                                    "rgba(55,160,0,0.5)",
                                    "rgba(0,0,0,0.07)"
                                ],
                                hoverBackgroundColor: [
                                    "rgba(55,160,0,0.9)",
                                    "rgba(55,160,0,0.7)",
                                    "rgba(55,160,0,0.5)",
                                    "rgba(0,0,0,0.07)"
                                ]

                            }],
                        labels: [
                            "green",
                            "green",
                            "green",
                            "green"
                        ]
                    },
                    options: {
                        responsive: true
                    }
                });

            });
        </script>
@endpush
