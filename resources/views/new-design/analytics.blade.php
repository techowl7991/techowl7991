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

<div class="container-fluid">
    <div class="row mx-0 mb-4 align-items-center">
        <div class="col mb-sm-0 mb-2">
            <div class="fs-sm-30 fs-25 fw-bold text-theme1">Analytics</div>
        </div>
        <div class="col-sm-auto"><button class="shadow-none border-0 text-white top_right_export_btn bg-theme1 rounded fs-14 fw-500 px-sm-4 px-3 py-2">EXPORT REPORT</button></div>
    </div>
    <div class="row mx-0 mb-3">
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-sm-6 col-12 mb-4">
            <div class="card border-0 rounded">
                <div class="card-body row mx-0">
                    <div class="col-auto">
                        <div class="card-title h-40px w-40px rounded-circle bg-theme2 d-flex align-items-center justify-content-center"><img src="{{ asset('/public/new-design/img/mouse.png') }}" alt=""></div>
                    </div>
                    <div class="col">
                        <div class="card-subtitle text-start lh-1 pt-1 fs-16 text-theme2 fw-normal">Unique Visitors</div>
                        <div class="card-text fs-20 text-theme2 fw-bold text-start">300</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-sm-6 col-12 mb-4">
            <div class="card border-0 rounded">
                <div class="card-body row mx-0">
                    <div class="col-auto">
                        <div class="card-title h-40px w-40px rounded-circle bg-theme2 d-flex align-items-center justify-content-center"><img src="{{ asset('/public/new-design/img/user-file.png') }}" alt=""></div>
                    </div>
                    <div class="col">
                        <div class="card-subtitle text-start lh-1 pt-1 fs-16 text-theme2 fw-normal">Total Page Views</div>
                        <div class="card-text fs-20 text-theme2 fw-bold text-start">32</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-sm-6 col-12 mb-4">
            <div class="card border-0 rounded">
                <div class="card-body row mx-0">
                    <div class="col-auto">
                        <div class="card-title h-40px w-40px rounded-circle bg-theme2 d-flex align-items-center justify-content-center"><i class="imgs img-users fs-20 rounded text-white pe-1 check-icon"></i></div>
                    </div>
                    <div class="col">
                        <div class="card-subtitle text-start lh-1 pt-1 fs-16 text-theme2 fw-normal">Invited Guests</div>
                        <div class="card-text fs-20 text-theme2 fw-bold text-start">20</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-sm-6 col-12 mb-4">
            <div class="card border-0 rounded">
                <div class="card-body row mx-0">
                    <div class="col-auto">
                        <div class="card-title h-40px w-40px rounded-circle bg-theme2 d-flex align-items-center justify-content-center"><i class="imgr img-check fs-20 rounded text-white p1 check-icon"></i></div>
                    </div>
                    <div class="col">
                        <div class="card-subtitle text-start lh-1 pt-1 fs-16 text-theme2 fw-normal">Checked In</div>
                        <div class="card-text fs-20 text-theme2 fw-bold text-start">4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-xxl-6 col-xl-7 col-lg-9 col-md-9 col-12 mb-5">
            <div class="card border-0 rounded">
                <div class="card-body row align-items-center py-4 mx-0">
                    <div class="col-sm-auto">
                        <div class="card-subtitle text-start lh1 fs-sm-16 fs-14 text-theme2 fw-bold">Attendees / Registrants (%)</div>
                        <div class="card-text fs-xl-60 fs-lg-50 fs-md-45 fs-sm-40 fs-35 text-theme1 lh-1 pt-2 fw-bold text-sm-center">5.65%</div>
                    </div>
                    <div class="col text-sm-end text-center mt-sm-0 mt-4 progress_bar">
                        <svg class="position-relative h-120px w-120px">
                            <circle class="w-100 h-100" cx="60" cy="60" r="50"></circle>
                            <circle class="w-100 h-100" cx="60" cy="60" r="50" style="--percent: 13"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 fs-sm-25 fs-20 text-theme2 fw-bold mb-3">Booth Data</div>
        <div class="col-lg-10 col-12 table-responsive analytics_table">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col" class="fs-16 fw-bold text-theme2">Booth Name</th>
                        <th scope="col" class="fs-16 fw-bold text-theme2">Visitor</th>
                        <th scope="col" class="fs-16 fw-bold text-theme2">View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>20</td>
                        <td><i toggle="#password-field" id="eye" class="imgs img-eye eye-icon"></i></td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>20</td>
                        <td><i toggle="#password-field" id="eye" class="imgs img-eye eye-icon"></i></td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>20</td>
                        <td><i toggle="#password-field" id="eye" class="imgs img-eye eye-icon"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush