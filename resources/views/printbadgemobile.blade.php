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
 
    <div  class="justify-content-center d-grid align-items-center" style=" transform: rotate(180deg);">
     <div  class="row justify-content-center align-items-center" style="width: 90mm;height: 70mm;font-size: 25px;padding: 5px;text-align: center;">
         
               <p class="fw-bold mb-1">{{$snapshot['evefirstname'].' '.$snapshot['evelastname']}}</p>
               <p class="fw-bold mb-1" style="margin-top: 15px;">{{$snapshot['orgenization']}}</p>
               <div style="text-align: center;margin: 23px;">{!! QrCode::size(80)->generate($input['qrvalue']); !!}</div>
               <p class="fw-bold mb-1">{{$snapshot['type']}}</p>
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