<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminpage - Responsive Bootstrap Admin Template Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/component_ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body>

        <div class="middle-box2 text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-text2"><h1>505</h1></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-desc2">
                        <p>The server encountered something unexpected that didn't allow it to complete the request.
                            We apologize. You can go back to main page: </p>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
        
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>
</html>
