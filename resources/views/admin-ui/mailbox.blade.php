@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerSubtitle' => 'Mailbox',
    'breadcrumb' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerIcon' => 'pe-7s-tools',
])

@push('css')
    <link href="{{ asset('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
</div>
                        </li>
                        <!-- /.Full page search -->
                        <li><a id="menu-toggle" href="#"><i class="material-icons">apps</i></a></li>
                        <!-- /.Sidebar menu toggle icon -->
                        <!--Start dropdown menu-->
                        <li class="dropdown hidden-sm"><a href="#" class="dropdown-toggle material-ripple" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <!--<li class="ui_popover_tooltip"></li>-->
                                <li><a href="#">Dropdown Link 1</a></li>
                                <li><a href="#">Dropdown Link 2</a></li>
                                <li><a href="#">Dropdown Link 3</a></li>
                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 4</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Submenu Link 4.1</a></li>
                                        <li><a href="#">Submenu Link 4.2</a></li>
                                        <li><a href="#">Submenu Link 4.3</a></li>
                                        <li><a href="#">Submenu Link 4.4</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Submenu Link 5.1</a></li>
                                        <li><a href="#">Submenu Link 5.2</a></li>
                                        <li><a href="#">Submenu Link 5.3</a></li>
                                        <li class="divider"></li>
                                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu Link 5.4</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Submenu Link 5.4.1</a></li>
                                                <li><a href="#">Submenu Link 5.4.2</a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu Link 5.4.3</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Submenu Link 5.4.3.1</a></li>
                                                        <li><a href="#">Submenu Link 5.4.3.2</a></li>
                                                        <li><a href="#">Submenu Link 5.4.3.3</a></li>
                                                        <li><a href="#">Submenu Link 5.4.3.4</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu Link 5.4.4</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Submenu Link 5.4.4.1</a></li>
                                                        <li><a href="#">Submenu Link 5.4.4.2</a></li>
                                                        <li><a href="#">Submenu Link 5.4.4.3</a></li>
                                                        <li><a href="#">Submenu Link 5.4.4.4</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--End Start dropdown menu-->
                        <!--Start dropdown mega menu-->
                        <li class="dropdown mega-dropdown hidden-sm">
                            <a href="#" class="dropdown-toggle material-ripple" data-toggle="dropdown">Megamenu <b class="caret"></b></a>
                            <ul class="dropdown-menu mega-dropdown-menu">
                                <li class="row">
                                    <div class="col-menu col-md-3">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('admin.buttons') }}"><i class="fa fa-window-minimize"></i>Buttons</a></li>
                                            <li><a href="{{ route('admin.tabs') }}"><i class="fa fa-tablet"></i>Tab</a></li>
                                            <li><a href="{{ route('admin.notification') }}"><i class="fa fa-exclamation-triangle"></i>Notification</a></li>
                                            <li><a href="{{ route('admin.tree-view') }}"><i class="fa fa-tree"></i>Tree View</a></li>
                                            <li><a href="{{ route('admin.progressbars') }}"><i class="fa fa-minus"></i>Progressber</a></li>
                                            <li><a href="{{ route('admin.list') }}"><i class="fa fa-list-ol"></i>List View</a></li>
                                            <li><a href="{{ route('admin.typography') }}"><i class="fa fa-text-width"></i>Typography</a></li>
                                            <li><a href="{{ route('admin.panels') }}"><i class="fa fa-keyboard-o"></i>Panels</a></li>
                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('admin.modals') }}"><i class="fa fa-file-text-o"></i>Modals</a></li>
                                            <li><a href="{{ route('admin.icheck_toggle_pagination') }}"><i class="fa fa-check-square-o"></i>iCheck, Toggle</a></li>
                                            <li><a href="{{ route('admin.labels-badges-alerts') }}"><i class="fa fa-exclamation"></i>labels, Badges, Alerts</a></li>
                                            <li><a href="{{ route('admin.charts_flot') }}"><i class="fa fa-area-chart"></i>Flot Chart</a></li>
                                            <li><a href="{{ route('admin.charts_Js') }}"><i class="fa fa-bar-chart"></i>Chart js</a></li>
                                            <li><a href="{{ route('admin.charts_morris') }}"><i class="fa fa-pie-chart"></i>Morris Charts</a></li>
                                            <li><a href="{{ route('admin.charts_sparkline') }}"><i class="fa fa-line-chart"></i>Sparkline Charts</a></li>
                                            <li><a href="{{ route('admin.maps_data') }}"><i class="fa fa-map-marker"></i>Data Maps</a></li>
                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('admin.maps_jvector') }}"><i class="fa fa-puzzle-piece"></i>Jvector Maps</a></li>
                                            <li><a href="{{ route('admin.maps_google') }}"><i class="fa fa-google"></i>Google map</a></li>
                                            <li><a href="{{ route('admin.maps_snazzy') }}"><i class="fa fa-map-signs"></i>Snazzy Map</a></li>
                                            <li><a href="{{ route('admin.widgets') }}">
                                                    <i class="fa fa-windows"></i> <span>Widgets</span>
                                                    <span class="pull-rightr">
                                                        <small class="label pull-right bg-green">new</small>
                                                    </span>
                                                </a>
                                            </li>
                                            <li><a href="{{ route('admin.table') }}"><i class="fa fa-table"></i>Simple tables</a></li>
                                            <li><a href="{{ route('admin.dataTables') }}"><i class="ti-layout-tab-window"></i>Data tables</a></li>
                                            <li><a href="{{ route('admin.footable') }}"><i class="ti-layout-width-default"></i>FooTable</a></li>
                                            <li><a href="{{ route('admin.x-editable') }}"><i class="ti-close"></i>X-editable</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-menu col-md-3">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('admin.icons_bootstrap') }}"><i class="fa fa-bold"></i>Bootstrap Icons</a></li>
                                            <li><a href="{{ route('admin.icons_fontawesome') }}"><i class="fa fa-fort-awesome"></i>Fontawesome Icon</a></li>
                                            <li><a href="{{ route('admin.icons_flag') }}"><i class="fa fa-flag-checkered"></i>Flag Icons</a></li>
                                            <li><a href="{{ route('admin.icons_material') }}"><i class="fa fa-meetup"></i>Material Icons</a></li>
                                            <li><a href="{{ route('admin.icons_weather') }}"><i class="fa fa-bolt"></i>Weather Icons </a></li>
                                            <li><a href="{{ route('admin.icons_line') }}"><i class="fa fa-lemon-o"></i>Line Icons</a></li>
                                            <li><a href="{{ route('admin.icons_pe') }}"><i class="fa fa-diamond"></i>Pe Icons</a></li>
                                            <li><a href="{{ route('admin.icon_socicon') }}"><i class="fa fa-share-alt"></i>Socicon Icons</a></li>
                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('admin.invoice') }}"><i class="fa fa-file-text-o"></i>Invoice</a></li>
                                            <li><a href="{{ route('admin.timeline') }}"><i class="fa fa-hourglass-o"></i>Vertical timeline</a></li>
                                            <li><a href="{{ route('admin.horizontal_timeline') }}"><i class="fa fa-hourglass-end"></i>Horizontal timeline</a></li>
                                            <li><a href="{{ route('admin.pricing') }}"><i class="fa fa-usd"></i>Pricing Table</a></li>
                                            <li><a href="{{ route('admin.slider') }}"><i class="fa fa-sliders"></i>Slider</a></li>
                                            <li><a href="{{ route('admin.carousel') }}"><i class="fa fa-long-arrow-left"></i>Carousel</a></li>
                                            <li><a href="{{ route('admin.code_editor') }}"><i class="fa fa-code"></i>Code editor</a></li>
                                            <li>
                                                <a href="{{ route('admin.calender') }}">
                                                    <i class="ti-calendar"></i><span>Calendar</span>
                                                    <span class="pull-right">
                                                        <small class="label pull-right bg-red m-r-5">9</small>
                                                        <small class="label pull-right bg-yellow m-r-5">29</small>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- end col-3 -->
                                </li><!-- end row -->
                            </ul>
                        </li>
                        <!--End dropdown mega menu-->
                       <li><a href="https://themeforest.net/item/adminpage-responsive-bootstrap-admin-template-dashboard/20281702?s_rank=5" target="_blank" class="btn-buy hidden-xs hidden-sm hidden-md">Buy now $25</a></li>
                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="material-icons">chat</i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li class="rad-dropmenu-header"><a href="#">New Messages</a></li>
                                <li>
                                    <a href="#" class="rad-content">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle" alt=""></div>
                                            <strong class="inbox-item-author">Naeem Khan</strong>
                                            <span class="inbox-item-date">-13:40 PM</span>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <span class="profile-status available pull-right"></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="rad-content">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar2.png') }}" class="img-circle" alt=""></div>
                                            <strong class="inbox-item-author">Sala Uddin</strong>
                                            <span class="inbox-item-date">-13:40 PM</span>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <span class="profile-status away pull-right"></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="rad-content">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar3.png') }}" class="img-circle" alt=""></div>
                                            <strong class="inbox-item-author">Mozammel</strong>
                                            <span class="inbox-item-date">-13:40 PM</span>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <span class="profile-status busy pull-right"></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="rad-content">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle" alt=""></div>
                                            <strong class="inbox-item-author">Tanzil Ahmed</strong>
                                            <span class="inbox-item-date">-13:40 PM</span>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <span class="profile-status offline pull-right"></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-dropmenu-footer"><a href="#">View All messages</a></li>
                            </ul> <!-- /.Dropdown-messages -->
                        </li><!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <!--<i class="ti-flag-alt"></i>-->
                                <i class="material-icons">flag</i>
                                <span class="label label-success">4</span>
                                <!--<i class="ti-angle-down"></i>-->
                            </a>
                            <ul class="dropdown-menu dropdown-tasks">
                                <!--<li class="ui_popover_tooltip"></li>-->
                                <li class="rad-dropmenu-header"><a  href="#">Your Task</a></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p><strong>Task 1</strong>
                                                <span class="pull-right sm-text">40% Complete</span></p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p><strong>Task 2</strong>
                                                <span class="pull-right sm-text">20% Complete</span></p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p><strong>Task 3</strong>
                                                <span class="pull-right sm-text">60% Complete</span></p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p><strong>Task 4</strong>
                                                <span class="pull-right sm-text">80% Complete</span></p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-dropmenu-footer"><a href="#">See All Tasks</a></li>
                            </ul><!-- /.Dropdown-tasks -->
                        </li><!-- /.Dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="material-icons">add_alert</i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                <!--<i class="ti-announcement"></i>-->
                                <!--<i class="ti-angle-down"></i>-->
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <!--<li class="ui_popover_tooltip"></li>-->
                                <li class="rad-dropmenu-header"><a href="#">Your Notifications</a></li>
                                <li>
                                    <a class="rad-content" href="#">
                                        <div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Introduction to fetch()</div>
                                            <div class="sm-text">The fetch API</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="rad-content" href="#">
                                        <div class="pull-left"><i class="fa fa-bitbucket fa-2x color-violet"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Check your BitBucket</div>
                                            <div class="sm-text">Last Chance</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="rad-content" href="#">
                                        <div class="pull-left"><i class="fa fa-google fa-2x color-info"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Google Account</div>
                                            <div class="sm-text">example@gmail.com</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="rad-content" href="#">
                                        <div class="pull-left"><i class="fa fa-amazon fa-2x color-green"></i>
                                        </div>
                                        <div class="rad-notification-body">
                                            <div class="lg-text">Amazon Simple Notification ...</div>
                                            <div class="sm-text">Lorem Ipsum is simply dummy text...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="rad-dropmenu-footer"><a href="#">See all notifications</a></li>
                            </ul>  <!-- /.dropdown-alerts -->
                            <!-- /.dropdown-alerts -->
                        </li>
                        <!-- /.Dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="material-icons">person_add</i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('admin.profile') }}"><i class="ti-user"></i>&nbsp; Profile</a></li>
                                <li class="active"><a href="{{ route('admin.mailbox') }}"><i class="ti-email"></i>&nbsp; My Messages</a></li>
                                <li><a href="{{ route('admin.lockscreen') }}"><i class="ti-lock"></i>&nbsp; Lock Screen</a></li>
                                <li><a href="#"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                                <li><a href="{{ route('admin.login') }}"><i class="ti-layout-sidebar-left"></i>&nbsp; Logout</a></li>
                            </ul><!-- /.dropdown-user -->
                        </li><!-- /.Dropdown -->
                        <li class="log_out">
                            <a href="{{ route('admin.login') }}">
                                <i class="material-icons">power_settings_new</i>
                            </a>
                        </li><!-- /.Log out -->
                    </ul> <!-- /.navbar-top-links -->
                </div>
            </nav>
            <!-- /.Navigation -->
            <div class="sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li><a href="{{ route('admin.dashboard') }}" class="material-ripple"><i class="material-icons">home</i> Dashboard</a></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">bubble_chart</i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.charts_flot') }}">Flot Chart</a></li>
                                <li><a href="{{ route('admin.charts_Js') }}">Chart js</a></li>
                                <li><a href="{{ route('admin.charts_morris') }}">Morris Charts</a></li>
                                <li><a href="{{ route('admin.charts_sparkline') }}">Sparkline Charts</a></li>
                                <li><a href="{{ route('admin.charts_am') }}">Am Charts</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#" class="material-ripple"><i class="material-icons">drafts</i> Mailbox<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="active"><a href="{{ route('admin.mailbox') }}">Mailbox<span class="nav-tag green">3</span></a></li>
                                <li><a href="{{ route('admin.mailDetails') }}">Mailbox Details<span class="nav-tag yellow">2</span></a></li>
                                <li><a href="{{ route('admin.compose') }}">Compose<span class="nav-tag red">9</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">business</i> Tables<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.table') }}">Simple tables</a></li>
                                <li><a href="{{ route('admin.dataTables') }}">Data tables</a></li>
                                <li><a href="{{ route('admin.footable') }}">FooTable</a></li>
                                <li><a href="{{ route('admin.x-editable') }}">X-editable</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">assignment</i> Forms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.forms_basic') }}">Basic Forms</a></li>
                                <li><a href="{{ route('admin.form_input_group') }}">Input group</a></li>
                                <li><a href="{{ route('admin.form-mask') }}">Form Mask</a></li>
                                <li><a href="{{ route('admin.form_touchspin') }}">Touchspin</a></li>
                                <li><a href="{{ route('admin.form_select') }}">Select</a></li>
                                <li><a href="{{ route('admin.forms_validation') }}">Validation Forms</a></li>
                                <li><a href="{{ route('admin.forms_cropper') }}">Cropper</a></li>
                                <li><a href="{{ route('admin.form_file_upload') }}">Forms File Upload</a></li>
                                <li><a href="{{ route('admin.forms_editor_ck') }}">CK Editor</a></li>
                                <li><a href="{{ route('admin.forms_editor_summernote') }}">Summernote</a></li>
                                <li><a href="{{ route('admin.form_wizard') }}">Form Wizaed</a></li>
                                <li><a href="{{ route('admin.forms_editor_markdown') }}">Markdown</a></li>
                                <li><a href="{{ route('admin.forms_editor_trumbowyg') }}">Trumbowyg</a></li>
                                <li><a href="{{ route('admin.form_editor_wysihtml5') }}">Wysihtml5</a></li>
                            </ul>
                        </li>
                        <li class="nav-heading "> <span>Components&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">format_color_fill</i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.buttons') }}">Buttons</a></li>
                                <li><a href="{{ route('admin.tabs') }}">Tab</a></li>
                                <li><a href="{{ route('admin.notification') }}">Notification</a></li>
                                <li><a href="{{ route('admin.tree-view') }}">Tree View</a></li>
                                <li><a href="{{ route('admin.progressbars') }}">Progressber</a></li>
                                <li><a href="{{ route('admin.list') }}">List View</a></li>
                                <li><a href="{{ route('admin.typography') }}">Typography</a></li>
                                <li><a href="{{ route('admin.panels') }}">Panels</a></li>
                                <li><a href="{{ route('admin.modals') }}">Modals</a></li>
                                <li><a href="{{ route('admin.icheck_toggle_pagination') }}">iCheck, Toggle, pagination</a></li>
                                <li><a href="{{ route('admin.labels-badges-alerts') }}">labels, Badges, Alerts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">map</i> Maps<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.maps_amcharts') }}">Amcharts Map</a></li>
                                <li><a href="{{ route('admin.maps_gmaps') }}">gMaps</a></li>
                                <li><a href="{{ route('admin.maps_data') }}">Data Maps</a></li>
                                <li><a href="{{ route('admin.maps_jvector') }}">Jvector Maps</a></li>
                                <li><a href="{{ route('admin.maps_google') }}">Google map</a></li>
                                <li><a href="{{ route('admin.maps_snazzy') }}">Snazzy Map</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">insert_emoticon</i> Icons<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.icons_bootstrap') }}">Bootstrap Icons</a></li>
                                <li><a href="{{ route('admin.icons_fontawesome') }}">Fontawesome Icon</a></li>
                                <li><a href="{{ route('admin.icons_flag') }}">Flag Icons</a></li>
                                <li><a href="{{ route('admin.icons_material') }}">Material Icons</a></li>
                                <li><a href="{{ route('admin.icons_weather') }}">Weather Icons </a></li>
                                <li><a href="{{ route('admin.icons_line') }}">Line Icons</a></li>
                                <li><a href="{{ route('admin.icons_pe') }}">Pe Icons</a></li>
                                <li><a href="{{ route('admin.icon_socicon') }}">Socicon Icons</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.widgets') }}"><i class="material-icons">widgets</i>Widgets<span class="nav-tag green">new</span></a></li>
                        <li><a href="{{ route('admin.calender') }}"><i class="material-icons">perm_contact_calendar</i>Calendar<span class="nav-tag red">3</span><span class="nav-tag green">5</span><span class="nav-tag yellow">8</span></a></li>
                        <li class="nav-heading "> <span>Extra&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">stay_current_portrait</i>App Views<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.invoice') }}">Invoice</a></li>
                                <li><a href="{{ route('admin.timeline') }}">Vertical timeline</a></li>
                                <li><a href="{{ route('admin.horizontal_timeline') }}">Horizontal timeline</a></li>
                                <li><a href="{{ route('admin.pricing') }}">Pricing Table</a></li>
                                <li><a href="{{ route('admin.slider') }}">Slider</a></li>
                                <li><a href="{{ route('admin.carousel') }}">Carousel</a></li>
                                <li><a href="{{ route('admin.code_editor') }}">Code editor</a></li>
                                <li><a href="{{ route('admin.gridSystem') }}">Grid System</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">devices_other</i>Other pags<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('admin.login') }}">Login</a></li>
                                <li><a href="{{ route('admin.register') }}">Register</a></li>
                                <li><a href="{{ route('admin.profile') }}">Profile</a></li>
                                <li><a href="{{ route('admin.forget_password') }}">Forget password</a></li>
                                <li><a href="{{ route('admin.lockscreen') }}">Lockscreen</a></li>
                                <li><a href="{{ route('admin.404') }}">404 Error</a></li>
                                <li><a href="{{ route('admin.505') }}">505 Error</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">invert_colors</i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="#">Second Level Item</a></li>
                                <li><a href="#">Second Level Item</a></li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.blank') }}" class="material-ripple"><i class="material-icons">check_box_outline_blank</i> Blank page</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Left Sidebar-->
            <div class="side-bar right-bar">
                <div class="">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs right-sidebar-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="material-icons">home</i></a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="material-icons">person_add</i></a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="material-icons">chat</i></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade  in active" id="home">
                            <ul id="styleOptions" title="switch styling">
                                <li><b>Dark Skin</b></li>
                                <li><a href="javascript: void(0)" data-theme="skin-blue.min"><img src="{{ asset('assets/dist/img/theme-color/1.jpg') }}" alt=""/></a></li>
                                <li><a href="javascript: void(0)" data-theme="skin-dark.min"><img src="{{ asset('assets/dist/img/theme-color/2.jpg') }}" alt=""/></a></li>
                                <li><a href="javascript: void(0)" data-theme="skin-red-light.min" class="skin-logo"><img src="{{ asset('assets/dist/img/theme-color/5.jpg') }}" alt=""/></a></li>
                                <li><b>Dark Skin sidebar</b></li>
                                <li><a href="javascript: void(0)" data-theme="skin-default.min"><img src="{{ asset('assets/dist/img/theme-color/7.jpg') }}" alt=""/> </a></li>
                                <li><a href="javascript: void(0)" data-theme="skin-red-dark.min"><img src="{{ asset('assets/dist/img/theme-color/6.jpg') }}" alt=""/></a></li>
                                <li><a href="javascript: void(0)" data-theme="skin-dark-1.min"><img src="{{ asset('assets/dist/img/theme-color/8.jpg') }}" alt=""/></a></li>
                                <li><b>Light Skin sidebar</b></li>
                                <li><a href="javascript: void(0)" data-theme="skin-default-light.min" class="skin-logo"><img src="{{ asset('assets/dist/img/theme-color/3.jpg') }}" alt=""/></a></li>
                                <li><a href="javascript: void(0)" data-theme="skin-white.min"><img src="{{ asset('assets/dist/img/theme-color/4.jpg') }}" alt=""/></a> </li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="profile">
                            <h3 class="sidebar-heading">Activity</h3>
                            <div class="rad-activity-body">
                                <div class="rad-list-group group">
                                    <a href="#" class="rad-list-group-item">
                                        <div class="rad-list-icon bg-red pull-left"><i class="fa fa-phone"></i></div>
                                        <div class="rad-list-content"><strong>Client meeting</strong>
                                            <div class="md-text">Meeting at 10:00 AM</div>
                                        </div>
                                    </a>
                                    <a href="#" class="rad-list-group-item">
                                        <div class="rad-list-icon bg-yellow pull-left"><i class="fa fa-refresh"></i></div>
                                        <div class="rad-list-content"><strong>Created ticket</strong>
                                            <div class="md-text">Ticket assigned to Dev team</div>
                                        </div>
                                    </a>
                                    <a href="#" class="rad-list-group-item">
                                        <div class="rad-list-icon bg-primary pull-left"><i class="fa fa-check"></i></div>
                                        <div class="rad-list-content"><strong>Activity completed</strong>
                                            <div class="md-text">Completed the dashboard html</div>
                                        </div>
                                    </a>
                                    <a href="#" class="rad-list-group-item">
                                        <div class="rad-list-icon bg-green pull-left"><i class="fa fa-envelope"></i></div>
                                        <div class="rad-list-content"><strong>New Invitation</strong>
                                            <div class="md-text">Max has invited you to join Inbox</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- /.sidebar-menu -->
                            <h3 class="sidebar-heading">Tasks Progress</h3>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="#">
                                        <h4 class="subheading">
                                            Task one
                                            <span class="label label-danger pull-right">40%</span>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 40%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h4 class="subheading">
                                            Task two
                                            <span class="label label-success pull-right">20%</span>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 20%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h4 class="subheading">
                                            Task Three
                                            <span class="label label-warning pull-right">60%</span>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 60%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h4 class="subheading">
                                            Task four
                                            <span class="label label-primary pull-right">80%</span>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-bar-striped active" style="width: 80%"></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.sidebar-menu -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="messages">
                            <div class="message_widgets">
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Naeem Khan</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status available pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar2.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Sala Uddin</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status away pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar3.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Mozammel</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status busy pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Tanzil</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status offline pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar5.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Amir Khan</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status available pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Salman Khan</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status available pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Tahamina</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status available pull-right"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle" alt=""></div>
                                        <strong class="inbox-item-author">Jhon</strong>
                                        <span class="inbox-item-date">-13:40 PM</span>
                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                        <span class="profile-status offline pull-right"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Right Sidebar -->
            <!-- /.Navbar  Static Side -->
            <div class="control-sidebar-bg"></div>
            <!-- Page Content -->
            <div id="page-wrapper">
                <!-- main content -->
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mailbox">
                                <div class="mailbox-header">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="inbox-avatar"><img src="{{ asset('assets/dist/img/user2-160x160.png') }}" class="img-circle border-green" alt="img">
                                                <div class="inbox-avatar-text hidden-xs hidden-sm">
                                                    <div class="avatar-name">Tanzil Ahmed</div>
                                                    <div><small>Mailbox</small></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="inbox-toolbar btn-toolbar">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.compose') }}" class="btn btn-base"><span class="fa fa-pencil-square-o"></span></a>
                                                </div>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-default"><span class="fa fa-reply"></span></a>
                                                    <a href="#" class="hidden-xs hidden-sm btn btn-default"><span class="fa fa-reply-all"></span></a>
                                                    <a href="#" class="btn btn-default"><span class="fa fa-share"></span></a>
                                                </div>
                                                <div class="hidden-xs hidden-sm btn-group">
                                                    <button type="button" class="text-center btn btn-danger"><span class="fa fa-exclamation"></span></button>
                                                    <button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mailbox-body">
                                    <div class="row m-0">
                                        <div class="col-sm-3 p-0 inbox-nav hidden-xs hidden-sm">
                                            <div class="mailbox-sideber">
                                                <div class="profile-usermenu">
                                                    <h6>Mailbox</h6>
                                                    <ul class="nav">
                                                        <li class="active"><a href="#"><i class="fa fa-inbox"></i>Inbox <small class="label pull-right bg-green">61</small></a></li>
                                                        <li><a href="{{ route('admin.compose') }}"><i class="fa fa-envelope-o"></i>Send Mail</a></li>
                                                        <li><a href="#"><i class="fa fa-star-o"></i>Starred</a></li>
                                                        <li><a href="#"><i class="fa fa-trash-o"></i>Tresh </a></li>
                                                        <li><a href="#"><i class="fa fa-paperclip"></i>Attachments</a></li>
                                                    </ul>
                                                    <h6>Other</h6>
                                                    <ul class="nav">
                                                        <li><a href="#"><i class="fa fa-exclamation"></i>Spam</a></li>
                                                        <li><a href="#"><i class="fa fa-file-text-o"></i>Draft</a></li>
                                                    </ul>
                                                    <h6>Tags</h6>
                                                    <ul class="nav">
                                                        <li><a href="#"><i class="fa fa-circle color-green"></i>#sometag</a></li>
                                                        <li><a href="#"><i class="fa fa-circle color-red"></i>#anothertag</a></li>
                                                        <li><a href="#"><i class="fa fa-circle color-yellow"></i>#anotheronetag</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9 p-0 inbox-mail">
                                            <div class="mailbox-content">
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-1">
                                                    </div>
                                                    <a href="#" class="inbox_item unread">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/avatar.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">PHPClass</div>
                                                                <div><small><span><strong>Early access: </strong><span> Added a new class: Login Class Fast Site.</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">9:27 AM</div>
                                                                <div><small>May 27th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-2">
                                                    </div>
                                                    <a href="#" class="inbox_item">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/drupal-logos.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">Drupal Community</div>
                                                                <div><small><span class="bg-red badge avatar-text">MAGAZINE</span><span><span>Welcome to the Drupal Community</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">12:39 AM</div>
                                                                <div><small>Apr 15th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-4">
                                                    </div>
                                                    <a href="#" class="inbox_item unread">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/avatar4.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">Terri Rexer, S P N</div>
                                                                <div><small><span><strong>Early access: </strong><span>Forget Google AdWords: Un-Limited Clicks fo</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">1:45 AM</div>
                                                                <div><small>Jan 29th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-3">
                                                    </div>
                                                    <a href="#" class="inbox_item unread">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/linkedin-logo.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">LinkedIn</div>
                                                                <div><small><span><span>Alireza: Nokia Networks, System Group and.</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">8:56 PM</div>
                                                                <div><small>Aug 19th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-5">
                                                    </div>
                                                    <a href="#" class="inbox_item">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/wow-slider-logo.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">WOW Slider </div>
                                                                <div><small><span>New WOW Slider v7.8 - 67% off</span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">2:45 AM</div>
                                                                <div><small>Jun 29th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-6">
                                                    </div>
                                                    <a href="#" class="inbox_item unread">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/avatar.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">Slaah Uddin</div>
                                                                <div><small><span class="bg-green badge avatar-text">SOME LABEL</span><span><strong>Early access: </strong><span>The point of using Lorem Ipsum is that it has ....</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">8:45 AM</div>
                                                                <div><small>Apr 29th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-7">
                                                    </div>
                                                    <a href="#" class="inbox_item unread">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/avatar2.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">Tahmina Akther</div>
                                                                <div><small><span><strong>Early access: </strong><span>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">5:45 AM</div>
                                                                <div><small>Mar 17th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-8">
                                                    </div>
                                                    <a href="#" class="inbox_item">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/avatar3.png') }}" class="border-violet hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">Jordyn Ouellet</div>
                                                                <div><small><span class="bg-violet badge avatar-text">SOME LABEL</span><span><strong>Early access: </strong><span>Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit.</span></span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">3:45 AM</div>
                                                                <div><small>Feb 15th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="mailbox_inner">
                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox" id="square-checkbox-9">
                                                    </div>
                                                    <a href="#" class="inbox_item">
                                                        <div class="inbox-avatar">
                                                            <img src="{{ asset('assets/dist/img/facebook-logo.png') }}" class="hidden-xs hidden-sm" alt="img">
                                                            <div class="inbox-avatar-text">
                                                                <div class="avatar-name">Facebook</div>
                                                                <div><small><span>Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit.</span></small></div>
                                                            </div>
                                                            <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                                                <div class="date">1:45 AM</div>
                                                                <div><small>Jan 29th</small></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script>
            $(document).ready(function () {
                "use strict"; // Start of use strict

                $('.i-check input').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'
                });
            });
        </script>
@endpush
