@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Google Maps',
    'headerSubtitle' => 'Google Maps API allows you to display maps on your web site',
    'breadcrumb' => 'Google Maps',
    'headerIcon' => 'pe-7s-map-2',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <!-- Basic data map -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Google Map</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="embed-container">
                                        <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387144.0075834208!2d-73.97800349999999!3d40.7056308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1394298866288' width='600' height='450' style='border:0'></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection