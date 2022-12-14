<nav class="navbar navbar-expand-lg bg-theme2 fixedHeader">
    <div class="container-fluid">
        <a class="navbar-brand w-sm-60px w-45px py-0" href="https://console.techowl.in/guest/index/{{session()->get('uid')}}"><img
                src="{{ asset('/public/new-design/img/logo-white.svg') }}" alt="" class="w-100"></a>

        <!-- Right Side Start -->
        <div class="nav-body d-flex align-items-center" id="navbarSupportedContent">
            <!-- SideClick Button -->
            @if (request()->is('campaign_information'))
                <!-- <div class="me-3">
                    <button id="SideClick"
                        class="show_sidebar_btn shadow-none border-0 rounded bg-theme2 d-flex  justify-content-center align-items-center d-none"><i
                            class="imgs img-bars fs-sm-25 fs-20 text-white"></i>
                    </button>
                </div> -->
                
                <a href="{{route('email')}}"
                    class="btn btn-light shadow-none border-0 text-decoration-none text-theme2 fs-14 fw-600 top_right_export_btn text-uppercase rounded-5">Back</a>
                <a href="#"
                    class="btn btn-theme1 shadow-none border-0 text-decoration-none text-white fs-14 fw-600 top_right_export_btn text-uppercase rounded-5 ms-3">Save
                    Changes</a>
            @else
                <!-- <div class="me-3">
                    <button id="SideClick"
                        class="show_sidebar_btn shadow-none border-0 rounded bg-theme2 d-flex  justify-content-center align-items-center"><i
                            class="imgs img-bars fs-sm-25 fs-20 text-white"></i>
                    </button>
                </div> -->
                <ul class="navbar-nav me-auto mb-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link h-sm-35px h-30px w-sm-35px w-30px  rounded-circle bg-white d-flex justify-content-center align-items-center ms-auto"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/public/new-design/img/icon/profile.svg') }}" alt="" class="w-30px" >
                        </a>
                        <ul class="dropdown-menu rounded-0 p-0 bg-theme2 top-lg-45px top-41px">
                            <li><a class="dropdown-item text-white d-flex justify-content-start align-items-center gap-2"
                                    href="{{ route('useraccount', session()->get('uid')) }}"><i class="imgs img-user text-white fs-18"></i> <span class="fs-16">My
                                        Account</span>
                                </a></li>
                            <li><a class="dropdown-item text-white d-flex justify-content-start align-items-center gap-2"
                                    href="{{ route('logout') }}"><i class="imgr img-power-off text-white fs-18"></i>
                                    <span class="fs-16">Log out</span> </a></li>

                        </ul>
                    </li>
                </ul>
                <!-- Right Side End -->
        </div>
        @endif
    </div>
</nav>
