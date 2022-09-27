<!DOCTYPE html>
<html>

<head>

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

    <!-- <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style> -->

</head>

<body>
    <!-- <h2>Events Table</h2>
  <a href={{ route('logout') }} style="float: right;
  background: black;
color: #fff;
padding: 6px 7px;
margin-bottom: 15px;
text-decoration: none;
border-radius: 10px;
font-weight: 600;">Log Out</a>
  <a href={{ route('addEvent') }} style="float: right;
background: blue;
color: #fff;
padding: 6px 7px;
margin-bottom: 15px;
text-decoration: none;
border-radius: 10px;
font-weight: 600;
margin-right: 25px;">Add Event</a> -->


    <section class="dashboard">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-2 bg-white">
                    <div class="sideBar py-3 h-100">
                        <input type="hidden" value="{{ $mid }}" id="mid">
                        <ul class="p-0 m-0 list-unstyled gap-3">
                            <li class="align-item-center {{ Request::routeIs('index') ? 'active' : '' }}"><a
                                    href="{{ route('index', [session()->get('uid')]) }}"
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
                            <li class="align-item-center {{ Request::routeIs('analytics') ? 'active' : '' }}"><a
                                    href="{{ route('analytics') }}" class="text-decoration-none fs-16 d-flex">
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
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="sectionheader py-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <h2 class="m-0">Analytics Table</h2>
                                    </div>
                                    {{-- <div class="col">
                                        <ul class="p-0 m-0 list-unstyled d-flex gap-3 justify-content-end">
                                            <li><a class="nav-link btnAddEvent" href="{{ route('addEvent') }}">Add
                                                    Event</a></li>
                                            <li><a class="nav-link btnLogOut" href="{{ route('logout') }}">Log Out</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="card mb-4">
                                <div class="card-header">View All Analytics</div>
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                      <div class="card mb-3">
                                        <div class="card-heading p-3">
                                          <form method="get" action="<?php echo action('AboutController@index', [$mid]); ?>">
                                                  <?php
                                                  $event_name = '';
                                                  $event_startdate = '';
                                                  if (isset($_GET['event_name'])) {
                                                      $event_name = $_GET['event_name'];
                                                  }
                                                  if (isset($_GET['event_startdate'])) {
                                                      $event_startdate = $_GET['event_startdate'];
                                                  }
                                                  ?>
                                                <div class="sbp-preview position-relative">
                                                    <div class="form-group">
                                                        <div class="row mx-0">
                                
                                                            <div class="col-md-4">
                                                                <div class="form-group my-3">
                                                                {{ Form::label('Event Name','Event Name',array('class'=>'text-bold'))}}
                                                                {{ Form::text('event_name',$event_name,array('value'=>$event_name,'placeholder'=>'Search By Event','id'=>'event_name','class'=>'form-control form-control-solid'))}}
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="form-group my-3">
                                                                {{ Form::label('Event Start Date','Event Start Date',array('class'=>'text-bold'))}}
                                                                {{ Form::date('event_startdate',$event_startdate,array('value'=>$event_startdate,'placeholder'=>'Search By Start Date','id'=>'event_startdate','class'=>'form-control form-control-solid'))}}
                                                                </div>
                                                            </div>
                                
                                                            <div class="col-md-4">
                                                                <div style="padding: 50px 0px 0px 40px;">
                                                                <button type="submit" class="btn btn-sm btn-success text-uppercase"><i class="far fa-check-circle"></i>&nbsp; Submit</button>
                                                                <a href="<?php echo action('AboutController@index', [$mid]); ?>" class="btn btn-sm btn-warning text-uppercase"><i class="far fa-undo" ></i>&nbsp; Reset</a>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div> --}}
                                <div class="card-body">
                                    <link rel="stylesheet" type="text/css"
                                        href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                                    <div class="datatable table-responsive">

                                        <table class="table table-bordered table-striped table-hover text-nowrap"
                                            id="allmatches_datatable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-capitalize">S No.</th>
                                                    <th class="text-capitalize">Unique Id</th>
                                                    <th class="text-capitalize">Event</th>
                                                    <th class="text-capitalize">Start Date</th>
                                                    <th class="text-capitalize">End Date</th>
                                                    <th class="text-capitalize">Address</th>
                                                    <th class="text-capitalize">Total</th>
                                                    <th class="text-capitalize">Vip</th>
                                                    <th class="text-capitalize">Regular</th>
                                                    {{-- <th class="text-capitalize">QrCode</th> --}}
                                                    <th class="text-capitalize">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-capitalize">S No.</th>
                                                    <th class="text-capitalize">Unique Id</th>
                                                    <th class="text-capitalize">Event</th>
                                                    <th class="text-capitalize">Start Date</th>
                                                    <th class="text-capitalize">End Date</th>
                                                    <th class="text-capitalize">Address</th>
                                                    <th class="text-capitalize">Total</th>
                                                    <th class="text-capitalize">Vip</th>
                                                    <th class="text-capitalize">Regular</th>
                                                    {{-- <th class="text-capitalize">QrCode</th> --}}
                                                    <th class="text-capitalize">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $.fn.dataTable.ext.errMode = 'none';

                                    var mid = $('#mid').val();
                                    var event_name = $('#event_name').val();
                                    var event_startdate = $('#event_startdate').val();
                                    $('#allmatches_datatable').DataTable({
                                        'bFilter': false,
                                        "processing": true,
                                        "serverSide": true,
                                        "searching": false,
                                        "ajax": {
                                            "url": '<?php echo URL::asset('view_analytics_dt'); ?>?event_name=' + event_name + '&event_startdate=' +
                                                event_startdate + '&mid=' + mid,
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
                                                "data": "uniqueid",
                                                orderable: false
                                            },
                                            {
                                                "data": "event_name"
                                            },
                                            {
                                                "data": "event_startdate"
                                            },
                                            {
                                                "data": "event_enddate"
                                            },
                                            {
                                                "data": "address",
                                                orderable: false
                                            },
                                            {
                                                "data": "total",
                                                orderable: false
                                            },
                                            {
                                                "data": "vip",
                                                orderable: false
                                            },
                                            {
                                                "data": "Reg",
                                                orderable: false
                                            },
                                            // {
                                            //     "data": "qrcode",
                                            //     orderable: false
                                            // },
                                            {
                                                "data": "action",
                                                orderable: false
                                            },
                                        ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</body>

</html>
