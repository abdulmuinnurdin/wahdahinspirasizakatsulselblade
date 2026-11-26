@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'CK Editor',
    'headerSubtitle' => 'Enrich CKEditor with image and file uploads.',
    'breadcrumb' => 'Text Editor',
    'headerIcon' => 'pe-7s-note2',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Ck Editor</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                                        This is my textarea to be replaced with CKEditor.
                                    </textarea> <!-- /.Ck Editor -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor-active.js') }}"></script>
@endpush
