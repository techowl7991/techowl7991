@extends('new-design.main2')

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

<div class="container-fluid Main_Dashboard">
    <div class="row">
        <div class="col-xl-3 col-sm-4 mb-sm-0 mb-3">
            <div class="card border-0 rounded">
                <div class="card-body p-md-3 p-sm-2 p-3">
                    <div class="card-title"><i class="imgr img-check fs-20 rounded p-1 check-icon"></i></div>
                    <div class="card-subtitle text-center lh-1 pt-1 fs-md-50 fs-35 text-theme2 fw-bold">123,000</div>
                    <div class="card-text fs-16 text-theme2 fw-normal text-center">ATTENDING</div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-4 mb-sm-0 mb-3">
            <div class="card border-0 rounded">
                <div class="card-body p-md-3 p-sm-2 p-3">
                    <div class="card-title"><i class="imgr img-times fs-20 rounded py-1 px-2 close-icon"></i></div>
                    <div class="card-subtitle text-center lh-1 pt-1 fs-md-50 fs-35 text-theme2 fw-bold">20</div>
                    <div class="card-text fs-16 text-theme2 fw-normal text-center">NOT ATTENDING</div>

                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-4">
            <div class="text-end"><button class="shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-500 px-4 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">CREATE GUEST</button></div>
        </div>
        <div class="col-12 mt-4">
            <!-- Data Table -->
        </div>
    </div>
</div>

<!-- Modal Of Create Guest -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade Create-Guest-modal" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header py-3 border-0">
                <h5 class="modal-title fs-20 text-theme2 fw-bold" id="exampleModalLabel">Edit Guest Information</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <i class="imgr img-times fs-20" data-bs-dismiss="modal" aria-label="Close"></i>
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
                                    <!-- <div class="col-12 mb-2 form-floating Tel_Input_group">
                                        <input type="tel" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="phone" placeholder="Now Comms Asia">
                                        <label for="phone" class="fs-12 ps-4">Organisation</label>
                                    </div> -->
                                    <!-- <div class="col-12">
                                        <input type="tel" id="phone">
                                    </div> -->
                                    <div class="col-12 mb-2 form-floating">
                                        <input type="tel" class="form-control w-100 h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 pt-4 fs-16 fw-normal" id="floatingInputValue5" placeholder="Now Comms Asia" value="Now Comms Asia">
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


            <!-- <div class="modal-footer justify-content-center">
                <button type="button" class="btn shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                <button type="button" class="btn shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2">SAVE CHANGES</button>
            </div> -->
        </div>
    </div>
</div>

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