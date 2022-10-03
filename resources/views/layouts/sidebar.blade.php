<div class="sidebar">
    <ul class="py-2 px-1">
        <li><a class="text-decoration-none mb-1 text-white rounded p-2 d-flex justify-content-start         align-items-center gap-2"
                href="#"><img class="svg-white " src="{{ asset('/public/new-design/img/icon/dashboard.svg') }}" alt=""
                    class="w-18px"><span class="fs-16 fs-normal">Dashboard</span> </a></li>
                @php
                    $sess = (session()->get('eventid'))?session()->get('eventid'):0
                @endphp
        <li><a class="{{ 'printdata/'.$sess == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{route('eventdt',$sess)}}"><img class="svg-white" src="{{ asset('/public/new-design/img/icon/people.svg') }}" alt=""
                    class="w-22px"><span class="fs-16 fs-normal">Guests</span> </a></li>

        <li><a class="{{ 'email' == request()->path() || 'view_email' == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{ route('email') }}"><img class="svg-white" src="{{ asset('/public/new-design/img/icon/email.svg') }}" alt=""
                    class="w-22px"> <span class="fs-16 fs-normal">Email</span> </a></li>

        <li><a class="{{ 'get_analytics' == request()->path() || 'analytics_booth_name' == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{ route('get_analytics') }}"><img class="svg-white" src="{{ asset('/public/new-design/img/icon/leaderboard.svg') }}"
                    alt="" class="w-22px"> <span class="fs-16 fs-normal">Analytics</span> </a></li>


        <li><a class="{{ 'get_setting' == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{ route('get_setting') }}"><i class="imgs img-cog text-white fs-18"></i> <span
                    class="fs-16 fs-normal">Setting</span> </a></li>
        <li><a class="{{ 'viewwebsite/'.$sess == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
        href="{{route('viewwebsite',[$sess])}}"><img class="svg-white" src="{{ asset('/public/new-design/img/icon/people.svg') }}" alt=""
        class="w-22px"><span class="fs-16 fs-normal">Micro Website</span> </a></li>
        <p id="item-to-copy" style="display: none">{{route('viewwebsiteusers',[session()->get('uid'),$sess])}}</p>
        <button class="text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2" style=" background: #3b863b;width: 50%;margin: 30px;" onclick="myFunction()"
            ><span class="fs-16 fs-normal">Copy Url</span> </button>
</ul>



</div>
