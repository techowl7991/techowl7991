@extends('main3')
{{-- @dd($snapshot) --}}
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
    <section class=" container-fluid myAccount px-sm-3">
        <div class="topBar pb-4">
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="title text-theme1 fs-16 fs-sm-20 fs-md-30 fw-600 ">My Account</div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        <div class="row ">
            <div class=" col-12 col-md-9 order-2 order-md-1">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mb-2 mb-sm-3">
                                <div class="title text-dark fs-15 fs-sm-18 fs-md-25 fw-600 ">My Profile</div>
                            </div>
                        </div>
                        <form action="{{ route('update_useraccount', session()->get('uid')) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">

                                <div class="col-12 col-sm-6">
                                    <input type="text" placeholder="Frist Name" value="<?php echo ($snapshot) ? $snapshot['FirstName']:''?>" 
                                        name="fname"
                                        class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal">
                                </div>

                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <input type="text" placeholder="Last Name" value="<?php echo ($snapshot) ? $snapshot['LastName']:''?>"
                                        name="lname"
                                        class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal">
                                </div>

                                <div class="col-12 mt-3">
                                    <input type="email" placeholder="Example@gmail.com" value=" <?php echo ($snapshot) ? $snapshot['email']:''?>"
                                        readonly name="email"
                                        class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal">
                                </div>
                                <div class="col-12 mb-2 mt-3 mt-sm-4">
                                    <div class="title text-dark fs-15 fs-sm-18 fs-md-25 fw-600 ">Password</div>
                                </div>
                                <div class="col-12">
                                    <div class="password-field position-relative">
                                        <input type="password" placeholder="Password" value="<?php echo ($snapshot) ? $snapshot['password']:''?>"
                                            readonly name="password"
                                            class="form-control shadow-none rouded-0 mb-1 Inpt w-100 border-0 p-2 px-3 fs-16 fw-normal"
                                            id="password-field4">
                                        <span><i toggle="#password-field4" id="eye4"
                                                class=" shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                        <div class="invalid-feedback fs-14">
                                            Please enter your phone number or email
                                        </div>
                                        <button type="button" name="submit"
                                            class="btn border-0 p-0 text-primary fs-11 fs-sm-14 fs-md-16 fw-500 text-decoration-underline mt-3"
                                            data-bs-toggle="modal" data-bs-target="#changepassword">Change password</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 mt-sm-4">
                                        <div class="title text-dark fs-15 fs-sm-18 fs-md-25 fw-600 ">Account</div>
                                        <button type="button"
                                            class="btn border-0 p-0 text-primary fs-11 fs-sm-14 fs-md-16 fw-500 text-decoration-underline"
                                            data-bs-toggle="modal" data-bs-target="#deleteaccount">Delete Account</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <button type="submit"
                                    class="btn btn-theme1 saveChangesBtn  fs-11 fs-sm-14  px-2 px-sm-4 text-white fw-600 text-uppercase ">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            
            <div class="col-12 col-md-3 order-1 order-md-2 mb-4 mb-md-0">
                <div class="profileImg text-center ms-0 ms-md-auto rounded-5">
                    <div class="input-group justify-content-end">
                        <input type="file" class="form-control d-none" id="inputGroupFile01">
                        <label class="w-100 changeProfile overflow-hidden position-relative" for="inputGroupFile01">
                            {{-- @dd($snapshot) --}}
                            {{-- @if (empty($snapshot['date'])) --}}
                            <img src="{{ asset('/public/new-design/img//icon/avatar.svg') }}" alt="">
                            {{-- @else --}}
                            {{-- {{substr($snapshot['FirstName'], 0, 1) . substr($snapshot['LastName'], 0, 1)}} --}}
                            {{-- @endif --}}
                            
                            <div
                                class="imgOverlay w-100 h-100 text-center rounded-5 align-items-center d-flex justify-content-center position-absolute">
                                <div>
                                    <span class="d-inline-block w-100 mb-2"><img class="w-auto d-inline-block"
                                            src="{{ asset('/public/new-design/img/change-img-icon.png') }}"
                                            alt=""></span>
                                    <span class="text-white  fs-13 fs-md-15 fw-500 d-inline-block">Edit Your Profile</span>
                                </div>
                            </div>
                        </label>

                    </div>
                    <div class="activeDate fs-11 fs-sm-14 fs-md-15 text-muted fw-500 mt-1">
                        Acitve since {{ ($snapshot)?$snapshot['date']:'' }}
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- changepassword -->
    <div class="modal fade" id="changepassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="changepasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom border-2 px-3 pt-3 pb-2 px-sm-4 pt-sm-4">
                    <h5 class="modal-title fs-16 fs-sm-18 fs-md-20 fw-600" id="changepasswordLabel">Change Password</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-3 pt-3 pb-2 px-sm-4 pt-sm-4">

                    <form action="{{ route('save_new_password', session()->get('uid')) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <input type="hidden" placeholder="Frist Name" value="<?php echo ($snapshot) ? $snapshot['FirstName']:''?>"
                                    id="fname-{{ session()->get('uid') }}" name="fname"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal">
                            </div>

                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <input type="hidden" placeholder="Last Name" value="<?php echo ($snapshot) ? $snapshot['LastName']:''?>"
                                    id="lname-{{ session()->get('uid') }}" name="lname"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal">
                            </div>

                            <div class="col-12">
                                <input type="hidden" placeholder="Example@gmail.com" value="<?php echo ($snapshot) ? $snapshot['email']:''?>"
                                    id="email-{{ session()->get('uid') }}" readonly name="email"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal">
                            </div>

                            <div class="col-12 mb-3 ">
                                <div class="password-field position-relative">
                                    <input type="password" name="password" placeholder="New Password" id="newpassword"
                                        value=""
                                        class="form-control shadow-none rouded-0 mb-1 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal"
                                        required>
                                    <span><i toggle="#newpassword" id="eye"
                                            class="shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="password-field position-relative">
                                    <input type="password" name="confirm_new_password" placeholder="Confirm Password"
                                        value="" id="confirmpassword"
                                        class="form-control shadow-none rouded-0 mb-1 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal"
                                        required>
                                    <span><i toggle="#confirmpassword" id="eye"
                                            class="shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="gap-4 d-flex">
                                    <button type="button"
                                        class="btn cancelBtn fs-11 fs-sm-14 p-1 p-sm-2  px-2 px-sm-4 fw-600 text-uppercase"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit"
                                        class="btn btn-theme1 fs-11 fs-sm-14 p-1 p-sm-2  px-2 px-sm-4 text-white fw-600 text-uppercase ">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                </div>
            </div>
        </div>
    </div>

    <!-- changepassword -->
    <div class="modal fade" id="deleteaccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteaccountLabel" aria-hidden="true">
        <div class="modal-dialog w-sm-60 w-md-45 w-lg-35 w-xl-30 modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom border-2 px-3 pt-3 pb-2 px-sm-4 pt-sm-4 ">
                    <h5 class="modal-title fs-16 fs-sm-18 fs-md-20 fw-600 " id="deleteaccountLabel">Delete the Account
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-3 pt-3 pb-2 px-sm-4 pt-sm-4 ">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="fs-14 fs-sm-15 fs-sm-16 text-theme2">Are you sure you want to permanently delete
                                your account? This cannot be undone.</div>
                        </div>
                        <div class="col-12">
                            <div class="gap-4 d-flex">
                                <button type="button"
                                    class="btn cancelBtn fs-11 fs-sm-14 p-1 p-sm-2 px-2 px-sm-4 fw-600 text-uppercase"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="button"
                                    class="btn btn-theme1 fs-11 fs-sm-14 p-1 p-sm-2 px-2 px-sm-4 text-white fw-600 text-uppercase ">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
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


<script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
{{-- <script>
    if (firebase.auth().currentUser !== null) 
        console.log("user id: " + firebase.auth().currentUser.uid);
</script> --}}

<script>
    // firebase.auth().onAuthStateChanged((user) => {
    //     if (user) {
    //         // User logged in already or has just logged in.
    //         console.log(user);
    //     } else {
    //         console.log('user');
    //         // User not logged in or has just logged out.
    //     }
    // }); 
</script>

{{-- 
<script>
    const user = firebase.auth().currentUser;
    console.log('user': user);
    if (user !== null) {
        // The user object has basic properties such as display name, email, etc.
        const firstname = user.firstname;
        const lastname = user.firstname;
        const email = user.email;
        const password = user.password;

        // The user's ID, unique to the Firebase project. Do NOT use
        // this value to authenticate with your backend server, if
        // you have one. Use User.getIdToken() instead.
        const uid = user.uid;
    }
</script> --}}
