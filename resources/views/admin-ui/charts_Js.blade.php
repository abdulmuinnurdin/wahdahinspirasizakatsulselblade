@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Chart js',
    'headerSubtitle' => 'Simple yet flexible JavaScript charting for designers & developers',
    'breadcrumb' => 'Charts Js',
    'headerIcon' => 'pe-7s-graph3',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <!-- Bar Chart -->
                        <div class="col-sm-12 col-md-6">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Bar chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="barChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Radar Chart -->
                        <div class="col-sm-12 col-md-6">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Rader chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="radarChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Line Chart -->
                        <div class="col-sm-12 col-md-8">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Line chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="lineChart" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Pie chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="pieChart" height="310"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Doughnut Chart -->
                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Doughut chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="doughutChart" height="310"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Polar Chart -->
                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Polar chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="polarChart" height="310"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Single Bar Chart -->
                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Single Bar Chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="singelBarChart" height="310"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/chartJs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartJs/chart-active.js') }}"></script>
@endpush
