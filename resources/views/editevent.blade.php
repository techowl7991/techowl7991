<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
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
       
     
     
  <!--<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
     
  <!--</a>-->

  <button class="btn px-5" style="background-color:white;padding:10px;margin-right:20px;font-weight:700">CANCEL</button>
  <button class="btn px-5" style="background-color:#FF4E00;padding:10px;margin-right:20px;font-weight:700;color:white">CREATE</button>
</div>
       
    </form>
  </div>
</nav>
    <div class="container-fluid">
        
            <div class="col-md-12">
                <div class="row mx-0 my-5 justify-content-center">
                    <div class="col-5 card bg-white p-4">
                        <div class="card-header fw-bold mb-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto" style="font-size:20px;font-weight:800">Update Event</div>
                                
                            </div>
                        </div>
                        <form id="subform" action="{{ asset('/addEvent') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 needs-validation">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label" >Event Name</label>
                                    <input type="text" class="form-control" name="eventname" required style="border:none;border-bottom:2px solid grey;border-radius:0px;box-shadow:none" value="{{$snapshot['event_name']}}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="eventpassword" required style="border:none;border-bottom:2px solid grey;border-radius:0px;box-shadow:none"  value="{{$snapshot['password']}}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Event Start Date</label>
                                    <input type="datetime-local" class="form-control" name="eventstartdate" required style="border:none;border-bottom:2px solid grey;border-radius:0px;box-shadow:none" value="{{$snapshot['event_startdate']}}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Event End Date</label>
                                    <input type="datetime-local" class="form-control" name="eventenddate" required style="border:none;border-bottom:2px solid grey;border-radius:0px;box-shadow:none" value="{{$snapshot['event_enddate']}}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" required style="border:none;border-bottom:2px solid grey;border-radius:0px;box-shadow:none" value="{{$snapshot['address']}}">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                               
                                <div class="col-md-12">
                                    <p class="form-label" style="font-weight:800;font-size:20">Add Type</p>
            
                                    <input style="margin-top:10px;margin-right:5px" type="radio" value="excal" name="eventr1" id="ExcelFile" onclick="Exclefile()"
                                        required>
                                    <label style="margin-right:15px" for="Excel File" class="form-label">Excel File</label>
            
                                    <input style="margin-top:10px;margin-right:5px" type="radio" value="manually" name="eventr1" id="Manually" onclick="manualtable()"
                                        required>
                                    <label style="margin-right:15px" for="Manually" class="form-label">Manually</label>
            
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
                                                <tr><button class="btn btn-dark"  onclick="addrow()">Add Row</button></tr>
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
                                    <button class="btn btn-dark d-flex align-items-center" type="submit"  id="subbutton" name="submit"><span id="subbuttonSpinner" style="width :1em; height:1em;background-color:black;color:white" class="spinner-border me-2 d-none" role="status">
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
