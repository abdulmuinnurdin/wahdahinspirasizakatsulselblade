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
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>
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
                                <a href="#" class="steps-btn steps-btn-success">
                                    <div class="steps-btn-icon">2</div>
                                    <div class="steps-btn-text">
                                        Attributes Values
                                    </div>
                                </a>
                                <a href="#" class="steps-btn steps-btn-active">
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
                                <h3>Step 3: Bulk Images, Price and Quantity</h3>
                                <p>Based on your selections 1 new products will be created. Use this step to customize images and price for your new products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Images</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="radio">
                                                <input type="radio" name="radio1" id="radio1" value="option1" checked="">
                                                <label for="radio1">Apply single set of images to all SKUs</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="radio1" id="radio1" value="option1" >
                                                <label for="radio1">Apply unique images by attribute to each SKU</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="radio1" id="radio1" value="option1" >
                                                <label for="radio1">Skip image uploading at this time</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="product-config-images-upload-wrapper">
                                                <form action="#" class="dropzone" id="dropzoneForm">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Price</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="radio">
                                                <input type="radio" name="radio1" id="radio1" value="option1" checked="">
                                                <label for="radio1">Apply single set of price to all SKUs</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="radio1" id="radio1" value="option1" >
                                                <label for="radio1">Apply unique price by attribute to each SKU</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="radio1" id="radio1" value="option1" >
                                                <label for="radio1">Skip price uploading at this time</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label for="example">Price</label>
                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
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
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone-active.js') }}"></script>
@endpush
