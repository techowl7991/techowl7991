<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
            background-color: #dee2e6 !important;
        }
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::after {
            background-image: none !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-2 bg-white">
                <div class="sideBar py-3 h-100">
                    {{-- <input type="hidden" value="{{$mid}}" id="mid"> --}}
                    <ul class="p-0 m-0 list-unstyled gap-3">
                        <li class="align-item-center {{ Request::routeIs('index') ? 'active' : '' }}"><a href="{{route('index',[session()->get('uid')])}}"
                                class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/event.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/event-color.png') }}" alt=""></div><span
                                    class="align-items-center d-flex">Event</span>
                            </a></li>
                        <li class="align-item-center"><a href="" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/guests.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/guests-color.png') }}" alt=""></div><span
                                    class="align-items-center d-flex">Guest</span>
                            </a></li>
                        <li class="align-item-center"><a href="" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/email.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/email-color.png') }}" alt=""></div><span
                                    class="align-items-center d-flex">Email</span>
                            </a></li>
                        <li class="align-item-center {{ Request::routeIs('analytics') ? 'active' : '' }}"><a href="{{route('analytics')}}" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/analytics.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/analytics-color.png') }}" alt=""></div>
                                <span class="align-items-center d-flex">Analytics</span>
                            </a></li>
                        <li class="align-item-center"><a href="" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/settings.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/settings-color.png') }}" alt=""></div>
                                <span class="align-items-center d-flex">Setting</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-10">
                <div class="sectionheader py-3">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h2 class="m-0">Analytic Detail</h2>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                {{-- <div class="col-auto">
                                    <a href="{{ asset('/index/' . session()->get('uid')) }}"
                                        class=" nav-link btnAddEvent">Back To Dashboard</a>
                                </div> --}}
                                <div class="col">
                                    <ul class="p-0 m-0 list-unstyled d-flex gap-3 justify-content-end">
                                        {{-- <li><a class="nav-link btnAddEvent" href="{{ url('/addVisitor/' . $id) }}">Add
                                                Visitor</a></li> --}}
                                        <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdataanalytics/' . $id) }}">Export
                                                Analytics</a></li>
                                        {{-- <li><a class="nav-link btnLogOut" href="{{ route('logout') }}">Log Out</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="card-body">
                            <link rel="stylesheet" type="text/css"
                                href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                            <div class="datatable table-responsive">
                                <input type="hidden" value="{{ $id }}" id="id">
                                <table class="table table-bordered table-striped table-hover text-nowrap"
                                    id="allmatches_datatable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-capitalize">S No.</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Company</th>
                                            <th class="text-capitalize">Email</th>
                                            <th class="text-capitalize">Status</th>
                                            <th class="text-capitalize">Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-capitalize">S No.</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Company</th>
                                            <th class="text-capitalize">Email</th>
                                            <th class="text-capitalize">Status</th>
                                            <th class="text-capitalize">Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="output"></div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
            matchdatatable();
            var id = $('#id').val();
            // var visit = $('.visit').val();
            
            function matchdatatable(){
                var id = $('#id').val();
            // var visit = $('.visit').val();
                $('#allmatches_datatable').DataTable({
                'bFilter': false,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": {
                    "url": '<?php echo URL::asset('view_anyalyticdetail_dt'); ?>?id=' + id,
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "dom": 'lBfrtip',
                "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }],
                "columns": [{
                        "data": "id",
                        orderable: false
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "company"
                    },
                    {
                        "data": "email",
                        orderable: false
                    },
                    {
                        "data": "status",
                        orderable: false
                    },
                    {
                        "data": "date",
                        orderable: false
                    },
                ]
            });
        }

        $('.visit').change(function(){
            $("input:checkbox").removeAttr("checked");
            $('#allmatches_datatable').DataTable().destroy();
            matchdatatable();

        });
        $('.type').change(function(){
            $("input:checkbox").removeAttr("checked");
            $('#allmatches_datatable').DataTable().destroy();
            matchdatatable();
        });
        $('.allval').change(function(){
            $("input:radio").removeAttr("checked");
            $('#allmatches_datatable').DataTable().destroy();
            matchdatatable();
        });
            
        });
    </script>
</body>

{{-- <script type="text/javascript">
    function PrintDiv(id) {
        var divToPrint = document.getElementById(id);
        var popupWin = window.open('', '_blank', 'width=1000,height=700');
        //  popupWin.document.open();
        popupWin.document.write(
            '<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" tyep="text/css"></head><body onload="window.print()" style="margin-left: 20px;">' +
            divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script> --}}

</html>
