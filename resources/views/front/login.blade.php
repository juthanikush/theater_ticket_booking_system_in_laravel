<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('front_asset/css/login.css')}}" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                @php
                if(isset($_COOKIE['login_username']) && isset($_COOKIE['login_password'])){
                $un=$_COOKIE['login_username'];
                $pw=$_COOKIE['login_password'];
                $re="checked='checked'";
                }else{
                $un="";
                $pw="";
                $re="";
                }
                @endphp
                    <div class="sign-in-htm">
                    <form method="post" action="{{url('loginuser')}}">
                    @csrf
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" name="user" class="input" value="{{$un}}">
                            @error('user')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="pwd" value="{{$pw}}" class="input" data-type="password">
                            @error('pwd')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" {{$re}} class="check" name="rember">
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <button type="submit" class="button" >Sign In</button>
                        </div>
                    </form>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">Forgot Password?</a>
                        </div>
                    </div>
                    <form method="post" action="{{url('sing_up')}}">
                    @csrf
                        <div class="sign-up-htm">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input id="user" type="text" class="input" name="username">
                                @error('username')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" name="password" type="password" class="input" data-type="password">
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Repeat Password</label>
                                <input id="pass" name="conpassword" type="password" class="input" data-type="password">
                                @error('conpassword')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Email Address</label>
                                <input id="pass" name="email" type="text" class="input">
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="group">
                                <button type="submit" class="button" > Sign Up</button>
                               
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Already Member?</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        @if(session()->has('error'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    {{session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    @endif
                    
    </body>
</html>