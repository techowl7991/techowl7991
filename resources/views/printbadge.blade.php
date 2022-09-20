<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
@page{
            size: auto;
            margin: 0;
        }
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
 
    <div  class="col-md-3 col-sm-6 justify-content-center d-grid align-items-center">
     <div  class="row justify-content-center align-items-center" style="width:90mm;height:62mm; font-size:25px;border:2px solid black;padding: 5px;">
          <div  class="col ps-0" style="">
             <div>{!! QrCode::size(60)->generate($input['qrvalue']); !!}</div>
             <img src="http://gateman.techowl.in/logo.png" style="width: 100px;float: right;margin-top: -65px;height: 70px;">
          </div>
               <p class="fw-bold mb-1">{{$input['name']}}</p>
               <p class="fw-bold mb-1">{{$input['company']}}</p>
               <p class="text-secondary fw-bold mb-0">{{date("d M Y",strtotime($input['date']))}}</p>
          </div>
         
      </div>
    </div>
  </div>
  </div>
  </body>
  <script type="text/javascript">

    $(document).ready(function () {
        window.print();
    });

    </script>
  </html>