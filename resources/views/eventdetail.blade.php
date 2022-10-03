@extends('main2')

@push('meta')
    <title>Guests</title>

    <meta name="title" content="Guests" />
    <meta name="description" content="page_description" />
    <meta name="keywords" content="page_keywords" />

    <meta name="robots" content="index, follow" />

    <meta name="twitter:title" content="Guests">
    <meta name="twitter:description" content="page_description">
    <meta name="twitter:image" content="{{ asset('/public/new-design/img/logos/logo.png') }}">


    <meta property="og:url" content="{{ asset('/') }}">
    <meta property="og:title" content="Guests">
    <meta property="og:description" content="page_description">
    <meta property="og:image" content="{{ asset('/public/new-design/img/logos/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/public/new-design/img/logos/logo.png') }}">
    <meta name="classification" content="Guests" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/public/new-design/img/logos/favicon-white.png') }}" />
    <link rel="icon" href="{{ asset('/public/new-design/img/logos/favicon-original.png') }}" id="light-scheme-icon">
    <link rel="icon" href="{{ asset('/public/new-design/img/logos/favicon-white.png') }}" id="dark-scheme-icon">
    <link rel="canonical" href="{{ asset('/') }}" />
@endpush
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/public/new-design/libs/intel-tel-input/intlTelInput.css') }}">
@endpush
@section('content')
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
    
    if (($allval == 'Yes' or $allval == '') && (!in_array($type, ['Reg', 'VIP']) && !in_array($visit, ['Yes', 'No']))) {
        $visit = '';
        $type = '';
    } else {
        $allval = 'No';
    }
    ?>
    <section class=" container-fluid guests px-sm-3">
        <div class="topBar pb-2 pb-lg-4">
            <div class="row justify-content-between">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="title text-theme1 fs-16 fs-sm-20 fs-md-30 fw-600 ">Guests</div>
                    <div class="filterBtn text-theme1 d-lg-none  fs-16 fs-sm-20 fs-md-30 fw-600 "><button type="button"
                            class="btn guestFilterBtn btn-theme1 shadow-none w-30px h-30px w-sm-36px h-sm-6px align-items-center d-flex justify-content-center px-sm-4 p-2 "><img
                                src="{{ asset('/public/new-design/img/guest-filter-light.png') }}" alt=""></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-3">
                <div class="guestFilter bg-white flex-column d-flex h-100">
                    <div class="filterHeader py-2 px-3 border-bottom border-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="fs-14 fs-sm-16 text-theme2 fw-bold">Guest List</div>
                            </div>
                            <div class="col-auto">
                                <div class="guestLodar">
                                    <img src="{{ asset('/public/new-design/img/icon/sync.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="filterBody  flex-fill h-100 overflow-scroll overflow-lg-hidden">
                            <form method="get" action="<?php echo action('AboutController@printdata', [$id]); ?>" style="border:none">
                                <ul class="list-unstyled p-0 m-0">
                                    <li class="py-2 px-3">
                                        <div class="form-check">

                                            <input type="checkbox" id="customcheckbox1" name="allval"
                                                class="custom-control-input allval form-check-input visit border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0"
                                                value="Yes" <?php if ($allval == 'Yes' or $allval == '') {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14"
                                                for="customcheckbox1"><span>All Guests</span><span
                                                    class="value">{{ $sidedata['total'] }}</span></label>
                                        </div>
                                    </li>
                                    <li class="py-1 py-sm-2 px-2 px-sm-3 bg-theme2 text-white fs-13 fs-sm-14">Status</li>
                                    <li class="pt-2 pb-1 px-3">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input visit border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0"
                                                type="radio" name="visit" value="checkin" id="customcheckbox23"
                                                <?php if ($visit == 'Yes') {
                                                    echo 'checked';
                                                } ?>>

                                        <input type="radio" id="customcheckbox22" name="visit" value="No" class="form-check-input visit border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" <?php if ($visit == 'No') {
                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                } ?>>
                                        <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="customcheckbox22"><span>Not Attendding</span><span class="value">{{count($sidedata['notattending'])}}</span></label>
                                    </div>
                                </li>
                                {{-- <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="status" id="checkedin">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="checkedin"><span>Checked In</span><span class="value">0</span></label>
                            </div>
                        </li> --}}
                                    <li class="bg-theme2"><button type="button"
                                            class="btn w-100 type rounded-0 py-1 py-sm-2 px-2 px-sm-3 justify-content-between align-items-center d-flex text-white text-decoration-none fs-13 fs-sm-14 "
                                            data-bs-toggle="modal" data-bs-target="#grouping"><span>Groups</span> <i
                                                class="imgr img-plus fs-15 fs-sm-18"></i>
                                            <!-- <img src="{{ asset('/public/new-design/img/icon/add.svg') }}" alt=""> --></button>
                                    </li>


                                    <li class="pt-2 pb-1 px-3">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input type border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0"
                                                type="radio" name="type" value="VIP" id="customcheckbox73"
                                                <?php if ($type == 'VIP') {
                                                    echo 'checked';
                                                } ?>>

                                            <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14"
                                                for="customcheckbox73"><span>VIP</span><span
                                                    class="value">{{ count($sidedata['vip']) }}</span></label>
                                        </div>
                                    </li>
                                    <li class="py-1 px-3">
                                        <div class="form-check">
                                            <!-- <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="groups" id="brown"> -->
                                            <input
                                                class="form-check-input type border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0"
                                                type="radio" name="type" value="Reg" id="customcheckbox72"
                                                <?php if ($type == 'Reg') {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14"
                                                for="customcheckbox72"><span>Regular</span><span
                                                    class="value">{{ count($sidedata['reg']) }}</span></label>
                                        </div>
                                    </li>
                                    {{--
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="groups" id="male">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="male"><span>Male</span><span class="value">3</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="groups" id="female">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="female"><span>Female</span><span class="value">3</span></label>
                            </div>
                        </li>
                         --}}
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="searchBar px-4 py-3 bg-white border-bottom border-2">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <!-- <div class="input-group border border-1 rounded-5"> -->
                                    <!-- <botton type="button" class="btn border-0 shadow-none bg-white p-0 searchbtn fs-14 px-2 align-items-center d-flex"><i class="imgr img-search fw-600"></i></botton> -->
                                    <!-- <input type="text" class="form-control shadow-none border-0 ps-1 py-1 h-29px h-lg-31 h-xl-35px" id="searchguest" placeholder="Search Guests" aria-label="Example text with button addon" aria-describedby="button-addon1"> -->
                                    <!-- </div> -->
                                </div>
                                <div class="col-12 col-sm mt-3 mt-sm-0 d-flex gap-3 justify-content-sm-end">
                                    <!-- <div><button type="btn" class="btn historyBtn btn-outline-light fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase">History</button></div> -->
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-theme1 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase text-white"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false"><span
                                                class="me-3">Add guests</span><i
                                                class="imgr img-chevron-down"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item fs-12 fs-sm-14" href="#"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">One by one</a>
                                            </li>
                                            <li><a class="dropdown-item fs-12 fs-sm-14" href="#"
                                                    data-bs-toggle="modal" data-bs-target="#viewguestinfo">Import CSV
                                                    file</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="totalGuest px-4 py-3 bg-white border-bottom border-2">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-sm-auto col-xl-3">
                                    <div class="geustValue">
                                        <span class="fs-12 text-theme2 ps-4">Viewing</span>
                                        <div class="countValue text-theme2 fs-14 fs-md-16 fs-xl-20 fw-bold mt-n2 mt-xl-n2">
                                            <span
                                                class="text-theme1 fs-16 fs-md-20 fs-xl-28">{{ $sidedata['total'] }}</span>
                                            All Guests
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                                    <div class="buttonsGroup d-sm-flex gap-2 d-inline-block">
                                        <!-- <button type="btn" class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0" disabled>Add to Group</button> -->
                                        <!-- <a href="{{ url('/exportdata/' . $id) }}" type="btn" class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0" disabled>Change Status</a> -->
                                        <a href="{{ url('/exportdata/' . $id) }}" type="btn"
                                            class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0"
                                            disabled>Export</a>
                                        <button type="btn"
                                            class="btn btn-theme2 delbtn fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- <table id="example" class="table mt-0 table-striped dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr class="even">
                                                    <th class="select-checkbox"></th>
                                                    <th>Frist Name</th>
                                                    <th>Last Name</th>
                                                    <th>Organisation</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">View</th>
                                                    <th class="text-center">Badge</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class=""><span class="select-checkbox"></span></td>
                                                    <td>Eugene</td>
                                                    <td class="">Wong</td>
                                                    <td>Now Comms Asia</td>
                                                    <td>Verified</td>
                                                    <td class="text-center"><i class="imgs img-pen text-secondary"></i></td>
                                                    <td class="text-center"><i class="imgs img-eye text-secondary"></i></td>
                                                    <td class="text-center"><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">PRINT BADGE</Button></td>
                                                </tr>
                                            </tbody>
                                        </table> -->
                        <table
                            class="table table-bordered mt-0 table-striped table-hover text-nowrap  dt-responsive nowrap"
                            id="allmatches_datatable" width="100%" cellspacing="0">
                            <thead style="background-color:#CCCCCC">
                                <tr>
                                    <th class="text-capitalize">S No.</th>
                                    <th class="text-capitalize"><input class="" type="checkbox" value=""
                                            name="select-all" id="flexCheckIndeterminate"></th>
                                    <th class="text-capitalize">Name</th>
                                    <th class="text-capitalize">Organization</th>
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
    </section>


    {{-- <input type="hidden" value="{{$mid}}" id="mid"> --}}
    <div class="container-fluid">
        <div class="row" style="height:100%">


            <div class="col-11">
                <!-- grouping -->
                <div class="modal fade" id="grouping" tabindex="-1" aria-labelledby="groupingLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered w-md-40 w-lg-35">
                        <div class="modal-content">
                            <div class="modal-header border-bottom border-2 px-3 pt-3 pb-2 px-sm-4">
                                <h5 class="modal-title fs-16 fs-sm-18 fs-md-20 fw-600" id="groupingLabel">Create New Group
                                </h5>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body py-3 px-sm-4">
                                <form action="">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" placeholder="Enter Group Name" value="Designers"
                                                class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal text-theme2"
                                                required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer border-top border-2 py-3 justify-content-center">
                                <button type="button" class="btn historyBtn fs-14 fw-600 text-uppercase p-2 px-3"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="button"
                                    class="btn btn-theme1 fs-14 fw-600 text-uppercase text-white p-2 px-3">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add guest start-->
                {{-- <div class="modal fade Create-Guest-modal" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <option class="choose py-1">Open this select menu</option>
                                                        <option class="choose py-1" value="verified">Verified</option>
                                                        <option class="choose py-1" value="RSVP">RSVP</option>
                                                    </select>
                                                    <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                </div>
                                                <div class="col-4 mb-2 form-floating">
                                                    <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect" name="nmtitle" aria-label="Floating label select example">
                                                        <option class="choose py-1">Choose.</option>
                                                        <option class="choose py-1" value="Mr">Mr</option>
                                                        <option class="choose py-1" value="Mrs">Mrs</option>
                                                        <!-- <option class="choose py-1" value="3">Three</option> -->
                                                    </select>
                                                    <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                </div>


                                                <div class="col-4 mb-2 form-floating">
                                                    <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="evefirstname" id="floatingInputValue" placeholder="Enter First Name" value="">
                                                    <label for="floatingInputValue" class="fs-12 ps-4">First Name</label>
                                                </div>
                                                <div class="col-4 mb-2 form-floating">
                                                    <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="evelastname" id="floatingInputValue1" placeholder="Enter Last Name" value="">
                                                    <label for="floatingInputValue1" class="fs-12 ps-4">Last Name</label>
                                                </div>
                                                <div class="col-12 mb-2 form-floating">
                                                    <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue2" placeholder="dawn.wong@nowcomms.asia" name="eveemail" value="">
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
                                                <div class="col-6 mb-2 form-floating">
                                                    <input type="number" class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue5" placeholder="Enter Mobile Number" name="mobileno" value="">
                                                    <label for="floatingInputValue5" class="fs-12 ps-4">Mobile Number</label>
                                                </div>
                                                <div class="col-6 mb-2 form-floating">
                                                    <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect1" name="nmtype" aria-label="Floating label select example1">
                                                        <option class="choose py-1">Choose.</option>
                                                        <option class="choose py-1" value="VIP">VIP</option>
                                                        <option class="choose py-1" value="Reg">Regular</option>
                                                        <!-- <option class="choose py-1" value="3">Three</option> -->
                                                    </select>
                                                    <label for="floatingSelect" class="fs-12 ps-4">Type</label>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-control basicSelect" name="tags" multiple="multiple">
                                                        <option>orange</option>
                                                        <option>white</option>
                                                        <option>purple</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 Account event_info my-3 px-0 py-2">
                                            <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media (If Any)</h4>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" placeholder="LinkedIn" name="linkedin" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <input type="text" placeholder="Twitter" name="twitter" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off">
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
            </div> --}}
                <!-- add guest end-->
                {{-- <div class="modal fade Create-Guest-modal" id="exampleModal1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <option class="choose py-1">Open this select menu</option>
                                                        <option class="choose py-1" value="verified">Verified</option>
                                                        <option class="choose py-1" value="RSVP">RSVP</option>
                                                    </select>
                                                    <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                </div>
                                                <div class="col-4 mb-2 form-floating">
                                                    <select class="form-select h-50px shadow-none Inpt border-0" id="status2" name="nmtitle" aria-label="Floating label select example">
                                                        <option class="choose py-1">Choose.</option>
                                                        <option class="choose py-1" value="Mr">Mr</option>
                                                        <option class="choose py-1" value="Mrs">Mrs</option>
                                                        <!-- <option class="choose py-1" value="3">Three</option> -->
                                                    </select>
                                                    <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                </div>

                                                <div class="col-4 mb-2 form-floating">
                                                    <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="evefirstname" id="fname1" placeholder="Enter First Name" value="">
                                                    <label for="floatingInputValue" class="fs-12 ps-4">First Name</label>
                                                </div>
                                                <div class="col-4 mb-2 form-floating">
                                                    <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="evelastname" id="lname1" placeholder="Enter Last Name" value="">
                                                    <label for="floatingInputValue1" class="fs-12 ps-4">Last Name</label>
                                                </div>
                                                <div class="col-12 mb-2 form-floating">
                                                    <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="email1" placeholder="dawn.wong@nowcomms.asia" name="eveemail" value="">
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
                                                <div class="col-6 mb-2 form-floating">
                                                    <input type="number" class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="mnumber1" placeholder="Enter Mobile Number" name="mobileno" value="">
                                                    <label for="floatingInputValue5" class="fs-12 ps-4">Mobile Number</label>
                                                </div>
                                                <div class="col-6 mb-2 form-floating">
                                                    <select class="form-select h-50px shadow-none Inpt border-0" id="nmtype1" name="nmtype" aria-label="Floating label select example1">
                                                        <option class="choose py-1">Choose.</option>
                                                        <option class="choose py-1" value="VIP">VIP</option>
                                                        <option class="choose py-1" value="Reg">Regular</option>
                                                        <!-- <option class="choose py-1" value="3">Three</option> -->
                                                    </select>
                                                    <label for="floatingSelect" class="fs-12 ps-4">Type</label>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-control basicSelect" id="select2-data-1-m5lt" name="tags" multiple="multiple">
                                                        <option value="orange">orange</option>
                                                        <option value="white">white</option>
                                                        <option value="purple">purple</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 Account event_info my-3 px-0 py-2">
                                            <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media (If Any)</h4>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" placeholder="LinkedIn" id="linkedin1" name="linkedin" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" placeholder="Twitter" id="twiiter1" name="twitter" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off">
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
            </div> --}}

                <div class="modal fade Create-Guest-modal" id="viewguestinfo" data-bs-backdrop="static" tabindex="-1"
                    aria-labelledby="viewguestinfoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header py-3">
                                <h5 class="modal-title fs-20 text-theme2 fw-bold" id="viewguestinfoLabel">Choose a file
                                </h5>
                                <i class="imgr img-times fs-20 text-theme2" data-bs-dismiss="modal"
                                    aria-label="Close"></i>
                            </div>
                            <form action="{{ route('addguestcsv') }}" method="post" class="modal-form col-12 mt-3"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="mid" value="{{ $id }}">
                                    <div class="input-group">
                                        <label class="input-group-text p-5 justify-content-center w-100 rounded-8"
                                            for="inputGroupFile01">
                                            <div class="gap-3">
                                                <i class="imgr img-arrow-to-bottom fs-36 d-block"></i>
                                                <span
                                                    class="d-block fs-18 mb-n2 textHover my-3 fs-16 fs-sm-18 fs-md-22">Choose
                                                    a file</span>
                                            </div>
                                        </label>
                                        <input type="file" class="form-control d-none" name="eventfile"
                                            id="inputGroupFile01">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="btn btn-theme1 fs-16 text-white fw-500 px-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </section>


            {{-- <input type="hidden" value="{{$mid}}" id="mid"> --}}
            <div class="container-fluid">
                <div class="row" style="height:100%">
                    <div class="col-11">
                        <!-- grouping -->
                        <div class="modal fade" id="grouping" tabindex="-1" aria-labelledby="groupingLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered w-md-40 w-lg-35">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom border-2 px-3 pt-3 pb-2 px-sm-4">
                                        <h5 class="modal-title fs-16 fs-sm-18 fs-md-20 fw-600" id="groupingLabel">Create
                                            New Group
                                        </h5>
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-3 px-sm-4">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" placeholder="Enter Group Name"
                                                        value="Designers"
                                                        class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal text-theme2"
                                                        required>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-top border-2 py-3 justify-content-center">
                                        <button type="button" class="btn historyBtn fs-14 fw-600 text-uppercase p-2 px-3"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button"
                                            class="btn btn-theme1 fs-14 fw-600 text-uppercase text-white p-2 px-3">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- grouping end -->

                        <!-- add guest start-->
                        <div class="modal fade Create-Guest-modal" id="exampleModal" data-bs-backdrop="static"
                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header py-3 border-0">
                                        <h5 class="modal-title fs-20 text-theme2 fw-bold" id="exampleModalLabel">Add Guest
                                            Information</h5>
                                        <i class="imgr img-times fs-20" data-bs-dismiss="modal" aria-label="Close"></i>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="row px-0 mx-0">
                                            <div class="col-12 Account event_info px-0 py-2">
                                                <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Guest Information
                                                </h4>
                                            </div>
                                            <form action="{{ route('addguest') }}" method="post"
                                                class="modal-form col-12 mt-3" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="mid" value="{{ $id }}">
                                                <div class="row">
                                                    <div class="col-3 d-flex justify-content-center">
                                                        <div class="dnone">
                                                            <input class="d-none" type="file" name="guestimage"
                                                                id="guestimage">
                                                            <label for="guestimage">
                                                                <img src="{{ asset('/public/new-design/img/avatar-img.png') }}"
                                                                    alt="" height="65px" width="65px">
                                                                <div class="fs-14 mt-1 text-center">Attending</div>
                                                            </label>
                                                        </div>

                                                        {{-- <div class="col-4 mb-2 form-floating">
                                                <input type="file" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" name="guestimage" id="floatingInputValue" placeholder="Enter First Name" value="">
                                                <label for="floatingInputValue" class="fs-12 ps-4">First Name</label>
                                            </div> --}}




                                                        {{-- <div class="dnone">
                                                <div class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img"><span class="fs-30 text-white fw-bold">DW</span></div>
                                                <div class="fs-14 mt-1 text-center">Attending</div>
                                            </div> --}}
                                                        <!-- user-Name End -->

                                                        <!-- user_img -->
                                                        {{-- <div class="d-none">
                                                <input class="form-control d-none" type="file" id="chooseFile">
                                                <label for="chooseFile" class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img text-white"><img src="{{ asset('/public/new-design/img/USER.jpg') }}" alt="" class="w-100 rounded-circle"></label>
                                                    <div class="fs-14 text-center mt-1">Attending</div>
                                                </div> --}}
                                                        <!-- user-img End -->
                                                    </div>

                                                    <div class="col-9">
                                                        <div class="row px-0 mx-0">

                                                            <div class="col-12 form-floating mb-2">
                                                                <select
                                                                    class="form-select h-50px shadow-none Inpt border-0"
                                                                    id="floatingSelect" name="type"
                                                                    aria-label="Floating label select example">
                                                                    <option class="choose py-1" selected disabled>Open this
                                                                        select menu
                                                                    </option>
                                                                    <option class="choose py-1" value="verified">Verified
                                                                    </option>
                                                                    <option class="choose py-1" value="RSVP">RSVP
                                                                    </option>
                                                                </select>
                                                                <label for="floatingSelect"
                                                                    class="fs-12 ps-4">Status</label>
                                                            </div>




                                                            {{-- <div class="col-12 form-floating mb-2">
                                                        <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect" name="type" aria-label="Floating label select example">
                                                            <option class="choose py-1">Open this select menu</option>
                                                            <option class="choose py-1" value="checkin">Check In</option>
                                                            <option class="choose py-1" value="checkout">Check out</option>
                                                        </select>
                                                        <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                                    </div> --}}
                                                            <div class="col-4 mb-2 form-floating">
                                                                <select
                                                                    class="form-select h-50px shadow-none Inpt border-0"
                                                                    id="floatingSelect" name="nmtitle"
                                                                    aria-label="Floating label select example">
                                                                    <option class="choose py-1" selected disabled>Choose.
                                                                    </option>
                                                                    <option class="choose py-1" value="Mr">Mr</option>
                                                                    <option class="choose py-1" value="Mrs">Mrs
                                                                    </option>
                                                                </select>
                                                                <label for="floatingSelect"
                                                                    class="fs-12 ps-4">Title</label>
                                                            </div>


                                                            <div class="col-4 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    name="evefirstname" id="floatingInputValue"
                                                                    placeholder="Enter First Name" value="">
                                                                <label for="floatingInputValue" class="fs-12 ps-4">First
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-4 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    name="evelastname" id="floatingInputValue1"
                                                                    placeholder="Enter Last Name" value="">
                                                                <label for="floatingInputValue1" class="fs-12 ps-4">Last
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-12 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="floatingInputValue2"
                                                                    placeholder="dawn.wong@nowcomms.asia" name="eveemail"
                                                                    value="">
                                                                <label for="floatingInputValue2"
                                                                    class="fs-12 ps-4">Email</label>
                                                            </div>
                                                            <div class="col-6 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="floatingInputValue3" placeholder="Administrator"
                                                                    name="jobtitle" value="">
                                                                <label for="floatingInputValue3" class="fs-12 ps-4">Job
                                                                    Title</label>
                                                            </div>
                                                            <div class="col-6 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="floatingInputValue4" placeholder="Now Comms Asia"
                                                                    name="orgenization" value="">
                                                                <label for="floatingInputValue4"
                                                                    class="fs-12 ps-4">Organisation</label>
                                                            </div>
                                                            <!-- <div class="col-12 mb-2 form-floating Tel_Input_group">
                                                                                                            <input type="tel" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="phone" placeholder="Now Comms Asia">
                                                                                                            <label for="phone" class="fs-12 ps-4">Organisation</label>
                                                                                                        </div> -->
                                                            <!-- <div class="col-12">
                                                                                                            <input type="tel" id="phone">
                                                                                                        </div> -->
                                                            <div class="col-6 mb-2 form-floating">
                                                                <input type="number"
                                                                    class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="floatingInputValue5"
                                                                    placeholder="Enter Mobile Number" name="mobileno"
                                                                    value="">
                                                                <label for="floatingInputValue5" class="fs-12 ps-4">Mobile
                                                                    Number</label>
                                                            </div>
                                                            <div class="col-6 mb-2 form-floating">
                                                                <select
                                                                    class="form-select h-50px shadow-none Inpt border-0"
                                                                    id="floatingSelect1" name="nmtype"
                                                                    aria-label="Floating label select example1">
                                                                    <option class="choose py-1" selected disabled>Choose.
                                                                    </option>
                                                                    <option class="choose py-1" value="VIP">VIP
                                                                    </option>
                                                                    <option class="choose py-1" value="Reg">Regular
                                                                    </option>
                                                                    <!-- <option class="choose py-1" value="3">Three</option> -->
                                                                </select>
                                                                <label for="floatingSelect"
                                                                    class="fs-12 ps-4">Type</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="form-control basicSelect" name="tags"
                                                                    multiple="multiple">
                                                                    <option selected="selected">orange</option>
                                                                    <option>white</option>
                                                                    <option selected="selected">purple</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 Account event_info my-3 px-0 py-2">
                                                        <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media
                                                            (If Any)
                                                        </h4>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <input type="text" placeholder="LinkedIn"
                                                            name="linkedin"
                                                            class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                                            autocomplete="off">
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <input type="text" placeholder="Twitter"
                                                            name="twitter"
                                                            class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                                            autocomplete="off">
                                                    </div>

                                                    <div
                                                        class="col-12 px-0 py-3 d-flex justify-content-center gap-2 fotter_button">
                                                        <button type="button"
                                                            class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2"
                                                            data-bs-dismiss="modal">CANCEL</button>
                                                        <button type="submit"
                                                            class=" shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE
                                                            CHANGES</button>
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
                        <!-- add guest end-->

                        <!-- edit guest end-->
                        <div class="modal fade Create-Guest-modal" id="exampleModal1" data-bs-backdrop="static"
                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header py-3 border-0">
                                        <h5 class="modal-title fs-20 text-theme2 fw-bold" id="editguest">Edit Guest
                                            Information
                                        </h5>
                                        <h5 class="modal-title fs-20 text-theme2 fw-bold" id="viewguest">View Guest
                                            Information
                                        </h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                        <i class="imgr img-times fs-20" data-bs-dismiss="modal" aria-label="Close"></i>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="row px-0 mx-0">
                                            <div class="col-12 Account event_info px-0 py-2">
                                                <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Guest Information
                                                </h4>
                                            </div>
                                            <form action="{{ route('updateguest') }}" method="post"
                                                enctype="multipart/form-data" class="modal-form col-12 mt-3">
                                                @csrf
                                                <input type="hidden" name="mid" value="{{ $id }}">
                                                <input type="hidden" id="id1" name="id1">
                                                <input type="hidden" id="id2" name="id2">

                                                <div class="row">
                                                    <div class="col-3 d-flex justify-content-center">

                                                        <div id="image1"></div>

                                                        <!-- userName -->
                                                        {{-- <div class="dnone">
                                                        <input class="d-none" type="file" name="guimage"
                                                            id="guimage">
                                                        <label for="guimage" id="image1" class="imageContainer">
                                                        </label>
                                                             </div> --}}
                                                        {{-- <div class="dnone">
                                                <div class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img"><span class="fs-30 text-white fw-bold">DW</span></div>
                                                <div class="fs-14 mt-1 text-center">Attending</div>
                                            </div> --}}
                                                        <!-- user-Name End -->

                                                        <!-- user_img -->
                                                        {{-- <div class="d-none">
                                                <input class="form-control d-none" type="file" id="chooseFile">
                                                <label for="chooseFile" class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center user_img text-white"><img src="{{ asset('/public/new-design/img/USER.jpg') }}" alt="" class="w-100 rounded-circle"></label>
                                                <div class="fs-14 text-center mt-1">Attending</div>
                                            </div> --}}
                                                        <!-- user-img End -->
                                                    </div>

                                                    <div class="col-9">
                                                        <div class="row px-0 mx-0">
                                                            <div class="col-12 form-floating mb-2">
                                                                <select
                                                                    class="form-select h-50px shadow-none Inpt border-0"
                                                                    id="status1" name="type"
                                                                    aria-label="Floating label select example">
                                                                    <option class="choose py-1" disabled>Open this select
                                                                        menu
                                                                    </option>
                                                                    <option class="choose py-1" value="verified">Verified
                                                                    </option>
                                                                    <option class="choose py-1" value="RSVP">RSVP
                                                                    </option>
                                                                </select>
                                                                <label for="floatingSelect"
                                                                    class="fs-12 ps-4">Status</label>
                                                            </div>
                                                            <div class="col-4 mb-2 form-floating">
                                                                <select
                                                                    class="form-select h-50px shadow-none Inpt border-0"
                                                                    id="status2" name="nmtitle"
                                                                    aria-label="Floating label select example">
                                                                    <option class="choose py-1" disabled>Choose.</option>
                                                                    <option class="choose py-1" value="Mr">Mr</option>
                                                                    <option class="choose py-1" value="Mrs">Mrs
                                                                    </option>
                                                                    <!-- <option class="choose py-1" value="3">Three</option> -->
                                                                </select>
                                                                <label for="floatingSelect"
                                                                    class="fs-12 ps-4">Title</label>
                                                            </div>

                                                            <div class="col-4 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    name="evefirstname" id="fname1"
                                                                    placeholder="Enter First Name" value="">
                                                                <label for="floatingInputValue" class="fs-12 ps-4">First
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-4 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    name="evelastname" id="lname1"
                                                                    placeholder="Enter Last Name" value="">
                                                                <label for="floatingInputValue1" class="fs-12 ps-4">Last
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-12 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="email1" placeholder="dawn.wong@nowcomms.asia"
                                                                    name="eveemail" value="">
                                                                <label for="floatingInputValue2"
                                                                    class="fs-12 ps-4">Email</label>
                                                            </div>
                                                            <div class="col-6 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="jobtitle1" placeholder="Administrator"
                                                                    name="jobtitle" value="">
                                                                <label for="floatingInputValue3" class="fs-12 ps-4">Job
                                                                    Title</label>
                                                            </div>
                                                            <div class="col-6 mb-2 form-floating">
                                                                <input type="text"
                                                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="organization1" placeholder="Now Comms Asia"
                                                                    name="orgenization" value="">
                                                                <label for="floatingInputValue4"
                                                                    class="fs-12 ps-4">Organisation</label>
                                                            </div>
                                                            <div class="col-6 mb-2 form-floating">
                                                                <input type="number"
                                                                    class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal"
                                                                    id="mnumber1" placeholder="Enter Mobile Number"
                                                                    name="mobileno" value="">
                                                                <label for="floatingInputValue5" class="fs-12 ps-4">Mobile
                                                                    Number</label>
                                                            </div>


                                                            <div class="col-6 mb-2 form-floating">
                                                                <select
                                                                    class="form-select h-50px shadow-none Inpt border-0"
                                                                    id="nmtype1" name="nmtype"
                                                                    aria-label="Floating label select example1">
                                                                    <option class="choose py-1" disabled>Choose.</option>
                                                                    <option class="choose py-1" value="VIP">VIP
                                                                    </option>
                                                                    <option class="choose py-1" value="Reg">Regular
                                                                    </option>
                                                                    <!-- <option class="choose py-1" value="3">Three</option> -->
                                                                </select>
                                                                <label for="floatingSelect"
                                                                    class="fs-12 ps-4">Type</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="form-control basicSelect" id="tags1"
                                                                    name="tags" multiple="multiple">
                                                                    <option selected="selected">orange</option>
                                                                    <option>white</option>
                                                                    <option selected="selected">purple</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 Account event_info my-3 px-0 py-2">
                                                        <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media
                                                            (If Any)
                                                        </h4>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <input type="text" placeholder="LinkedIn"
                                                            id="linkedin1" name="linkedin"
                                                            class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                                            autocomplete="off">
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <input type="text" placeholder="Twitter"
                                                            id="twiiter1" name="twitter"
                                                            class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                                            autocomplete="off">
                                                    </div>




                                                </div>
                                        </div>


                                        <div class="col-12 px-0 py-3 d-flex justify-content-center gap-2 fotter_button"
                                            id="btn11">
                                            <button type="button"
                                                class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2"
                                                data-bs-dismiss="modal">CANCEL</button>
                                            <button type="submit"
                                                class=" shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE
                                                CHANGES</button>
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
                        <!-- edit guest end-->
                    </div>
                </div>
            </div>

            <div class="modal fade Create-Guest-modal" id="viewguestinfo" data-bs-backdrop="static" tabindex="-1"
                aria-labelledby="viewguestinfoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header py-2 px-4">
                            <h5 class="modal-title fs-20 text-theme2 fw-bold" id="viewguestinfoLabel">Import CSV File
                            </h5>
                            <i class="imgr img-times fs-20 text-theme2" data-bs-dismiss="modal" aria-label="Close"></i>
                        </div>
                        <form action="{{ route('addguestcsv') }}" method="post" class="modal-form col-12"
                            enctype="multipart/form-data">
                            <div class="modal-body p-4">
                                @csrf
                                <input type="hidden" name="mid" value="{{ $id }}">
                                <div class="input-group">
                                    <label class="input-group-text p-5 justify-content-center w-100 rounded-4 bg-white"
                                        for="inputGroupFile01">
                                        <div class="gap-3">
                                            <div class="w-44px h-44px mx-auto">
                                                <img class="w-100"
                                                    src="{{ asset('/public/new-design/img//icon/upload.svg') }}"
                                                    alt="">
                                            </div>
                                            <span class="fs-30 fw-bold text-muted d-block">Drag & Drop</span>
                                            <span class="d-block fs-18 fs-16 fs-sm-18 fs-md-25">A <span
                                                    class="textHover text-primary">.csv</span> file here or click</span>

                                        </div>
                                    </label>
                                    <input type="file" class="form-control d-none" name="eventfile"
                                        id="inputGroupFile01">
                                </div>
                            </div>
                            <div class="modal-footer pt-4 justify-content-center">
                                <button type="submit"
                                    class="btn btn-outline-dark fs-14 fw-500 px-4 text-uppercase">Cancel</button>
                                <button type="submit"
                                    class="btn btn-theme1 fs-14 text-white fw-500 px-4 text-uppercase">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <div class="row" style="border:none">
            <!-- <div class="col-3" style="border:none">
                                                                            <div class="card mb-3">
                                                                                <div class="card-heading p-3">
                                                                                    <input type="hidden" value="{{ $id }}" id="id">
                                                                                   
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div> -->

            <div class="col-9">

                <div class="card-body">
                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                    <div class="datatable table-responsive">


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- <div id="output"></div> --}}
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
                                                        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script> -->
    <style>
        .oncClickDisabled {
            display: grid;
        }

        .oncClickDisabled span {
            display: none;
        }

        .oncClickDisabled.active i {
            display: none;
        }

        .oncClickDisabled.active span {
            display: block;
        }

        .oncClickDisabled.active {
            pointer-events: none;
        }

        .disabledClick {
            pointer-events: none
        }
        label .guestAddImg:nth-of-type(1n + 1) {
            background: lightblue;
        }
        .guestAddImg img{
            object-fit: cover;
            object-position: center;
        }

    </style>

<script>
    function openmodal(id, mid) {
        // alert('yes');
        $('#btn11').removeClass('d-none');
        $('#viewguest').addClass('d-none');
        $('#editguest').removeClass('d-none');
        $('.' + id).addClass('active');
        $('.oncClickDisabled').addClass('disabledClick');
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
                    mid: mid,
                },
                success: function(response) {
                    $('.' + id).removeClass('active');
                    $('.oncClickDisabled').removeClass('disabledClick');

                    $('#twiiter1').val(response.data.twitter);
                    $('#linkedin1').val(response.data.linkedin);

                    $('#mnumber1').val(response.data.mobileno);
                    $('#organization1').val(response.data.orgenization);
                    $('#jobtitle1').val(response.data.jobtitle);
                    $('#email1').val(response.data.eveemail);
                    $('#lname1').val(response.data.evelastname);
                    $('#fname1').val(response.data.evefirstname);
                    $(`#status1 option[value="${response.data.type}"]`).attr("selected", "selected");
                    $(`#status2 option[value="${response.data.nmtitle}"]`).attr("selected", "selected");
                    $(`#select2-data-1-m5lt option[value="${response.data.tags}"]`).attr("selected",
                        "selected");
                    $(`#nmtype1 option[value="${response.data.nmtype}"]`).attr("selected", "selected");

                    $("#image1").children().remove();


                    if (response.success == 0) {
                        $("#image1").children().remove();
                        fname = response.data.evefirstname.substr(0, 1).toUpperCase();
                        lname = response.data.evelastname.substr(0, 1).toUpperCase();


                        $("#image1").append(
                            `<input class="d-none" type="file" name="guimage" id="guimage"><label for="guimage">
                                <div class="guestAddImg w-80px h-80px rounded-pill overflow-hidden align-items-center d-flex justify-content-center"><p class="m-0 fs-24 fw-bold">${fname}${lname} </p> </div>
                                </label>
                            `
                        );
                    } else {
                        $("#image1").append(
                            `<input class="d-none" type="file" name="guimage" id="guimage" value="${response.data.guestimage}"><label for="guimage">
                                <div class="guestAddImg w-80px h-80px rounded-pill overflow-hidden align-items-center d-flex justify-content-center"><img id="imgg" class="w-100 h-100" src="{{ asset('public/imgs/${response.data.guestimage}') }}" alt="" height="65px" width="65px"> </div>
                                </label>`
                        );
                    }

                    $('#exampleModal1').modal('toggle');
                    $('#exampleModal1').modal('show');
                }
            })
        }

        function viewmodal(id, mid) {
            // $('#exampleModal2').modal('toggle');
            // $('#exampleModal2').modal('show');
            $('.view' + id).addClass('active');
            $('.oncClickDisabled').addClass('disabledClick');
            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('viewvisitor') }}",
                type: "post",
                data: {
                    id: id,
                    mid: mid,
                },
                success: function(response) {
                    console.log(response);
                    $('.view' + id).removeClass('active');
                    $('.oncClickDisabled').removeClass('disabledClick');
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
                    $(`#select2-data-1-m5lt option[value="${response.tags}"]`).attr("selected", "selected");
                    $(`#nmtype1 option[value="${response.nmtype}"]`).attr("selected", "selected");
                    $('#btn11').addClass('d-none');
                    $('#editguest').addClass('d-none');
                    $('#viewguest').removeClass('d-none');
                    $('#exampleModal1').modal('toggle');
                    $('#exampleModal1').modal('show');
                }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>


    <script></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
            matchdatatable();
            var id = $('#id').val();
            // var visit = $('.visit').val();
            var allval = $("input[type='checkbox'].allval:checked").val();
            var visit = $("input[type='radio'].visit:checked").val();
            var type = $("input[type='radio'].type:checked").val();

            function matchdatatable() {
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
                        "url": '<?php echo URL::asset('view_eventdetail_dt'); ?>?visit=' + visit + '&type=' + type + '&id=' + id +
                            '&allval=' + allval,
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
                            "data": "checkb",
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

            $('#flexCheckIndeterminate').click(function(event) {
                if (this.checked) {
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });

            $('.delbtn').on('click', function() {
                var vid = '';
                var arr = $("input[name='id[]']:checked").map(function() {
                    vid = $(this).data('mid');
                    return this.value;
                }).get();
                console.log(vid);
                console.log(arr);
                if (arr.length != 0) {
                    $.ajax({
                        type: "POST",
                        data: {
                            id: arr,
                            vid: vid,
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ route('multideleteguest') }}",
                        success: function(msg) {
                            window.location.reload()
                        }

                    });
                }
            })
            $('.visit').change(function() {
                $("input:checkbox").removeAttr("checked");
                $('#allmatches_datatable').DataTable().destroy();
                matchdatatable();

            });
            $('.type').change(function() {
                $("input:checkbox").removeAttr("checked");
                $('#allmatches_datatable').DataTable().destroy();
                matchdatatable();
            });
            $('.allval').change(function() {
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
        $(document).ready(function() {
            $('#example').DataTable({
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'os',
                    selector: 'td:first-child'
                },
                order: [
                    [1, 'asc']
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".guestFilterBtn").click(function() {
                $(".guests").toggleClass("filterShow");
            });
            $('.basicSelect').select2({
                tags: true,
            });
        });
    </script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // any initialisation options go here
        });
    </script>
@endpush
