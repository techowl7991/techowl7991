@extends('main2')

@push('meta')
<title>Email</title>

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

<div class="container-fluid h-100 position-relative">
    <div class="row mx-0 mb-4 align-items-center">
        <div class="col mb-sm-0 mb-2">
            <div class="fs-sm-30 fs-25 fw-bold text-theme1">Email</div>
        </div>
        <div class="col-sm-auto">
            <button class="shadow-none border-0 text-white top_right_export_btn bg-theme1 rounded fs-14 fw-500 px-sm-4 px-3  py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">CREATE A CAMPAIGN</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 position-absolute mx-0 top-50 start-50 impete fs-sm-24 fs-20 fw-normal text-theme2 text-center">You don’t have any email yet.</div>
    </div>
</div>

<!-- Modal Of Create Guest -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade Create-Guest-modal email-modal " id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-white">
            <div class="modal-header px-4 pt-4 mb-3">
                <h5 class="modal-title fs-20 text-theme2 fw-bold ps-1" id="exampleModalLabel">Edit Guest Information</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <i class="imgr img-times fs-20 text-theme2 pe-1" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body p0">
                <div class="row px-0 mx-0">
                    <form action="" class="modal-form col-12">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <input type="text" placeholder="Name your campaign" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal" autocomplete="off" required>
                            </div>

                            <div class="col-12 px0 py-3 d-flex justify-content-start gap-2">
                                <button type="button" class=" shadow-none rounded cancle_btn fs-14 fw-bold px-4 py-2" data-bs-dismiss="modal">CANCEL</button>
                                <a href="{{route('campaign_information')}}" class="shadow-none rounded border-0 text-white bg-theme1 hrefrounded fs-14 fw-bold px-4 py-2 top_right_export_btn text-decoration-none">CONTINUE</a>
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