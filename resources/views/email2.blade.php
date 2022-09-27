@extends('main2')

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
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endpush
@section('content')

<section class="container-fluid emailType">
    <div class="topBar py-3 pb-2 py-sm-4">
        <div class="row justify-content-between mx-ms-0">
            <div class="col col-sm-auto">
                <div class="title text-theme1 fs-16 fs-sm-20 fs-md-24 fw-bold ">Email</div>
            </div>
            <div class="col-auto">
                <a class="btn createEventBtn btn-theme1 text-white fs-11 fs-sm-14 p-1 py-lg-2 px-sm-3 text-uppercase fw-500" href=""> Create Email </a>
            </div>
            <div class="col-12 mt-2 mt-sm-0">
            <div class="fs-11 fs-sm-14 fs-md-16">You have several draft campaigns in progress.</div>
            </div>
        </div>
    </div>
    <div class=" py-2 py-sm-3">
        <div class="row mx-ms-0">
            <div class="col-12">
                <ul class="nav nav-pills mb-3 gap-1 gap-sm-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class=" nav-link active btn text-theme2 border border-1 border-theme2 fw-500 fs-11 fs-sm-14 p-1 py-lg-2 px-sm-3" id="draft-tab" data-bs-toggle="pill" data-bs-target="#draft" type="button" role="tab" aria-controls="draft" aria-selected="true"> Draft <span class="badge text-bg-light ms-1">4</span> </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class=" nav-link btn text-theme2 border border-1 border-theme2 fw-500 fs-11 fs-sm-14 p-1 py-lg-2 px-sm-3" id="scheduled-tab" data-bs-toggle="pill" data-bs-target="#scheduled" type="button" role="tab" aria-controls="scheduled" aria-selected="false"> Scheduled <span class="badge text-bg-light ms-1">0</span> </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class=" nav-link btn text-theme2 border border-1 border-theme2 fw-500 fs-11 fs-sm-14 p-1 py-lg-2 px-sm-3" id="sent-tab" data-bs-toggle="pill" data-bs-target="#sent" type="button" role="tab" aria-controls="sent" aria-selected="false"> Sent <span class="badge text-bg-light ms-1">0</span> </button>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="draft" role="tabpanel" aria-labelledby="draft-tab" tabindex="0">
                        <div class="tabelOuter">
                            <table id="drafttable" class="table table-striped dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr class="even">
                                        <th>Email Subject</th>
                                        <th>Sent To</th>
                                        <th class="text-center">Export HTML</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Clone</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="d-block">
                                            <button type="button" class="btn border-0 shadow-none d-block fs-14 fs-sm-16 text-primary p-0  text-decoration-underline">Confirmation foe eventname</button>
                                            <span class=" fs-14 fs-sm-16">Last edited Tue, 13 Sep 2022</span>
                                        </td>
                                        <td class=" fs-14 fs-sm-16"><span>All registrants</span> <span class="text-theme1">[295]</span></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-arrow-alt-down text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-pen text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgr img-copy text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-trash text-secondary"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="d-block">
                                            <button type="button" class="btn border-0 shadow-none d-block fs-14 fs-sm-16 text-theme2 p-0" href="">Thank you for attending</button>
                                            <span class=" fs-14 fs-sm-16">Last edited Tue, 13 Sep 2022</span>
                                        </td>
                                        <td class=" fs-14 fs-sm-16"><span>Registrants who attended the event</span> <span class="text-theme1">[245]</span></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-arrow-alt-down text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-pen text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgr img-copy text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-trash text-secondary"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="d-block">
                                            <button type="button" class="btn border-0 shadow-none d-block fs-14 fs-sm-16 text-theme2 p-0" href="">Sorry we missed you!</button>
                                            <span class=" fs-14 fs-sm-16">Last edited Tue, 13 Sep 2022</span>
                                        </td>
                                        <td class=" fs-14 fs-sm-16"><span>Registrants who did not attend the event</span> <span class="text-theme1">[50]</span></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-arrow-alt-down text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-pen text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgr img-copy text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-trash text-secondary"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="d-block">
                                            <button type="button" class="btn border-0 shadow-none d-block fs-14 fs-sm-16 text-theme2 p-0" href="">Congratulations winning...</button>
                                            <span class=" fs-14 fs-sm-16">Last edited Tue, 13 Sep 2022</span>
                                        </td>
                                        <td class=" fs-14 fs-sm-16"><span>New List 1</span> <span class="text-theme1">[12]</span></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-arrow-alt-down text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-pen text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgr img-copy text-secondary"></i></button></td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-trash text-secondary"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="scheduled" role="tabpanel" aria-labelledby="scheduled-tab" tabindex="0">
                        <div class="tabelOuter">
                                <table id="scheduledtable" class="table table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr class="even">
                                            <th>Email Subject</th>
                                            <th>Sent To</th>
                                            <th class="">Scheduled Date</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Clone</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td class="fs-14 fs-sm-16">Confirmation foe eventname</td>
                                            <td class=" fs-14 fs-sm-16"><span>All registrants</span> <span class="text-theme1">[295]</span></td>
                                            <td class="">March 2, 2022, 1:00 PM GMT+8</td>
                                            <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgs img-pen text-secondary"></i></button></td>
                                            <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgr img-copy text-secondary"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab" tabindex="0">
                        <div class="tabelOuter">
                            <table id="senttable" class="table table-striped dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr class="even">
                                        <th>Email Subject</th>
                                        <th class="text-center">Recipients</th>
                                        <th class="text-center">Opened</th>
                                        <th class="text-center">Clicked</th>
                                        <th class="text-center">Clone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">
                                            <span class="fs-14 fs-sm-16 d-block">Confirmation foe eventname</span>
                                            <span class=" fs-14 fs-sm-16">Last edited Tue, 13 Sep 2022</span>
                                        </td>
                                        <td class=" fs-14 fs-sm-16 text-center">4</td>
                                        <td class="text-center">75%</td>
                                        <td class="text-center">0%</td>
                                        <td class="text-center"><button type="button" class="btn border-none shadow-none"><i class="imgr img-copy text-secondary"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
    $('#drafttable').DataTable();
} );

$(document).ready(function() {
    $('#scheduledtable').DataTable();
} );

$(document).ready(function() {
    $('#senttable').DataTable();
} );
</script>
@endpush