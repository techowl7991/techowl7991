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
            <div class="fs-sm-30 fs-25 fw-bold text-theme1">Setting</div>
        </div>
        <div class="col-sm-auto">
            <button class="shadow-none border-0 text-white top_right_export_btn bg-theme1 rounded fs-14 fw-500 px-sm-4 px-3  py-2">SAVE CHANGES</button>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-10 mb-3 text-theme2 fw-bold fs-sm-25 fs-20">Event Information</div>
        <div class="col-10 comman-form">
            <form action="">
                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="text" placeholder="Event Title" class="form-control shadow-none rouded-0 Inpt w-100 border-0 px-3 py-2 fs-16 fw-normal" autocomplete="off" required>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" placeholder="Event Link" class="form-control shadow-none rouded-0 Inpt w-100 border-0 px-3 py-2 fs-16 fw-normal" autocomplete="off" required>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" placeholder="Address" class="form-control shadow-none rouded-0 Inpt w-100 border-0 px-3 py-2 fs-16 fw-normal" autocomplete="off" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush