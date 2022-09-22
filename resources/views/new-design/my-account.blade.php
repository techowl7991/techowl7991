@extends('new-design.main3')

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

<section class=" container-fluid myAccount">
    <div class="topBar py-4">
        <div class="row justify-content-between mx-0">
            <div class="col-12">
                <div class="title text-theme1 fs-16 fs-sm-20 fs-md-24 fw-bold ">My Account</div>
            </div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="title text-dark fs-15 fs-sm-18 fs-md-20 fw-bold ">My Profile</div>
                        </div>
                    </div>
                    <form action="">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" placeholder="Frist Name" value="Kayla" class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-16 fw-normal" required>
                            </div>
                            <div class="col-6">
                                <input type="text" placeholder="Last Name" value="kong" class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-16 fw-normal" required>
                            </div>
                            <div class="col-12 mt-3">
                                <input type="email" placeholder="Example@gmail.com" value="kayla.kong@gmail.com" class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-16 fw-normal" required>
                            </div>
                            <div class="col-12 mb-2 mt-4">
                                <div class="title text-dark fs-15 fs-sm-18 fs-md-20 fw-bold ">Password</div>
                            </div>
                            <div class="col-12 mb-3 ">
                                <div class="password-field position-relative">
                                    <input type="password" placeholder="Password" value="12345678" class="form-control shadow-none rouded-0 mb-1 Inpt w-100 border-0 p-2 px-3 fs-16 fw-normal" id="password-field4" required>
                                    <span><i toggle="#password-field4" id="eye4" class="imgs img-eye position-absolute eye-icon"></i></span>
                                    <div class="invalid-feedback fs-14">
                                        Please enter your phone number or email
                                    </div>
                                    <a href="" class="text-primary fs-14 fw-500">Change password</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="title text-dark fs-15 fs-sm-18 fs-md-20 fw-bold">Account</div>
                            <a href="" class="text-primary fs-14 fw-500">Delete Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <button type="button" class="btn btn-theme1 saveChangesBtn py-1 px-4 fs-14 text-white fw-500 text-uppercase ">Save Changes</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="profileImg text-center ms-auto">
                <div class="input-group justify-content-end">
                    <input type="file" class="form-control d-none" id="inputGroupFile01">
                    <label class="changeProfile rounded-5 overflow-hidden position-relative" for="inputGroupFile01">
                        <img src="{{ asset('/public/new-design/img/avatar-img.png') }}" alt="">
                        <div class="imgOverlay w-100 h-100 text-center align-items-center d-flex justify-content-center position-absolute">
                            <div>
                                <span class="d-inline-block w-100 mb-2"><img class="w-auto d-inline-block" src="{{ asset('/public/new-design/img/change-img-icon.png') }}" alt=""></span>
                                <span class="text-white  fs-13 fs-md-15 fw-500 d-inline-block">Edit Your Profile</span>
                            </div>
                        </div>
                    </label>

                </div>
                <div class="activeDate fs-16 text-muted fw-500">Acitve since 05/12/22</div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
      $("#eye4").click(function() {

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