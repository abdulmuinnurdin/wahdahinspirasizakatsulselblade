@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'NEW PRODUCTS',
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
                    <div class="header-function-wrapper">
                        <button type="button" class="btn btn-default m-b-5"><i class="fa fa-long-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-labeled btn-success m-b-5"><span class="btn-label"><i class="fa fa-plus"></i></span>ADD ATTRIBUTE</button>
                    	<button type="button" class="btn btn-labeled btn-primary m-b-5"><span class="btn-label"><i class="fa fa-check"></i></span>SAVE</button>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Main Attribute</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="example">Product Name</label>
                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                <label for="example">SKU</label>
                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                <label for="example">Price</label>
                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-2">
                                            <div class="form-group">
                                                <label for="example">QTY</label>
                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelect1">Type</label>
                                                <select class="form-control" id="exampleSelect1">
                                                    <option>Bag</option>
                                                    <option>Shoes</option>
                                                    <option>Clothes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-2">
                                           <div class="form-group">
                                                <label for="exampleSelect1">Stock Status</label>
                                                <select class="form-control" id="exampleSelect1">
                                                    <option>In-Stock</option>
                                                    <option>Out of Stock</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Content</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4>Short Description</h4>
                                            <div class="form-group">
                                                <textarea name="editor1" id="editor1" rows="10" cols="80">
                                                    This is my textarea to be replaced with CKEditor.
                                                </textarea> <!-- /.Ck Editor -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <h4>Full Description</h4>
                                            <div class="form-group">
                                                <textarea name="editor2" id="editor2" rows="10" cols="80">
                                                    This is my textarea to be replaced with CKEditor.
                                                </textarea> <!-- /.Ck Editor -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Configurations</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>Configurable products allow customers to choose options (Ex: shirt color). You need to create a simple product for each configuration (Ex: a product for each color).</p>
                                            <button type="button" class="btn btn-inverse m-b-5">Create Configurations</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Product Images/Video</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12">
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
                    <div class="bottom-function-wrapper">
                        <button type="button" class="btn btn-default m-b-5"><i class="fa fa-long-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-labeled btn-success m-b-5"><span class="btn-label"><i class="fa fa-plus"></i></span>ADD ATTRIBUTE</button>
                        <button type="button" class="btn btn-labeled btn-primary m-b-5"><span class="btn-label"><i class="fa fa-check"></i></span>SAVE</button>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor-active.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone-active.js') }}"></script>
    <script>
                CKEDITOR.replace( 'editor2' );
            </script>
@endpush
