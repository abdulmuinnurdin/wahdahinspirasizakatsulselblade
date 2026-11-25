@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Summernote Editor',
    'headerSubtitle' => 'Supper simple WYSIWYG editor on bootstrap',
    'breadcrumb' => 'Text Editor',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Summernote</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <textarea id="summernote2" name="block_content">
                                        <h3>Lorem Ipsum is simply</h3>
                                        dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                        <br/>
                                        <br/>
                                        <ul>
                                            <li>Remaining essentially unchanged</li>
                                            <li>Make a type specimen book</li>
                                            <li>Unknown printer</li>
                                        </ul>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote-active.js') }}"></script>
@endpush
