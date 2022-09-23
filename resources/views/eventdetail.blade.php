@extends('main2')

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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@push('styles')
<link rel="stylesheet" href="{{ asset('/public/new-design/libs/intel-tel-input/intlTelInput.css') }}">
@endpush
@section('content')
    
{{-- <input type="hidden" value="{{$mid}}" id="mid"> --}}
    <div class="container-fluid">
        <div class="row" style="height:100%">

            
            <div class="col-11">
                <div class="sectionheader py-3">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <h2 class="m-0" style="color:#FF4E00;font-weight:700">Events Detail</h2>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{ asset('/index/' . session()->get('uid')) }}"
                                        class=" nav-link btnAddEvent">Back To Dashboard</a>
                                </div>
                                <div class="col">
                                    <ul class="p-0 m-0 list-unstyled d-flex gap-3 justify-content-end">
                                        <li><a class="nav-link btnAddEvent" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{ url('/addVisitor/' . $id) }}">Add Visitor</a></li>
                                        <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Export
                                                Event</a></li>
                                                <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Add Guest
                                                Event</a></li>
                                                <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Change Status
                                                </a></li>
                                                <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Delete
                                                </a></li>
                                       
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade Create-Guest-modal" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header py-3 border-0">
                                <h5 class="modal-title fs-20 text-theme2 fw-bold" id="exampleModalLabel">Add Guest Information</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                <i class="imgr img-times fs-20" data-bs-dismiss="modal" aria-label="Close"></i>
                            </div>
                            <div class="modal-body p-0">
                                <div class="row px-0 mx-0">
                                    <div class="col-12 Account event_info px-0 py-2">
                                        <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Guest Information</h4>
                                    </div>
                                    <form action="{{route('addguest')}}" method="post" class="modal-form col-12 mt-3">
                                        @csrf
                                        <input type="hidden" name="mid" value="{{$id}}">
                                        <div class="row">
                                            <div class="col-3 d-flex justify-content-center">
                                                <!-- userName -->
                                                <div class="dnone">
                                                    <div class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img"><span class="fs-30 text-white fw-bold">DW</span></div>
                                                    <div class="fs-14 mt-1 text-center">Attending</div>
                                                </div>
                                                <!-- user-Name End -->

                                                <!-- user_img -->
                                                <div class="d-none">
                                                    <input class="form-control d-none" type="file" id="chooseFile">
                                                    <label for="chooseFile" class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img text-white"><img src="{{ asset('/public/new-design/img/USER.jpg') }}" alt="" class="w-100 rounded-circle"></label>
                                                    <div class="fs-14 text-center mt-1">Attending</div>
                                                </div>
                                                <!-- user-img End -->
                                            </div>

                                            <div class="col-9">
                                                <div class="row px-0 mx-0">
                                                    <div class="col-12 form-floating mb-2">
                                                        <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect" name="type" aria-label="Floating label select example">
                                                            <option lass="choose py-1" selected>Open this select menu</option>
                                                            <option lass="choose py-1" value="checkin">Check In</option>
                                                            <option lass="choose py-1" value="checkout">Check out</option>
                                                        </select>
                                                        <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                    </div>
                                                    <div class="col-4 mb-2 form-floating">
                                                        <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect" name="nmtitle" aria-label="Floating label select example">
                                                            <option lass="choose py-1" selected>Choose.</option>
                                                            <option lass="choose py-1" value="1">One</option>
                                                            <option lass="choose py-1" value="2">Two</option>
                                                            <option lass="choose py-1" value="3">Three</option>
                                                        </select>
                                                        <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                    </div>
                                                    <div class="col-4 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="evefirstname" id="floatingInputValue" placeholder="Enter First Name" value="">
                                                        <label for="floatingInputValue" class="fs-12 ps-4">First Name</label>
                                                    </div>
                                                    <div class="col-4 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"  name="evelastname"  id="floatingInputValue1" placeholder="Enter Last Name" value="">
                                                        <label for="floatingInputValue1" class="fs-12 ps-4">Last Name</label>
                                                    </div>
                                                    <div class="col-12 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue2" placeholder="dawn.wong@nowcomms.asia" name="eveemail"  value="">
                                                        <label for="floatingInputValue2" class="fs-12 ps-4">Email</label>
                                                    </div>
                                                    <div class="col-6 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue3" placeholder="Administrator" name="jobtitle" value="">
                                                        <label for="floatingInputValue3" class="fs-12 ps-4">Job Title</label>
                                                    </div>
                                                    <div class="col-6 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue4" placeholder="Now Comms Asia" name="orgenization" value="">
                                                        <label for="floatingInputValue4" class="fs-12 ps-4">Organisation</label>
                                                    </div>
                                                    <!-- <div class="col-12 mb-2 form-floating Tel_Input_group">
                                                        <input type="tel" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="phone" placeholder="Now Comms Asia">
                                                        <label for="phone" class="fs-12 ps-4">Organisation</label>
                                                    </div> -->
                                                    <!-- <div class="col-12">
                                                        <input type="tel" id="phone">
                                                    </div> -->
                                                    <div class="col-12 mb-2 form-floating">
                                                        <input type="number" class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue5" placeholder="Enter Mobile Number" name="mobileno" value="">
                                                        <label for="floatingInputValue5" class="fs-12 ps-4">Mobile Number</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select class="form-control basicSelect" name="tags" multiple="multiple">
                                                            <option selected="selected">orange</option>
                                                            <option>white</option>
                                                            <option selected="selected">purple</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 Account event_info my-3 px-0 py-2">
                                                <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media (If Any)</h4>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <input type="text" placeholder="LinkedIn" name="linkedin" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <input type="text" placeholder="Twitter" name="twitter" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                                            </div>

                                            <div class="col-12 px-0 py-3 d-flex justify-content-center gap-2 fotter_button">
                                                <button type="button" class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                                                <button type="submit" class=" shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE CHANGES</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- <div class="modal-footer justify-content-center">
                                <button type="button" class="btn shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                                <button type="button" class="btn shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE CHANGES</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="modal fade Create-Guest-modal" id="exampleModal1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header py-3 border-0">
                                <h5 class="modal-title fs-20 text-theme2 fw-bold" id="editguest">Edit Guest Information</h5>
                                <h5 class="modal-title fs-20 text-theme2 fw-bold" id="viewguest">View Guest Information</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                <i class="imgr img-times fs-20" data-bs-dismiss="modal" aria-label="Close"></i>
                            </div>
                            <div class="modal-body p-0">
                                <div class="row px-0 mx-0">
                                    <div class="col-12 Account event_info px-0 py-2">
                                        <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Guest Information</h4>
                                    </div>
                                    <form action="{{route('updateguest')}}" method="post" class="modal-form col-12 mt-3">
                                        @csrf
                                        <input type="hidden" name="mid" value="{{$id}}">
                                        <input type="hidden" id="id1" name="id1">
                                        <input type="hidden" id="id2" name="id2">
                                        
                                        <div class="row">
                                            <div class="col-3 d-flex justify-content-center">
                                                <!-- userName -->
                                                <div class="dnone">
                                                    <div class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img"><span class="fs-30 text-white fw-bold">DW</span></div>
                                                    <div class="fs-14 mt-1 text-center">Attending</div>
                                                </div>
                                                <!-- user-Name End -->

                                                <!-- user_img -->
                                                <div class="d-none">
                                                    <input class="form-control d-none" type="file" id="chooseFile">
                                                    <label for="chooseFile" class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img text-white"><img src="{{ asset('/public/new-design/img/USER.jpg') }}" alt="" class="w-100 rounded-circle"></label>
                                                    <div class="fs-14 text-center mt-1">Attending</div>
                                                </div>
                                                <!-- user-img End -->
                                            </div>

                                            <div class="col-9">
                                                <div class="row px-0 mx-0">
                                                    <div class="col-12 form-floating mb-2">
                                                        <select class="form-select h-50px shadow-none Inpt border-0" id="status1" name="type" aria-label="Floating label select example">
                                                            <option lass="choose py-1" selected>Open this select menu</option>
                                                            <option lass="choose py-1" value="checkin">Check In</option>
                                                            <option lass="choose py-1" value="checkout">Check out</option>
                                                        </select>
                                                        <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                    </div>
                                                    <div class="col-4 mb-2 form-floating">
                                                        <select class="form-select h-50px shadow-none Inpt border-0" id="status2" name="nmtitle" aria-label="Floating label select example">
                                                            <option lass="choose py-1" selected>Choose.</option>
                                                            <option lass="choose py-1" value="1">One</option>
                                                            <option lass="choose py-1" value="2">Two</option>
                                                            <option lass="choose py-1" value="3">Three</option>
                                                        </select>
                                                        <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                    </div>
                                                    <div class="col-4 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="evefirstname" id="fname1" placeholder="Enter First Name" value="">
                                                        <label for="floatingInputValue" class="fs-12 ps-4">First Name</label>
                                                    </div>
                                                    <div class="col-4 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"  name="evelastname"  id="lname1" placeholder="Enter Last Name" value="">
                                                        <label for="floatingInputValue1" class="fs-12 ps-4">Last Name</label>
                                                    </div>
                                                    <div class="col-12 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="email1" placeholder="dawn.wong@nowcomms.asia" name="eveemail"  value="">
                                                        <label for="floatingInputValue2" class="fs-12 ps-4">Email</label>
                                                    </div>
                                                    <div class="col-6 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="jobtitle1" placeholder="Administrator" name="jobtitle" value="">
                                                        <label for="floatingInputValue3" class="fs-12 ps-4">Job Title</label>
                                                    </div>
                                                    <div class="col-6 mb-2 form-floating">
                                                        <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="organization1" placeholder="Now Comms Asia" name="orgenization" value="">
                                                        <label for="floatingInputValue4" class="fs-12 ps-4">Organisation</label>
                                                    </div>
                                                    <!-- <div class="col-12 mb-2 form-floating Tel_Input_group">
                                                        <input type="tel" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="phone" placeholder="Now Comms Asia">
                                                        <label for="phone" class="fs-12 ps-4">Organisation</label>
                                                    </div> -->
                                                    <!-- <div class="col-12">
                                                        <input type="tel" id="phone">
                                                    </div> -->
                                                    <div class="col-12 mb-2 form-floating">
                                                        <input type="number" class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="mnumber1" placeholder="Enter Mobile Number" name="mobileno" value="">
                                                        <label for="floatingInputValue5" class="fs-12 ps-4">Mobile Number</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select class="form-control basicSelect" id="tags1" name="tags" multiple="multiple">
                                                            <option selected="selected">orange</option>
                                                            <option>white</option>
                                                            <option selected="selected">purple</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 Account event_info my-3 px-0 py-2">
                                                <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media (If Any)</h4>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <input type="text" placeholder="LinkedIn" id="linkedin1" name="linkedin" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <input type="text" placeholder="Twitter" id="twiiter1" name="twitter" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                                            </div>

                                            <div class="col-12 px-0 py-3 d-flex justify-content-center gap-2 fotter_button" id="btn11">
                                                <button type="button" class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                                                <button type="submit" class=" shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE CHANGES</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- <div class="modal-footer justify-content-center">
                                <button type="button" class="btn shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                                <button type="button" class="btn shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE CHANGES</button>
                            </div> -->
                        </div>
                    </div>
                </div>

               

                <div class="row" style="border:none">
                    <div class="col-3" style="border:none">
                        <div class="card mb-3">
                            <div class="card-heading p-3">
                                <input type="hidden" value="{{ $id }}" id="id">
                                <?php
                                    $visit = '';
                                    $type = '';
                                    $allval = '';
                                    
                                    if (isset($_GET['allval'])) {
                                        $allval = $_GET['allval'];
                                    }
                                    if (isset($_GET['visit'])) {
                                        $visit = $_GET['visit'];
                                    }
                                    if (isset($_GET['type'])) {
                                        $type = $_GET['type'];
                                    }
                                    if(($allval=='Yes' OR $allval=='') && (!in_array($visit,['Reg','VIP']) && (!in_array($visit,['Yes','No'])))){
                                        $visit = '';
                                        $type = '';
                                    }else{
                                        $allval='No';
                                    }
                                    ?>
                                <form method="get" action="<?php echo action('AboutController@printdata', [$id]); ?>" style="border:none">
                                    
                                    <div class="sbp-preview position-relative" >
                                        <div class="form-group">
                                            {{-- <div class="row mx-0">

                                        <div class="col-12">
                                            <div class="form-group my-3">
                                                {{ Form::label('Checked In', 'Checked In', ['class' => 'text-bold']) }}
                                                <br><select name="visit" id="visit" class="form-control form-control-solid">
                                                    <option value="">Select All</option>
                                                    <option value="Yes" <?php if ($visit == 'Yes') {
                                                        echo 'selected';
                                                    } ?>>Yes</option>
                                                    <option value="No" <?php if ($visit == 'No') {
                                                        echo 'selected';
                                                    } ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group my-3">
                                                {{ Form::label('TYPE', 'Type', ['class' => 'text-bold']) }}
                                                <br><select name="type" id="type" class="form-control form-control-solid">
                                                    <option value="">Select Type</option>
                                                    <option value="VIP" <?php if ($type == 'VIP') {
                                                        echo 'selected';
                                                    } ?>>VIP</option>
                                                    <option value="Reg" <?php if ($type == 'Reg') {
                                                        echo 'selected';
                                                    } ?>>REG</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="">
                                                <button type="submit" class="btn btn-sm btn-success text-uppercase"><i
                                                        class="far fa-check-circle"></i>&nbsp; Submit</button>
                                                <a href="<?php echo action('AboutController@printdata', [$id]); ?>"
                                                    class="btn btn-sm btn-warning text-uppercase"><i
                                                        class="far fa-undo"></i>&nbsp; Reset</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="customcheckbox1" name="allval"
                                                    class="custom-control-input allval" value="Yes"  <?php if ($allval=='Yes' OR $allval=='') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label class="custom-control-label w-100" for="customcheckbox1">
                                                    <div class="row mx-0">
                                                        <span class="col pl-0">All Guests</span>
                                                        <span class="col-auto">{{$sidedata['total']}}</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="" id="accordionExample">
                                                <div class="pt-4 ">
                                                    <div class="" id="headingOne" style="background-color:black;color:white">
                                                        <h5 class="mb-0">
                                                            <button class="bg-transparent border-0 p-2"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-expanded="true"
                                                                aria-controls="collapseOne" style="background-color:black;color:white;">
                                                                Status
                                                                
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show"
                                                        aria-labelledby="headingOne" id="#collapseOne">
                                                        <div class="card-body px-1 pt-2">
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox23"
                                                                    name="visit" value="Yes" class="visit d-none custom-control-input"
                                                                    class=""  <?php if ($visit == 'Yes') {
                                                                        echo 'checked';
                                                                    } ?>>
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox23">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">Checked In</span>
                                                                        <span class="col-auto">{{count($sidedata['checkedin'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox22"
                                                                    name="visit" value="No" class="visit d-none custom-control-input"
                                                                    class="" <?php if ($visit == 'No') {
                                                                        echo 'checked';
                                                                    } ?>>
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox22">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">Not Attending</span>
                                                                        <span class="col-auto">{{count($sidedata['notattending'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="" id="headingTwo" style="background-color:black;color:white">
                                                        <h5 class="mb-0">
                                                            <button class="bg-transparent border-0 p-2 collapsed"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseTwo" aria-expanded="false"
                                                                aria-controls="collapseTwo" style="color:white">
                                                                My Lists
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseTwo" class="collapse show"
                                                        aria-labelledby="headingTwo" id="collapseTwo">
                                                        <div class="card-body px-1 pt-2">
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox73"
                                                                    name="type" value="VIP" class="type d-none custom-control-input" <?php if ($type == 'VIP') {
                                                                        echo 'checked';
                                                                    } ?>
                                                                    >
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox73">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">VIP</span>
                                                                        <span class="col-auto">{{count($sidedata['vip'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox72"
                                                                    name="type" value="Reg" class="type d-none custom-control-input"
                                                                 <?php if ($type == 'Reg') {
                                                                        echo 'checked';
                                                                    } ?> >
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox72">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">REG</span>
                                                                        <span class="col-auto">{{count($sidedata['reg'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-9">

                        <div class="card-body">
                            <link rel="stylesheet" type="text/css"
                                href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                            <div class="datatable table-responsive">

                                <table class="table table-bordered table-striped table-hover text-nowrap"
                                    id="allmatches_datatable" width="100%" cellspacing="0">
                                    <thead style="background-color:#CCCCCC">
                                        <tr >
                                            <th class="text-capitalize">S No.</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Company</th>
                                            <!--<th class="text-capitalize">Type</th>-->
                                            <!--<th class="text-capitalize">Email</th>-->
                                            <th class="text-capitalize">Visit</th>
                                            <th class="text-capitalize">Edit</th>
                                            <th class="text-capitalize">View</th>
                                            <th class="text-capitalize ">Action</th>
                                            <!--<th class="text-capitalize w-100">Action</th>-->
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="output"></div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>


    <script>
    function openmodal(id,mid){
        $('#btn11').removeClass('d-none');
        $('#viewguest').addClass('d-none');
        $('#editguest').removeClass('d-none');
        $('#id1').val(id);
                $('#id2').val(mid);
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('editvisitor') }}",
            type: "post",
            data: {
                id: id,
                mid:mid,
            },
            success: function(response) {
                $('#twiiter1').val(response.twitter);
                $('#linkedin1').val(response.linkedin);
                
                $('#mnumber1').val(response.mobileno);
                $('#organization1').val(response.orgenization);
                $('#jobtitle1').val(response.jobtitle);
                $('#email1').val(response.eveemail);
                $('#lname1').val(response.evelastname);
                $('#fname1').val(response.evefirstname);
                $(`#status1 option[value="${response.type}"]`).attr("selected", "selected");
                $(`#status2 option[value="${response.nmtitle}"]`).attr("selected", "selected");
                $(`#tags1 option[value="${response.tags}"]`).attr("selected", "selected");
                $('#exampleModal1').modal('toggle');
                $('#exampleModal1').modal('show');
            }
        })
    }
    function viewmodal(id,mid){
        // $('#exampleModal2').modal('toggle');
        // $('#exampleModal2').modal('show');
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('viewvisitor') }}",
            type: "post",
            data: {
                id: id,
                mid:mid,
            },
            success: function(response) {
                $('#twiiter1').val(response.twitter);
                $('#linkedin1').val(response.linkedin);
                // $('#tags1').val(response.tags);
                $('#mnumber1').val(response.mobileno);
                $('#organization1').val(response.orgenization);
                $('#jobtitle1').val(response.jobtitle);
                $('#email1').val(response.eveemail);
                $('#lname1').val(response.evelastname);
                $('#fname1').val(response.evefirstname);
                
                $(`#status1 option[value="${response.type}"]`).attr("selected", "selected");
                $(`#status2 option[value="${response.nmtitle}"]`).attr("selected", "selected");
                $(`#tags1 option[value="${response.tags}"]`).attr("selected", "selected");
                $('#btn11').addClass('d-none');
                $('#editguest').addClass('d-none');
                $('#viewguest').removeClass('d-none');
                $('#exampleModal1').modal('toggle');
                $('#exampleModal1').modal('show');
            }
            })
    }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
            matchdatatable();
            var id = $('#id').val();
            // var visit = $('.visit').val();
            var allval = $("input[type='checkbox'].allval:checked").val();
            var visit = $("input[type='radio'].visit:checked").val();
            var type = $("input[type='radio'].type:checked").val();
            
            function matchdatatable(){
                var id = $('#id').val();
            // var visit = $('.visit').val();
            var allval = $("input[type='checkbox'].allval:checked").val();
            var visit = $("input[type='radio'].visit:checked").val();
            var type = $("input[type='radio'].type:checked").val();
                $('#allmatches_datatable').DataTable({
                'bFilter': false,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": {
                    "url": '<?php echo URL::asset('view_eventdetail_dt'); ?>?visit=' + visit + '&type=' + type + '&id=' + id+ '&allval=' + allval,
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "dom": 'lBfrtip',
                "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }],
                "columns": [{
                        "data": "id",
                        orderable: false
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "company"
                    },
                    // {
                    //     "data": "type"
                    // },
                    // {
                    //     "data": "email",
                    //     orderable: false
                    // },
                    {
                        "data": "visit",
                        orderable: false
                    },
                    {
                        "data": "edit",
                    },
                    {
                        "data": "view",
                    },
                    {
                        "data": "action",
                        orderable: false
                    },
                ]
            });
        }

        $('.visit').change(function(){
            $("input:checkbox").removeAttr("checked");
            $('#allmatches_datatable').DataTable().destroy();
            matchdatatable();

        });
        $('.type').change(function(){
            $("input:checkbox").removeAttr("checked");
            $('#allmatches_datatable').DataTable().destroy();
            matchdatatable();
        });
        $('.allval').change(function(){
            $("input:radio").removeAttr("checked");
            $('#allmatches_datatable').DataTable().destroy();
            matchdatatable();
        });
            
        });
    </script>


{{-- <script type="text/javascript">
    function PrintDiv(id) {
        var divToPrint = document.getElementById(id);
        var popupWin = window.open('', '_blank', 'width=1000,height=700');
        //  popupWin.document.open();
        popupWin.document.write(
            '<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" tyep="text/css"></head><body onload="window.print()" style="margin-left: 20px;">' +
            divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script> --}}

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('/public/new-design/libs/intel-tel-input/intlTelInput.js') }}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // any initialisation options go here
    });
</script>

<script>
    $('.basicSelect').select2({
        tags: true,
    });
</script>

@endpush
