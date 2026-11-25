<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminpage - Responsive Bootstrap Admin Template Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/socicon/social.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/component_ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body>

        
        <div class="lock-wrapper-page">
            <div class="text-center">
                <a href="{{ route('admin.dashboard') }}" class="logo-lock"><i class="icon socicon-feedburner"></i> <span>AdmnPage</span> </a>
            </div>
            <form method="post" action="index.html" class="text-center m-t-20">
                <div class="user-thumb">
                    <img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
                </div>
                <div class="form-group">
                    <h3>John Deo</h3>
                    <p class="text-muted">Enter your password to access the admin.</p>
                    <div class="input-group m-t-20">
                        <input class="form-control" placeholder="Password" type="password">
                        <i class="fa fa-key"></i>
                        <span class="input-group-btn"> 
                            <button type="submit" class="btn btn-success">Log In</button> 
                        </span>
                    </div>
                </div>
                <div class="text-left">
                    <a href="{{ route('admin.login') }}" class="text-muted">Not John Deo ?</a>
                </div>
            </form>
        </div>
        
        
        <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
        
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>
</html>
