@extends('main2')

@push('meta')
<title>Setting</title>

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@section('content')

<div class="container-fluid">
    <div class="row mx-0 mb-4 align-items-center">
        <div class="col">
            <div class="fs-sm-30 fs-20 fw-600 text-theme1">Setting</div>
        </div>
        <div class="col-auto">
            <button class="btn btn-theme1 fs-10 fs-lg-11 fs-xl-14 fw-600 text-uppercase text-white">SAVE CHANGES</button>
        </div>
    </div>
    <div class="row mx-0 Campaign_page pb-4">
        <div class="col-sm-10 mb-3 text-theme2 fw-600 fs-sm-25 fs-16">Event Information</div>
        <div class="col-sm-10 comman-form">
            <form action="" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="text" placeholder="Event Title" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0  fs-16 fw-normal" autocomplete="off" required>
                    </div>
                    <div class="col-12 mb-3 position-relative copy-text">
                        <input type="text" placeholder="Event Link" class="form-control h-50px text shadow-none rouded-0 Inpt w-100 border-0  fs-16 fw-normal" value="Event Link" autocomplete="off" required="">
                        <span><i class="imgr img-copy position-absolute eye-icon fs-20"></i></span>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" placeholder="Address" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0  fs-16 fw-normal" autocomplete="off" required>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="input-group">
                                    <select class="form-select h-50px fs-sm-16 fs-14 form_select_non_icon shadow-none Inpt border-0" id="inputGroupSelect01">
                                        <option class="choose py-1" selected="">City</option>
                                        <option class="choose py-1" value="1">One</option>
                                        <option class="choose py-1" value="2">Two</option>
                                        <option class="choose py-1" value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-3 col-sm-6 mb-3">
                                <div class="input-group">
                                    <select class="form-select h-50px fs-sm-16 fs-14 shadow-none form_select_non_icon Inpt border-0" id="inputGroupSelect01">
                                        <option class="choose py-1" selected="">State</option>
                                        <option class="choose py-1" value="1">One</option>
                                        <option class="choose py-1" value="2">Two</option>
                                        <option class="choose py-1" value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-3 col-sm-6 mb-3">
                                <div class="input-group">
                                    <select class="form-select h-50px fs-sm-16 fs-14 shadow-none form_select_non_icon Inpt border-0" id="inputGroupSelect01">
                                        <option class="choose py-1" selected="">Country</option>
                                        <option class="choose py-1" value="1">One</option>
                                        <option class="choose py-1" value="2">Two</option>
                                        <option class="choose py-1" value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-3 col-sm-6 mb-3">
                             <input type="text" placeholder="Postcode" class="form-control h-50px shadow-none rouded-0 Inpt w-100 border-0  fs-16 fw-normal" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-4 text-theme2 fw-bold fs-sm-25 fs-16">Event Date & Time</div>
                    <div class="col-sm-6 mb-3 flatpickr ">
                        <input type="text" placeholder="Start Date" class="form-control h-50px calendar shadow-none rouded-0 Inpt w-100 border-0  fs-sm-16 fs-14 fw-normal flatpickr-input active" id="basicDate" required="" readonly="readonly">
                        <div class="invalid-feedback fs-14">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 flatpickr ">
                        <input type="text" placeholder="End Date" class="form-control h-50px calendar shadow-none rouded-0 Inpt w-100 border-0  fs-sm-16 fs-14 fw-normal flatpickr-input active" id="endDate" required="" readonly="readonly">
                        <div class="invalid-feedback fs-14">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <input type="time" placeholder="Start Time" class="form-control h-50px clock shadow-none rouded-0 Inpt w-100 border-0  fs-16 fw-normal" required="">
                        <div class="invalid-feedback fs-14">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <input type="time" placeholder="Start Time" class="form-control h-50px clock shadow-none rouded-0 Inpt w-100 border-0  fs-16 fw-normal" required="">
                        <div class="invalid-feedback fs-14">
                        </div>
                    </div>
                    <div class="col-12 input-group mb-3">
                        <select class="form-select h-50px fs-sm-16 fs-14 shadow-none Inpt border-0" id="inputGroupSelect01">
                            <option class="choose py-1" selected="">Select Timezone</option>
                            <option class="choose py-1" value="1">One</option>
                            <option class="choose py-1" value="2">Two</option>
                            <option class="choose py-1" value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-12 my-4 text-theme2 fw-bold fs-sm-25 fs-16">Registration Status</div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label fs-sm-16 fs-14 fw-normal" for="flexRadioDefault1">Keep registration open</label>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label fs-sm-16 fs-14 fw-normal" for="flexRadioDefault2">Close registration</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    let copyText = document.querySelector(".copy-text");
    copyText.querySelector("span").addEventListener("click", function() {
        let input = copyText.querySelector("input.text");
        input.select();
        document.execCommand("copy");
        copyText.classList.add("active");
        window.getSelection().removeAllRanges();
        setTimeout(function() {
            copyText.classList.remove("active");
        }, 2500);
    });
</script>
<script>
    (function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>
@endpush