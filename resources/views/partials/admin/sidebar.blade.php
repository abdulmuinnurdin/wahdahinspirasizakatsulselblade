<div class="sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}" class="material-ripple"><i class="material-icons">home</i> Dashboard</a></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">bubble_chart</i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.charts_flot') ? 'active' : '' }}"><a href="{{ route('admin.charts_flot') }}">Flot Chart</a></li>
                                <li class="{{ request()->routeIs('admin.charts_Js') ? 'active' : '' }}"><a href="{{ route('admin.charts_Js') }}">Chart js</a></li>
                                <li class="{{ request()->routeIs('admin.charts_morris') ? 'active' : '' }}"><a href="{{ route('admin.charts_morris') }}">Morris Charts</a></li>
                                <li class="{{ request()->routeIs('admin.charts_sparkline') ? 'active' : '' }}"><a href="{{ route('admin.charts_sparkline') }}">Sparkline Charts</a></li>
                                <li class="{{ request()->routeIs('admin.charts_am') ? 'active' : '' }}"><a href="{{ route('admin.charts_am') }}">Am Charts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">drafts</i> Mailbox<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.mailbox') ? 'active' : '' }}"><a href="{{ route('admin.mailbox') }}">Mailbox<span class="nav-tag green">3</span></a></li>
                                <li class="{{ request()->routeIs('admin.mailDetails') ? 'active' : '' }}"><a href="{{ route('admin.mailDetails') }}">Mailbox Details<span class="nav-tag yellow">2</span></a></li>
                                <li class="{{ request()->routeIs('admin.compose') ? 'active' : '' }}"><a href="{{ route('admin.compose') }}">Compose<span class="nav-tag red">9</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">business</i> Tables<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.table') ? 'active' : '' }}"><a href="{{ route('admin.table') }}">Simple tables</a></li>
                                <li class="{{ request()->routeIs('admin.dataTables') ? 'active' : '' }}"><a href="{{ route('admin.dataTables') }}">Data tables</a></li>
                                <li class="{{ request()->routeIs('admin.footable') ? 'active' : '' }}"><a href="{{ route('admin.footable') }}">FooTable</a></li>
                                <li class="{{ request()->routeIs('admin.x-editable') ? 'active' : '' }}"><a href="{{ route('admin.x-editable') }}">X-editable</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">assignment</i> Forms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.forms_basic') ? 'active' : '' }}"><a href="{{ route('admin.forms_basic') }}">Basic Forms</a></li>
                                <li class="{{ request()->routeIs('admin.form_input_group') ? 'active' : '' }}"><a href="{{ route('admin.form_input_group') }}">Input group</a></li>
                                <li class="{{ request()->routeIs('admin.form-mask') ? 'active' : '' }}"><a href="{{ route('admin.form-mask') }}">Form Mask</a></li>
                                <li class="{{ request()->routeIs('admin.form_touchspin') ? 'active' : '' }}"><a href="{{ route('admin.form_touchspin') }}">Touchspin</a></li>
                                <li class="{{ request()->routeIs('admin.form_select') ? 'active' : '' }}"><a href="{{ route('admin.form_select') }}">Select</a></li>
                                <li class="{{ request()->routeIs('admin.forms_validation') ? 'active' : '' }}"><a href="{{ route('admin.forms_validation') }}">Validation Forms</a></li>
                                <li class="{{ request()->routeIs('admin.forms_cropper') ? 'active' : '' }}"><a href="{{ route('admin.forms_cropper') }}">Cropper</a></li>
                                <li class="{{ request()->routeIs('admin.form_file_upload') ? 'active' : '' }}"><a href="{{ route('admin.form_file_upload') }}">Forms File Upload</a></li>
                                <li class="{{ request()->routeIs('admin.forms_editor_ck') ? 'active' : '' }}"><a href="{{ route('admin.forms_editor_ck') }}">CK Editor</a></li>
                                <li class="{{ request()->routeIs('admin.forms_editor_summernote') ? 'active' : '' }}"><a href="{{ route('admin.forms_editor_summernote') }}">Summernote</a></li>
                                <li class="{{ request()->routeIs('admin.form_wizard') ? 'active' : '' }}"><a href="{{ route('admin.form_wizard') }}">Form Wizaed</a></li>
                                <li class="{{ request()->routeIs('admin.forms_editor_markdown') ? 'active' : '' }}"><a href="{{ route('admin.forms_editor_markdown') }}">Markdown</a></li>
                                <li class="{{ request()->routeIs('admin.forms_editor_trumbowyg') ? 'active' : '' }}"><a href="{{ route('admin.forms_editor_trumbowyg') }}">Trumbowyg</a></li>
                                <li class="{{ request()->routeIs('admin.form_editor_wysihtml5') ? 'active' : '' }}"><a href="{{ route('admin.form_editor_wysihtml5') }}">Wysihtml5</a></li>
                            </ul>
                        </li>
                        <li class="nav-heading "> <span>Components&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">format_color_fill</i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.buttons') ? 'active' : '' }}"><a href="{{ route('admin.buttons') }}">Buttons</a></li>
                                <li class="{{ request()->routeIs('admin.tabs') ? 'active' : '' }}"><a href="{{ route('admin.tabs') }}">Tab</a></li>
                                <li class="{{ request()->routeIs('admin.notification') ? 'active' : '' }}"><a href="{{ route('admin.notification') }}">Notification</a></li>
                                <li class="{{ request()->routeIs('admin.tree-view') ? 'active' : '' }}"><a href="{{ route('admin.tree-view') }}">Tree View</a></li>
                                <li class="{{ request()->routeIs('admin.progressbars') ? 'active' : '' }}"><a href="{{ route('admin.progressbars') }}">Progressber</a></li>
                                <li class="{{ request()->routeIs('admin.list') ? 'active' : '' }}"><a href="{{ route('admin.list') }}">List View</a></li>
                                <li class="{{ request()->routeIs('admin.typography') ? 'active' : '' }}"><a href="{{ route('admin.typography') }}">Typography</a></li>
                                <li class="{{ request()->routeIs('admin.panels') ? 'active' : '' }}"><a href="{{ route('admin.panels') }}">Panels</a></li>
                                <li class="{{ request()->routeIs('admin.modals') ? 'active' : '' }}"><a href="{{ route('admin.modals') }}">Modals</a></li>
                                <li class="{{ request()->routeIs('admin.icheck_toggle_pagination') ? 'active' : '' }}"><a href="{{ route('admin.icheck_toggle_pagination') }}">iCheck, Toggle, pagination</a></li>
                                <li class="{{ request()->routeIs('admin.labels-badges-alerts') ? 'active' : '' }}"><a href="{{ route('admin.labels-badges-alerts') }}">labels, Badges, Alerts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">map</i> Maps<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.maps_amcharts') ? 'active' : '' }}"><a href="{{ route('admin.maps_amcharts') }}">Amcharts Map</a></li>
                                <li class="{{ request()->routeIs('admin.maps_gmaps') ? 'active' : '' }}"><a href="{{ route('admin.maps_gmaps') }}">gMaps</a></li>
                                <li class="{{ request()->routeIs('admin.maps_data') ? 'active' : '' }}"><a href="{{ route('admin.maps_data') }}">Data Maps</a></li>
                                <li class="{{ request()->routeIs('admin.maps_jvector') ? 'active' : '' }}"><a href="{{ route('admin.maps_jvector') }}">Jvector Maps</a></li>
                                <li class="{{ request()->routeIs('admin.maps_google') ? 'active' : '' }}"><a href="{{ route('admin.maps_google') }}">Google map</a></li>
                                <li class="{{ request()->routeIs('admin.maps_snazzy') ? 'active' : '' }}"><a href="{{ route('admin.maps_snazzy') }}">Snazzy Map</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">insert_emoticon</i> Icons<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.icons_bootstrap') ? 'active' : '' }}"><a href="{{ route('admin.icons_bootstrap') }}">Bootstrap Icons</a></li>
                                <li class="{{ request()->routeIs('admin.icons_fontawesome') ? 'active' : '' }}"><a href="{{ route('admin.icons_fontawesome') }}">Fontawesome Icon</a></li>
                                <li class="{{ request()->routeIs('admin.icons_flag') ? 'active' : '' }}"><a href="{{ route('admin.icons_flag') }}">Flag Icons</a></li>
                                <li class="{{ request()->routeIs('admin.icons_material') ? 'active' : '' }}"><a href="{{ route('admin.icons_material') }}">Material Icons</a></li>
                                <li class="{{ request()->routeIs('admin.icons_weather') ? 'active' : '' }}"><a href="{{ route('admin.icons_weather') }}">Weather Icons </a></li>
                                <li class="{{ request()->routeIs('admin.icons_line') ? 'active' : '' }}"><a href="{{ route('admin.icons_line') }}">Line Icons</a></li>
                                <li class="{{ request()->routeIs('admin.icons_pe') ? 'active' : '' }}"><a href="{{ route('admin.icons_pe') }}">Pe Icons</a></li>
                                <li class="{{ request()->routeIs('admin.icon_socicon') ? 'active' : '' }}"><a href="{{ route('admin.icon_socicon') }}">Socicon Icons</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('admin.widgets') ? 'active' : '' }}"><a href="{{ route('admin.widgets') }}"><i class="material-icons">widgets</i>Widgets<span class="nav-tag green">new</span></a></li>
                        <li class="{{ request()->routeIs('admin.calender') ? 'active' : '' }}"><a href="{{ route('admin.calender') }}"><i class="material-icons">perm_contact_calendar</i>Calendar<span class="nav-tag red">3</span><span class="nav-tag green">5</span><span class="nav-tag yellow">8</span></a></li>
                        <li class="nav-heading "> <span>Extra&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">stay_current_portrait</i>App Views<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.invoice') ? 'active' : '' }}"><a href="{{ route('admin.invoice') }}">Invoice</a></li>
                                <li class="{{ request()->routeIs('admin.timeline') ? 'active' : '' }}"><a href="{{ route('admin.timeline') }}">Vertical timeline</a></li>
                                <li class="{{ request()->routeIs('admin.horizontal_timeline') ? 'active' : '' }}"><a href="{{ route('admin.horizontal_timeline') }}">Horizontal timeline</a></li>
                                <li class="{{ request()->routeIs('admin.pricing') ? 'active' : '' }}"><a href="{{ route('admin.pricing') }}">Pricing Table</a></li>
                                <li class="{{ request()->routeIs('admin.slider') ? 'active' : '' }}"><a href="{{ route('admin.slider') }}">Slider</a></li>
                                <li class="{{ request()->routeIs('admin.carousel') ? 'active' : '' }}"><a href="{{ route('admin.carousel') }}">Carousel</a></li>
                                <li class="{{ request()->routeIs('admin.code_editor') ? 'active' : '' }}"><a href="{{ route('admin.code_editor') }}">Code editor</a></li>
                                <li class="{{ request()->routeIs('admin.gridSystem') ? 'active' : '' }}"><a href="{{ route('admin.gridSystem') }}">Grid System</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">devices_other</i>Other pags<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="{{ request()->routeIs('admin.login') ? 'active' : '' }}"><a href="{{ route('admin.login') }}">Login</a></li>
                                <li class="{{ request()->routeIs('admin.register') ? 'active' : '' }}"><a href="{{ route('admin.register') }}">Register</a></li>
                                <li class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}"><a href="{{ route('admin.profile') }}">Profile</a></li>
                                <li class="{{ request()->routeIs('admin.forget_password') ? 'active' : '' }}"><a href="{{ route('admin.forget_password') }}">Forget password</a></li>
                                <li class="{{ request()->routeIs('admin.lockscreen') ? 'active' : '' }}"><a href="{{ route('admin.lockscreen') }}">Lockscreen</a></li>
                                <li class="{{ request()->routeIs('admin.404') ? 'active' : '' }}"><a href="{{ route('admin.404') }}">404 Error</a></li>
                                <li class="{{ request()->routeIs('admin.505') ? 'active' : '' }}"><a href="{{ route('admin.505') }}">505 Error</a></li>
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
                        <li class="{{ request()->routeIs('admin.blank') ? 'active' : '' }}"><a href="{{ route('admin.blank') }}" class="material-ripple"><i class="material-icons">check_box_outline_blank</i> Blank page</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.Left Sidebar-->
            