@extends('main2')

@push('meta')
<title>Analytics</title>

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
            <div class="fs-sm-30 fs-25 fw-bold text-theme1">Booth Name</div>
        </div>
        <div class="col-sm-auto d-flex align-items-center gap-2">
            <button class=" shadow-none rounded cancle_btn fs-14 fw-bold px-sm-4 px-3 py-2">CANCEL</button>
            <button class="shadow-none border-0 text-white top_right_export_btn bg-theme1 rounded fs-14 fw-500 px-sm-4 px-3  py-2 ">EXPORT REPORT</button>
        </div>
    </div>
    <div class="row mx-0 mb-4">
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
    </div>
    <div class="row mx-0">
        <div class="col-12 fs-sm-25 fs-20 text-theme2 fw-bold mb-3">Breakdown</div>
        <div class="col-lg-10 col-12 table-responsive analytics_table">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col" class="fs-16 fw-bold text-theme2">First Name</th>
                        <th scope="col" class="fs-16 fw-bold text-theme2">Last Name</th>
                        <th scope="col" class="fs-16 fw-bold text-theme2">Job Title</th>
                        <th scope="col" class="fs-16 fw-bold text-theme2">Organisation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>user</td>
                        <td>Tok</td>
                        <td>Platform Lead</td>
                        <td>Now Comms Asia</td>
                    </tr>
                    <tr>
                        <td>user</td>
                        <td>Ton</td>
                        <td>Platform Lead</td>
                        <td>Now Comms Asia</td>
                    </tr>
                    <tr>
                        <td>user</td>
                        <td>Tok</td>
                        <td>Platform Lead</td>
                        <td>Now Comms Asia</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush