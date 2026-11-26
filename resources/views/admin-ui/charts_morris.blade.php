@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Morris Charts',
    'headerSubtitle' => 'Good looking charts shouldn\'t be difficult',
    'breadcrumb' => 'Morris Charts',
    'headerIcon' => 'pe-7s-graph3',
])

@push('css')
    <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Area Line Graph with Tooltips</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="morris-area-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Donut Chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="morris-donut-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Line Graph with Tooltips</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="morris-line-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="panel panel-bd lobidisable" data-initial-index="4">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Bar Graph</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="morris-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris-data.js') }}"></script>
@endpush
