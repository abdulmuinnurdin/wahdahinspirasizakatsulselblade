@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Tree View',
    'headerSubtitle' => 'Bootstrap Treeview',
    'breadcrumb' => 'Tree View',
    'headerIcon' => 'pe-7s-way',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4> Tree View</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="well"><strong>Initialization no parameters</strong>
                                                <br /> <code>$('#tree1').treed();</code>
                                            </p>
                                            <ul id="tree1">
                                                <li><a href="#">TECH</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">XRP</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Tree View One</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="well" style="height:135px;"><strong>Initialization optional parameters</strong>
                                                <br /> <code>$('#tree2').treed({openedClass : 'fa-folder-open', closedClass : 'fa-folder'});</code>
                                            </p>
                                            <ul id="tree2">
                                                <li><a href="#">TECH</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">XRP</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Tree View Four</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="well" style="height:135px;"><strong>Initialization optional parameters</strong>
                                                <br /> <code>$('#tree3').treed({openedClass:'fa-plus', closedClass:'fa-minus'});</code>
                                            </p>
                                            <ul id="tree3">
                                                <li><a href="#">TECH</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">XRP</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Tree View Five</a>
                                                    <ul>
                                                        <li>Company Maintenance</li>
                                                        <li>Employees
                                                            <ul>
                                                                <li>Reports
                                                                    <ul>
                                                                        <li>Report1</li>
                                                                        <li>Report2</li>
                                                                        <li>Report3</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Employee Maint.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Human Resources</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script>
            $(document).ready(function () {
                "use strict"; // Start of use strict

                $.fn.extend({
                    treed: function (o) {

                        var openedClass = 'fa-folder-open-o';
                        var closedClass = 'fa-folder-o';

                        if (typeof o !== 'undefined') {
                            if (typeof o.openedClass !== 'undefined') {
                                openedClass = o.openedClass;
                            }
                            if (typeof o.closedClass !== 'undefined') {
                                closedClass = o.closedClass;
                            }
                        }
                        ;

                        //initialize each of the top levels
                        var tree = $(this);
                        tree.addClass("tree");
                        tree.find('li').has("ul").each(function () {
                            var branch = $(this); //li with children ul
                            branch.prepend("<i class='indicator fa " + closedClass + "'></i>");
                            branch.addClass('branch');
                            branch.on('click', function (e) {
                                if (this === e.target) {
                                    var icon = $(this).children('i:first');
                                    icon.toggleClass(openedClass + " " + closedClass);
                                    $(this).children().children().toggle();
                                }
                            });
                            branch.children().children().toggle();
                        });
                        //fire event from the dynamically added icon
                        tree.find('.branch .indicator').each(function () {
                            $(this).on('click', function () {
                                $(this).closest('li').click();
                            });
                        });
                        //fire event to open branch if the li contains an anchor instead of text
                        tree.find('.branch>a').each(function () {
                            $(this).on('click', function (e) {
                                $(this).closest('li').click();
                                e.preventDefault();
                            });
                        });
                        //fire event to open branch if the li contains a button instead of text
                        tree.find('.branch>button').each(function () {
                            $(this).on('click', function (e) {
                                $(this).closest('li').click();
                                e.preventDefault();
                            });
                        });
                    }
                });

                //Initialization of treeviews
                $('#tree1').treed();
                $('#tree2').treed({openedClass: 'fa-folder-open', closedClass: 'fa-folder'});
                $('#tree3').treed({openedClass: 'fa-minus', closedClass: 'fa-plus'});

            });
        </script>
@endpush
