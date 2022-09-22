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

@endpush
@push('styles')
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
<div class="modal fade Create-Guest-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                    <div class="col-12 my-3">
                        <div class="row">
                            <div class="col-3">
                                <!-- userName -->
                                <div class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center bg-dark"><span class="fs-30 text-white fw-bold">DW</span></div>
                                <!-- user-Name End -->

                                <!-- user_img -->
                                <div class="d-none">
                                    <input class="form-control d-none" type="file" id="chooseFile">
                                    <label for="chooseFile" class="h-80px w-80px rounded-circle d-flex justify-content-center align-items-center bg-dark text-white"><img src="{{ asset('/public/new-design/img/USER.jpg') }}" alt="" class="w-100 rounded-circle"></label>
                                </div>
                                <!-- user-img End -->
                            </div>

                            <div class="col-9">
                                <form action="" class="modal-form">
                                    <!-- <div class="col-12 input-group mb-3">
                                        <select class="form-select shadow-none Inpt border-0" id="inputGroupSelect01">
                                            <option class="choose py-1" selected="">Select Timezone</option>
                                            <option class="choose py-1" value="1">One</option>
                                            <option class="choose py-1" value="2">Two</option>
                                            <option class="choose py-1" value="3">Three</option>
                                        </select>
                                    </div> -->
                                    <div class="col-12 form-floating">
                                        <select class="form-select shadow-none Inpt border-0" id="floatingSelect" aria-label="Floating label select example">
                                            <option lass="choose py-1" selected>Open this select menu</option>
                                            <option lass="choose py-1" value="1">One</option>
                                            <option lass="choose py-1" value="2">Two</option>
                                            <option lass="choose py-1" value="3">Three</option>
                                        </select>
                                        <label for="floatingSelect" class="fs-12">Status</label>
                                    </div>
                                    <div class="col-3 form-floating">
                                        <select class="form-select shadow-none Inpt border-0" id="floatingSelect" aria-label="Floating label select example">
                                            <option lass="choose py-1" selected>Open this select menu</option>
                                            <option lass="choose py-1" value="1">One</option>
                                            <option lass="choose py-1" value="2">Two</option>
                                            <option lass="choose py-1" value="3">Three</option>
                                        </select>
                                        <label for="floatingSelect" class="fs-12">Status</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
@endpush