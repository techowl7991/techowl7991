@extends('new-design.main2')

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
@endpush
@section('content')

<section class=" container-fluid guests px-sm-3">
    <div class="topBar pb-2 pb-lg-4">
        <div class="row justify-content-between">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div class="title text-theme1 fs-16 fs-sm-20 fs-md-30 fw-600 ">Guests</div>
                <div class="filterBtn text-theme1 d-lg-none  fs-16 fs-sm-20 fs-md-30 fw-600 "><button type="button"  class="btn guestFilterBtn btn-theme1 shadow-none w-30px h-30px w-sm-36px h-sm-6px align-items-center d-flex justify-content-center px-sm-4 p-2 "><img src="{{ asset('/public/new-design/img/guest-filter-light.png') }}" alt=""></button></div>
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
                                <img src="{{ asset('/public/new-design/img/guest-loder.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filterBody  flex-fill h-100 overflow-scroll overflow-lg-unset">
                    <ul class="list-unstyled p-0 m-0">
                        <li class="py-2 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="allguest" checked>
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="allguest"><span>All Guests</span><span class="value">6</span></label>
                            </div>
                        </li>
                        <li class="py-1 py-sm-2 px-2 px-sm-3 bg-theme2 text-white fs-13 fs-sm-14">Status</li>
                        <li class="pt-2 pb-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="verified">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="verified"><span>Verified</span><span class="value">6</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="unverified">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="unverified"><span>Unverified</span><span class="value">0</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="checkedin">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="checkedin"><span>Checked In</span><span class="value">0</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="checkedout">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="checkedout"><span>Checked Out</span><span class="value">0</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="attended">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="attended"><span>Attended</span><span class="value">0</span></label>
                            </div>
                        </li>
                        <li class="pb-2 pt-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="notattended">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="notattended"><span>Did Not Attend</span><span class="value">0</span></label>
                            </div>
                        </li>
                        <li class="bg-theme2"><button type="button" class="btn w-100 rounded-0 py-1 py-sm-2 px-2 px-sm-3 justify-content-between align-items-center d-flex text-white text-decoration-none fs-13 fs-sm-14 " data-bs-toggle="modal" data-bs-target="#grouping"><span>Groups</span> <i class="imgr img-plus fs-15 fs-sm-18"></i></button></li>
                        <li class="pt-2 pb-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="asia">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="asia"><span>Now Comms Asia</span><span class="value">5</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="brown">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="brown"><span>Brown Cow</span><span class="value">1</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="male">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="male"><span>Male</span><span class="value">3</span></label>
                            </div>
                        </li>
                        <li class="py-1 px-3">
                            <div class="form-check">
                                <input class="form-check-input border border-2 border-theme2 w-18px h-18px shadow-none rounded-4 mt-0" type="radio" name="filter" id="female">
                                <label class="form-check-label justify-content-between d-flex fs-12 fs-sm-14" for="female"><span>Female</span><span class="value">3</span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                    <div class="searchBar px-4 py-3 bg-white border-bottom border-2">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="input-group border border-1 rounded-5">
                                    <botton type="button" class="btn border-0 shadow-none bg-white p-0 searchbtn fs-14 px-2 align-items-center d-flex"><i class="imgr img-search fw-600"></i></botton>
                                    <input type="text" class="form-control shadow-none border-0 ps-1 py-1 h-29px h-lg-31 h-xl-35px" id="searchguest" placeholder="Search Guests" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-sm mt-3 mt-sm-0 d-flex gap-3 justify-content-sm-end">
                                <div><button type="btn" class="btn historyBtn btn-outline-light fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase">History</button></div>
                                <div class="dropdown">
                                    <button class="btn btn-theme1 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="me-3">Add guests</span><i class="imgr img-chevron-down"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-12 fs-sm-14" href="#">One by one</a></li>
                                        <li><a class="dropdown-item fs-12 fs-sm-14" href="#">Import CSV file</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="totalGuest px-4 py-3 bg-white">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-sm-auto col-xl-3">
                                <div class="geustValue">
                                    <span class="fs-12 text-theme2 ps-4">Viewing</span>
                                    <div class="countValue text-theme2 fs-14 fs-md-16 fs-xl-20 fw-bold mt-n2 mt-xl-n2"><span class="text-theme1 fs-16 fs-md-20 fs-xl-28">6</span> All Guests</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                                <div class="buttonsGroup d-sm-flex gap-2 d-inline-block">
                                    <button type="btn" class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0" disabled>Add to Group</button>
                                    <button type="btn" class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0" disabled>Change Status</button>
                                    <button type="btn" class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0" disabled>Export</button>
                                    <button type="btn" class="btn btn-theme2 fs-10 fs-lg-11 fs-xl-14  fw-600 text-uppercase my-1 my-sm-0" disabled>Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- grouping -->
<div class="modal fade" id="grouping" tabindex="-1" aria-labelledby="groupingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-md-40 w-lg-35">
        <div class="modal-content">
            <div class="modal-header border-bottom border-2 px-3 pt-3 pb-2 px-sm-4">
                <h5 class="modal-title fs-16 fs-sm-18 fs-md-20 fw-600" id="groupingLabel">Create New Group</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3 px-sm-4">
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" placeholder="Enter Group Name" value="Designers" class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 px-3 fs-13 fs-sm-15 fs-md-16 fw-normal text-theme2" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top border-2 py-3 justify-content-center">
                <button type="button" class="btn historyBtn fs-14 fw-600 text-uppercase p-2 px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-theme1 fs-14 fw-600 text-uppercase text-white p-2 px-3">Create</button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $(".guestFilterBtn").click(function() {
            $(".guests").toggleClass("filterShow");
        });
    });
</script>
@endpush