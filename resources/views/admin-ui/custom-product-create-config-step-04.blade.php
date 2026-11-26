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
                            <button type="button" class="btn btn-primary btn-next">Generate Products</button>
                        </div>
                    </div>
                    <div class="header-function-wrapper">
                        <div class="header-function-aux-wrapper">
                            <div class="header-function-aux">
                                <h3>Step 4: Summary</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>New Products Review</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover table-product-list">
                                            <thead>
                                                <tr>
                                                    <th class="data-thumb">Thumbnail</th>
                                                    <th class="data-type">Type</th>
                                                    <th class="data-sku">SKU</th>
                                                    <th class="data-price">Price</th>
                                                    <th class="data-qty">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                    <td class="data-type">Bag</td>
                                                    <td class="data-sku">25645984</td>
                                                    <td class="data-price">$320,800</td>
                                                    <td class="data-qty">61</td>
                                                </tr>
                                                <tr>
                                                    <td class="data-thumb"><img src="{{ asset('assets/dist/img/bag.jpg') }}"></td>
                                                    <td class="data-type">Bag</td>
                                                    <td class="data-sku">25645984</td>
                                                    <td class="data-price">$320,800</td>
                                                    <td class="data-qty">61</td>
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
