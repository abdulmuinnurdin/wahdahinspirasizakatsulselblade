@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Label, Badges, Alerts',
    'headerSubtitle' => 'Tabs styles and versions',
    'breadcrumb' => 'Label, Badges, Alerts',
    'headerIcon' => 'pe-7s-note2',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Label, Badges, Alerts</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 m-b-20">Labels</h4>
                                            <!-- default labels -->
                                            <span class="label label-default-outline m-r-15">Default</span>
                                            <span class="label label-primary-outline m-r-15">Primary</span>
                                            <span class="label label-success-outline m-r-15">Success</span>
                                            <span class="label label-info-outline m-r-15">Info</span>
                                            <span class="label label-warning-outline m-r-15">Warning</span>
                                            <span class="label label-danger-outline m-r-15">Danger</span>
                                            <!-- / default labels -->
                                            <div class="space-25">&nbsp;</div>
                                            <!-- default filled labels -->
                                            <span class="label label-default m-r-15">Default</span>
                                            <span class="label label-primary m-r-15">Primary</span>
                                            <span class="label label-success m-r-15">Success</span>
                                            <span class="label label-info m-r-15">Info</span>
                                            <span class="label label-warning m-r-15">Warning</span>
                                            <span class="label label-danger m-r-15">Danger</span>
                                            <!-- / default filled labels -->
                                            <div class="space-25">&nbsp;</div>
                                            <!-- pill labels -->
                                            <span class="label label-pill label-default-outline m-r-15">Default</span>
                                            <span class="label label-pill label-primary-outline m-r-15">Primary</span>
                                            <span class="label label-pill label-success-outline m-r-15">Success</span>
                                            <span class="label label-pill label-info-outline m-r-15">Info</span>
                                            <span class="label label-pill label-warning-outline m-r-15">Warning</span>
                                            <span class="label label-pill label-danger-outline m-r-15">Danger</span>
                                            <!-- / pill labels -->
                                            <div class="space-25">&nbsp;</div>
                                            <!-- pill filled labels -->
                                            <span class="label label-pill label-default m-r-15">Default</span>
                                            <span class="label label-pill label-primary m-r-15">Primary</span>
                                            <span class="label label-pill label-success m-r-15">Success</span>
                                            <span class="label label-pill label-info m-r-15">Info</span>
                                            <span class="label label-pill label-warning m-r-15">Warning</span>
                                            <span class="label label-pill label-danger m-r-15">Danger</span>
                                            <!-- /pill filled labels -->
                                            <div class="space-25">&nbsp;</div>
                                            <!-- badges -->
                                            <h4 class="m-t-0 m-b-20">Badges</h4>
                                            <div class="badge-inner">
                                                <a href="#" class="m-r-15">Home <span class="badge">12</span></a>
                                                <a href="#" class="m-r-15">Profile</a>
                                                <a href="#" class="m-r-15">Messages <span class="badge">7</span></a>
                                            </div>
                                            <div class="space-25">&nbsp;</div>
                                            <ul class="nav nav-pills" role="tablist">
                                                <li role="presentation" class="active"><a href="#">Home <span class="badge">12</span></a></li>
                                                <li role="presentation"><a href="#">Profile</a></li>
                                                <li role="presentation"><a href="#">Messages <span class="badge">7</span></a></li>
                                            </ul>
                                            <!-- / badges -->
                                            <div class="space-25">&nbsp;</div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 m-b-20">Alerts</h4>
                                            <!-- alerts -->
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Success!</strong> You successfully read this important alert message.
                                            </div>
                                            <div class="alert alert-info alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Info!</strong> This alert needs your attention, but it's not important.
                                            </div>
                                            <div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Warning!</strong> Better check yourself, you're not looking too good.
                                            </div>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Danger!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <!-- / alerts -->
                                            <!-- alerts with icons -->
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="alert alert-sm alert-success alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <i class="fa fa-check"></i><strong>Success!</strong> Some text here...
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="alert alert-sm alert-info alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <i class="fa fa-info-circle"></i><strong>Info!</strong> Some text here...
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="alert alert-sm alert-warning alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <i class="fa fa-exclamation-triangle"></i><strong>Warning!</strong> Some text here...
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="alert alert-sm alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <i class="fa fa-exclamation-circle"></i><strong>Danger!</strong> Some text here...
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / alerts with icons -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection