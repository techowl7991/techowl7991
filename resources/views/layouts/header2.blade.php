<nav class="navbar navbar-expand-lg bg-theme2 fixedHeader">
    <div class="container-fluid">
        <a class="navbar-brand w-sm-60px w-45px py-0" href="#"><img
                src="{{ asset('/public/new-design/img/logo-1.png') }}" alt="" class="w-100"></a>


        {{-- @if ('campaign_information' == request()->path()) --}}
            {{-- <div class="nav-body d-flex align-items-center gap-3" id="navbarSupportedContent">
                <a href=""
                    class="shadow-none border-0 text-decoration-none text-theme2 bg-light fs-14 fw-bold px-sm-3 p-1 px-2 py-1 top_right_export_btn text-uppercase rounded-5">Back</a>
                <a href=""
                    class="shadow-none border-0 text-decoration-none text-white bg-theme1 fs-14 fw-bold px-sm-3 p-1 px-2 py-1 top_right_export_btn text-uppercase rounded-5">Save
                    Changes</a>
            </div> --}}
        {{-- @else --}}
            <!-- Right Side Start -->
            <div class="nav-body d-flex align-items-center" id="navbarSupportedContent">
                <!-- SideClick Button -->
                <div class="me-3">
                    <button id="SideClick"
                        class="show_sidebar_btn shadow-none border-0 rounded bg-theme2 d-flex justify-content-center align-items-center"><i
                            class="imgs img-bars fs-sm-25 fs-20 text-white"></i></button>
                </div>
                <!-- SideClick Button End-->
                <ul class="navbar-nav me-auto mb-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link h-sm-35px h-30px w-sm-35px w-30px  rounded-circle bg-white d-flex justify-content-center align-items-center ms-auto"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="imgs img-user text-theme2 fs-sm-22 fs-18"></i>
                            <!-- <img src="{{ asset('/public/new-design/img/guests.png') }}" alt="" class="w-25px" > -->
                        </a>
                        <ul class="dropdown-menu rounded-0 p-0 bg-theme2 top-lg-45px top-41px">
                            <li><a class="dropdown-item text-white d-flex justify-content-start align-items-center gap-2"
                                    href="{{ route('useraccount', session()->get('uid')) }}"><i
                                        class="imgs img-user text-white fs-18"></i> <span class="fs-16">My
                                        Account</span>
                                </a></li>
                            <li><a class="dropdown-item text-white d-flex justify-content-start align-items-center gap-2"
                                    href="{{ route('logout') }}"><i class="imgr img-power-off text-white fs-18"></i>
                                    <span class="fs-16">Log out</span> </a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Right Side End -->
        {{-- @endif --}}
    </div>
</nav>
