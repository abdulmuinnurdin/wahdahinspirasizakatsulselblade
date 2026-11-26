@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Trumbowyg Text Editor',
    'headerSubtitle' => 'A lightweight WYSIWYG editor. Documentation here: <a href="https://alex-d.github.io/Trumbowyg/" target="_blank">https://alex-d.github.io/Trumbowyg/</a>',
    'breadcrumb' => 'Text Editor',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/trumbowyg/css/trumbowyg.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Trumbowyg</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <textarea id="trumbowyg">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, <strong>some text bold</strong> sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat.
            </p>

            <p>
                Duis aute <a href="http://heeeeeeeey.com/" target="_blank">some link</a> irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
            </p>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/trumbowyg/js/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/trumbowyg/js/trumbowyg-active.js') }}"></script>
@endpush
