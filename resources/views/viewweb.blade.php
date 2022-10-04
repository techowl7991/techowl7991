@extends('main3')

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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<div class="container-fluid newPage vh-100 m-n4">
    <div class="row">
        <div class="col-12 py-5 customBg bg-theme1">
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <div class="imgOuter w-100 rounded-15 overflow-hidden border bg-white" style="    height: 240px;">
                                {{-- <img class="w-100" src="{{ asset('/public/new-design/img/new-demo-img.jpg') }}" alt="">--}}
                                <img class="w-100 h-100" src="{{ asset('/public/eventimgs/'.$data['event_image']) }}" alt="">
                                
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card bg-white h-100 p-2 rounded-15">
                                <div class="card-header bg-white p-3 border-0 ">
                                    <div class="cardHeading fs-24">{{$data['event_name']}}</div>
                                </div>
                                <div class="card-body p-3 align-items-end d-grid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="timeTitle text-uppercase fs-10 fw-bold">Start Time</div>
                                                    <div class="startValue fs-14 mt-1"><Span>{{date('d M',strtotime($data['event_startdate']))}}</Span>, <span>{{$data['event_starttime']}}</span></div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="timeTitle text-uppercase fs-10 fw-bold">End Time</div>
                                                    <div class="startValue fs-14 mt-1"><Span>{{date('d M',strtotime($data['event_enddate']))}}</Span>, <span>{{$data['event_endtime']}}</span></div>
                                                </div>
                                                <div class="col-2">
                                                    <a class="w-40px h-40px rounded-5 border align-items-center d-flex justify-content-center" href=""><img src="{{ asset('/public/new-design/img/icon/calendar.svg') }}" alt=""></a>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-theme1 text-white fs-14 w-100 p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-7 description">
                        <div class="row">
                            <div class="col-12">
                                <div class="title fs-24 fw-bold text-theme1 pb-1 border-bottom border-2 border-theme1 d-inline-block">Description</div>
                            </div>
                            <div class="col-12 mt-4">
                                {{$data['event_description']}}
                                <!-- <div class="decriptionTxt fs-14">
                                The BYP Network Leadership Conference is back in full force this October during the UK’s Black History Month. Our flagship annual event, which has become the go to conference for thousands of Black professionals all over the world and our allies, will take place both virtually and in person on 6th October followed by a virtual careers fair on 7th  October. 
                                <br>
                                &nbsp;
                                <br>
                                This year’s theme is Knowledge Is Power; the more knowledge a person or community gains, the more powerful they become.  To help you harness your inner power and be the best version of yourself, we have put together a comprehensive programme packed with inspiring speakers, trailblazers  and change makers across many industries including sport, entertainment, tech, legal, political, education and much more!
                                <br>
                                &nbsp;
                                <br>
                                Our impactful keynote sessions, informative break-outs and interactive workshops will provide you with valuable insights that will help power your leadership journey.
                                </div>
                                <div class="my-3 fs-14">Attend the event to:</div>
                                <ul class="p-0">
                                    <li class=" mt-2 ms-3">Hear from over 60 inspiring and engaging speakers</li>
                                    <li class="my-2  ms-3">Learn from their stories, their thought leadership and expertise</li>
                                    <li class="my-2  ms-3">Meet fellow community members and network with leading companies</li>
                                </ul>
                                <div class="decriptionTxt fs-14"> Interested in a career pivot, a promotion or a new job? Leading companies that are committed to hiring Black professionals will be on-hand to explain what they have to offer in an exhibition running alongside the conference. You’ll also be able to speak to recruiters and learn new skills at the virtual careers fair. </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-5 rightPart">
                        <div class="row gap-3">
                            <div class="col-12">
                                <div class="card rounded-15 overflow-hidden">
                                    <div class="card-header p-3 bg-white border-0">
                                        <div class="row">
                                            <div class="col-auto">
                                                    <div class="w-50px h-50px rounded-5 border align-items-center d-flex justify-content-center"><img src="{{ asset('/public/new-design/img/guests.png') }}" alt=""></div>
                                            </div>
                                            <div class="col">
                                                <div class="fs-14 text-muted">Hosted by</div>
                                                <a href="" class="text-theme1 text-decoration-none fs-18 fw-bold">{{$data['event_organizer']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="text fs-14">We connect black professionals with each other and corporations</div>
                                        <div class="socialIcon mt-3">
                                            <ul class="m-0 p-0 list-unstyled d-flex gap-3">
                                                <li><a class="text-theme1" href=""><i class="imgl img-globe"></i></a></li>
                                                <li><a class="text-theme1" href=""><i class="imgb img-facebook-f"></i></a></li>
                                                <li><a class="text-theme1" href=""><i class="imgb img-twitter"></i></a></li>
                                                <li><a class="text-theme1" href=""><i class="imgr img-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 position-relative">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mapOuter rounded-15 overflow-hidden">
                                            <iframe src="{{$mapurl}}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-11 mx-auto position-absolute start-0 end-0 bottom-20px">
                                        <div class="card border-0 p-2">
                                            <span class="fs-12 text-muted">{{$data['event_sub_type']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="fs-14 text-muted">Share on</div>
                                <ul class="p-0 m-0 list-unstyled d-flex gap-3 mainSocial mt-1">
                                    <li><a class="text-white w-36px h-36px bg-theme1 d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-linkedin-in"></i></a></li>
                                    <li><a class="text-white w-36px h-36px bg-theme1 d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-facebook-f"></i></a></li>
                                    <li><a class="text-white w-36px h-36px bg-theme1 d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-twitter"></i></a></li>
                                    <li><a class="text-white w-36px h-36px bg-theme1 d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgl img-comment-alt-dots"></i></a></li>
                                    <li><a class="text-white w-36px h-36px bg-theme1 d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


<!-- Modal -->
    {{--<div class="modal fade Create-Guest-modal" id="register" data-bs-backdrop="static" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header py-3 border-0">
                    <h5 class="modal-title fs-20 text-theme2 fw-bold" id="registerLabel">Add Guest Information</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <i class="imgr img-times fs-20 text-theme2" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body p-0">
                    <div class="row px-0 mx-0">
                        <div class="col-12 Account event_info px-0 py-2">
                            <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Guest Information</h4>
                        </div>
                        <form action="" class="modal-form col-12 mt-3">
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
                                                <option lass="choose py-1" value="verified">Verified</option>
                                                <option lass="choose py-1" value="RSVP">RSVP</option>
                                            </select>
                                            <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                        </div>
                                        <div class="col-4 mb-2 form-floating">
                                            <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect" aria-label="Floating label select example">
                                                <option lass="choose py-1" selected>Ms.</option>
                                                <option lass="choose py-1" value="1">One</option>
                                                <option lass="choose py-1" value="2">Two</option>
                                                <option lass="choose py-1" value="3">Three</option>
                                            </select>
                                            <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                        </div>
                                        <div class="col-4 mb-2 form-floating">
                                            <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue" placeholder="Dawn" value="Dawn">
                                            <label for="floatingInputValue" class="fs-12 ps-4">First Name</label>
                                        </div>
                                        <div class="col-4 mb-2 form-floating">
                                            <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue1" placeholder="Wong" value="Wong">
                                            <label for="floatingInputValue1" class="fs-12 ps-4">Last Name</label>
                                        </div>
                                        <div class="col-12 mb-2 form-floating">
                                            <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue2" placeholder="dawn.wong@nowcomms.asia" value="dawn.wong@nowcomms.asia">
                                            <label for="floatingInputValue2" class="fs-12 ps-4">Email</label>
                                        </div>
                                        <div class="col-6 mb-2 form-floating">
                                            <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue3" placeholder="Administrator" value="Administrator">
                                            <label for="floatingInputValue3" class="fs-12 ps-4">Job Title</label>
                                        </div>
                                        <div class="col-6 mb-2 form-floating">
                                            <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue4" placeholder="Now Comms Asia" value="Now Comms Asia">
                                            <label for="floatingInputValue4" class="fs-12 ps-4">Organisation</label>
                                        </div>
                                        <div class="col-12 mb-2 form-floating">
                                            <input type="tel" class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue5" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="123-45-678">
                                            <label for="floatingInputValue5" class="fs-12 ps-4">Mobile Number</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control basicSelect" multiple="multiple">
                                                <option >orange</option>
                                                <option>white</option>
                                                <option >purple</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 Account event_info my-3 px-0 py-2">
                                    <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media (If Any)</h4>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" placeholder="LinkedIn" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <input type="text" placeholder="Twitter" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                                </div>

                                <div class="col-12 px-0 py-3 d-flex justify-content-center gap-2 fotter_button">
                                    <button type="button" class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" class=" shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE CHANGES</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

<!-- add guest start-->
    <div class="modal fade Create-Guest-modal" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header py-3 border-0">
                    <h5 class="modal-title fs-20 text-theme2 fw-bold" id="exampleModalLabel">Add Guest
                        Information</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <i class="imgr img-times fs-20" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body p-0">
                    <div class="row px-0 mx-0">
                        <div class="col-12 Account event_info px-0 py-2">
                            <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Guest Information</h4>
                        </div>
                        <form action="{{ route('addverguest') }}" method="post" class="modal-form col-12 mt-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="mid" value="{{ $mid }}">
                            <div class="row">
                                <div class="col-3 d-flex justify-content-center">
                                    <!-- userName -->
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
                                            <select class="form-select h-50px shadow-none Inpt border-0"
                                                id="floatingSelect" name="type"
                                                aria-label="Floating label select example" readonly>
                                                <!-- <option lass="choose py-1">Open this select menu</option> -->
                                                <option lass="choose py-1" value="verified">Verified</option>
                                                <!-- <option lass="choose py-1" value="RSVP">RSVP</option> -->
                                            </select>
                                            <label for="floatingSelect" class="fs-12 ps-4">Status</label>
                                        </div>
                                        <div class="col-4 mb-2 form-floating">
                                            <select class="form-select h-50px shadow-none Inpt border-0"
                                                id="floatingSelect" name="nmtitle"
                                                aria-label="Floating label select example">
                                                <option lass="choose py-1">Choose.</option>
                                                <option lass="choose py-1" value="Mr">Mr</option>
                                                <option lass="choose py-1" value="Mrs">Mrs</option>
                                                <!-- <option lass="choose py-1" value="3">Three</option> -->
                                            </select>
                                            <label for="floatingSelect" class="fs-12 ps-4">Status</label>
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
                                                id="floatingInputValue2" placeholder="dawn.wong@nowcomms.asia"
                                                name="eveemail" value="">
                                            <label for="floatingInputValue2" class="fs-12 ps-4">Email</label>
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
                                                id="floatingInputValue5" placeholder="Enter Mobile Number"
                                                name="mobileno" value="">
                                            <label for="floatingInputValue5" class="fs-12 ps-4">Mobile
                                                Number</label>
                                        </div>
                                        <div class="col-6 mb-2 form-floating">
                                            <select class="form-select h-50px shadow-none Inpt border-0"
                                                id="floatingSelect1" name="nmtype"
                                                aria-label="Floating label select example1">
                                                <option lass="choose py-1">Choose.</option>
                                                <option lass="choose py-1" value="VIP">VIP</option>
                                                <option lass="choose py-1" value="Reg">Regular</option>
                                                <!-- <option lass="choose py-1" value="3">Three</option> -->
                                            </select>
                                            <label for="floatingSelect" class="fs-12 ps-4">Type</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-control basicSelect" name="tags"
                                                multiple="multiple">
                                                <option >orange</option>
                                                <option>white</option>
                                                <option >purple</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 Account event_info my-3 px-0 py-2">
                                    <h4 class="m-0 heading fw-bold text-white px-3 fs-16">Social Media (If Any)
                                    </h4>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" placeholder="LinkedIn" name="linkedin"
                                        class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                        autocomplete="off">
                                </div>

                                <div class="col-12 mb-3">
                                    <input type="text" placeholder="Twitter" name="twitter"
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

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        
        $('.basicSelect').select2({
        tags: true,
        });
    });
</script>
@endpush