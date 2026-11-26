@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Markdown',
    'headerSubtitle' => 'Markdown editing meet Bootstrap',
    'breadcrumb' => 'Markdown',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/markdown/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Simple Markdown editing tools that works!</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p><strong>Bootstrap-Markdown</strong> designed to be easily integrated with your bootstrap project. It exposes useful API that allow you to fully hook-in into the plugin</p>
                                    <p class="m-b-20">Switch regular textarea within your form into <strong>Bootstrap-Markdown</strong> editor seamlessly by adding <code>data-provide="markdown"</code> attribute</p>
                                    <form>
                                        <textarea name="content" data-provide="markdown" rows="15">

    ### Hello there
    How are you?

    I have bellow task for you :

    Select from this text...
    Click the bold on THIS WORD and make THESE ONE italic
    Link GOOGLE to google.com
    Test to insert image (and try to tab after write the image description)
    Test Preview
    And ending here... Click "List"

    Enjoy!
                                        </textarea>
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox3" type="checkbox">
                                            <label for="checkbox3">Publish</label>
                                        </div>
                                        <hr/>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h2 class="m-t-0">Usage</h2>
                                    <p>Beside using above data-attributes, you could call it via code</p>
                                    <pre>$("#some-textarea").markdown({autofocus:false,savable:false}) </pre>
                                    <h4>Available options are:</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Option Name</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <code>autofocus</code>
                                                    </td>
                                                    <td><code>boolean</code></td>
                                                    <td>Indicates that editor will focused after instantiated. Default to <code>false</code></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>savable</code>
                                                    </td>
                                                    <td><code>boolean</code></td>
                                                    <td>Indicates that editor will have save button and action. Default to <code>false</code></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>hideable</code>
                                                    </td>
                                                    <td><code>boolean</code></td>
                                                    <td>If set to <code>true</code> then the editor will be hidden on <code>blur</code> event. Default to <code>false</code></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>width</code>
                                                    </td>
                                                    <td><code>mixed</code></td>
                                                    <td>The editor width. Default to <code>inherit</code>. You could supply any numerical value (that will be set as css), or supply valid Bootstrap class (something like <code>span2</code>)</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>height</code>
                                                    </td>
                                                    <td><code>mixed</code></td>
                                                    <td>The editor height. Default to <code>inherit</code></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>resize</code>
                                                    </td>
                                                    <td><code>string</code></td>
                                                    <td>Option to disable or change the resize property, possible values <code>none</code>,<code>both</code>,<code>horizontal</code>,<code>vertical</code>. Default <code>none</code><br>
                                                        If this option is enabled, the user will be able to resize the editor and preview screen.<br><br>
                                                        <div class="alert alert-warning">
                                                            <strong>Browser support</strong>
                                                            <p>This is currently only supported on limited browsers. See <a href="http://caniuse.com/css-resize" target="_blank">Can you run it: Resize</a> for all supported browsers</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>iconlibrary</code>
                                                    </td>
                                                    <td><code>string</code></td>
                                                    <td>The icon library to use. Glyphicons (<code>glyph</code>) and Font Awesome (<code>fa</code>) are supported. In order to use Font Awesome properly, you'll need to <a href="http://fontawesome.io/get-started/">include Font Awesome stylesheet</a> yourself. Default to <code>glyph</code></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>language</code>
                                                    </td>
                                                    <td><code>string</code></td>
                                                    <td>Localization setting. Default to <code>en</code></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>footer</code>
                                                    </td>
                                                    <td><code>mixed</code></td>
                                                    <td>Footer dom. Can be string or callback. Default is empty string</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>fullscreen</code>
                                                    </td>
                                                    <td><code>object</code></td>
                                                    <td>Contains <code>enable</code> (<code>bool</code>) and <code>icons</code> (<code>object</code>) keys.</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>hiddenButtons</code>
                                                    </td>
                                                    <td><code>mixed</code></td>
                                                    <td>Array or string of button names to be hidden. Default is empty string</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>disabledButtons</code>
                                                    </td>
                                                    <td><code>mixed</code></td>
                                                    <td>Array or string of button names to be disabled. Default is empty string</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/markdown/bootstrap-markdown.js') }}"></script>
@endpush
