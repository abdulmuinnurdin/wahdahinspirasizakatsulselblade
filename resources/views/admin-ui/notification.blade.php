@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Notifications',
    'headerSubtitle' => 'Notification and custom alerts',
    'breadcrumb' => 'Notifications',
    'headerIcon' => 'pe-7s-attention',
])

@push('css')
    <link href="{{ asset('assets/plugins/NotificationStyles/css/demo.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/NotificationStyles/css/ns-default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/NotificationStyles/css/ns-style-growl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/NotificationStyles/css/ns-style-attached.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/NotificationStyles/css/ns-style-bar.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/NotificationStyles/css/ns-style-other.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="notification-shape shape-box" id="notification-shape" data-path-to="m 0,0 500,0 0,500 -500,0 z">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 500 500" preserveAspectRatio="none">
                        <path d="m 0,0 500,0 0,500 0,-500 z"/>
                        </svg>
                    </div>
                    <div class="notification-shape shape-progress" id="notification-shape2">
                        <svg width="70px" height="70px"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Notification Styles Inspiration</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <header class="codrops-header">
                                                <h1>Notification Styles Inspiration <span>Simple ideas &amp; effects for website notifications</span></h1>
                                            </header>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Examples </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>.... Notification Styles "Scale"....</td>
                                                        <td><button id="scale" class="btn btn-violet btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jelly</td>
                                                        <td><button id="jelly" class="btn btn-info btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Slide in</td>
                                                        <td><button id="slideIn" class="btn btn-primary btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Genie</td>
                                                        <td><button id="genie" class="btn btn-purple btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Flip</td>
                                                        <td><button id="flip" class="btn btn-inverse btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bouncy Flip</td>
                                                        <td><button id="bouncyFlip" class="btn btn-default btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Examples </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Slide On Top</td>
                                                        <td><button id="slidetop" class="btn btn-black btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Expanding Loader</td>
                                                        <td><button id="exploader" class="btn btn-default btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Corner Expand</td>
                                                        <td><button id="cornerExpand" class="btn btn-success btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Loading Circle</td>
                                                        <td><button id="loadingcircle" class="btn btn-pink btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Box Spinner</td>
                                                        <td><button id="boxspinner" class="btn btn-warning btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thumb Slider</td>
                                                        <td><button id="thumbslider" class="btn btn-danger btn-sm progress-button pull-right">
                                                                <span class="">Run example</span>
                                                                <span class="progress"></span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Sweet Alert</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>A beautiful replacement for JavaScript's "Alert"</p>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Examples</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> A basic message </td>
                                                <td><button class="btn btn-primary btn-sm demo1 pull-right">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><pre><span class="attr">swal</span>(<span class="str">"Here's a message!"</span>, <span class="str">"It's pretty, isn't it?"</span>)</pre></td>
                                            </tr>
                                            <tr>
                                                <td>A success message!</td>
                                                <td><button class="btn btn-success btn-sm demo2 pull-right">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><pre><span class="attr">swal</span>(<span class="str">"Good job!"</span>, <span class="str">"You clicked the button!"</span>, <span class="str">"success"</span>)</pre></td>
                                            </tr>
                                            <tr>
                                                <td>A warning message, with a function attached to the "Confirm"-button</td>
                                                <td><button class="btn btn-warning btn-sm demo3 pull-right">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><pre><span class="attr">swal</span>({
&nbsp;&nbsp;title: <span class="str">"Are you sure?"</span>,
&nbsp;&nbsp;text: <span class="str">"You will not be able to
 recover this imaginary file!"</span>,
&nbsp;&nbsp;type: <span class="str">"warning"</span>,
&nbsp;&nbsp;showCancelButton: <span class="val">true</span>,
&nbsp;&nbsp;confirmButtonColor: <span class="str">"#DD6B55"</span>,
&nbsp;&nbsp;confirmButtonText: <span class="str">"Yes, delete it!"</span>,
&nbsp;&nbsp;closeOnConfirm: <span class="val">false</span>
},
<span class="func"><i>function</i></span>(){
&nbsp;&nbsp;<span class="attr">swal</span>(<span class="str">"Deleted!"</span>, <span class="str">"Your imaginary file
 has been deleted."</span>, <span class="str">"success"</span>);
});</pre></td>
                                            </tr>
                                            <tr>
                                                <td>... and by passing a parameter, you can execute something else for "Cancel".</td>
                                                <td><button class="btn btn-danger btn-sm demo4 pull-right">Run example</button></td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">
                                                    <pre><span class="attr">swal</span>({
&nbsp;&nbsp;title: <span class="str">"Are you sure?"</span>,
&nbsp;&nbsp;text: <span class="str">"You will not be able to
 recover this imaginary file!"</span>,
&nbsp;&nbsp;type: <span class="str">"warning"</span>,
&nbsp;&nbsp;showCancelButton: <span class="val">true</span>,
&nbsp;&nbsp;confirmButtonColor: <span class="str">"#DD6B55"</span>,
&nbsp;&nbsp;confirmButtonText: <span class="str">"Yes, delete it!"</span>,
&nbsp;&nbsp;cancelButtonText: <span class="str">"No, cancel plx!"</span>,
&nbsp;&nbsp;closeOnConfirm: <span class="val">false</span>,
&nbsp;&nbsp;closeOnCancel: <span class="val">false</span>
},
<span class="func"><i>function</i></span>(isConfirm){
&nbsp;&nbsp;<span class="tag">if</span> (isConfirm) {
&nbsp;&nbsp;&nbsp;&nbsp;<span class="attr">swal</span>(<span class="str">"Deleted!"</span>, <span class="str">"Your imaginary
 file has been deleted."</span>, <span class="str">"success"</span>);
&nbsp;&nbsp;} <span class="tag">else</span> {
	&nbsp;&nbsp;&nbsp;&nbsp;<span class="attr">swal</span>(<span class="str">"Cancelled"</span>, <span class="str">"Your 
imaginary file is safe :)"</span>, <span class="str">"error"</span>);
&nbsp;&nbsp;}
});</pre>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>A message with a custom icon</td>
                                                <td><button class="btn btn-inverse btn-sm demo5 pull-right">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <pre><span class="attr">swal</span>({
&nbsp;&nbsp;title: <span class="str">"Sweet!"</span>,
&nbsp;&nbsp;text: <span class="str">"Here's a custom image."</span>,
&nbsp;&nbsp;imageUrl: <span class="str">"images/thumbs-up.jpg"</span>
});</pre>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Toastr</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p class="m-b-20">toastr is a Javascript library for Gnome / Growl type non-blocking notifications. jQuery is
                                        required. The goal is to create a simple core library that can be customized and extended.</p>
                                    <!--                                        <div class="text-center">
                                                                                <h4>Example with toastr</h4>
                                                                                <button class="toastr1 btn btn-info btn-sm m-r-5 m-b-5">Run example</button>
                                                                                <button class="toastr2 btn btn-success btn-sm m-r-5 m-b-5">Run example</button>
                                                                                <button class="toastr3 btn btn-warning btn-sm m-r-5 m-b-5">Run example</button>
                                                                                <button class="toastr4 btn btn-danger btn-sm m-r-5 m-b-5">Run example</button>
                                                                            </div>-->

                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Examples</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Toastr example with info</td>
                                                <td><button class="toastr1 btn btn-info btn-sm pull-right m-r-5 m-b-5">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td>Toastr example with success</td>
                                                <td><button class="toastr2 btn btn-success btn-sm pull-right m-r-5 m-b-5">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td>Toastr example with warning</td>
                                                <td><button class="toastr3 btn btn-warning btn-sm pull-right m-r-5 m-b-5">Run example</button></td>
                                            </tr>
                                            <tr>
                                                <td>Toastr example with danger</td>
                                                <td><button class="toastr4 btn btn-danger btn-sm pull-right m-r-5 m-b-5">Run example</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div>
                                        <pre>
Command: toastr["success"]("Example message ", "Example title")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/NotificationStyles/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/NotificationStyles/js/classie.js') }}"></script>
    <script src="{{ asset('assets/plugins/NotificationStyles/js/notificationFx.js') }}"></script>
    <script src="{{ asset('assets/plugins/NotificationStyles/js/snap.svg-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script>
            "use strict"; // Start of use strict

            (function () {
                function1();
                function2();
                function3();
                function4();
                function5();
                function6();
                function7();
                function8();
                function9();
                function10();
                function11();
                function12();
                function13();
                function14();
                function15();
                function16();
                function17();
            })();

            function function1() {
                var bttn = document.getElementById('scale');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>This is just a simple notice. Everything is in order and this is a <a href="#">simple link</a>.</p>',
                            layout: 'growl',
                            effect: 'scale',
                            type: 'notice', // notice, warning, error or success
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function2() {
                var bttn = document.getElementById('jelly');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>Hello there! I\'m a classic notification but I have some elastic jelliness thanks to <a href="http://bouncejs.com/">bounce.js</a>. </p>',
                            layout: 'growl',
                            effect: 'jelly',
                            type: 'notice', // notice, warning, error or success
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function3() {
                var bttn = document.getElementById('slideIn');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>This notification has slight elasticity to it thanks to <a href="http://bouncejs.com/">bounce.js</a>.</p>',
                            layout: 'growl',
                            effect: 'slide',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function4() {
                var bttn = document.getElementById('genie');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
                            layout: 'growl',
                            effect: 'genie',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function5() {
                var bttn = document.getElementById('flip');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
                            layout: 'attached',
                            effect: 'flip',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function6() {

                var bttn = document.getElementById('bouncyFlip');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<span class="icon icon-calendar"></span><p>The event was added to your calendar. Check out all your events in your <a href="#">event overview</a>.</p>',
                            layout: 'attached',
                            effect: 'bouncyflip',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function7() {
                var bttn = document.getElementById('slidetop');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<span class="icon icon-megaphone"></span><p>You have some interesting news in your inbox. Go <a href="#">check it out</a> now.</p>',
                            layout: 'bar',
                            effect: 'slidetop',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }


            function function8() {

                var bttn = document.getElementById('exploader');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {

                    // create the notification
                    var notification = new NotificationFx({
                        message: '<span class="icon icon-settings"></span><p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
                        layout: 'bar',
                        effect: 'exploader',
                        type: 'notice', // notice, warning or error
                        onClose: function () {
                            bttn.disabled = false;
                        }
                    });

                    // show the notification
                    notification.show();

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }

            function function9() {
                var svgshape = document.getElementById('notification-shape'),
                        s = Snap(svgshape.querySelector('svg')),
                        path = s.select('path'),
                        pathConfig = {
                            from: path.attr('d'),
                            to: svgshape.getAttribute('data-path-to')
                        },
                        bttn = document.getElementById('cornerExpand');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        path.animate({'path': pathConfig.to}, 300, mina.easeinout);

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            wrapper: svgshape,
                            message: '<p><span class="icon icon-bulb"></span> I\'m appaering in a morphed shape thanks to <a href="http://snapsvg.io/">Snap.svg</a></p>',
                            layout: 'other',
                            effect: 'cornerexpand',
                            type: 'notice', // notice, warning or error
                            onClose: function () {
                                bttn.disabled = false;
                                setTimeout(function () {
                                    path.animate({'path': pathConfig.from}, 300, mina.easeinout);
                                }, 200);
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }
            function function10() {
                var svgshape = document.getElementById('notification-shape2'),
                        bttn = document.getElementById('loadingcircle');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // create the notification
                    var notification = new NotificationFx({
                        wrapper: svgshape,
                        message: '<p>Whatever you did, it was successful!</p>',
                        layout: 'other',
                        effect: 'loadingcircle',
                        ttl: 9000,
                        type: 'notice', // notice, warning or error
                        onClose: function () {
                            bttn.disabled = false;
                        }
                    });

                    // show the notification
                    notification.show();

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });
            }
            function function11() {
                var bttn = document.getElementById('boxspinner');

                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // create the notification
                    var notification = new NotificationFx({
                        message: '<p>I am using a beautiful spinner from <a href="http://tobiasahlin.com/spinkit/">SpinKit</a></p>',
                        layout: 'other',
                        effect: 'boxspinner',
                        ttl: 9000,
                        type: 'notice', // notice, warning or error
                        onClose: function () {
                            bttn.disabled = false;
                        }
                    });

                    // show the notification
                    notification.show();

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }
            function function12() {
                var bttn = document.getElementById('thumbslider');
                // make sure..
                bttn.disabled = false;

                bttn.addEventListener('click', function () {
                    // simulate loading (for demo purposes only)
                    classie.add(bttn, 'active');
                    setTimeout(function () {

                        classie.remove(bttn, 'active');

                        // create the notification
                        var notification = new NotificationFx({
                            message: '<div class="ns-thumb"><img src="{{ asset('assets/dist/img/user1.jpg') }}"/></div><div class="ns-content"><p><a href="#">Zoe Moulder</a> accepted your invitation.</p></div>',
                            layout: 'other',
                            ttl: 6000,
                            effect: 'thumbslider',
                            type: 'notice', // notice, warning, error or success
                            onClose: function () {
                                bttn.disabled = false;
                            }
                        });

                        // show the notification
                        notification.show();

                    }, 1200);

                    // disable the button (for demo purposes only)
                    this.disabled = true;
                });

            }

            function function13() {
                $('.demo1').on("click", function () {
                    swal({
                        title: "Here's a message!",
                        text: "It's pretty, isn't it?"
                    });
                });
            }

            function function14() {
                $('.demo2').on("click", function () {
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        type: "success"
                    });
                });
            }

            function function15() {
                $('.demo3').on("click", function () {
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                            function () {
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            });
                });
            }

            function function16() {
                $('.demo4').on("click", function () {
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                            function (isConfirm) {
                                if (isConfirm) {
                                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                } else {
                                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                                }
                            });
                });
            }

            function function17() {
                $('.demo5').on("click", function () {
                    swal({
                        title: "Sweet!",
                        text: "Here's a custom image.",
                        imageUrl: "assets/plugins/sweetalert/thumbs-up.jpg"
                    });
                });
            }

            // Toastr options
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown"
            };

            $('.toastr1').on("click", function () {
                toastr.info('Info - This is a custom Burger - UI info notification');
            });

            $('.toastr2').on("click", function () {
                toastr.success('Success - This is a Burger - UI success notification');
            });

            $('.toastr3').on("click", function () {
                toastr.warning('Warning - This is a Burger - UI warning notification');
            });

            $('.toastr4').on("click", function () {
                toastr.error('Error - This is a Burger - UI error notification');
            });
        </script>
@endpush
