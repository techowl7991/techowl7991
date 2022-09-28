<div class="sidebar">
    <ul class="py-2 px-1">
        <li><a class="text-decoration-none mb-1 text-white rounded p-2 d-flex justify-content-start         align-items-center gap-2"
                href="#"><img src="{{ asset('/public/new-design/img/dashboard.png') }}" alt=""
                    class="w-18px"><span class="fs-16 fs-normal">Dashboard</span> </a></li>
                   
        <li><a class="{{ 'printdata/'.session()->get('eventid') == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{route('eventdt',session()->get('eventid'))}}"><img src="{{ asset('/public/new-design/img/Guest.png') }}" alt=""
                    class="w-22px"><span class="fs-16 fs-normal">Guests</span> </a></li>

        <li><a class="{{ 'email' == request()->path() || 'view_email' == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{ route('email') }}"><img src="{{ asset('/public/new-design/img/Email-1.png') }}" alt=""
                    class="w-22px"> <span class="fs-16 fs-normal">Email</span> </a></li>

        <li><a class="{{ 'get_analytics' == request()->path() || 'analytics_booth_name' == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{ route('get_analytics') }}"><img src="{{ asset('/public/new-design/img/analytic.png') }}"
                    alt="" class="w-22px"> <span class="fs-16 fs-normal">Analytics</span> </a></li>


        <li><a class="{{ 'get_setting' == request()->path() ? 'active' : '' }} text-decoration-none mb-1  text-white rounded p-2 d-flex justify-content-start align-items-center gap-2"
                href="{{ route('get_setting') }}"><i class="imgs img-cog text-white fs-18"></i> <span
                    class="fs-16 fs-normal">Setting</span> </a></li>
    </ul>
</div>
