@extends('layouts.app')



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
            bottom: -54px;
            right: 124px;
        }
        .pos-rel {
            position: relative;
        }
        .orange-tri {
            position: absolute;
            left: -51px;
            top: 50px   ;
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
        padding:10px 0px 15px 0px;
    }
    .pass-rec {
        color: #ff4e00;
    }
    .mr-1 {
        margin-right: 10px;
    }

    </style>





@section('content')
<section class="mainOuter">
    <!--<div class="container">-->
    <!--    <div class="row justify-content-center">-->
    <!--        <div class="col-md-6">-->
    <!--            <div class="card border-0 shadow">-->
    <!--                <div class="card-header registerHeader text-center">{{ __('Register') }}</div>-->

    <!--                <div class="card-body p-4">-->
    <!--                    <form method="POST" action="{{ route('register') }}">-->
    <!--                        @csrf-->

    <!--                        <div class="row mb-3 justify-content-center">-->

    <!--                            <div class="col-md-8">-->
    <!--                                <label for="name" class="col-form-label fs-16 p-0">{{ __('Name') }}</label>-->
    <!--                                <input id="name" type="text" class="form-control CustomInput shadow-none @error('name') is-invalid @enderror" name="name" placeholder="Enter Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>-->

    <!--                                @error('name')-->
    <!--                                <span class="invalid-feedback" role="alert">-->
    <!--                                    <strong>{{ $message }}</strong>-->
    <!--                                </span>-->
    <!--                                @enderror-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="row mb-3 justify-content-center">-->

    <!--                            <div class="col-md-8">-->
    <!--                                <label for="email" class="col-form-label fs-16 p-0">{{ __('Email Address') }}</label>-->
    <!--                                <input id="email" type="email" class="form-control CustomInput shadow-none @error('email') is-invalid @enderror" name="email" placeholder="Enter Your E-mail" value="{{ old('email') }}" required autocomplete="email">-->

    <!--                                @error('email')-->
    <!--                                <span class="invalid-feedback" role="alert">-->
    <!--                                    <strong>{{ $message }}</strong>-->
    <!--                                </span>-->
    <!--                                @enderror-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="row mb-3 justify-content-center">-->

    <!--                            <div class="col-md-8">-->
    <!--                                <label for="password" class="col-form-label fs-16 p-0">{{ __('Password') }}</label>-->
    <!--                                <input id="password" type="password" class="form-control CustomInput shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Create Password" required autocomplete="new-password">-->

    <!--                                @error('password')-->
    <!--                                <span class="invalid-feedback" role="alert">-->
    <!--                                    <strong>{{ $message }}</strong>-->
    <!--                                </span>-->
    <!--                                @enderror-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="row mb-3 justify-content-center">-->

    <!--                            <div class="col-md-8">-->
    <!--                                <label for="password-confirm" class="col-form-label fs-16 p-0">{{ __('Confirm Password') }}</label>-->
    <!--                                <input id="password-confirm" type="password" class="form-control CustomInput shadow-none" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">-->
    <!--                            </div>-->
    <!--                        </div>-->

    <!--                        <div class="row mb-0 justify-content-center">-->
    <!--                            <div class="col-md-8 text-center">-->
    <!--                                <button type="submit" class="btn customBtn">-->
    <!--                                    {{ __('Register') }}-->
    <!--                                </button>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    
    
    
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 pos-rel">
                <div class="card border-0 ">
                    <div class="text-center p-4"><img src="https://i.ibb.co/wh09ybR/logo.png" alt="Logo" width="95"></div>
                    <div class="text-center f-18">Have an account? <a href="/guest/login" target="" style="text-decoration: none;"><span style="color: #ff4e00;">Sign In!</span></a></div>

                    <div class="card-body p-4">
                       
                            <input type="hidden" name="_token" value="tT2lMN8ugIhmM3tDIPDVmNSOali4xKcP9ZLFEPss">
                             <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row justify-content-center" >
                                <div class="col-md-8 d-flex">
                                    
                                    <label for="name" class=" col-form-label fs-16 p-0"></label>
                                    <input id="name" type="text" class="form-control CustomInput shadow-none @error('name') is-invalid @enderror" name="name" placeholder="Enter Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    <!--<label for="lname" class=" col-form-label fs-16 p-0"></label>-->
                                    <!--<input id="lname" type="text" placeholder="Enter Your Name" required autocomplete="name" autofocus>-->
                                                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                            </div>
                            <div class="row justify-content-center" style="margin-top:15px">
                                <div class="col-md-8">
                                    <label for="email" class=" col-form-label fs-16 p-0"></label>
                                    <input id="email" type="email" class="form-control CustomInput shadow-none @error('email') is-invalid @enderror" name="email" placeholder="Enter Your E-mail" value="{{ old('email') }}" required autocomplete="email">
                                    
                                    
                                                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                            </div>

                            <div class="row justify-content-center" style="margin-top:15px">
                                <div class="col-md-8">
                                    <label for="password" class="col-form-label fs-16 p-0"></label>
                                    <input id="password" type="password" class="form-control CustomInput shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Create Password" required autocomplete="new-password">
                                    
                                    
                                    @error('password')-->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                            </div>

                            <div class="row justify-content-center" style="margin-top:15px">
                                <div class="col-md-8">
                                    <label for="password" class="col-form-label fs-16 p-0"></label>
                                    <input id="password" type="password" class="form-control CustomInput shadow-none" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">

                                  </div>
                            </div>
                            <div class="d-flex justcon-spaaro" style="margin-top:15px">
                                
                            <div class="view-swtich-wrapper">
                                <input type="checkbox" class="m-1" role="switch" id="ccx-comments-switch-view" aria-checked="true" value="" checked="">
                                    
                                <label class="switch-label" for="ccx-comments-switch-view"> I agree to Vue's Term of service and privacy policy</label>
                            </div>
                            </div>

            <div class="row mb-0 justify-content-center" style="margin-top:15px">
                <div class="col-md-8 text-center">
                    <button type="submit" class="btn custombtn" style="background-color:#FF4E00">
                        {{ __('Register') }}
                    </button>

                                    </div>
            </div>
            </form>
        </div>
    </div>
    <div><img src="https://i.ibb.co/PF6cVcb/black-tri-removebg-preview.png" alt="black-tri-removebg-preview" class="black-tri" width="75"></div>
    <div><img src="https://i.ibb.co/d2gBwXH/orange-tri-removebg-preview.png" alt="orange-tri-removebg-preview" class="orange-tri" width="63"></div>
    <div><img src="https://i.ibb.co/6wdySXs/shadow-1-removebg-preview.png" class="shadow-1"></div>
    <div><img src="https://i.ibb.co/qY7Jj7S/shadow-2.png" class="shadow-2"></div>
    </div>
    </div>
    </div>
    
    
    
    
    
    
</section>
@endsection