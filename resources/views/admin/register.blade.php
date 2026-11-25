<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminpage - Responsive Bootstrap Admin Template Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/component_ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/dist/css/custom.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body>

        
        <div class="register-wrapper">
            <div class="container-center lg">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-pen"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data<br> to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="index.html" id="loginForm" novalidate>
                             
                            <div class="social">
                                <strong>Register in using social network:</strong><br>
                                <div class="twitter_bg"><i class="fa fa-twitter"></i><a href="#" class="btn_1">Login Twitter</a></div>
                                <div class="fb_bg"><i class="fa fa-facebook"></i><a href="#" class="btn_2">Login Facebook</a></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="username" type="text" class="form-control" name="email" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="pass" type="password" class="form-control" name="password" placeholder="******">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Repeat Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="rpass" type="password" class="form-control" name="rpass" placeholder="******">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="password" class="form-control" name="email" placeholder="Please enter you email adress">
                                </div>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary pull-right">Register</a>
                                <a href="{{ route('admin.login') }}" class="btn btn-success pull-right m-r-5">Login</a>
                            </div>
                        </form>
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
