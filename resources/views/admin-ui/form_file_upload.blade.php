@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'File upload',
    'headerSubtitle' => 'DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.',
    'breadcrumb' => 'File upload',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Dropzone.js</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p class="m-b-15"><strong>Dropzone.js</strong> is a light weight JavaScript library that turns an HTML element into a dropzone. This means 
                                        that a user can drag and drop a file onto it, and the file gets uploaded to the server via AJAX.</p>
                                    <form action="#" class="dropzone" id="dropzoneForm">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-footer">
                                    <p class="m-0">All avalible options and full documentation you can find: <a target="_blank" href="http://www.dropzonejs.com/#configuration-options">http://www.dropzonejs.com/#configuration-options</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone-active.js') }}"></script>
@endpush
