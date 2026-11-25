@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Code editor',
    'headerSubtitle' => 'The sublime keymap defines many Sublime Text-specific bindings for CodeMirror. See the code below for an overview.',
    'breadcrumb' => 'Code editor',
    'headerIcon' => 'pe-7s-edit',
])

@push('css')
    <link href="{{ asset('assets/plugins/codemirror/codemirror.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/codemirror/addon/fold/foldgutter.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/codemirror/addon/dialog/dialog.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/codemirror/theme/monokai.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/codemirror/addon/scroll/simplescrollbars.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Sublime Text bindings demo</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p><strong>CodeMirror</strong> is a versatile text editor implemented in JavaScript for the browser. It is 
                                        specialized for editing code, and comes with a number of language modes and addons that implement more 
                                        advanced editing functionality.</p>

                                    <p class="m-b-15">
                                        A rich programming API and a CSS theming system are available for customizing CodeMirror to fit your application, and extending it with new functionality. For mor info go to
                                        <a href="http://codemirror.net/" target="_blank">http://codemirror.net/</a>
                                    </p>

                                    <!-- Sublime Text -->
                                    <article></article>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/search/searchcursor.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/search/search.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/dialog/dialog.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/edit/matchbrackets.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/edit/closebrackets.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/comment/comment.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/wrap/hardwrap.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/fold/foldcode.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/fold/brace-fold.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/keymap/sublime.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/addon/scroll/simplescrollbars.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/codemirror-active.js') }}"></script>
@endpush
