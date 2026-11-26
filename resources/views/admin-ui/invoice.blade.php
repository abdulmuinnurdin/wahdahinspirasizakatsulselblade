@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Invoice',
    'headerSubtitle' => 'Clean invoice template.',
    'breadcrumb' => 'Invoice',
    'headerIcon' => 'pe-7s-news-paper',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="{{ asset('assets/dist/img/dark-logo.png') }}" class="img-responsive" alt="">
                                            <br>
                                            <address>
                                                <strong>Twitter, Inc.</strong><br>
                                                1355 Market Street, Suite 900<br>
                                                San Francisco, CA 94103<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                            </address>
                                            <address>
                                                <strong>Full Name</strong><br>
                                                <a href="mailto:#">first.last@example.com</a>
                                            </address>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <h1 class="m-t-0">Invoice #0044777</h1>
                                            <div>Issued March 19th, 2017</div>
                                            <div class="text-danger m-b-15">Payment due April 21th, 2017</div>
                                            <address>
                                                <strong>Twitter, Inc.</strong><br>
                                                1355 Market Street, Suite 900<br>
                                                San Francisco, CA 94103<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                            </address>
                                        </div>
                                    </div> <hr>
                                    <div class="table-responsive m-b-20">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item List</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Tax</th>
                                                    <th>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><div><strong>Lorem Ipsum is simply dummy text</strong></div>
                                                        <small>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots</small></td>
                                                    <td>1</td>
                                                    <td>$39.00</td>
                                                    <td>$71.98</td>
                                                    <td>$27,98</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div><strong>It is a long established fact that a reader will be</strong></div>
                                                        <small>There are many variations of passages of Lorem Ipsum available, but the majority</small>
                                                    </td>
                                                    <td>2</td>
                                                    <td>$57.00</td>
                                                    <td>$56.80</td>
                                                    <td>$112.80</td>
                                                </tr>
                                                <tr>
                                                    <td><div><strong>The standard chunk of Lorem Ipsum used since</strong></div>
                                                        <small>It has survived not only five centuries, but also the leap into electronic .</small></td>
                                                    <td>3</td>
                                                    <td>$645.00</td>
                                                    <td>$321.20</td>
                                                    <td>$1286.20</td>
                                                </tr>
                                                <tr>
                                                    <td><div><strong>The standard chunk of Lorem Ipsum used since</strong></div>
                                                        <small>It has survived not only five centuries, but also the leap into electronic .</small></td>
                                                    <td>3</td>
                                                    <td>$486.00</td>
                                                    <td>$524.20</td>
                                                    <td>$789.20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                                to make a type specimen book.</p>
                                            <p><strong>Thank you very much for choosing us. It was a pleasure to have worked with you.</strong></p>
                                            <img src="{{ asset('assets/dist/img/credit/AM_mc_vs_ms_ae_UK.png') }}" class="img-responsive" alt="">

                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="list-unstyled text-left">
                                                <li>
                                                    <strong>Sub - Total amount:</strong> $9265 </li>
                                                <li>
                                                    <strong>Discount:</strong> 12.9% </li>
                                                <li>
                                                    <strong>VAT:</strong> ----- </li>
                                                <li>
                                                    <strong>Grand Total:</strong> $12489 </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-left">
                                    <button type="button" class="btn btn-info" onclick="myFunction()"><span class="fa fa-print"></span></button>
                                    <button type="button" class="btn btn-success"><i class="fa fa-dollar"></i> Make A Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection