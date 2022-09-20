{{-- @extends('layouts.app') --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!--Login Page links-->
     <!-- Scripts -->
    <script src="http://console.techowl.in/guest/public/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://console.techowl.in/guest/public/css/app.css" rel="stylesheet">
    <link href="http://console.techowl.in/guest/public/css/login.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
    
    
    <style>
        .loginheader {
            background:#ff4e00 ;
        }
        .custombtn {
            width: 100px;
    background: #ff4e00;
    color: #fff;
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
        }
        .f-18 {
            font-size: 18px;
        }
        .black-tri {
            position: absolute;
            /*bottom: -10px;*/
            right: 124px;
        }
        .pos-rel {
            position: relative;
        }
        .orange-tri {
            width:80px;
            position: absolute;
            left: -65px;
            top: 70px;
            
        }
        .shadow-1 {
            position: absolute;
            top: -37px;
            right: -19px;
        }
        .shadow-2 {
            position: absolute;
            top: -23px;
            right: 13px;
        }
        .bg-grey {
            background: #f2f2f2;
        }
        /* .swicth {
            position: relative;
            display: inline-block;
            width: 110px;
            height: 60px;
            margin: 0 10px;
        } 
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        } */
        .view-swtich-wrapper {
            display: flex;
            align-items: center;
        }
        .spectrum-ToggleSwitch {
            display: inline-flex;
    -ms-flex-align: start;
    align-items: flex-start;
    position: relative;
    min-height: 32px;
    max-width: 100%;
    /* margin-right: 16px; */
    vertical-align: bottom;
        }
        .spectrum-ToggleSwitch-input {
            margin: 0;
    box-sizing: border-box;
    padding: 0;
    position: absolute;
    width: 55%;
    height: 75%;
    top: 0;
    left: 0;
    /* opacity: .0001; */
    z-index: 1;
    cursor: pointer;
        }
        .spectrum-ToggleSwitch-switch {
        display: inline-block;
    position: relative;
    height: 14px;
    width: 26px;
    margin: 9px 0;
    -ms-flex-positive: 0;
    flex-grow: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    vertical-align: middle;}
     
    .justcon-spaaro {
        justify-content: space-around;
        padding:5px 38px 20px 0px;
    }
    .pass-rec {
        color: #ff4e00;
    }

    </style>    

    
    
    
    
    
    
</head>
<body style="background-color:#FFFFFF">





<!--@section('content')-->
<!--<section class="mainOuter">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-md-6">-->
<!--                <div class="card border-0 shadow">-->
<!--                    <div class="card-header loginHeader text-center">{{ __('Login') }}</div>-->

<!--                    <div class="card-body p-4">-->
<!--                        <form method="POST" action="{{ route('login') }}">-->
<!--                            @csrf-->

<!--                            <div class="row mb-3 justify-content-center">-->
<!--                                <div class="col-md-8">-->
<!--                                    <label for="email" class=" col-form-label fs-16 p-0">{{ __('Email Address') }}</label>-->
<!--                                    <input id="email" type="email" class="form-control CustomInput shadow-none @error('email') is-invalid @enderror" name="email" placeholder="Enter Your E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>-->

<!--                                    @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                    @enderror-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row mb-3 justify-content-center">-->
<!--                                <div class="col-md-8">-->
<!--                                    <label for="password" class="col-form-label fs-16 p-0">{{ __('Password') }}</label>-->
<!--                                    <input id="password" type="password" class="form-control CustomInput shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Ender Password" required autocomplete="current-password">-->

<!--                                    @error('password')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                    @enderror-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            {{-- <div class="row mb-3">-->
<!--                            <div class="col-md-6 offset-md-4">-->
<!--                                <div class="form-check">-->
<!--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->

<!--                            <label class="form-check-label" for="remember">-->
<!--                                {{ __('Remember Me') }}-->
<!--                            </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div> --}}-->

<!--            <div class="row mb-0 justify-content-center">-->
<!--                <div class="col-md-8 text-center">-->
<!--                    <button type="submit" class="btn customBtn">-->
<!--                        {{ __('Login') }}-->
<!--                    </button>-->

<!--                    @if (Route::has('password.request'))-->
<!--                    <a class="btn btn-link" href="{{ route('password.request') }}">-->
<!--                        {{ __('Forgot Your Password?') }}-->
<!--                    </a>-->
<!--                    @endif-->
<!--                </div>-->
<!--            </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->
<!--    </div>-->
<!--    </div>-->
 


<div id="app">
        <!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">-->
            <!-- <div class="container">
                <a class="navbar-brand" href="http://console.techowl.in/guest">
                    Laravel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    Left Side Of Navbar
                    <ul class="navbar-nav me-auto">

                    </ul>

                    Right Side Of Navbar
                    <ul class="navbar-nav ms-auto">
                        Authentication Links
                                                                                    <li class="nav-item">
                                    <a class="nav-link" href="http://console.techowl.in/guest/login">Login</a>
                                </li>
                            
                                                            <li class="nav-item">
                                    <a class="nav-link" href="http://console.techowl.in/guest/register">Register</a>
                                </li>
                                                                             </ul>
                </div>
            </div> -->
        <!--</nav>-->

        <main class="">
            <section class="mainOuter bg-grey">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 pos-rel">
                <div class="card border-0 shadow">
                    <div class="text-center p-4"><img src="https://i.ibb.co/wh09ybR/logo.png" alt="Logo" width="95"></div>
                    <div class="text-center f-18">Don't have an account? <a href="/guest/register" target="" style="text-decoration: none;"><span style="color: #ff4e00;">Sign Up!</span></a></div>

                    <div class="card-body p-4">
                        
                            <input type="hidden" name="_token" value="tT2lMN8ugIhmM3tDIPDVmNSOali4xKcP9ZLFEPss">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-8">
                                    <label for="email" class=" col-form-label fs-16 p-0"></label>
                                    <input id="email" type="email" class="form-control CustomInput shadow-none @error('email') is-invalid @enderror" name="email" placeholder="Enter Your E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                    </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-8">
                                    <label for="password" class="col-form-label fs-16 p-0"></label>
                                    <input id="password" type="password" class="form-control CustomInput shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Ender Password" required autocomplete="current-password">

                                                                    </div>
                            </div>
                            <!-- <label for="" class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label> -->
                            <div class="d-flex justcon-spaaro">
                                
                            <div class="view-swtich-wrapper">
                                <!-- <div class="spectrum-ToggleSwitch is-disabled">
                                    <input type="checkbox" class="spectrum-ToggleSwitch-input" disabled="" role="switch" id="ccx-comments-switch-view" aria-checked="true" value="" checked="">
                                    <span class="spectrum-ToggleSwitch-switch"></span>
                                </div> -->
                                <input type="checkbox" class="m-1" role="switch" id="ccx-comments-switch-view" aria-checked="true" value="" checked="">
                                    
                                <label class="switch-label" for="ccx-comments-switch-view">{{ __('Remember Me') }}</label>
                            </div>
                            <div class="pass-rec">Recover Password</div>
                            </div>

            <div class="row mb-0 justify-content-center">
                <div class="col-md-8 text-center">
                    <button type="submit" class="btn custombtn" style="background-color:#FF4E00;color:white">
                         {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                   
            </div>
            </form>
        </div>
    </div>
    <div><img src="https://i.ibb.co/gtkSL0G/black-tri.png" class="black-tri" width="75"/></div>
    <div><img src="https://i.ibb.co/BtDBgk5/orange-tri.png" class="orange-tri"/></div>
    <div><img src="https://i.ibb.co/x3bWC2n/shadow-1.png" class="shadow-1"></div>
    <div><img src="https://i.ibb.co/qY7Jj7S/shadow-2.png" class="shadow-2"></div>
    </div>
    </div>
    </div>
</section>
        </main>
    </div>

</section>
</div>
</body>
</html>

{{--@endsection--}}