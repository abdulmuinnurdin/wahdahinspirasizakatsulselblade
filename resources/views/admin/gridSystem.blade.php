@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Grid System',
    'headerSubtitle' => 'Grid Options - based on Bootstrap Grid system overview',
    'breadcrumb' => 'Grid System',
    'headerIcon' => 'pe-7s-cash',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Grid system</h3>
                                    <P>Bootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 
                                        columns as the device or viewport size increases. It includes predefined classes for easy layout
                                        options, as well as powerful mixins for generating more semantic layouts.</P>
                                    <h4>Introduction</h4>
                                    <p>Grid systems are used for creating page layouts through a series of rows and columns that house your 
                                        content. Here's how the Bootstrap grid system works:</p>
                                    <ul>
                                        <li>Rows must be placed within a <code>.container</code> (fixed-width) or <code>.container-fluid</code> (full-width) for proper alignment and padding.</li>
                                        <li>Use rows to create horizontal groups of columns.</li>
                                        <li>Content should be placed within columns, and only columns may be immediate children of rows.</li>
                                        <li>Predefined grid classes like <code>.row</code> and <code>.col-xs-4</code> are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.</li>
                                        <li>Columns create gutters (gaps between column content) via <code>padding</code>. That padding is offset in rows for the first and last column via negative margin on <code>.row</code>s.</li>
                                        <li>The negative margin is why the examples below are outdented. It's so that content within grid columns is lined up with non-grid content.</li>
                                        <li>Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three <code>.col-xs-4</code>.</li>
                                        <li>If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.</li>
                                        <li>Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any <code>.col-md-*</code> class to an element will not only affect its styling on medium devices but also on large devices if a <code>.col-lg-*</code> class is not present.</li>
                                    </ul>
                                    <p>Look to the examples for applying these principles to your code.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Grid options</h3>
                                    <p>See how aspects of the Bootstrap grid system work across multiple devices with a handy table.</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th> Extra small devices <small>Phones (&lt;768px)</small> </th>
                                                    <th> Small devices <small>Tablets (≥768px)</small> </th>
                                                    <th> Medium devices <small>Desktops (≥992px)</small> </th>
                                                    <th> Large devices <small>Desktops (≥1200px)</small> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Grid behavior</th>
                                                    <td>Horizontal at all times</td>
                                                    <td colspan="3">Collapsed to start, horizontal above breakpoints</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Container width</th>
                                                    <td>None (auto)</td>
                                                    <td>750px</td>
                                                    <td>970px</td>
                                                    <td>1170px</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Class prefix</th>
                                                    <td><code>.col-xs-</code></td>
                                                    <td><code>.col-sm-</code></td>
                                                    <td><code>.col-md-</code></td>
                                                    <td><code>.col-lg-</code></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row"># of columns</th>
                                                    <td colspan="4">12</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Column width</th>
                                                    <td class="text-muted">Auto</td>
                                                    <td>~62px</td>
                                                    <td>~81px</td>
                                                    <td>~97px</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Gutter width</th>
                                                    <td colspan="4">30px (15px on each side of a column)</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Nestable</th>
                                                    <td colspan="4">Yes</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Offsets</th>
                                                    <td colspan="4">Yes</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">Column ordering</th>
                                                    <td colspan="4">Yes</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Stacked-to-horizontal</h3>
                                    <p>Using a single set of <code>.col-md-*</code> grid classes, you can create a basic grid system that starts out stacked on mobile devices and tablet devices (the extra small to small range) before becoming horizontal on desktop (medium) devices. Place grid columns in any <code>.row</code>.</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                        <div class="col-md-1">.col-md-1</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-8">.col-md-8</div>
                                        <div class="col-md-4">.col-md-4</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-4">.col-md-4</div>
                                        <div class="col-md-4">.col-md-4</div>
                                        <div class="col-md-4">.col-md-4</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-6">.col-md-6</div>
                                        <div class="col-md-6">.col-md-6</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Mobile and desktop</h3>
                                    <p>Don't want your columns to simply stack in smaller devices? Use the extra small and medium device grid classes by adding <code>.col-xs-*</code> <code>.col-md-*</code> to your columns. See the example below for a better idea of how it all works.</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-12 col-md-8">.col-xs-12 .col-md-8</div>
                                        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                                        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                                        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-6">.col-xs-6</div>
                                        <div class="col-xs-6">.col-xs-6</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Mobile, tablet, desktop</h3>
                                    <p>Build on the previous example by creating even more dynamic and powerful layouts with tablet <code>.col-sm-*</code> classes.</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-12 col-sm-6 col-md-8">.col-xs-12 .col-sm-6 .col-md-8</div>
                                        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                                        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                                        <div class="clearfix visible-xs-block"></div>
                                        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Column wrapping</h3>
                                    <p>If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-9">.col-xs-9</div>
                                        <div class="col-xs-4">.col-xs-4
                                            <br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one contiguous unit.</div>
                                        <div class="col-xs-6">.col-xs-6
                                            <br>Subsequent columns continue along the new line.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Responsive column resets</h3>
                                    <p>With the four tiers of grids available you're bound to run into issues where, at certain breakpoints, your
                                        columns don't clear quite right as one is taller than the other. To fix that, use a combination of 
                                        a <code>.clearfix</code> and our <a href="#responsive-utilities">responsive utility classes</a>.</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-xs-6 col-sm-3"> .col-xs-6 .col-sm-3
                                            <br> Resize your viewport or check it out on your phone for an example. </div>
                                        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
                                        <div class="clearfix visible-xs-block"></div>
                                        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
                                        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0"> Offsetting columns</h3>
                                    <p>Move columns to the right using <code>.col-md-offset-*</code> classes. These classes increase the left margin 
                                        of a column by <code>*</code> columns. For example, <code>.col-md-offset-4</code> moves <code>.col-md-4</code> 
                                        over four columns.</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-4">.col-md-4</div>
                                        <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
                                        <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
                                    </div>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Nesting columns</h3>
                                    <p>To nest your content with the default grid, add a new <code>.row</code> and set of <code>.col-sm-*</code> columns within an 
                                        existing <code>.col-sm-*</code> column. Nested rows should include a set of columns that add up to 12 or fewer (it is not
                                        required that you use all 12 available columns).</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-sm-9"> Level 1: .col-sm-9
                                            <div class="row show-grid">
                                                <div class="col-xs-8 col-sm-6"> Level 2: .col-xs-8 .col-sm-6 </div>
                                                <div class="col-xs-4 col-sm-6"> Level 2: .col-xs-4 .col-sm-6 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <h3 class="m-t-0">Column ordering</h3>
                                    <p>Easily change the order of our built-in grid columns with <code>.col-md-push-*</code> and <code>.col-md-pull-*</code> modifier classes.</p>
                                    <div class="row show-grid m-0">
                                        <div class="col-md-9 col-md-push-3">.col-md-9 .col-md-push-3</div>
                                        <div class="col-md-3 col-md-pull-9">.col-md-3 .col-md-pull-9</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@endpush
