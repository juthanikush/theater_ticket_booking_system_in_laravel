<html>
    <head>
        <title>theater System</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('front_asset/css/style.css')}}" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </head>
    <body>
        <ul class="nav nav-pills left">
            <li role="presentation" class="active"><a href="{{url('/')}}">Home</a></li>
            <li role="presentation"><a href="#shows">Shows</a></li>
           
        </ul>
        @if(session()->has('FORNT_USER_LOGIN'))
        <a href="{{url('logout')}}" class="right">Logout</a>
        @else
        <a href="{{url('login')}}" class="right">Login</a>
        @endif
        
        @section('container')
        @show

    </body>
</html>