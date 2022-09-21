<!DOCTYPE html>
<html>

<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


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

    <style>
        .events_table {
            color: #FF4E00;
            /*font-size:60px;*/
            font-weight: 800;
        }

        .card-header {
            color: black;
            font-size: 25px;
            font-weight: 700;
        }


        td,
        th {
            border: none;
        }

        .printBtn {
            background-color: #302D2F;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;

        }

        .printBtn:hover {
            background-color: #FF4E00;
        }

        .printBtn:active {
            background-color: #FF4E00;
        }

        .current {
            background-color: white;
            height: 40px;
            width: 60px;
            border-radius: 25px;

        }
    </style>



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
    <nav style="background-color:#302D2F" class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img src="https://i.ibb.co/Ny6rmJV/logo1.png" alt="logo"
                border="0"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">


                <div class="dropdown show dropleft">
                    <!--<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <i class="material-icons" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"
                        style="font-size:30px;color:black;background-color:white;border-radius:15px">person</i>
                    <!--</a>-->

                    <div style="" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>

                    </div>
                </div>

            </form>
        </div>
    </nav>


    <section class="dashboard">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-2 bg-white" style="display:none">
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
                            <li class="align-item-center"><a href=""
                                    class="text-decoration-none fs-16 d-flex">
                                    <div class="menuIcon me-2"><img src="{{ asset('public/img/settings.png') }}"
                                            alt=""><img class="d-none img-2"
                                            src="{{ asset('public/img/settings-color.png') }}" alt=""></div>
                                    <span class="align-items-center d-flex">Setting</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="sectionheader py-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <h2 class="m-0 events_table">Events Table</h2>
                                    </div>
                                    <div class="col">
                                        <ul class="p-0 m-0 list-unstyled d-flex gap-3 justify-content-end">
                                            <li><a class="nav-link btnAddEvent" href="{{ route('addEvent') }}">Create
                                                    Event</a></li>
                                            <!--<li><a class="nav-link btnLogOut" href="{{ route('logout') }}">Log Out</a>-->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="div">
                                    <div class="div">
                                        Upcoming Event : {{ $upcoming_count }}
                                    </div>
                                    <div class="div">
                                        Past Event : {{ $past_count }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="card mb-4">
                                <div class="card-header">Upcoming Events</div>
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
                                    <div class="text-right m-2"><button type="button"
                                            class="btn btn-danger delbtn">Delete</button></div>
                                    <link rel="stylesheet" type="text/css"
                                        href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                                    <div class="datatable table-responsive">

                                        <table style="border:none"
                                            class="table table-bordered table-striped table-hover text-nowrap"
                                            id="allmatches_datatable" width="100%" cellspacing="0">
                                            <thead style="background-color:#CCCCCC">
                                                <tr>
                                                    <th style="text-align:center;" class="text-capitalize">Event ID
                                                    </th>
                                                    <th class="text-capitalize"><input class="" type="checkbox"
                                                            value="" name="select-all"
                                                            id="flexCheckIndeterminate"></th>
                                                    <th class="text-capitalize">Title</th>
                                                    <th style="text-align:center;" class="text-capitalize">Start Date
                                                    </th>
                                                    <!--<th class="text-capitalize">End Date</th>-->
                                                    <th style="text-align:center;" style="width:50px"
                                                        class="text-capitalize">Edit</th>
                                                    <!-- <th style="text-align:center;" style="width:50px" class="text-capitalize">Delete</th> -->
                                                    <th style="text-align:center;" style="width:50px"
                                                        class="text-capitalize">Single Delete</th>
                                                    <!--<th class="text-capitalize">Vip</th>-->
                                                    <!--<th class="text-capitalize">Regular</th>-->
                                                    <th style="text-align:center;width:120px" class="text-capitalize">
                                                        QRcode</th>
                                                    <th style="text-align:center;width:120px" class="text-capitalize">
                                                        Guests</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                             <div class="container-fluid">
                            <!-- <div class="card mb-4">
                                <div class="card-header">Past Events</div>
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                      <div class="card mb-3">
                                        <div class="card-heading p-3">
                                          <form method="get" action="">
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

                                        <table style="border:none" class="table table-bordered table-striped table-hover text-nowrap"
                                            id="allmatches_datatable1" width="100%" cellspacing="0">
                                            <thead style="background-color:#CCCCCC">
                                                <tr>
                                                    <th class="text-capitalize">Event ID</th>
                                                    <th class="text-capitalize"><input class="" type="checkbox" value="" name="select-all" id="flexCheckIndeterminate1"></th>
                                                    <th class="text-capitalize">Title</th>
                                                    <th class="text-capitalize">Start Date</th>
                                                    <th class="text-capitalize">Edit</th>
                                                    <th class="text-capitalize">Delete</th>
                                                    <th class="text-capitalize">QRcode</th>
                                                    <th class="text-capitalize">Guest</th>
                                                    <th class="text-capitalize">Regular</th>-->
                                                    <!--<th class="text-capitalize">QrCode</th>-->
                                                    <!--<th class="text-capitalize">Action</th>-->
                                               <!-- </tr>
                                            </thead>
                                            
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> -->
                            
                            
                            
                            
                            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>




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
                                                "url": '<?php echo URL::asset('view_event_dt'); ?>?event_name=' + event_name + '&event_startdate=' +
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
                                                    "data": "checkb",
                                                    orderable: false
                                                },
                                                {
                                                    "data": "event_name"
                                                },
                                                {
                                                    "data": "event_startdate"
                                                },

                                                {
                                                    "data": "address",
                                                    orderable: false
                                                },
                                                // {
                                                //     "data": "total",
                                                //     orderable: false
                                                // },
                                                {
                                                    "data": "singledel"
                                                },
                                                // {
                                                //     "data": "vip",
                                                //     orderable: false
                                                // },
                                                // {
                                                //     "data": "Reg",
                                                //     orderable: false
                                                // },
                                                {
                                                    "data": "qrcode",
                                                    orderable: false
                                                },
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
 <script>
     $('#flexCheckIndeterminate').click(function(event) {
        if (this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('#flexCheckIndeterminate1').click(function(event) {
        if (this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('.delbtn').on('click', function(){
        var arr = $("input[name='id[]']:checked").map(function() {
            return this.value;
        }).get();
        console.log(arr);
        // return false;
        if(arr.length != 0){
            $.ajax({
                    type: "POST",
                    data: {
                        id: arr
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: '{{ route('multidelete') }}',
                    //  beforeSend: function() {
                    // $('.preloader').removeClass('d-none');
                    // },
                    // complete: function () {
                    //   $('.preloader').addClass('d-none');
                    // },
                    success: function(msg) {

                        // $('#basic-datatable1').DataTable().destroy();
                        // fill_datatable();
                        // toastr.success(msg => 'Users Deleted, Successfully!');
                        window.location.reload()
                    }

                });
            }
        })
    </script>
</body>

</html>
