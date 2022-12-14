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

<div class="container-fluid newPage vh-100">
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <div class="row">
                    <div class="col-7">
                        <div class="imgOuter w-100 rounded-15 overflow-hidden" style="    height: 260px;">
                            <img class="w-100" src="{{ asset('/public/new-design/img/new-demo-img.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card bg-white h-100 p-2 rounded-15">
                            <div class="card-header bg-white p-3 border-0 ">
                                <div class="cardHeading fs-24">Leadership Conference 2022: Knowledge Is Power (Hybrid)</div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="timeTitle text-uppercase fs-10 fw-bold">Start Time</div>
                                                <div class="startValue fs-14 mt-1"><Span>06 Oct</Span>, <span>11:30 AM</span></div>
                                            </div>
                                            <div class="col-5">
                                                <div class="timeTitle text-uppercase fs-10 fw-bold">End Time</div>
                                                <div class="startValue fs-14 mt-1"><Span>07 Oct</Span>, <span>10:30 AM</span></div>
                                            </div>
                                            <div class="col-2">
                                                <a class="w-40px h-40px rounded-5 border align-items-center d-flex justify-content-center" href=""><img src="{{ asset('/public/new-design/img/icon/calendar.svg') }}" alt=""></a>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-theme1 text-white fs-14 w-100 p-2" data-bs-toggle="modal" data-bs-target="#register">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 py-5">
                    <div class="row">
                        <div class="col-7 description">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title fs-24 fw-bold text-theme1 pb-1 border-bottom border-2 border-theme1 d-inline-block">Description</div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="decriptionTxt fs-14">
                                    The BYP Network Leadership Conference is back in full force this October during the UK???s Black History Month. Our flagship annual event, which has become the go to conference for thousands of Black professionals all over the world and our allies, will take place both virtually and in person on 6th October followed by a virtual careers fair on 7th  October. 
                                    <br>
                                    &nbsp;
                                    <br>
                                    This year???s theme is Knowledge Is Power; the more knowledge a person or community gains, the more powerful they become.  To help you harness your inner power and be the best version of yourself, we have put together a comprehensive programme packed with inspiring speakers, trailblazers  and change makers across many industries including sport, entertainment, tech, legal, political, education and much more!
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
                                    <div class="decriptionTxt fs-14"> Interested in a career pivot, a promotion or a new job? Leading companies that are committed to hiring Black professionals will be on-hand to explain what they have to offer in an exhibition running alongside the conference. You???ll also be able to speak to recruiters and learn new skills at the virtual careers fair. </div>
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
                                                        <div class="w-50px h-50px rounded-5 border align-items-center d-flex justify-content-center"><img src="{{ asset('/public/new-design/img/icon/calendar.svg') }}" alt=""></div>
                                                </div>
                                                <div class="col">
                                                    <div class="fs-14 text-muted">Hosted by</div>
                                                    <a href="" class="text-theme1 text-decoration-none fs-18 fw-bold">XYZ Network</a>
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
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14306.984751985208!2d73.050178!3d26.302326899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1664601449114!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-11 mx-auto position-absolute start-0 end-0 bottom-20px">
                                            <div class="card border-0 p-2">
                                                <div class="cardTitle fs-14">The Mermaid</div>
                                                <span class="fs-12 text-muted">Puddle Dock, London EC4V 3DB, UK</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="p-0 m-0 list-unstyled d-flex gap-3 mainSocial">
                                        <li><a class="text-white w-40px h-40px bg-theme1 rounded-pill d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-linkedin-in"></i></a></li>
                                        <li><a class="text-white w-40px h-40px bg-theme1 rounded-pill d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-facebook-f"></i></a></li>
                                        <li><a class="text-white w-40px h-40px bg-theme1 rounded-pill d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-twitter"></i></a></li>
                                        <li><a class="text-white w-40px h-40px bg-theme1 rounded-pill d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgl img-comment-alt-dots"></i></a></li>
                                        <li><a class="text-white w-40px h-40px bg-theme1 rounded-pill d-block align-items-center d-flex justify-content-center text-decoration-none" href=""><i class="imgb img-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade Create-Guest-modal" id="register" data-bs-backdrop="static" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
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
                                        <select class="form-select h-50px shadow-none Inpt border-0" id="floatingSelect" aria-label="Floating label select example">
                                            <option lass="choose py-1" selected>Open this select menu</option>
                                            <option lass="choose py-1" value="1">One</option>
                                            <option lass="choose py-1" value="2">Two</option>
                                            <option lass="choose py-1" value="3">Three</option>
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
</div>

@endsection
@push('scripts')
@endpush