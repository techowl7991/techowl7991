<nav class="navbar navbar-expand-lg bg-theme2 fixedHeader">
  <div class="container-fluid">
    <a class="navbar-brand w-sm-60px w-45px py-0" href="#"><img src="{{ asset('/public/new-design/img/logo-1.png') }}" alt="" class="w-100"></a>
    <div class="nav-body d-flex align-items-center gap-2" id="navbarSupportedContent">
      @if (url()->current()==route('addkeeper',[$mid]))
      <a id="SideClick" href="{{route('viewgatekeeper',[session()->get('uid')])}}" class="shadow-none border-0  rounded fs-14 fw-bold px-sm-4 px-3 py-sm-2 py-1 cancle_btn">CANCEL</a>
      @else
      <a id="SideClick" href="{{route('index',[session()->get('uid')])}}" class="shadow-none border-0  rounded fs-14 fw-bold px-sm-4 px-3 py-sm-2 py-1 cancle_btn">CANCEL</a>
      @endif
    </div>
  </div>
</nav>