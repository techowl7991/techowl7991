@extends('main3')

@push('meta')
    <title>Campaign Information</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row Campaign_page pb-5">
            <div class="col-sm-6 mb-sm-0 mb-4">
                <div class="text-theme1 fs-20 fs-md-30 fw-600 mb-sm-5 mb-3">Campaign Information</div>
                <div class="comman-form ">
                    <form action="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-12 mb-3 form-floating">
                                <input type="text"
                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0  fs-sm-16 fs-14 fw-normal"
                                    id="floatingInputValue2" placeholder="Testing here" value="Testing here">
                                <label for="floatingInputValue2" class="fs-12 ps-3">Campaign Name</label>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="email" placeholder="Email Subject*"
                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 fs-sm-16 fs-14 fw-normal"
                                    autocomplete="off" required="">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" placeholder="From*"
                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 fs-sm-16 fs-14 fw-normal"
                                    autocomplete="off" required="">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" placeholder="Reply-to Email*"
                                    class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 fs-sm-16 fs-14 fw-normal"
                                    autocomplete="off" required="">
                            </div>
                            <div class="col-12 mb-5 text-sm-start text-center">
                                <button type="submit"
                                    class="btn shadow-none border-0 text-white rounded fs-14 fw-600 customDarkBtn"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">SEND A TEST</button>
                            </div>
                            <div class="col-12 mb-3 fs-md-25 fs-sm-20 fs-16 fw-bold text-theme2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal3">Send now or schedule</div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label fs-sm-16 fs-14 fw-normal" for="flexRadioDefault1">Send
                                        now</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label fs-sm-16 fs-14 fw-normal"
                                        for="flexRadioDefault2">Schedule for later</label>
                                </div>
                            </div>
                           <div class="row scheduleLater d-none mt-3">
                                <div class="col-sm-6 mb-3 flatpickr ">
                                    <input type="text" placeholder="Date" class="form-control calendar shadow-none rouded-0 Inpt w-100 h-50px border-0 fs-sm-16 fs-14 fw-normal" id="basicDate"  readonly="" required>
                                    <div class="invalid-feedback fs-14">

                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <input type="time" placeholder="Time" class="form-control clock shadow-none rouded-0 Inpt w-100 h-50px border-0 fs-sm-16 fs-14 fw-normal" required>
                                    <div class="invalid-feedback fs-14">

                                    </div>
                                </div>
                                <div class="col-12 input-group mb-3">
                                    <select class="form-select shadow-none h-50px fs-sm-16 fs-14 Inpt border-0"
                                        id="inputGroupSelect01">
                                        <option class="choose py-1" selected="">Select Timezone</option>
                                        <option class="choose py-1" value="1">One</option>
                                        <option class="choose py-1" value="2">Two</option>
                                        <option class="choose py-1" value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3 text-sm-start text-center">
                                    <button type="submit"
                                        class="shadow-none border-0 text-white rounded fs-14 fw-bold px-sm-4 py-sm-2 px-3 py-1 customDarkBtn"
                                        data-bs-toggle="modal" href="#exampleModalToggle" id="scheduledate" role="button">SCHEDULE TO
                                        SEND</button>
                                </div>
                           </div>

                        </div>
                    </form>
                </div>

            </div>
            <div class="col-sm-6 d-flex align-items-center justify-content-center">
                <div
                    class="email_builder bg-theme2 w-100 h-100 mx-md-3 my-3 d-flex align-items-center justify-content-center">
                    <div class="text-theme1 fs-lg-60 fs-md-50 fs-sm-40 fs-30 lh-1 fw-normal">Email Builder</div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Of Send a Test Email -->

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Launch demo modal
            </button> -->

    <!-- Modal -->
    <div class="modal fade Create-Guest-modal email-modal " id="exampleModal" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-white">
                <div class="modal-header px-4 pt-4 mb-3 m-0">
                    <h5 class="modal-title fs-20 text-theme2 fw-bold ps-1" id="exampleModalLabel">Send a Test Email</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <i class="imgr img-times fs-20 text-theme2 pe-1" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body p0">
                    <div class="row px-0 mx-0">
                        <form action="" class="modal-form col-12 needs-validation" novalidate>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="email" placeholder="Email"
                                        class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 fs-16 fw-normal"
                                        autocomplete="off" required>
                                    <span class="fs-12 emailAddressSpan">You can send a test email to up to 15 email
                                        addresses.</span>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>


                                <div class="col-12 px0 py-3 d-flex justify-content-start gap-2 ">
                                    <button type="button" class="btn btn-outline-theme2 shadow-none rounded cancle_btn fs-14 fw-bold px-4 "
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"
                                        class="btn btn-theme1 shadow-none border-0 text-white rounded fs-14 fw-bold px-4  top_right_export_btn">SEND</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Of Schedule Email? -->

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            Launch demo modal
            </button> -->

    <!-- Modal -->
    <div class="modal fade Create-Guest-modal email-modal" id="exampleModalToggle" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white">
                <div class="modal-header px-4 pt-3 mb-3 m-0">
                    <h5 class="modal-title fs-20 text-theme2 fw-600" id="exampleModal2Label">Schedule Email?</h5>
                    <i class="imgr img-times fs-20 text-theme2" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body p0">
                    <div class="row px-0 mx-0">
                        <form action="" class="modal-form col-12 needs-validation" novalidate>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="fs-16 text-theme2">[Campagin Name]will send this email to a total of 1,000
                                        recipient(s) on September 24, 2022 at 1:00 AM (Asia/Singapore).</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 py-3 px-4 d-flex justify-content-start gap-2">
                    <button type="button" class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2"
                        data-bs-dismiss="modal">CANCEL</button>
                    <button
                        class="btn shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2 top_right_export_btn"
                        data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">SCHEDULE</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Of Send Now? -->

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
        Launch demo modal
            </button> -->

    <!-- Modal -->
    <div class="modal fade Create-Guest-modal email-modal" id="exampleModalToggle2" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white">
                <div class="modal-header px-4 pt-3 mb-3 m-0">
                    <h5 class="modal-title fs-20 text-theme2 fw-bold" id="exampleModal3Label">Send Now?</h5>
                    <i class="imgr img-times fs-20 text-theme2 pe-1" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body p0">
                    <div class="row px-0 mx-0">
                        <form action="" class="modal-form col-12 needs-validation" novalidate>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="fs-16 text-theme2">[Campagin Name] will start sending this email to a total
                                        of 2 recipient(s) right away.</div>
                                </div>
                                <div class="col-12 px0 py-3 d-flex justify-content-start gap-2 ">
                                    <button type="button" class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2"
                                        data-bs-dismiss="modal">CANCEL</button>
                                    <a href="{{route('view_email')}}"
                                        class=" shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-bold px-4 py-2 top_right_export_btn text-decoration-none">CONFIRM</a>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.getElementById('scheduledate').onclick = function() {
            document.getElementById('basicDate').removeAttribute('readonly');
        };
    </script>
@endpush
