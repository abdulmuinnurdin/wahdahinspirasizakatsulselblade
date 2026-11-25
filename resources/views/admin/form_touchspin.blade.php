@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Bootstrap Touchspin',
    'headerSubtitle' => 'A mobile and touch friendly input spinner component for Bootstrap 3. It supports the mousewheel and the up/down keys.',
    'breadcrumb' => 'Touchspin',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Bootstrap TouchSpin</h4>
                                    </div>
                                </div>
                                <form>
                                    <div class="panel-body">
                                        <p class="col-sm-12 m-b-20">A mobile and touch friendly input spinner component for Bootstrap 3. It supports
                                            the<br> mousewheel and the up/down keys.</p>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Example with postfix (large):</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo1" type="text" value="55" name="demo1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">With prefix:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo2" type="text" value="0" name="demo2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Vertical button alignment:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo_vertical" type="text" value="" name="demo_vertical" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Vertical custom icons:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo_vertical2" type="text" value="" name="demo_vertical2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Init with empty value:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo3" type="text" value="" name="demo3" class="form-control">
                                            </div>
                                        </div>
                                        <p class="col-sm-12 m-b-20">The <code>initval</code> setting is only applied when no explicit value is set on 
                                            the input with the<br> <code>value</code> attribute.</p>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Value attribute is not set:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo3_21" type="text" value="" name="demo3_21" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Value is set explicitly to 33:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo3_22" type="text" value="33" name="demo3_22" class="form-control">
                                            </div>
                                        </div>
                                        <p class="col-sm-12 m-b-20">Size of the whole controller can be set with applying <code>input-sm</code> or <code>input-lg</code> class 
                                            on the<br> input, or by applying the plugin on an input inside an <code>input-group</code> with the proper size<br>
                                            class(<code>input-group-sm</code> or <code>input-group-lg</code>).</p>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Button group:</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="demo5" type="text" class="form-control" name="demo5" value="50">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default">Action</button>
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Button postfix (small):</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input id="demo4" type="text" value="" name="demo4" class="input-sm form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Button postfix (large):</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="input-group input-group-lg">
                                                    <input id="demo4_2" type="text" value="" name="demo4_2" class="form-control input-lg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button type="button" class="btn btn-primary w-md m-b-5">Submit</button>
                                                <button type="button" class="btn btn-default w-md m-b-5">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/touchspin-active.js') }}"></script>
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@endpush
