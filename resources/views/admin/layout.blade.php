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
    <title>@yield('page_title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('admin_asset/apple-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('admin_asset/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{asset('admin_asset/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/css/main.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('admin_asset/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('admin_asset/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="@yield('dashboard_select')">
                        <a href="{{url('admin')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="@yield('theater_select')">
                        <a href="{{url('admin/theater')}}"><span class="menu-icon ti-layout-media-overlay-alt"></span> Theater </a>
                    </li>
                    <li class="@yield('shows_select')">
                        <a href="{{url('admin/shows')}}"> <span class="menu-icon ti-layout-media-center"></span>Shows </a>
                    </li>
                    <li class="@yield('user_select')">
                        <a href="index.html"> <i class="menu-icon fa fa-users"></i> Users </a>
                    </li>
                    <li class="@yield('baner_select')">
                        <a href="{{url('admin/baner')}}"> <img src="{{asset('admin_asset/images/baner.png')}}" width="35px" class="imgbaner"> Baner </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="form-inline">
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-md fa-3x"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                        
                                <a class="nav-link" href="{{url('admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                            
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            
                        </a>

                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        

        @section('container')
        @show

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{asset('admin_asset/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/main.js')}}"></script>


    <script src="{{asset('admin_asset/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/widgets.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('admin_asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
