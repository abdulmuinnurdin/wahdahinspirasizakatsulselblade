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
                                        <div class="col-xs-12 m-b-15">
                                            <p>Configurable products allow customers to choose options (Ex: shirt color). You need to create a simple product for each configuration (Ex: a product for each color).</p>
                                            <button type="button" class="btn btn-default m-b-5">Add Products Manually</button>
                                            <button type="button" class="btn btn-inverse m-b-5">Create Configurations</button>
                                        </div>
                                        <div class="col-xs-12">
                                            <h4>Current Variations</h4>
                                            <div class="table-responsive">
                                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover table-product-list">
                                                    <thead>
                                                        <tr>
                                                            <th class="data-thumb">Thumbnail</th>
                                                            <th class="data-name">Name</th>
                                                            <th class="data-type">Type</th>
                                                            <th class="data-sku">SKU</th>
                                                            <th class="data-price">Price</th>
                                                            <th class="data-qty">Qty</th>
                                                            <th class="data-qty">Attributes</th>
                                                            <th class="data-status">Status</th>
                                                            <th class="data-action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                            <td class="data-name">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-type">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-sku">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-price">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-qty">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-att">Color, Format, Weight</td>
                                                            <td class="data-status">Enabled</td>
                                                            <td class="data-action">
                                                                <select class="form-control" id="exampleSelect1">
                                                                    <option>Action Option</option>
                                                                    <option>Action Option</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                            <td class="data-name">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-type">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-sku">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-price">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-qty">
                                                                <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                            </td>
                                                            <td class="data-att">Color, Format, Weight</td>
                                                            <td class="data-status">Enabled</td>
                                                            <td class="data-action">
                                                                <select class="form-control" id="exampleSelect1">
                                                                    <option>Action Option</option>
                                                                    <option>Action Option</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pagination-wrapper">
                                                <nav aria-label="Page navigation example">
                                                  <ul class="pagination">
                                                    <li class="page-item">
                                                      <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                      </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                      <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                      </a>
                                                    </li>
                                                  </ul>
                                                </nav>
                                            </div>
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
