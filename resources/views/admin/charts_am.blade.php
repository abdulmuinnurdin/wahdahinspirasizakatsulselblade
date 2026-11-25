@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Am Charts',
    'headerSubtitle' => 'Programming libraries and tools for all your data visualization needs. Documentation : <a href="https://www.amcharts.com/" target="_blank">https://www.amcharts.com/</a>',
    'breadcrumb' => 'Am Charts',
    'headerIcon' => 'pe-7s-graph1',
])

@push('css')
    <link href="{{ asset('assets/plugins/amcharts/export.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <i class="ti-panel"></i>
                                        <h4>CSS animations Chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- amcharts -->
                                    <div id="chartdiv3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <i class="ti-pie-chart"></i>
                                        <h4>Colors Pie Chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- amcharts -->
                                    <div id="chartPie"></div>
                                    <div class="chart-legend">
                                        <div class="chart-legend-item">
                                            <div class="chart-legend-color red"></div>
                                            <p>From Google</p>
                                            <p class="percentage">63.259 %</p>
                                        </div>
                                        <!-- /.chart legend item -->
                                        <div class="chart-legend-item">
                                            <div class="chart-legend-color blue"></div>
                                            <p>Your Website</p>
                                            <p class="percentage">25.321 %</p>
                                        </div>
                                        <!-- /.chart legend item -->
                                        <div class="chart-legend-item">
                                            <div class="chart-legend-color green"></div>
                                            <p>Other Search Engines</p>
                                            <p class="percentage">11.42 %</p>
                                        </div>
                                        <!-- /.chart legend item -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-body">
                                    <!-- Zoomable Value Axis -->
                                    <div id="zoomable"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-bd ">
                                <div class="panel-body">
                                    <!-- amcharts -->
                                    <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <!-- amcharts -->
                                    <div id="chartMap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <!-- Column chart with images on top -->
                                    <div id="column"></div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/amcharts/amcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/ammap.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/worldLow.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/serial.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/export.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/light.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/amstock.js') }}"></script>
    <script src="{{ asset('assets/plugins/amcharts/amcharts-active.js') }}"></script>
@endpush
