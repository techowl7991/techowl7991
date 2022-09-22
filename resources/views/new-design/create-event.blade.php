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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endpush
@push('styles')
@endpush
@section('content')
<div class="container-fluid signUpPage d-flex justify-content-center align-items-center Create_Event  px-0">
    <div class="row innerPage justify-content-center align-items-center h-100 w-100 py-5">
        <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-11 col-12 Sign_Up">
            <div class="card border-0 px-0 py-2 bg-white ">
                <div class="row mx-0">
                    <div class="col-12 Account px-4 py-2">
                        <h4 class="m-0 heading text-theme2 fw-bold fs-md-20 fs-18">Create Event</h4>
                    </div>
                    <div class="col-12 Account event_info px-4 py-2">
                        <h4 class="m-0 heading fw-bold text-white fs-16">Event Information</h4>
                    </div>
                </div>
                <form action="" class="needs-validation px-4 py-3" id="form2" novalidate>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input type="text" placeholder="Event Name" class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                        </div>
                        <div class="col-12 mb-3 password-field position-relative">
                            <input type="password" placeholder="Confirm Password" class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="password-field" autocomplete="off" required>
                            <span><i toggle="#password-field" id="eye" class="imgs img-eye position-absolute eye-icon"></i></span>
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="url" placeholder="Enter a Location" class="  form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" required>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <input type="text" class="form-control shadow-none rouded-0 Inpt border-0 p-2 fs-16 fw-normal" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text Inpt border-0 fs-16 Url_example" id="basic-addon2">.nowvue.com</span>
                        </div>
                        <div class="col-sm-6 mb-3 flatpickr ">
                            <input type="text" placeholder="Start Date" class="form-control calendar shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="basicDate" required>
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 flatpickr ">
                            <input type="text" placeholder="End Date" class="form-control calendar shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="endDate" required>
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <input type="time" placeholder="Start Time" class="form-control clock shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" required>
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <input type="time" placeholder="End Time" class="form-control clock shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" required>
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <select class="form-select shadow-none Inpt border-0" id="inputGroupSelect01">
                                <option class="choose py-1" selected>Select Timezone</option>
                                <option class="choose py-1" value="1">One</option>
                                <option class="choose py-1" value="2">Two</option>
                                <option class="choose py-1" value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-12 text-theme2 fs-16 fw-bold mb-3">Add Attendees List</div>
                        <div class="col-12 mb-3 d-flex align-items-center gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label fw-normal text-theme2" for="flexRadioDefault1">
                                    Excel File
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label fw-normal text-theme2" for="flexRadioDefault2">
                                    Manually
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-3" id="show1">
                            <input class="form-control d-none" type="file" id="chooseFile">
                            <label for="chooseFile" class="bg-theme2 chooseFile px-4 py-2 text-white fw-bold rounded text-uppercase fs-14 top_right_export_btn">Upload File</label>
                        </div>

                        <div class="col-12 manually_tab d-none" id="show2">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="p-2 fs-16 fw-bold">First Name</th>
                                                <th scope="col" class="p-2 fs-16 fw-bold">Last Name</th>
                                                <th scope="col" class="p-2 fs-16 fw-bold">Type</th>
                                                <th scope="col" class="p-2 fs-16 fw-bold">Organisation</th>
                                                <th scope="col" class="p-2 fs-16 fw-bold">Type</th>
                                                <th scope="col" class="p-2 fs-16 fw-bold">Type</th>
                                                <!-- <th scope="col" class="p-2 fs-16 fw-bold">Type</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <input type="text" class="form-control border-0 shadow-none h-30px w-110px rounded " id="fasttd" placeholder="com"></td>
                                                <td> <input type="text" class="form-control border-0 shadow-none h-30px w-110px rounded " id="fasttd" placeholder="com"></td>
                                                <td>
                                                    <div class="input-group">
                                                        <select class="form-select shadow-none border-0 w-140px h-30px rounded" id="inputGroupSelect01">
                                                            <option class="choose py-1" selected></option>
                                                            <option class="choose py-1" value="1">One</option>
                                                            <option class="choose py-1" value="2">Two</option>
                                                            <option class="choose py-1" value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td> <input type="text" class="form-control border-0 shadow-none h-30px w-110px rounded " id="fasttd" placeholder="com"></td>
                                                <td> <input type="text" class="form-control border-0 shadow-none h-30px w-110px rounded " id="fasttd" placeholder="com"></td>
                                                <td> <input type="text" class="form-control border-0 shadow-none h-30px w-110px rounded " id="fasttd" placeholder="com"></td>
                                                <!-- <td> <input type="text" class="form-control border-0 shadow-none h-30px w-115px rounded " id="fasttd" placeholder="com"></td> -->
                                            
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <button class="bg-theme2 shadow-none border-0 px-4 py-2 text-white fw-bold rounded text-uppercase fs-14 top_right_export_btn">ADD ROW</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush