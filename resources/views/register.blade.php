@extends('new-design.main')

@push('meta')
    <title>page_title</title>

    <meta name="title" content="page_title" />
    <meta name="description" content="page_description" />
    <meta name="keywords" content="page_keywords" />

    <meta name="robots" content="index, follow" />

    <meta name="twitter:title" content="page_title">
    <meta name="twitter:description" content="page_description">
    <meta name="twitter:image" content="{{ asset('/public/new-design/img/logos/logo.png') }}">


    <meta property="og:url" content="{{ asset('/') }}">
    <meta property="og:title" content="page_title">
    <meta property="og:description" content="page_description">
    <meta property="og:image" content="{{ asset('/public/new-design/img/logos/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/public/new-design/img/logos/logo.png') }}">
    <meta name="classification" content="page_title" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/public/new-design/img/logos/favicon-white.png') }}" />
    <link rel="icon" href="{{ asset('/public/new-design/img/logos/favicon-original.png') }}" id="light-scheme-icon">
    <link rel="icon" href="{{ asset('/public/new-design/img/logos/favicon-white.png') }}" id="dark-scheme-icon">
    <link rel="canonical" href="{{ asset('/') }}" />
@endpush
@push('styles')
@endpush
@section('content')
    <div class="container-fluid signUpPage d-flex justify-content-center align-items-center px-0">
        <div class="row innerPage justify-content-center align-items-center h-100 w-100">
            <div class="col-xl-5 col-lg-6 col-md-7 col-sm-8 col-12 Sign_Up position-relative">
                <div class="card border-0 bg-white py-4 px-md-5 px-3">
                    <div class="d-flex justify-content-center align-items-center pt-3 pb-4">
                        <div class="w-sm-100px w-80px"><img src="{{ asset('/public/new-design/img/logo.png') }}"
                                alt="" class="w-100"></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center  Account gap-2">
                        <h4 class="m-0 heading fs-md-20 fs-sm-18 fs-16">Have an account?</h4>
                        <div><a href="{{route('login')}}" class="text-decoration-none fs-md-20 fs-sm-18 fs-16">Sign In!</a></div>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="needs-validation pt-sm-5 pt-3 pb-3" id="form2" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" placeholder="First Name"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}"
                                    required>
                            </div>

                            <div class="col-6 mb-3">
                                <input type="text" placeholder="Last Name"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"
                                    required>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="email" placeholder="Email Address"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="col-12 mb-3 password-field position-relative">
                                <input type="password" placeholder="Create Password" id="createpassword"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal @error('password') is-invalid @enderror" name="password"
                                    required>
                                <span><i toggle="#createpassword" id="eye" class=" shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>


                            <div class="col-12 mb-3 password-field position-relative">
                                <input type="password" id="confirmpassword" placeholder="Confirm Password"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal @error('cpassword') is-invalid @enderror" name="cpassword"
                                    required>
                                <span><i toggle="#confirmpassword" id="eye" class="shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>

                            {{-- <div class="col-12 mb-3 password-field position-relative">
                                <input type="date" placeholder="Enter date"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal @error('date') is-invalid @enderror" name="date"
                                    required>                                
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div> --}}

                            <div class="col-12 form-check d-flex align-items-center justify-content-center">
                                <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label fs-sm-16 fs-14" for="flexCheckDefault">
                                    I agree to Vue's Trems of Service and Privacy Policy
                                </label>
                            </div>
                            <!-- <div class="row align-items-center mx-0 CheckMe">
                                        <div class="col-auto sign_up px-0"><a href="" class="text-decoration-none fs-sm-16 fs-14">Recover Password</a> </div>
                                    </div> -->

                            <div class="col-12 mt-5 mb-3 text-center">
                                <button type="submit" class="shadow-none border-0 login_btn fs-16 px-3 py-1">SIGN
                                    UP</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="back_img1 back_img">
                    <img src="{{ asset('/public/new-design/img/bottom-right.png') }}" alt="" class="w-100">
                </div>
                <div class="back_img2 back_img">
                    <img src="{{ asset('/public/new-design/img/top-left.png') }}" alt="" class="w-100">
                </div>
                <div class="back_img3 back_img">
                    <img src="{{ asset('/public/new-design/img/top-right.png') }}" alt="" class="w-100">
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
<script>
    $(".shaowPass").click(function() {

        $(this).toggleClass("img-eye img-eye-slash");
        var input4 = $($(this).attr("toggle"));
        if (input4.attr("type") == "password") {
            input4.attr("type", "text");
        } else {
            input4.attr("type", "password");
        }
    });
</script>
@endpush
