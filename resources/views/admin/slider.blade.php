@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Slider',
    'headerSubtitle' => 'Ion Range Sliders cool, comfortable and easily customizable range slider with skins support',
    'breadcrumb' => 'Slider',
    'headerIcon' => 'pe-7s-battery',
])

@push('css')
    <link href="{{ asset('assets/plugins/ion/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/ion/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Ion Basic Sliders</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="m-b-20">Ion.RangeSlider. Is an easy, flexible and responsive range slider with tons of options. For more info please check out <a href="http://ionden.com/a/plugins/ion.rangeSlider/" target="_blank">the official documentation</a></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="header-title m-t-0"><b>Simple start and customising basic params</b></h4>
                                            <p>Start without params</p>
                                            <input type="text" id="range_01" value="" name="range" />
                                            <hr>
                                            <p>Set min value, max value and start point</p>
                                            <input type="text" id="range_02" value="" name="range" />
                                            <hr>
                                            <p>Set type to double and specify range, also showing grid and adding prefix "$"</p>
                                            <input type="text" id="range_03" value="" name="range" />
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="header-title m-t-0"><b>Set up range and step</b></h4>
                                            <p>Set type to double and specify range, also showing grid and adding prefix "$"</p>
                                            <input type="text" id="range_04" value="" name="range" />
                                            <hr>
                                            <p>Using step 250</p>
                                            <input type="text" id="range_05" value="" name="range" />
                                            <hr>
                                            <p>Set up range with fractional values, using fractional step</p>
                                            <input type="text" id="range_06" value="" name="range" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4> Ion Advanced Sliders</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="header-title m-t-0 m-b-20"><b>Lock handles</b></h4>
                                            <p>Sometimes you want to forbid dragging one or both handles. Try to move left handle, you can't.</p>
                                            <input type="text" id="range_07" value="" name="range" />
                                            <hr>
                                            <p>You can even lock both handles</p>
                                            <input type="text" id="range_08" value="" name="range" />
                                            <hr>
                                            <h4 class="header-title m-t-0 m-b-20"><b>Movement limits</b></h4>
                                            <p>Sometimes you may want to show user full slider, but restict him from using it for 100%. The limits is the tool for you.
                                                Try to drag slider, you will see, it has invisible borders on 10 and 50.</p>
                                            <input type="text" id="range_09" value="" name="range" />
                                            <hr>
                                            <p>You can also highlight this zone:</p>
                                            <input type="text" id="range_10" value="" name="range" />
                                            <hr>
                                            <p>One more example with limits:</p>
                                            <input type="text" id="range_11" value="" name="range" />
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="header-title m-t-0 m-b-20"><b>Disable the slider</b></h4>
                                            <p>You can lock your slider, by using disable option:</p>
                                            <input type="text" id="range_12" value="" name="range" />
                                            <hr>
                                            <p>After first focus, you can control slider by keyboard (arrow keys and WSAD):</p>
                                            <input type="text" id="range_13" value="" name="range" />
                                            <hr>
                                            <p>Also you can set up keyboard step (in percents):</p>
                                            <input type="text" id="range_14" value="" name="range" />
                                            <hr>
                                            <h4 class="header-title m-t-0 m-b-20"><b>Working with dates and time, using <a href="http://momentjs.com/" target="_blank">moment.js</a></b></h4>
                                            <p>You can use native Date object if you wish, but moment.js <a href="http://momentjs.com/docs/" target="_blank">is better</a>!</p>
                                            <input type="text" id="range_15" value="" name="range" />
                                            <hr>
                                            <p>Example with 12 hours time format</p>
                                            <input type="text" id="range_16" value="" name="range" />
                                            <hr>
                                            <p>Example with 24 hours time format and localisation to russian:</p>
                                            <input type="text" id="range_17" value="" name="range" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/ion/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script>
            $(document).ready(function () {
                "use strict"; // Start of use strict

                $("#range_01").ionRangeSlider();

                $("#range_02").ionRangeSlider({
                    min: 100,
                    max: 1000,
                    from: 550
                });

                $("#range_03").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: 0,
                    max: 1000,
                    from: 200,
                    to: 800,
                    prefix: "$"
                });

                $("#range_04").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: -1000,
                    max: 1000,
                    from: -500,
                    to: 500
                });

                $("#range_05").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: -1000,
                    max: 1000,
                    from: -500,
                    to: 500,
                    step: 250
                });

                $("#range_06").ionRangeSlider({
                    type: "double",
                    grid: true,
                    min: -12.8,
                    max: 12.8,
                    from: -3.2,
                    to: 3.2,
                    step: 0.1
                });

                $("#range_07").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 30,
                    to: 70,
                    from_fixed: true
                });

                $("#range_08").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 30,
                    to: 70,
                    from_fixed: true,
                    to_fixed: true
                });

                $("#range_09").ionRangeSlider({
                    min: 0,
                    max: 100,
                    from: 30,
                    from_min: 10,
                    from_max: 50
                });

                $("#range_10").ionRangeSlider({
                    min: 0,
                    max: 100,
                    from: 30,
                    from_min: 10,
                    from_max: 50,
                    from_shadow: true
                });

                $("#range_11").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 20,
                    from_min: 10,
                    from_max: 30,
                    from_shadow: true,
                    to: 80,
                    to_min: 70,
                    to_max: 90,
                    to_shadow: true,
                    grid: true,
                    grid_num: 10
                });

                $("#range_12").ionRangeSlider({
                    min: 0,
                    max: 100,
                    from: 30,
                    disable: true
                });

                $("#range_13").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 30,
                    to: 70,
                    keyboard: true
                });

                $("#range_14").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 30,
                    to: 70,
                    keyboard: true,
                    keyboard_step: 20
                });

                $("#range_15").ionRangeSlider({
                    min: +moment().subtract(1, "years").format("X"),
                    max: +moment().format("X"),
                    from: +moment().subtract(6, "months").format("X"),
                    prettify: function (num) {
                        return moment(num, "X").format("LL");
                    }
                });

                $("#range_16").ionRangeSlider({
                    min: +moment().subtract(12, "hours").format("X"),
                    max: +moment().format("X"),
                    from: +moment().subtract(6, "hours").format("X"),
                    prettify: function (num) {
                        return moment(num, "X").format("MMM Do, hh:mm A");
                    }
                });

                $("#range_17").ionRangeSlider({
                    min: +moment().subtract(12, "hours").format("X"),
                    max: +moment().format("X"),
                    from: +moment().subtract(6, "hours").format("X"),
                    grid: true,
                    force_edges: true,
                    prettify: function (num) {
                        var m = moment(num, "X").locale("ru");
                        return m.format("Do MMMM, HH:mm");
                    }
                });

            });
        </script>
@endpush
