<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $title ?? 'Adminpage - Responsive Bootstrap Admin Template Dashboard' }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
            }
        });
    </script>
    <link href="{{ asset('assets/dist/css/base.css') }}" rel="stylesheet" type="text/css"/>
    @stack('css')
    <link href="{{ asset('assets/dist/css/component_ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <link id="defaultTheme" href="{{ asset('assets/dist/css/skins/skin-dark-1.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper" class="wrapper animsition">
        @include('partials.admin.navbar')
        @include('partials.admin.sidebar')
        @include('partials.admin.right-sidebar')
        <div class="control-sidebar-bg"></div>
        <div id="page-wrapper">
            <div class="content">
                <div class="content-header">
                    <div class="header-icon">
                        <i class="{{ $headerIcon ?? 'pe-7s-tools' }}"></i>
                    </div>
                    <div class="header-title">
                        <h1>{{ $headerTitle ?? ($title ?? '') }}</h1>
                        <small>{{ $headerSubtitle ?? '' }}</small>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">{{ $breadcrumb ?? '' }}</li>
                        </ol>
                    </div>
                </div>

                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lobipanel/lobipanel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.min.js') }}"></script>
    @stack('scripts_after')
</body>
</html>
