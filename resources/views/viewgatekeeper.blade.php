@extends('main3')

@push('meta')
    <title>page_title</title>

    <meta name="title" content="page_title" />
    <meta name="description" content="page_description" />
    <meta name="keywords" content="page_keywords" />

    <meta name="robots" content="index, follow" />
    
    <meta name="twitter:title" content="page_title">
    <meta name="twitter:description" content="page_description">
    <meta name="twitter:image" content="{{ asset('/public/new-design/img/logos/logo.png') }}">

    
    <meta property="og:url" content="{{ asset('/') }}">
    <meta property="og:title" content="page_title">
    <meta property="og:description" content="page_description">
    <meta property="og:image" content="{{ asset('/public/new-design/img/logos/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/public/new-design/img/logos/logo.png') }}">
    <meta name="classification" content="page_title" />
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/public/new-design/img/logos/favicon-white.png') }}" />
    <link rel="icon" href="{{ asset('/public/new-design/img/logos/favicon-original.png') }}" id="light-scheme-icon">
    <link rel="icon" href="{{ asset('/public/new-design/img/logos/favicon-white.png') }}" id="dark-scheme-icon">
    <link rel="canonical" href="{{ asset('/') }}" />

@endpush
@push('styles')
<style>

table.dataTable thead th, table.dataTable tbody tr td {
        border: none;
    }

</style>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
@endpush
@section('content')
<section class="container-fluid myEvent">
    <input type="hidden" value="{{ $mid }}" id="mid">
        <div class="topBar py-3 pb-2 py-sm-4">
            <div class="row justify-content-between mx-0">
                <div class="col-auto">
                    <div class="title text-theme1 fs-16 fs-sm-24 fs-md-30 fw-bold ">Gate Keeper</div>
                </div>
                <div class="col-auto">
                    <a class="btn createEventBtn btn-theme1 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase text-white me-3" href="{{route('index',[session()->get('uid')])}}"> Back</a>
                    <a class="btn createEventBtn btn-theme1 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase text-white" href="{{ route('addkeeper',[$mid]) }}" data-bs-toggle="modal" data-bs-target="#addkeeper"> Create Gate Keeper </a>
                </div>
            </div>
        </div>

        <div class="upcomingEvents py-2 py-sm-4">
            <div class="row mx-0 align-items-center">
                <div class="col">
                    <div class="title text-dark fs-15 fs-sm-20 fs-md-25 fw-bold">Gate Keepers</div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 mt-3">
                    <div class="card-body">
                        <link rel="stylesheet" type="text/css"
                            href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css">
                        <div class="datatable table-responsive">

                            <table style="border:none"
                                class="table table-bordered table-striped table-hover text-nowrap"
                                id="allmatches_datatable" width="100%" cellspacing="0">
                                <thead style="background-color:#CCCCCC">
                                    
                                        <th style="" class="text-capitalize">Guest ID
                                        </th>
                                        <th class="text-capitalize">Name</th>
                                        <th style="" class="text-capitalize">Username
                                        </th>
                                        <th style="width:120px" class="text-capitalize">
                                            Password</th>
                                   
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>



<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';

        var mid = $('#mid').val();
        $('#allmatches_datatable').DataTable({
            'bFilter': false,
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ajax": {
                "url": '<?php echo URL::asset('view_guest_dt'); ?>?mid=' + mid,
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
                    "data": "username"
                },
                {
                    "data": "password"
                },
            ]
        });

    });
</script>
                            
  
@endsection
@push('scripts')                          

        
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
@endpush