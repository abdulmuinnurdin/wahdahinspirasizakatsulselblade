@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Blank page',
    'headerSubtitle' => 'it all starts here',
    'breadcrumb' => 'Breadcrumb',
    'headerIcon' => 'pe-7s-close',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>This is page content</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>You can create here any grid layout you want. And any variation layout you imagine:) Check out main dashboard and other site. It use many different layout. </p>
                                </div>
                                <div class="panel-footer">
                                    This is standard panel footer
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@endpush
