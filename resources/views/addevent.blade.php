@extends('main3')

@push('meta')
    <title>Create Event</title>

    <meta name="title" content="Create Event" />
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- CSS for searching -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
@push('styles')
    <style>
        .timeZoneSelect .select2-selection.select2-selection--single {
            border: none !important;
            border-bottom: 2px solid #757575 !important;
            background-color: #f2f2f2 !important;
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            color: #757575 !important;
            padding: 0.4rem 0.2rem !important;
            height: 40px !important;

        }

        .timeZoneSelect .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px !important
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid signUpPage d-flex justify-content-center align-items-center Create_Event  px-0">
        <div class="row innerPage justify-content-center align-items-center h-100 w-100 py-5">
            <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-sm-11 col-12 Sign_Up">
                <div class="card border-0 px-0 py-2 bg-white ">
                    <div class="row mx-0">
                        <div class="col-12 Account px-4 py-2">
                            <h4 class="m-0 heading text-theme2 fw-bold fs-md-20 fs-18">Create Event</h4>
                        </div>
                        <div class="col-12 Account event_info px-4 py-2">
                            <h4 class="m-0 heading fw-bold text-white fs-16">Event Information</h4>
                        </div>
                    </div>
                    <form action="{{ asset('/addEvent') }}" method="post" enctype="multipart/form-data"
                        class="needs-validation px-4 py-3" id="form2" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" placeholder="Event Name" name="eventname"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    autocomplete="off" required>
                            </div>

                            <div class="col-12 mb-3 password-field position-relative">
                                <input type="password" placeholder="Password" name="eventpassword"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    id="password-field" autocomplete="off" required>
                                <span><i toggle="#password-field" id="eye"
                                        class="shaowPass imgs img-eye position-absolute eye-icon"></i></span>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>

                            <div class="col-12 text-theme2 fs-16 fw-bold mb-3">Event Type</div>
                            <div class="col-12 mb-3 d-flex align-items-center gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="eventtype" value="online"
                                        id="evetypeonline" onclick="onlinefunction()">
                                    <label class="form-check-label fw-normal text-theme2" for="eventypeonline">
                                        Online
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="eventtype" value="offline"
                                        id="evetypeoffline" onclick="offlinefunction()">
                                    <label class="form-check-label fw-normal text-theme2" for="eventypeoffline">
                                        Offline
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 input-group mb-3 d-none" id="displaytable1">
                                <input type="url" name="eventurl"
                                    class="form-control shadow-none rouded-0 Inpt border-0 p-2 fs-16 fw-normal"
                                    placeholder="Enter Url" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text Inpt border-0 fs-16 Url_example"
                                    id="basic-addon2">.nowvue.com</span>
                            </div>

                            <div class="d-none col-12 mb-3" id="displaytable">
                                <input type="text" placeholder="Enter Location" name="eventlocation"
                                    id="eventlocation"
                                    class="form-control shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal">
                            </div>


                            <div class="col-sm-6 mb-3 flatpickr ">
                                <input type="text" placeholder="Start Date" name="eventstartdate"
                                    class="form-control calendar shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    id="basicDate" required>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 flatpickr ">
                                <input type="text" placeholder="End Date" name="eventenddate"
                                    class="form-control calendar shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    id="endDate" required>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="time" placeholder="Start Time" name="eventstarttime"
                                    class="form-control clock shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    required>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input type="time" placeholder="End Time" name="eventendtime"
                                    class="form-control clock shadow-none rouded-0 Inpt w-100 border-0 p-2 fs-16 fw-normal"
                                    required>
                                <div class="invalid-feedback fs-14">
                                    Please enter your phone number or email
                                </div>
                            </div>
                            <div class="col-12 input-group mb-3 timeZoneSelect">
                                <select class="form-select shadow-none Inpt border-0 test" name="eventtimezone"
                                    id="inputGroupSelect01">
                                    <option class="choose py-1" selected>Select Timezone</option>
                                    @foreach ($data as $timez)
                                        <option class="choose py-1" value="{{ $timez['timezonename'] }}">
                                            {{ $timez['timezonename'] }}</option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- <div class="col-12 text-theme2 fs-16 fw-bold mb-3">Add Attendees List</div>
                            <div class="col-12 mb-3 d-flex align-items-center gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label fw-normal text-theme2" for="flexRadioDefault1">
                                        Excel File
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label fw-normal text-theme2" for="flexRadioDefault2">
                                        Manually
                                    </label>
                                </div>
                            </div> --}}

                            {{-- <div class="col-12 mb-3" id="show1">
                                <input class="form-control d-none" type="file" id="chooseFile">
                                <label for="chooseFile"
                                    class="bg-theme2 chooseFile px-4 py-2 text-white fw-bold rounded text-uppercase fs-14">Upload
                                    File</label>
                            </div> --}}

                            {{-- <div class="col-12 manually_tab d-none" id="show2">
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="p-2 fs-16 fw-bold">First Name</th>
                                                    <th scope="col" class="p-2 fs-16 fw-bold">Last Name</th>
                                                    <th scope="col" class="p-2 fs-16 fw-bold">Type</th>
                                                    <th scope="col" class="p-2 fs-16 fw-bold">Organisation</th>
                                                    <th scope="col" class="p-2 fs-16 fw-bold">Type</th>
                                                    <th scope="col" class="p-2 fs-16 fw-bold">Type</th>
                                                    <!-- <th scope="col" class="p-2 fs-16 fw-bold">Type</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <input type="text"
                                                            class="form-control border-0 shadow-none h-30px w-110px rounded "
                                                            id="fasttd" placeholder="com"></td>
                                                    <td> <input type="text"
                                                            class="form-control border-0 shadow-none h-30px w-110px rounded "
                                                            id="fasttd" placeholder="com"></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select
                                                                class="form-select shadow-none border-0 w-140px h-30px rounded"
                                                                id="inputGroupSelect01">
                                                                <option class="choose py-1" selected></option>
                                                                <option class="choose py-1" value="1">One</option>
                                                                <option class="choose py-1" value="2">Two</option>
                                                                <option class="choose py-1" value="3">Three</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> <input type="text"
                                                            class="form-control border-0 shadow-none h-30px w-110px rounded "
                                                            id="fasttd" placeholder="com"></td>
                                                    <td> <input type="text"
                                                            class="form-control border-0 shadow-none h-30px w-110px rounded "
                                                            id="fasttd" placeholder="com"></td>
                                                    <td> <input type="text"
                                                            class="form-control border-0 shadow-none h-30px w-110px rounded "
                                                            id="fasttd" placeholder="com"></td>
                                                    <!-- <td> <input type="text" class="form-control border-0 shadow-none h-30px w-115px rounded " id="fasttd" placeholder="com"></td> -->

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <button
                                            class="bg-theme2 shadow-none border-0 px-4 py-2 text-white fw-bold rounded text-uppercase fs-14">ADD
                                            ROW
                                        </button>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <button class="btn btn-dark d-flex align-items-center" type="submit" id="subbutton"
                                    name="submit"><span id="subbuttonSpinner"
                                        style="width :1em; height:1em;background-color:black;color:white"
                                        class="spinner-border me-2 d-none" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </span><span>Submit</span></button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- JS for searching -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // .js-example-basic-single declare this class into your select box
        $(document).ready(function() {
            $('.test').select2();
        });
    </script>
    <script>
        let subform = document.getElementById('subform');
        let subbutton = document.getElementById('subbutton');
        let subbuttonSpinner = document.getElementById('subbuttonSpinner');


        subform.addEventListener('submit', () => {
            subbuttonSpinner.classList.remove('d-none')
            subbutton.disabled = true
        })

        function onlinefunction() {
            var element = document.getElementById("displaytable1");
            element.classList.remove("d-none");
            var element1 = document.getElementById("displaytable");
            element1.classList.add("d-none");
        }

        function offlinefunction() {
            var element = document.getElementById("displaytable");
            element.classList.remove("d-none");
            var element1 = document.getElementById("displaytable1");
            element1.classList.add("d-none");
        }
    </script>


    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>

    <!-- google location -->
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_NvJAAj9qH0da7iBnfxZvvsD1dsmar3w&libraries=places&callback=initMap">
    </script>

    <script>
        /*** Geo Location For Address Start ***/

        var center = {
            lat: 50.064192,
            lng: -130.605469
        };
        // Create a bounding box with sides ~10km away from the center point
        var defaultBounds = {
            north: center.lat + 0.1,
            south: center.lat - 0.1,
            east: center.lng + 0.1,
            west: center.lng - 0.1,
        };

        var input = document.getElementById("eventlocation");
        var options = {
            bounds: defaultBounds,
            fields: ["address_components", "geometry", "icon", "name"],
            strictBounds: false,
            types: ["establishment"],
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);



        /*** Geo Location For Address End ***/
    </script>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            $(".shaowPass").click(function() {
        
                $(this).toggleClass("img-eye img-eye-slash");
                var input4 = $($(this).attr("toggle"));
                if (input4.attr("type") == "password") {
                    input4.attr("type", "text");
                } else {
                    input4.attr("type", "password");
                }
            });
        </script>
    @endpush
@endsection
