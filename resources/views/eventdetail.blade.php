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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
    html,body{
        height:100%;
    }
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
            background-color: #dee2e6 !important;
        }
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::after {
            background-image: none !important;
        }
        .text-uppercase{
            background-color:black;
            color:white;
            border:none;
        }
        .text-uppercase:hover{
            background-color:#FF4E00;
            color:white;
            border:none;
        }
    </style>
</head>

<body>
    <nav style="background-color:#302D2F" class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"><img src="https://i.ibb.co/Ny6rmJV/logo1.png" alt="logo" border="0"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
       
     
      <div class="dropdown show dropleft">
  <!--<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
     <i class="material-icons" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:30px;color:black;background-color:white;border-radius:15px">person</i>
  <!--</a>-->

  <div style="" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
    
  </div>
</div>
       
    </form>
  </div>
</nav>
    <div class="container-fluid">
        <div class="row" style="height:100%">

            <div class="col-1" style="background-color:#302D2F;color:white;border-top:1px solid white;">
                <div class="sideBar py-3 h-300" >
                    {{-- <input type="hidden" value="{{$mid}}" id="mid"> --}}
                    <ul class="p-0 m-0 list-unstyled gap-3">
                        <li class="align-item-center {{ Request::routeIs('index') ? 'active' : '' }}"><a href="{{route('index',[session()->get('uid')])}}"
                                class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/event.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/event-color.png') }}" alt="" style="color:white"></div><span
                                    class="align-items-center d-flex" style="color:white" >Event</span>
                            </a></li>
                        <li class="align-item-center"><a href="" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/guests.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/guests-color.png') }}" alt="" style="color:white"></div><span
                                    class="align-items-center d-flex" style="color:white">Guest</span>
                            </a></li>
                        <li class="align-item-center"><a href="/email" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/email.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/email-color.png') }}" alt="" style="color:white"></div><span
                                    class="align-items-center d-flex" style="color:white">Email</span>
                            </a></li>
                        <li class="align-item-center {{ Request::routeIs('analytics') ? 'active' : '' }}"><a href="{{route('analytics')}}" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/analytics.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/analytics-color.png') }}" alt="" style="color:white"></div>
                                <span class="align-items-center d-flex" style="color:white">Analytics</span>
                            </a></li>
                        <li class="align-item-center"><a href="" class="text-decoration-none fs-16 d-flex">
                                <div class="menuIcon me-2"><img src="{{ asset('public/img/settings.png') }}"
                                        alt=""><img class="d-none img-2"
                                        src="{{ asset('public/img/settings-color.png') }}" alt="" style="color:white"></div>
                                <span class="align-items-center d-flex" style="color:white">Setting</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-11">
                <div class="sectionheader py-3">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <h2 class="m-0" style="color:#FF4E00;font-weight:700">Events Detail</h2>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{ asset('/index/' . session()->get('uid')) }}"
                                        class=" nav-link btnAddEvent">Back To Dashboard</a>
                                </div>
                                <div class="col">
                                    <ul class="p-0 m-0 list-unstyled d-flex gap-3 justify-content-end">
                                        <li><a class="nav-link btnAddEvent" href="{{ url('/addVisitor/' . $id) }}">Add
                                                Visitor</a></li>
                                        <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Export
                                                Event</a></li>
                                                <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Add Guest
                                                Event</a></li>
                                                <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Change Status
                                                </a></li>
                                                <li><a class="nav-link btnAddEvent"
                                                href="{{ url('/exportdata/' . $id) }}">Delete
                                                </a></li>
                                       
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="border:none">
                    <div class="col-3" style="border:none">
                        <div class="card mb-3">
                            <div class="card-heading p-3">
                                <input type="hidden" value="{{ $id }}" id="id">
                                <?php
                                    $visit = '';
                                    $type = '';
                                    $allval = '';
                                    
                                    if (isset($_GET['allval'])) {
                                        $allval = $_GET['allval'];
                                    }
                                    if (isset($_GET['visit'])) {
                                        $visit = $_GET['visit'];
                                    }
                                    if (isset($_GET['type'])) {
                                        $type = $_GET['type'];
                                    }
                                    if(($allval=='Yes' OR $allval=='') && (!in_array($visit,['Reg','VIP']) && (!in_array($visit,['Yes','No'])))){
                                        $visit = '';
                                        $type = '';
                                    }else{
                                        $allval='No';
                                    }
                                    ?>
                                <form method="get" action="<?php echo action('AboutController@printdata', [$id]); ?>" style="border:none">
                                    
                                    <div class="sbp-preview position-relative" >
                                        <div class="form-group">
                                            {{-- <div class="row mx-0">

                                        <div class="col-12">
                                            <div class="form-group my-3">
                                                {{ Form::label('Checked In', 'Checked In', ['class' => 'text-bold']) }}
                                                <br><select name="visit" id="visit" class="form-control form-control-solid">
                                                    <option value="">Select All</option>
                                                    <option value="Yes" <?php if ($visit == 'Yes') {
                                                        echo 'selected';
                                                    } ?>>Yes</option>
                                                    <option value="No" <?php if ($visit == 'No') {
                                                        echo 'selected';
                                                    } ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group my-3">
                                                {{ Form::label('TYPE', 'Type', ['class' => 'text-bold']) }}
                                                <br><select name="type" id="type" class="form-control form-control-solid">
                                                    <option value="">Select Type</option>
                                                    <option value="VIP" <?php if ($type == 'VIP') {
                                                        echo 'selected';
                                                    } ?>>VIP</option>
                                                    <option value="Reg" <?php if ($type == 'Reg') {
                                                        echo 'selected';
                                                    } ?>>REG</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="">
                                                <button type="submit" class="btn btn-sm btn-success text-uppercase"><i
                                                        class="far fa-check-circle"></i>&nbsp; Submit</button>
                                                <a href="<?php echo action('AboutController@printdata', [$id]); ?>"
                                                    class="btn btn-sm btn-warning text-uppercase"><i
                                                        class="far fa-undo"></i>&nbsp; Reset</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="customcheckbox1" name="allval"
                                                    class="custom-control-input allval" value="Yes"  <?php if ($allval=='Yes' OR $allval=='') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label class="custom-control-label w-100" for="customcheckbox1">
                                                    <div class="row mx-0">
                                                        <span class="col pl-0">All Guests</span>
                                                        <span class="col-auto">{{$sidedata['total']}}</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="" id="accordionExample">
                                                <div class="pt-4 ">
                                                    <div class="" id="headingOne" style="background-color:black;color:white">
                                                        <h5 class="mb-0">
                                                            <button class="bg-transparent border-0 p-2"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-expanded="true"
                                                                aria-controls="collapseOne" style="background-color:black;color:white;">
                                                                Status
                                                                
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show"
                                                        aria-labelledby="headingOne" id="#collapseOne">
                                                        <div class="card-body px-1 pt-2">
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox23"
                                                                    name="visit" value="Yes" class="visit d-none custom-control-input"
                                                                    class=""  <?php if ($visit == 'Yes') {
                                                                        echo 'checked';
                                                                    } ?>>
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox23">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">Checked In</span>
                                                                        <span class="col-auto">{{count($sidedata['checkedin'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox22"
                                                                    name="visit" value="No" class="visit d-none custom-control-input"
                                                                    class="" <?php if ($visit == 'No') {
                                                                        echo 'checked';
                                                                    } ?>>
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox22">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">Not Attending</span>
                                                                        <span class="col-auto">{{count($sidedata['notattending'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="" id="headingTwo" style="background-color:black;color:white">
                                                        <h5 class="mb-0">
                                                            <button class="bg-transparent border-0 p-2 collapsed"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapseTwo" aria-expanded="false"
                                                                aria-controls="collapseTwo" style="color:white">
                                                                My Lists
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseTwo" class="collapse show"
                                                        aria-labelledby="headingTwo" id="collapseTwo">
                                                        <div class="card-body px-1 pt-2">
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox73"
                                                                    name="type" value="VIP" class="type d-none custom-control-input" <?php if ($type == 'VIP') {
                                                                        echo 'checked';
                                                                    } ?>
                                                                    >
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox73">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">VIP</span>
                                                                        <span class="col-auto">{{count($sidedata['vip'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox py-2">
                                                                <input type="radio" id="customcheckbox72"
                                                                    name="type" value="Reg" class="type d-none custom-control-input"
                                                                 <?php if ($type == 'Reg') {
                                                                        echo 'checked';
                                                                    } ?> >
                                                                <label class="custom-control-label w-100"
                                                                    for="customcheckbox72">
                                                                    <div class="row mx-0">
                                                                        <span class="col pl-0">REG</span>
                                                                        <span class="col-auto">{{count($sidedata['reg'])}}</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">

                        <div class="card-body">
                            <link rel="stylesheet" type="text/css"
                                href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                            <div class="datatable table-responsive">

                                <table class="table table-bordered table-striped table-hover text-nowrap"
                                    id="allmatches_datatable" width="100%" cellspacing="0">
                                    <thead style="background-color:#CCCCCC">
                                        <tr >
                                            <th class="text-capitalize">S No.</th>
                                            <th class="text-capitalize">Name</th>
                                            <th class="text-capitalize">Company</th>
                                            <!--<th class="text-capitalize">Type</th>-->
                                            <!--<th class="text-capitalize">Email</th>-->
                                            <th class="text-capitalize">Visit</th>
                                            <!--<th class="text-capitalize">Date</th>-->
                                            <th class="text-capitalize ">Action</th>
                                            <!--<th class="text-capitalize w-100">Action</th>-->
                                        </tr>
                                    </thead>
                                    
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
            var allval = $("input[type='checkbox'].allval:checked").val();
            var visit = $("input[type='radio'].visit:checked").val();
            var type = $("input[type='radio'].type:checked").val();
            
            function matchdatatable(){
                var id = $('#id').val();
            // var visit = $('.visit').val();
            var allval = $("input[type='checkbox'].allval:checked").val();
            var visit = $("input[type='radio'].visit:checked").val();
            var type = $("input[type='radio'].type:checked").val();
                $('#allmatches_datatable').DataTable({
                'bFilter': false,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": {
                    "url": '<?php echo URL::asset('view_eventdetail_dt'); ?>?visit=' + visit + '&type=' + type + '&id=' + id+ '&allval=' + allval,
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
                    // {
                    //     "data": "type"
                    // },
                    // {
                    //     "data": "email",
                    //     orderable: false
                    // },
                    {
                        "data": "visit",
                        orderable: false
                    },
                    // {
                    //     "data": "date",
                    //     orderable: false
                    // },
                    {
                        "data": "action",
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
