@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Input groups',
    'headerSubtitle' => 'it all starts here',
    'breadcrumb' => 'Input group',
    'headerIcon' => 'pe-7s-note2',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Icon input group</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="alert alert-info alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                In this input group, you can use four types of icons. Example <strong>glyphicon</strong>, <strong>fontawesome</strong>, <strong>Themify Icons</strong> & <strong>Pe-icon-7-stroke</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 p-l-30 p-r-30">
                                            <h4>INPUT GROUP BASIC</h4>
                                            <p class="m-b-20">Place one add-on or button on either side of an input. You may also place one on both sides of an input.</p>
                                            <div class="form-group">
                                                <label>Text input left add-on</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Text input right add-on</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
                                                    <span class="input-group-addon" id="basic-addon2">@example.com</span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Text input both add-on</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                    <span class="input-group-addon">.00</span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Joint add-on</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <span class="input-group-addon">0.00</span>
                                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basic-url">Your vanity URL</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon3">https://example.com/users/</span>
                                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                                </div><!-- /input-group -->
                                            </div>
                                            <h4>SIZING</h4>
                                            <p class="m-b-20">Add the relative form sizing classes to the <code>.input-group</code> itself and contents within will
                                                automatically resize—no need for repeating the form control size classes on each element.</p>
                                            <div class="form-group">
                                                <label>Large Input Group</label>
                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Medium Input Group</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sizing-addon2">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Small Input Group</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon" id="sizing-addon3">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon3">
                                                </div>
                                            </div>
                                            <h4>MULTIPLE ADDONS</h4>
                                            <p class="m-b-20">Multiple add-ons are supported and can be mixed with checkbox and radio input versions.</p>
                                            <div class="form-group">
                                                <label>Multiple addons with checkbox</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" aria-label="Checkbox for following text input">
                                                    </span>
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple addons with mixed</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <span class="input-group-addon">0.00</span>
                                                    <input type="text" class="form-control" aria-label="Text input with radio button">
                                                </div>
                                            </div>
                                            <div class="form-group"></div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 p-l-30 p-r-30">
                                            <h4>BUTTON ADDONS</h4>
                                            <p class="m-b-20">Buttons in input groups are a bit different and require one extra level of nesting. 
                                                Instead of <code>.input-group-addon</code>, you'll need to use <code>.input-group-btn</code>
                                                to wrap the buttons. This is required due to default browser styles that cannot be overridden.</p>
                                            <div class="form-group">
                                                <label>Button add-on left</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Button add-on right</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Button add-on both</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Success button add-on left</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Primary button add-on right</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button">Go!</button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Button add-on both</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-inverse" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger" type="button">Go!</button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Buttons with dropdowns left</label>
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="ti-angle-down"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li role="separator" class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div><!-- /btn-group -->
                                                    <input type="text" class="form-control" aria-label="...">
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Buttons with dropdowns right</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" aria-label="...">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="ti-angle-down"></span></button>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li role="separator" class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div><!-- /btn-group -->
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Segmented buttons left</label>
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default">Action</button>
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="ti-angle-down"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li role="separator" class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div>
                                                    <input class="form-control" aria-label="Text input with segmented button dropdown"> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Segmented buttons right</label>
                                                <div class="input-group">
                                                    <input class="form-control" aria-label="Text input with segmented button dropdown">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default">Action</button>
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="ti-angle-down"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li role="separator" class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple buttons left</label>
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default" aria-label="Bold"><span class="glyphicon glyphicon-bold"></span></button>
                                                        <button type="button" class="btn btn-default" aria-label="Italic"><span class="glyphicon glyphicon-italic"></span></button>
                                                    </div>
                                                    <input class="form-control" aria-label="Text input with multiple buttons">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple buttons right</label>
                                                <div class="input-group">
                                                    <input class="form-control" aria-label="Text input with multiple buttons">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default" aria-label="Help"><span class="fa fa-question-circle"></span></button>
                                                        <button type="button" class="btn btn-default">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 p-l-30 p-r-30">
                                            <h4>CHECKBOX AND RADIO ADDONS</h4>
                                            <p class="m-b-20">Place any checkbox or radio option within an input group's addon instead of text.</p>
                                            <div class="form-group">
                                                <label>Checkbox addons</label>
                                                <div class="input-group"> <span class="input-group-addon"> <input type="checkbox" aria-label="Checkbox for following text input"> </span>
                                                    <input class="form-control" aria-label="Text input with checkbox"> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Radio addons</label>
                                                <div class="input-group"> <span class="input-group-addon"> <input type="radio" aria-label="Radio button for following text input"> </span>
                                                    <input class="form-control" aria-label="Text input with radio button"> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Input with left icon</label>
                                                    <div class="icon-addon addon-md">
                                                        <input type="text" placeholder="Icon Left, Default Input" class="form-control" id="l_icon">
                                                        <label for="l_icon" class="ti-email" title="email"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Input with right icon</label>
                                                    <div class="icon-addon input-right-icon">
                                                        <input type="text" placeholder="Icon Right, Default Input" class="form-control" id="9">
                                                        <label class="ti-unlock" title="email"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>ICON INPUT GROUP SIZING</h4>
                                            <p>Icon Left class <code>.has-icon-left</code>, Large Input class <code>.addon-lg</code> class for Large Icon </p>
                                            <div class="form-group">
                                                <label>Large input with left icon</label>
                                                <div class="icon-addon addon-lg">
                                                    <input type="text" placeholder="Email" class="form-control" id="1">
                                                    <label class="ti-cloud-down" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Medium input with left icon</label>
                                                <div class="icon-addon addon-md">
                                                    <input type="text" placeholder="Email" class="form-control" id="2">
                                                    <label class="ti-settings" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Small input with left icon</label>
                                                <div class="icon-addon addon-sm">
                                                    <input type="text" placeholder="Email" class="form-control" id="3">
                                                    <label class="ti-lock" title="email"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 p-l-30 p-r-30">
                                            <h4> ICON INPUT GROUP SIZING & DROPDOWN</h4>
                                            <div class="form-group">
                                                <label>Large dropdown</label>
                                                <div class="icon-addon addon-lg">
                                                    <select class="form-control">
                                                        <option>Select Option</option>
                                                        <option>Sample</option>
                                                        <option>Sample</option>
                                                    </select>
                                                    <label class="ti-pencil-alt" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Medium dropdown</label>
                                                <div class="icon-addon addon-md input-left-icon">
                                                    <select class="form-control">
                                                        <option>Select Option</option>
                                                        <option>Sample</option>
                                                        <option>Sample</option>
                                                    </select>
                                                    <label class="ti-reload" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Small dropdown</label>
                                                <div class="icon-addon addon-sm">
                                                    <select class="form-control">
                                                        <option>Select Option</option>
                                                        <option>Sample</option>
                                                        <option>Sample</option>
                                                    </select>
                                                    <label class="ti-settings" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Large addons with Button</label>
                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-addon"><i class="ti-filter"></i></span>
                                                    <div class="icon-addon addon-lg">
                                                        <input type="text" placeholder="Email" class="form-control" id="4">
                                                        <label class="ti-search" title="email"></label>
                                                    </div>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Medium addons with Button</label>
                                                <div class="input-group input-group-md">
                                                    <span class="input-group-addon"><i class="ti-eye"></i></span>
                                                    <div class="icon-addon addon-md">
                                                        <input type="text" placeholder="Email" class="form-control" id="5">
                                                        <label class="ti-search" title="email"></label>
                                                    </div>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Small addons with Button</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon"><i class="ti-heart"></i></span>
                                                    <div class="icon-addon addon-sm">
                                                        <input type="text" placeholder="Email" class="form-control" id="6">
                                                        <label class="ti-search" title="email"></label>
                                                    </div>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <!--<p class="m-b-20"></p>-->
                                            <div class="form-group">
                                                <label>Left icon addon with spin</label>
                                                <div class="icon-addon addon-md input-left-icon">
                                                    <input type="text" placeholder="Email" class="form-control" id="7">
                                                    <label class="fa fa-spinner fa-spin" title="email"></label>
                                                </div>
                                                <small><code>.fa-spinner</code> class to spin the Icon</small>
                                            </div>
                                            <div class="form-group">
                                                <label>Right icon addon with spin</label>
                                                <div class="icon-addon input-right-icon">
                                                    <input type="text" placeholder="Icon Right, Default Input" class="form-control" id="8">
                                                    <label class="fa fa-spinner fa-pulse" title="email"></label>
                                                </div>
                                                <small>Icon Right class <code>.input-right-icon</code> &amp; <code>.fa-spinner</code> class to spin the Icon </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@endpush
