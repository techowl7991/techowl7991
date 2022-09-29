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
            <form action="{{route('updateverifcation')}}" method="post">
                @csrf
                <input type="hidden" name="mid" value="{{$mid}}">
                <input type="hidden" name="id" value="{{$id}}">
                <input type="submit" name="submit" value="verify">
            </form>
    </section>

</body>

</html>
