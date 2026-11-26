@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'CREATE PRODUCTS CONFIGURATIONS',
    'headerSubtitle' => '',
    'breadcrumb' => 'Data Tables',
    'headerIcon' => 'pe-7s-box1',
])

@push('css')
    <link href="{{ asset('assets/plugins/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="steps-wrapper">
                        <div class="steps-container">
                            <div class="steps">
                                <a href="#" class="steps-btn steps-btn-success">
                                    <div class="steps-btn-icon">1</div>
                                    <div class="steps-btn-text">
                                        Select Attributes
                                    </div>
                                </a>
                                <a href="#" class="steps-btn steps-btn-active">
                                    <div class="steps-btn-icon">2</div>
                                    <div class="steps-btn-text">
                                        Attributes Values
                                    </div>
                                </a>
                                <a href="#" class="steps-btn">
                                    <div class="steps-btn-icon">3</div>
                                    <div class="steps-btn-text">
                                        Images & Prices
                                    </div>
                                </a>
                                <a href="#" class="steps-btn">
                                    <div class="steps-btn-icon">4</div>
                                    <div class="steps-btn-text">
                                        Summary
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="steps-btns-container">
                            <button type="button" class="btn btn-clear">Cancel</button>
                            <button type="button" class="btn btn-default btn-prev"><i class="ti-angle-left"></i> Prev</button>
                            <button type="button" class="btn btn-default btn-next">Next <i class="ti-angle-right"></i></button>
                        </div>
                    </div>
                    <div class="header-function-wrapper">
                        <div class="header-function-aux-wrapper">
                            <div class="header-function-aux">
                                <h3>Step 2: Attribute Values</h3>
                                <p>Select values from each attribute to include in this product. Each unique combination of values creates a unique product SKU.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-heading panel-heading-custom">
                                    <div class="panel-title p-l-15">
                                        <h4>Color (12 options)</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-default">Select All</button>
                                        <button type="button" class="btn btn-sm btn-default">Deselect All</button>
                                        <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-heading panel-heading-custom">
                                    <div class="panel-title p-l-15">
                                        <h4>Format (12 options)</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-default">Select All</button>
                                        <button type="button" class="btn btn-sm btn-default">Deselect All</button>
                                        <button type="button" class="btn btn-sm btn-outline btn-danger"><i class="ti-trash"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="checkbox checkbox-default">
                                                <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">Option</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.min.js') }}"></script>
@endpush
