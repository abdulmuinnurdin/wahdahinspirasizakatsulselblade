@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Tables',
    'headerSubtitle' => 'Simple table form bootstrap',
    'breadcrumb' => 'tabs',
    'headerIcon' => 'pe-7s-box1',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4> Basic example</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to
                                        any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for
                                        other plugins like calendars and date pickers, we've opted to isolate our custom table styles.</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Striped and hover rows </h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.</p>
                                    <p>Add <code>.table-hover</code> to enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel lobidisable panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Contextual classes</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>Use contextual classes to color table rows or individual cells.<code>.success</code>
                                        <code>.danger</code><code>.info</code><code>.warning</code><code>.active</code></p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Default</td>
                                                    <td>Defaultson</td>
                                                    <td>def@somemail.com</td>
                                                </tr>      
                                                <tr class="success">
                                                    <td>Success</td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr class="danger">
                                                    <td>Danger</td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                <tr class="info">
                                                    <td>Info</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                </tr>
                                                <tr class="warning">
                                                    <td>Warning</td>
                                                    <td>Refs</td>
                                                    <td>bo@example.com</td>
                                                </tr>
                                                <tr class="active">
                                                    <td>Active</td>
                                                    <td>Activeson</td>
                                                    <td>act@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel lobidisable panel-bd">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Bordered table</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p class="m-b-15">Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Naeem</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Ashton Cox</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Abraham</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Responsive tables </h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive</code> to make them scroll
                                        horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, you will not see any
                                        difference in these tables.</p>
                                    <div><h4>Vertical clipping/truncation</h4>
                                        <p class="m-b-15">Responsive tables make use of <code>overflow-y: hidden</code>, which clips off any content that goes beyond the
                                            bottom or top edges of the table. In particular, this can clip off dropdown menus and other third-party widgets.</p>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Order ID</th>
                                                    <th>Fell Name </th>
                                                    <th>Email </th>
                                                    <th>Place Date</th>
                                                    <th>Pickup Date </th>
                                                    <th>Delivery Date</th>
                                                    <th>Status </th>
                                                    <th>Price </th>
                                                    <th>Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox1" type="checkbox">
                                                            <label for="checkbox1"></label>
                                                        </div>
                                                    </td>
                                                    <td>JS325</td>
                                                    <td>Naeem Khan</td>
                                                    <td>naeem@gmail.com</td>
                                                    <td>30.05.1016</td>
                                                    <td>10.06.2016</td>
                                                    <td>10.06.2016</td>
                                                    <td>Complete</td>
                                                    <td>$43</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox2" type="checkbox">
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td>
                                                    <td>JS325</td>
                                                    <td>Naeem Khan</td>
                                                    <td>Thememinister@gmail.com</td>
                                                    <td>30.05.1016</td>
                                                    <td>10.06.2016</td>
                                                    <td>10.06.2016</td>
                                                    <td>Complete</td>
                                                    <td>$43</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox3" type="checkbox">
                                                            <label for="checkbox3"></label>
                                                        </div>
                                                    </td>
                                                    <td>JS325</td>
                                                    <td>Mark</td>
                                                    <td>admin@gmail.com</td>
                                                    <td>30.05.1016</td>
                                                    <td>10.06.2016</td>
                                                    <td>10.06.2016</td>
                                                    <td>Complete</td>
                                                    <td>$43</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox4" type="checkbox">
                                                            <label for="checkbox4"></label>
                                                        </div>
                                                    </td>
                                                    <td>JS325</td>
                                                    <td>Abraham</td>
                                                    <td>admin@gmail.com</td>
                                                    <td>30.05.1016</td>
                                                    <td>10.06.2016</td>
                                                    <td>10.06.2016</td>
                                                    <td>Complete</td>
                                                    <td>$43</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox5" type="checkbox">
                                                            <label for="checkbox5"></label>
                                                        </div>
                                                    </td>
                                                    <td>JS325</td>
                                                    <td>Colleen Hurst</td>
                                                    <td>admin@gmail.com</td>
                                                    <td>30.05.1016</td>
                                                    <td>10.06.2016</td>
                                                    <td>10.06.2016</td>
                                                    <td>Complete</td>
                                                    <td>$43</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox6" type="checkbox">
                                                            <label for="checkbox6"></label>
                                                        </div>
                                                    </td>
                                                    <td>JS325</td>
                                                    <td>Ashton Cox</td>
                                                    <td>admin@gmail.com</td>
                                                    <td>30.05.1016</td>
                                                    <td>10.06.2016</td>
                                                    <td>10.06.2016</td>
                                                    <td>Complete</td>
                                                    <td>$43</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection