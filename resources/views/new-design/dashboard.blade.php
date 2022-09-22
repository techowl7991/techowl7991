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
            <div class="text-end"><button class="shadow-none border-0 text-white bg-theme1 rounded fs-14 fw-500 px-4 py-2">CREATE GUEST</button></div>
        </div>
        <div class="col-12 mt-4">
            <!-- Data Table -->
        </div>
    </div>
</div>

@endsection
@push('scripts')
@endpush