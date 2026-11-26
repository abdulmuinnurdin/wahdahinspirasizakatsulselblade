@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Bootstrap-wysihtml5',
    'headerSubtitle' => 'Simple, beautiful wysiwyg editors .Documentation here <a href="https://jhollingworth.github.io/bootstrap-wysihtml5/" target="_blank">https://jhollingworth.github.io/bootstrap-wysihtml5/</a>',
    'breadcrumb' => 'Text Editor',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Bootstrap-wysihtml5</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <textarea id="some-textarea" class="form-control" rows="15" placeholder="Enter text ..."></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/wysihtml5.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
@endpush
