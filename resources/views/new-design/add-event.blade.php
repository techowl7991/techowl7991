@extends('new-design.main2')

@push('meta')
    <title>Create Event</title>

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
    <meta property="og:image" content="{{ asset('/public/new-design/img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/public/new-design/img/logo.png') }}">
    <meta name="classification" content="page_title" />
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/public/new-design/img/favicon-white.png') }}" />
    <link rel="icon" href="{{ asset('/public/new-design/img/favicon-original.png') }}" id="light-scheme-icon">
    <link rel="icon" href="{{ asset('/public/new-design/img/favicon-white.png') }}" id="dark-scheme-icon">
    <link rel="canonical" href="{{ asset('/') }}" />

@endpush
@push('styles')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
@endpush
@section('content')

<section class="container-fluid myEvent">
        <div class="topBar py-3 pb-2 py-sm-4">
            <div class="row justify-content-between mx-0">
                <div class="col-auto">
                    <div class="title text-theme1 fs-16 fs-sm-20 fs-md-24 fw-bold ">My Event</div>
                </div>
                <div class="col-auto">
                    <a class="btn createEventBtn btn-theme1 text-white fs-11 fs-sm-14 p-1 px-sm-3 text-uppercase fw-500" href=""> Create Event </a>
                </div>
            </div>
        </div>
        <div class="totalEvents py-2 py-sm-3">
            <div class="row mx-0">
                <div class="col-auto">
                    <button type="button" class="btn btn-dark fw-500 fs-10 fs-sm-16 p-1 px-sm-2">
                        Upcoming <span class="badge text-bg-light ms-2">3</span>
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-dark fw-500 fs-10 fs-sm-16 p-1 px-sm-2">
                        Post Events <span class="badge text-bg-secondary ms-2">0</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="upcomingEvents py-2 py-sm-4">
            <div class="row mx-0">
                <div class="col-12">
                    <div class="title text-dark fs-16 fs-sm-20 fs-md-24 fw-bold ">Upcoming Events</div>
                </div>
                <div class="col-12 mt-3">
                    <!-- <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr class="even">
                                <th class="select-checkbox"></th>
                                <th>Event ID</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>QRcode</th>
                                <th>Guests</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class=""><span class="select-checkbox"></span></td>
                                <td>#A000512</td>
                                <td class="text-primary text-decoration-underline fs-16">Digital Conference 2020</td>
                                <td>9 March 2022</td>
                                <td><i class="imgs img-pen text-secondary"></i></td>
                                <td><i class="imgs img-trash text-secondary"></i></td>
                                <td><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">View QRcode</Button></td>
                                <td><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">View Guests</Button></td>
                            </tr>
                            <tr>
                                <td class="select-checkbox"></td>
                                <td>#A000512</td>
                                <td class="text-primary text-decoration-underline fs-16">Digital Conference 2020</td>
                                <td>9 March 2022</td>
                                <td><i class="imgs img-pen text-secondary"></i></td>
                                <td><i class="imgs img-trash text-secondary"></i></td>
                                <td><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">View QRcode</Button></td>
                                <td><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">View Guests</Button></td>
                            </tr>
                            <tr>
                                <td class="select-checkbox"></td>
                                <td>#A000512</td>
                                <td class="text-primary text-decoration-underline fs-16">Digital Conference 2020</td>
                                <td>9 March 2022</td>
                                <td><i class="imgs img-pen text-secondary"></i></td>
                                <td><i class="imgs img-trash text-secondary"></i></td>
                                <td><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">View QRcode</Button></td>
                                <td><Button type="button" class="btn btn-dark text-uppercase fs-14 fw-500">View Guests</Button></td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
        </div>
</section>

@endsection
@push('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script> -->
@endpush