@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Sparkline Charts',
    'headerSubtitle' => 'Preview sample. Documentation here: <a href="http://omnipotent.net/jquery.sparkline/#s-about" target="_blank">http://omnipotent.net/jquery.sparkline/#s-about</a>',
    'breadcrumb' => 'Sparkline Charts',
    'headerIcon' => 'pe-7s-display1',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="spark_about">
                                <p>
                                    This <a href="http://jquery.com/">jQuery</a> plugin generates <a href="http://en.wikipedia.org/wiki/Sparkline">
                                        sparklines</a> (small inline charts) directly in the browser using data supplied either inline in the HTML,
                                    or via javascript.
                                </p>
                                <p>
                                    The plugin is compatible with most modern browsers and has been tested with Firefox 2+, Safari 3+, Opera 9, Google
                                    Chrome and Internet Explorer 6, 7, 8, 9 &amp; 10 as well as iOS and Android. Each example displayed below takes just 1 
                                    line of HTML or javascript to generate.
                                </p>
                                <p>
                                    The plugin was written by <a href="http://omnipotent.net/">Gareth Watts</a>
                                    for <a href="http://www.splunk.com/">Splunk Inc</a> and released under the
                                    <a href="http://www.opensource.org/licenses/BSD-3-Clause">New BSD License</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Sparklines Charts -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <!-- statistic box -->
                            <div class="statistic-box statistic-filled-1">
                                <h2><span class="count-number">696</span>K <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +28%</span></h2>
                                <div class="small">Visitors this Month</div>
                                <i class="ti-server statistic_icon"></i>
                                <div class="sparkline1 text-center"></div>
                            </div> <!-- /. statistic box -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <!-- statistic box -->
                            <div class="statistic-box statistic-filled-2">
                                <h2><span class="count-number">321</span>M <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +10%</span> </h2>
                                <div class="small">Total users</div>
                                <i class="ti-user statistic_icon"></i>
                                <div class="sparkline2 text-center"></div>
                            </div>  <!-- /.statistic box -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <!-- statistic box -->
                            <div class="statistic-box statistic-filled-3">
                                <h2><span class="count-number">789</span>K <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +29%</span></h2>
                                <div class="small">Social users </div>
                                <i class="ti-world statistic_icon"></i>
                                <div class="sparkline3 text-center"></div>
                            </div> <!-- /.statistic box -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <!-- statistic box -->
                            <div class="statistic-box statistic-filled-4">
                                <h2><span class="count-number">5489</span>$ <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +24%</span></h2>
                                <div class="small">Total Sales</div>
                                <i class="ti-bag statistic_icon"></i>
                                <div class="sparkline4 text-center"></div>
                            </div> <!--/. statistic box -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Sparklines Example chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Graph</th>
                                                    <th>Type</th>
                                                    <th>Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span id="sparkline5"></span></td>
                                                    <td>Inline line chart</td>
                                                    <td>{ type: 'line', lineColor: '#37a000', fillColor: '#37a000', width: '150', height: '20' }</td>
                                                </tr>
                                                <tr>
                                                    <td><span id="sparkline6"></span></td>
                                                    <td>Bar chart</td>
                                                    <td>{ type: 'bar', barColor: '#37a000', negBarColor: '#c6c6c6', width: '150', height: '20' }</td>
                                                </tr>
                                                <tr>
                                                    <td><span id="sparkline7"></span></td>
                                                    <td>Pie chart</td>
                                                    <td>{ type: 'pie', sliceColors: ['#37a000', '#ffffff'], width: '150', height: '20' }</td>
                                                </tr>
                                                <tr>
                                                    <td><span id="sparkline8"></span></td>
                                                    <td>Long inline chart</td>
                                                    <td>{ type: 'line', lineColor: '#37a000', fillColor: '#37a000', width: '150', height: '20' }</td>  
                                                </tr>
                                                <tr>
                                                    <td><span id="sparkline9"></span> </td>
                                                    <td>Tristate chart</td>
                                                    <td>{ type: 'tristate', posBarColor: '#37a000', negBarColor: '#ffffff', width: '150', height: '20'}</td>
                                                </tr>
                                                <tr>
                                                    <td><span id="sparkline10"></span></td>
                                                    <td>Discrete chart</td>
                                                    <td>{ type: 'discrete', lineColor: '#37a000', width: '150', height: '20'}); }</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/counterup/waypoints.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline/sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline/sparkline-active.js') }}"></script>
@endpush
