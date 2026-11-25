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
                    <div class="header-function-wrapper">
                        <div class="alert alert-warning" role="alert">
                            <i class="fa fa-info-circle"></i>
                            When you remove or add an attribute, we automatically update all configurations and you will need to recreate current configurations manually.
                        </div>
                    </div>
                    <div class="steps-wrapper">
                        <div class="steps-container">
                            <div class="steps">
                                <a href="#" class="steps-btn steps-btn-active">
                                    <div class="steps-btn-icon">1</div>
                                    <div class="steps-btn-text">
                                        Select Attributes
                                    </div>
                                </a>
                                <a href="#" class="steps-btn">
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
                                <h3>Step 1: Select Attributes</h3>
                                <p>Selected Attribute: Color, Format</p>
                            </div>
                            <div class="header-function-aux-btns-wrapper">
                                <button type="button" class="btn btn-primary">Create New Attribute</button>
                            </div>
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
                                                    <th class="data-check">
                                                        <div class="checkbox checkbox-primary checkbox-no-label">
                                                            <input id="checkbox2" type="checkbox" checked="">
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </th>
                                                    <th class="data-att-code">Attribute Code</th>
                                                    <th class="data-att-label">Attribute Label</th>
                                                    <th class="data-req">Required</th>
                                                    <th class="data-system">System</th>
                                                    <th class="data-visible">Visible</th>
                                                    <th class="data-scope">Scope</th>
                                                    <th class="data-search">Searchable</th>
                                                    <th class="data-compare">Comparable</th>
                                                    <th class="data-layer">Use in Layered Navigation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                    <td class="data-check">
                                                        <div class="checkbox checkbox-primary checkbox-no-label">
                                                            <input id="checkbox2" type="checkbox" checked="">
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td>
                                            		<td class="data-att-code">color</td>
                                                    <td class="data-att-label">Color</td>
                                                    <td class="data-req">No</td>
                                                    <td class="data-system">Yes</td>
                                                    <td class="data-visible">Yes</td>
                                                    <td class="data-scope">Global</td>
                                                    <td class="data-search">No</td>
                                                    <td class="data-compare">No</td>
                                                    <td class="data-layer">Filterable (with result)</td>
                                            	</tr>
                                            	<tr>
                                                    <td class="data-check">
                                                        <div class="checkbox checkbox-primary checkbox-no-label">
                                                            <input id="checkbox2" type="checkbox" checked="">
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td>
                                                    <td class="data-att-code">format</td>
                                                    <td class="data-att-label">Format</td>
                                                    <td class="data-req">No</td>
                                                    <td class="data-system">Yes</td>
                                                    <td class="data-visible">Yes</td>
                                                    <td class="data-scope">Global</td>
                                                    <td class="data-search">No</td>
                                                    <td class="data-compare">No</td>
                                                    <td class="data-layer">Filterable (with result)</td>
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
