<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{asset('admin_asset/apple-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('admin_asset/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('admin_asset/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/css/main.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" action="{{url('admin/login')}}">
                        <div class="form-group">
                            <label>UserName</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>        
                        @csrf
                    </form>
                    @if(session()->has('error'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    {{session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('admin_asset/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/main.js')}}"></script>


</body>

</html>
