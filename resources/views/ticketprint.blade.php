@extends('main2')

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
        table.dataTable thead th,
        table.dataTable tbody tr td {
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
        {{-- <input type="hidden" value="{{ $mid }}" id="mid"> --}}
        <div class="row mx-0 mb-4 align-items-center">
            <div class="col mb-sm-0 mb-2">
                <div class="fs-16 fs-sm-20 fs-md-30 fw-bold text-theme1">Web Checked In</div>
            </div>
            <div class="col-sm-auto d-flex align-items-center gap-2">
                {{-- <a href="{{url('/get_analytics')}}" class="btn btn-outline-theme2 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase cancle_btn ">CANCEL</a> --}}
                {{-- <a href="{{ url('/exportcheckindata/' . $keeperid) }}" class="btn btn-theme1 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase text-white">EXPORT REPORT</a> --}}
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 fs-sm-25 fs-20 text-theme2 fw-600 mb-3">Breakdown</div>
            <div class="col-lg-10 col-12 table-responsive tabletabletabletable">
                {{-- @dd($snapshot2) --}}
                
                <table class="table" >
                    <thead>
                        <tr>
                            <th scope="col" class="fs-16 fw-bold text-theme2">First Name</th>
                            <th scope="col" class="fs-16 fw-bold text-theme2">Last Name</th>
                            <th scope="col" class="fs-16 fw-bold text-theme2">Organisation</th>
                            <th scope="col" class="fs-16 fw-bold text-theme2">type</th>
                            <th scope="col" class="fs-16 fw-bold text-theme2">Date Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($snapshot2 as $snap2)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $snap2['evefirstname'] }}</td>
                                <td>{{ $snap2['evelastname'] }}</td>
                                <td>{{ $snap2['orgenization'] }}</td>
                                <td>{{ $snap2['type'] }}</td>
                                <td>{{ $snap2['date'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

    {{-- <script type="text/javascript">
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
                    "data": "eventid",
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
                    "data": "event_image"
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
                {
                    "data": "gatekeeper",
                    orderable: false
                },
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
</script> --}}
@endsection
@push('scripts')
    {{-- <script>
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
        $('.delbtn').on('click', function() {
            var arr = $("input[name='id[]']:checked").map(function() {
                return this.value;
            }).get();
            // return false;
            if (arr.length != 0) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: arr
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('multidelete') }}",
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
    </script> --}}
   
    </body>

    </html>
@endpush
