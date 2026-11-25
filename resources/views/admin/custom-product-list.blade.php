@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'PRODUCTS',
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
                    <div class="header-function-wrapper">
                    	<div class="btn-group m-b-5">
                            <button type="button" class="btn btn-primary">ADD PRODUCT</button>
                            <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary">
                                <span class="caret"></span>
                                <span class="sr-only">default</span>
                            </button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">Simple Product</a></li>
                                <li><a href="#">Configurable Product</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Product list</h4>
                                    </div>
                                </div>
                                <div class="panel-function panel-body p-0">
                                    <div class="panel-function-container">
                                        <div class="panel-function-aux-right">
                                            <button type="button" class="btn btn-labeled btn-primary m-b-5" data-toggle="collapse" data-target="#filter-form-collapse" aria-expanded="false" aria-controls="filter-form-collapse">
                                                <span class="btn-label"><i class="fa fa-filter"></i></span>Filter
                                            </button>
                                            <div class="btn-group m-b-5">
                                                <button type="button" data-toggle="dropdown" class="btn btn-labeled dropdown-toggle btn-default" aria-expanded="true"><span class="btn-label"><i class="fa fa-eye"></i></span>Default View
                                                    <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                            <button type="button" class="btn btn-labeled dropdown-toggle btn-default m-b-5" data-toggle="modal" data-target="#setting-column"><span class="btn-label"><i class="fa fa-gear"></i></span>Column
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-function-filter-wrapper">
                                        <div class="panel-function-filter-list-wrapper">
                                            <div class="filter-label">Filter:</div>
                                            <div class="filter-list">
                                                <div class="filter-item">
                                                    This is filter name
                                                    <span class="filter-delete"><i class="ti-close"></i></span>
                                                </div>
                                            </div>
                                            <div class="filter-clear">
                                                <button type="button" class="btn btn-default m-b-5">Clear All</button>
                                            </div>
                                        </div>
                                        <div class="panel-function-filter-form collapse" id="filter-form-collapse">
                                            <div class="panel-function-filter-form-inner">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <div class="form-group">
                                                            <label for="example">This is Label</label>
                                                            <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <div class="form-group">
                                                            <label for="example">This is Label</label>
                                                            <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <div class="form-group">
                                                            <label for="example">This is Label</label>
                                                            <input type="text" class="form-control" id="example" aria-describedby="example" placeholder="Enter here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-wrapper">
                                                    <button type="button" class="btn btn-default m-b-5">Cancel</button>
                                                    <button type="button" class="btn btn-primary m-b-5">Apply Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-function-container border-top">
                                        <div class="function-search-container">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search for...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button"><i class="ti-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="btn-group m-b-5">
                                            <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-default btn-h-36">Actions 
                                                <span class="caret"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <div class="data-view-select">
                                            <div class="btn-group m-b-5">
                                                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-default btn-h-36">20 
                                                    <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#">20</a></li>
                                                </ul>
                                            </div>
                                            per page
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover table-product-list">
                                            <thead>
                                                <tr>
                                                    <th class="data-id">ID</th>
                                                    <th class="data-thumb">Thumbnail</th>
                                                    <th class="data-name">Name</th>
                                                    <th class="data-type">Type</th>
                                                    <th class="data-sku">SKU</th>
                                                    <th class="data-price">Price</th>
                                                    <th class="data-qty">Qty</th>
                                                    <th class="data-status">Status</th>
                                                    <th class="data-action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                            		<td class="data-id">1</td>
                                                    <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                    <td class="data-name">Duffle Bag</td>
                                                    <td class="data-type">Bag</td>
                                                    <td class="data-sku">25645984</td>
                                                    <td class="data-price">$320,800</td>
                                                    <td class="data-qty">61</td>
                                                    <td class="data-status">Enabled</td>
                                                    <td class="data-action"><button type="button" class="btn btn-sm btn-default m-b-5">Edit</button></td>
                                            	</tr>
                                            	<tr>
                                            		<td class="data-id">1</td>
                                                    <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                    <td class="data-name">Duffle Bag</td>
                                                    <td class="data-type">Bag</td>
                                                    <td class="data-sku">25645984</td>
                                                    <td class="data-price">$320,800</td>
                                                    <td class="data-qty">61</td>
                                                    <td class="data-status">Enabled</td>
                                                    <td class="data-action"><button type="button" class="btn btn-sm btn-default m-b-5">Edit</button></td>
                                            	</tr>
                                            	<tr>
                                            		<td class="data-id">1</td>
                                                    <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                    <td class="data-name">Duffle Bag</td>
                                                    <td class="data-type">Bag</td>
                                                    <td class="data-sku">25645984</td>
                                                    <td class="data-price">$320,800</td>
                                                    <td class="data-qty">61</td>
                                                    <td class="data-status">Enabled</td>
                                                    <td class="data-action"><button type="button" class="btn btn-sm btn-default m-b-5">Edit</button></td>
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
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.min.js') }}"></script>
@endpush
