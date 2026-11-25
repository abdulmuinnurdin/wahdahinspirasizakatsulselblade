@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Nestable list',
    'headerSubtitle' => 'Nestable - Drag & drop hierarchical list.',
    'breadcrumb' => 'Nestable list',
    'headerIcon' => 'pe-7s-menu',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="nestable-menu" class="m-b-20">
                                <button type="button" data-action="expand-all" class="btn btn-success">Expand All</button>
                                <button type="button" data-action="collapse-all" class="btn btn-success">Collapse All</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                    <div class="dd" id="nestable">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle">
                                                    <span class="label bg-green"><i class="fa fa-laptop"></i></span> Cras quis tellus aliquet odio pharetra elementum.
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle">
                                                    <span class="label bg-green"><i class="fa fa-hospital-o"></i></span> Vestibulum feugiat sem eget velit lacinia tempus.
                                                </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="3">
                                                        <div class="dd-handle">
                                                            <span class="pull-right"> 12:00 pm </span>
                                                            <span class="label bg-green"><i class="fa fa-cog"></i></span> Nunc et dolor sed ligula congue congue.
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="4">
                                                        <div class="dd-handle">
                                                            <span class="pull-right"> 12:00 pm </span>
                                                            <span class="label bg-green"><i class="fa fa-bolt"></i></span> In facilisis arcu sed congue dictum.
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="5">
                                                        <div class="dd-handle">
                                                            <span class="label bg-green"><i class="fa fa-user"></i></span> Cras interdum orci vitae
                                                        </div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="6">
                                                                <div class="dd-handle">
                                                                    <span class="pull-right"> 06:50 pm </span>
                                                                    <span class="label bg-green"><i class="fa fa-bar-chart"></i></span> Sed bibendum libero vita
                                                                </div>
                                                            </li>
                                                            <li class="dd-item" data-id="7">
                                                                <div class="dd-handle">
                                                                    <span class="pull-right"> 11:50 pm </span>
                                                                    <span class="label bg-green"><i class="fa fa-balance-scale"></i></span> risus efficitur tempor non a dolor.
                                                                </div>
                                                            </li>
                                                            <li class="dd-item" data-id="8">
                                                                <div class="dd-handle">
                                                                    <span class="pull-right"> 01:50 pm </span>
                                                                    <span class="label bg-green"><i class="fa fa-car"></i></span> ut posuere elit porttitor.
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="dd-item" data-id="9">
                                                        <div class="dd-handle">
                                                            <span class="pull-right"> 11:50 pm </span>
                                                            <span class="label bg-green"><i class="fa fa-diamond"></i></span> quis interdum lorem posuere.
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="10">
                                                        <div class="dd-handle">
                                                            <span class="pull-right"> 09:50 pm </span>
                                                            <span class="label bg-green"><i class="fa fa-exclamation-triangle"></i></span> Ut varius diam ac mollis
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="11">
                                                <div class="dd-handle">
                                                    <span class="label bg-green"><i class="fa fa-male"></i></span> Aliquam laoreet elit in placerat eleifend.
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="12">
                                                <div class="dd-handle">
                                                    <span class="label bg-green"><i class="fa fa-truck"></i></span> In facilisis arcu sed congue dictum.
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                    <h4 class="m-t-20">Serialised Output</h4>
                                    <textarea id="nestable-output" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                    <div class="dd" id="nestable2">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle"><strong>1</strong> - Sed efficitur justo</div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle"><strong>2</strong> - pharetra elementum.</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="15"><div class="dd-handle"><strong>3</strong> -  consectetur velit.</div></li>
                                                    <li class="dd-item" data-id="16"><div class="dd-handle"><strong>4</strong> - ut posuere elit porttitor.</div></li>
                                                    <li class="dd-item" data-id="17"><div class="dd-handle"><strong>5</strong> - </div></li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="18">
                                                <div class="dd-handle"><strong>6</strong> - Cras malesuada veli</div>
                                            </li>
                                            <li class="dd-item" data-id="19">
                                                <div class="dd-handle"><strong>7</strong> - In lacinia ante</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="20"><div class="dd-handle"><strong>8</strong> - Aliquam laoreet elit</div></li>
                                                    <li class="dd-item" data-id="20"><div class="dd-handle"><strong>9</strong> - Proin molestie ligula </div></li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="21">
                                                <div class="dd-handle"><strong>10</strong> - Donec sodales urna</div>
                                            </li>
                                            <li class="dd-item" data-id="22">
                                                <div class="dd-handle"><strong>11</strong> - Lorem ipsum dolor</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="23"><div class="dd-handle"><strong>12</strong> - Ut varius diam </div></li>
                                                    <li class="dd-item" data-id="24"><div class="dd-handle"><strong>13</strong> - Mauris non nisi</div></li>
                                                    <li class="dd-item" data-id="25"><div class="dd-handle"><strong>14</strong> - Proin molestie</div></li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                    <h4 class="m-t-20">Serialised Output</h4>
                                    <textarea id="nestable2-output" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Draggable Handles</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="dd" id="nestable3">
                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item" data-id="13">
                                                <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 15 -</strong> Maecenas lacinia lacus ut arcu aliquet auctor.</div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="14">
                                                <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 16 -</strong> Integer tincidunt purus sit amet luctus sagittis.</div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="15">
                                                <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 17 -</strong> Integer tempor lorem et efficitur interdum.</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item dd3-item" data-id="16">
                                                        <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 18 -</strong> Suspendisse at orci at odio euismod aliquam.</div>
                                                    </li>
                                                    <li class="dd-item dd3-item" data-id="17">
                                                        <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 19 -</strong> Donec ut sem sed elit mattis tempor non id mi.</div>
                                                    </li>
                                                    <li class="dd-item dd3-item" data-id="18">
                                                        <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 20 -</strong> Integer tincidunt purus sit amet luctus sagittis.</div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="13">
                                                <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 21 -</strong> Quisque suscipit elit ut ullamcorper condimentum.</div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="14">
                                                <div class="dd-handle dd3-handle"></div><div class="dd3-content"><strong>Item 22 -</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/Nestable/jquery.nestable.js') }}"></script>
    <script>
            $(document).ready(function () {

                //nestable
                var updateOutput = function (e)
                {
                    var list = e.length ? e : $(e.target),
                            output = list.data('output');
                    if (window.JSON) {
                        output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    } else {
                        output.val('JSON browser support required for this demo.');
                    }
                };

                // activate Nestable for list 1
                $('#nestable').nestable({
                    group: 1
                })
                        .on('change', updateOutput);

                // activate Nestable for list 2
                $('#nestable2').nestable({
                    group: 1
                })
                        .on('change', updateOutput);

                // output initial serialised data
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                updateOutput($('#nestable2').data('output', $('#nestable2-output')));

                $('#nestable-menu').on('click', function (e)
                {
                    var target = $(e.target),
                            action = target.data('action');
                    if (action === 'expand-all') {
                        $('.dd').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('.dd').nestable('collapseAll');
                    }
                });

                $('#nestable3').nestable();

            });
        </script>
@endpush
