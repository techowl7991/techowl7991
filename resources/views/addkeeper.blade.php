@extends('main3')

@push('meta')
    <title>Add Keeper</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- CSS for searching -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
@push('styles')
    <style>
        .timeZoneSelect .select2-selection.select2-selection--single {
            border: none !important;
            border-bottom: 2px solid #757575 !important;
            background-color: #f2f2f2 !important;
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            color: #757575 !important;
            padding: 0.4rem 0.2rem !important;
            height: 40px !important;

        }

        .timeZoneSelect .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px !important
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid signUpPage d-flex justify-content-center align-items-center Create_Event  px-0">
        <div class="row innerPage justify-content-center align-items-center h-100 w-100 py-5">
            <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-10 col-sm-11 col-12 Sign_Up">
                <div class="card border-0 px-0 py-2 bg-white ">
                    <div class="row mx-0">
                        @if (session('error'))
                            <div class="alert alert-danger" id="err">
                                {!! session('error') !!}
                            </div>
                        @endif
                        <div class="col-12 Account px-4 py-2">
                            <h4 class="m-0 heading text-theme2 fw-600 fs-md-20 fs-18">Create Keeper</h4>
                        </div>
                        <div class="col-12 Account event_info px-4 py-2">
                            <h4 class="m-0 heading fw-600 text-white fs-16">Gate Keeper Information</h4>
                        </div>
                    </div>
                    <form action="{{ asset('/addkeeper/'.$mid) }}" method="post" enctype="multipart/form-data"
                        class="needs-validation py-3" id="form2" >
                        @csrf
                        <div class="row pb-4 px-4 ">
                            <div class="col-12 mb-3">
                                <input type="text" placeholder="Keeper Name" name="keepername"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    autocomplete="off" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" placeholder="Keeper Username" name="username"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    autocomplete="off" required>
                            </div>

                            <div class="col-12 password-field position-relative">
                                <input type="password" placeholder="Password" name="password"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    id="password-field" autocomplete="off" required>
                                <span><i toggle="#password-field" id="eye"
                                        class="shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                <div class="invalid-feedback fs-14">
                                    Please enter your Username or Password
                                </div>
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-12 text-center gap-3 d-flex justify-content-center pt-4 border-top">
                                <button type="reset" class="btn btn-outline-dark d-flex align-items-center text-uppercase px-4 fw-600 fs-14">Cancel</button>
                                <button class="btn btn-theme1 d-flex align-items-center px-4 text-white text-uppercase fw-600 fs-14" type="submit" id="subbutton"
                                    name="submit"><span id="subbuttonSpinner"
                                        style="width :1em; height:1em;background-color:black;color:white"
                                        class="spinner-border me-2 d-none" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </span><span>Create</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- JS for searching -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function () {
                     $('#err').addClass('d-none');
                 }, 3500);
        })
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>

    @push('scripts')
        
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
@endsection
