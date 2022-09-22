<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- 
// ? 0 ,00000, .000000   .000000 0     .0000. 0000b,    0    0       0 db   0 d0000 .0000. 00000 d000b d000b  0    0
// ? 0 0  0  0 0  ,,,,   0  ,,,, 0     0    0 0 ___)   0 0   0       0 0 0  0 0     0    0   0   0     0      0    0
// ? 0 0  0  0 0     0   0     0 0     0    0 0    )  0   0  0       0 0  0 0 0"""" 0    0   0   0"""" 0      0""""0
// ? 0 0  0  0 "000000   "000000 00000 '0000' 0000d' 0"""""0 d0000   0 0   db 0     '0000'   0   d000b d000b  0    0
-->

<head>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
    <meta name="theme-color" content="#1a73e9" />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />

    <meta name="web-author" content="author_name" />
    <meta name="googlebot" content="all">
    <meta name="revisit-after" content="3 days">
    <meta name="copyright" content="author_name">
    <meta name="language" content="English">
    <meta name="reply-to" content="supportmail@gmail.com">
    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />

    <meta name="robots" content="index, follow" />
    
    <meta name="twitter:site" content="@twitter_username">
    <meta name="twitter:creator" content="@twitter_username">
    <meta name="twitter:card" content="summary">

    
    <meta property="fb:app_id" content="0" />

    <meta property="og:type" content="website">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    @stack('meta')

    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2tal,wght@0,200;0,300;0,4?family=Nunito:i00;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="{{ asset('public/new-design/libs/jQuery/jquery-3.6.0.min.js') }}"></script>
    
    
    <link rel="stylesheet" href="{{ asset('public/new-design/css/bootstrap.min.css') }}">

    
    <link rel="stylesheet" href="{{ asset('public/new-design/css/imgIcons.min.css') }}">

    
    <link rel="stylesheet" href="{{ asset('public/new-design/css/bijarniadream.min.css') }}">

    @stack('styles')

    
    <link rel="stylesheet" href="{{ asset('public/new-design/css/style.min.css') }}" />
</head>
<body class="vh-100 overflow-hidden DashBoardSection">
    @include('layouts.preloader')
    <div class="d-flex flex-column">
    @include('layouts.header2')
    <div class="bodyScrollPart d-flex" id="bodyScrollPart">
        <div class="sidebarSide">
    @include('layouts.sidebar')
        </div>
        <div class="contentSide px-2 py-4">
            <main class="main-scrollbar">
                @yield('content')
            </main>
        </div>
    </div>
    </div>



    
    <script src="{{ asset('public/new-design/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    @stack('scripts')

    <script src="{{ asset('public/new-design/js/main.min.js') }}"></script>

</body>
</html>
