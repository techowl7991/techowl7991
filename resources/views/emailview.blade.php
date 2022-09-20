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
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
            background-color: #dee2e6 !important;
        }
        .custom-checkbox .custom-control-input:indeterminate~.custom-control-label::after {
            background-image: none !important;
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
        <div class="row">

            <div class="col-2" style="background-color:#302D2F;color:white;border-top:1px solid white">
                <div class="sideBar py-3 h-100">
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
                        <li class="align-item-center"><a href="" class="text-decoration-none fs-16 d-flex">
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
            <div class="col-10">
                <div class="sectionheader py-3">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h2 class="m-0" style="color:#FF4E00;font-weight:700">Events Detail</h2>
                        </div>
                        <div class="col-9">
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
                                        <li><a class="nav-link btnLogOut" href="{{ route('logout') }}">Log Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </body>
            </html>