<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
        td input {
            width: 130px;
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
            <div class="col-md-11">
                <div class="row mx-0 my-5 justify-content-center">
                    <div class="col-6 card bg-white p-4">
                        <div class="card-header fw-bold mb-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">Add Visitor</div>
                                <div class="col-auto">
                                    <a class="btn btn-success" href="{{ asset('/index/' . session()->get('uid')) }}">View</a>
                                </div>
                            </div>
                        </div>
                        <form id="subform" action="{{ asset('/addVisitor/'.$id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 needs-validation">
                                    <input type="hidden" class="form-control" name="eventid" value="{{$id}}">
                                <div class="col-md-6">
                                    <p class="form-label">Add Type</p>
            
                                    <input type="radio" value="excal" name="eventr1" id="ExcelFile" onclick="Exclefile()"
                                        required>
                                    <label for="Excel File" class="form-label">Excel File</label>
            
                                    <input type="radio" value="manually" name="eventr1" id="Manually" onclick="manualtable()"
                                        required>
                                    <label for="Manually" class="form-label">Manually</label>
            
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div id="displaytable" class="d-none table-responsive">
                                                <table id="displaytable2" cellpadding="1" cellspacing="0" border="3"
                                                    class="table">
                                                    <tr align="center" class="bg-dark text-white">
                                                        <td class="lbl">Name</td>
                                                        <td class="lbl">Email</td>
                                                        <td class="lbl">Type</td>
                                                        <td class="lbl">Company Name</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input class="form-control" type="text" name="evename[]"></td>
                                                        <td><input class="form-control" type="email" name="eveemail[]"></td>
                                                        <td><select class="form-select" name="evetype[]" id="">
                                                                <option value="VIP">Choose</option>
                                                                <option value="VIP">VIP</option>
                                                                <option value="Reg">Reg</option>
                                                            </select></td>
                                                        <td><input class="form-control" type="text" name="evencname[]"></td>
                                                    </tr>
                                                </table>
                                                <tr><button class="btn btn-primary" onclick="addrow()">Add Row</button></tr>
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
            
                                <div class="container">
                                    <div class="row">
                                        <div id="displaytable1" class="d-none">
            
                                            <label for="validationCustom02" class="form-label">Excle File</label>
                                            <input type="file" class="form-control" name="eventfile">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
            
            
                                <div class="col-12">
                                    <button class="btn btn-primary d-flex align-items-center" type="submit"  id="subbutton" name="submit"><span id="subbuttonSpinner" style="width :1em; height:1em;" class="spinner-border me-2 d-none" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                        </span><span>Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
let subform = document.getElementById('subform');
let subbutton = document.getElementById('subbutton');
let subbuttonSpinner = document.getElementById('subbuttonSpinner');


subform.addEventListener('submit', ()=>{
    subbuttonSpinner.classList.remove('d-none')
    subbutton.disabled=true
})

    function manualtable() {
        var element = document.getElementById("displaytable");
        element.classList.remove("d-none");
        var element1 = document.getElementById("displaytable1");
        element1.classList.add("d-none");
    }

    function Exclefile() {
        var element = document.getElementById("displaytable1");
        element.classList.remove("d-none");
        var element1 = document.getElementById("displaytable");
        element1.classList.add("d-none");
    }

    function addrow() {
        event.preventDefault();
        $('#displaytable2 tr:last').after(`<tr>
                                            <td><input class="form-control" type="text" name="evename[]"></td>
                                            <td><input class="form-control" type="email" name="eveemail[]"></td><td><select class="form-select" name="evetype[]" id="">
                                                    <option value="VIP">Choose</option>
                                                    <option value="VIP">VIP</option>
                                                    <option value="Reg">Reg</option></select></td><td><input class="form-control" type="text" name="evencname[]"><td></tr>`);
    }
</script>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

</html>
