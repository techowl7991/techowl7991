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


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endpush
@push('styles')
@endpush
@section('content')
<div class="container-fluid">
    <div class="row Campaign_page">
        <div class="col-6">
            <div class="text-theme1 fs-16 fs-sm-20 fs-md-30 fw-bold mb-5">Campaign Information</div>
            <div class="comman-form ">
                <form action="">
                    <div class="row">
                        <div class="col-12 mb-3 form-floating">
                            <input type="text" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 py-2 px-3 pt-4 fs-16 fw-normal" id="floatingInputValue2" placeholder="Testing here" value="Testing here">
                            <label for="floatingInputValue2" class="fs-12 ps-3">Campaign Name</label>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="email" placeholder="Email Subject*" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 py-2 px-3 fs-16 fw-normal" autocomplete="off" required="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" placeholder="From*" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 py-2 px-3 fs-16 fw-normal" autocomplete="off" required="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" placeholder="Reply-to Email*" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 py-2 px-3 fs-16 fw-normal" autocomplete="off" required="">
                        </div>
                        <div class="col-12 mb-5">
                            <button type="submit" class="shadow-none border-0 text-white bg-theme2 rounded fs-14 fw-bold px-4 py-2 top_right_export_btn">SEND A TEST</button>
                        </div>
                        <div class="col-12 mb-3 fs-25 fw-bold text-theme2">Send now or schedule</div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label fw-normal" for="flexRadioDefault1">Send now</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="checked">
                                <label class="form-check-label fw-normal" for="flexRadioDefault2">Schedule for later</label>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 flatpickr ">
                            <input type="text" placeholder="Date" class="form-control calendar shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" id="basicDate" required="">
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <input type="time" placeholder="Time" class="form-control clock shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" required="">
                            <div class="invalid-feedback fs-14">
                                Please enter your phone number or email
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        <div class="col-6"></div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush