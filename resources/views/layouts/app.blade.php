<!DOCTYPE html>
<html lang="en">
<head>
    @if(View::hasSection('meta'))
        @yield('meta')
    @else
    <title>@lang('meta.'.Route::current()->getName())</title>
    @endif

    <!-- OG - tags facebook -->
    <meta property="og:url" content="http://gava-learning.be/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Gava" />
    <meta property="og:description" content="Peer to peer platform to keep up with the latest technologies.">
    <meta property="og:image" content="https://gava-learning.be/img/twittercard.png" />
    <meta property="fb:app_id" content="444821389748822" />
    
    <!-- Twitter cards -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@gavalearn" />
    <meta name="twitter:title" content="Gava" />
    <meta name="twitter:description" content="Peer to peer platform to keep up with the latest technologies.">
    <meta name="twitter:image" alt="twitter" content="https://gava-learning.be/img/twittercard.png" />
    <meta name="twitter:url" content="https://gava-learning.be/">
    <meta name="twitter:card" content="summary_large_image">
    
    <meta name="language" content="EN">
    <meta name="description" content="Gava learning">
    <meta name="keywords" content="gava, learn, teach, innovate, online, learning, technology, peer, social">
    <meta name="reply-to" content="gavalearn@gmail.com">
    <meta name="author" content="Siebe De Celle">
    <meta name="rating" content="general">
    <meta name="rating" content="safe for kids">
    <meta name="robots" content="index, nofollow">
    <meta name="robots" content="noydir">
    <meta name="googlebot" content="noodp">
    <meta name="googlebot" content="noarchive">
    <meta name="googlebot" content="nosnippet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Gava is focusing on the technology sectors. These have been in strong growth for some time and don't immediately think about a coffee break. It is therefore important for people in this sector or with interest to stay informed as much as possible.">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('extra-css')

    @yield('playerjs')
    
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    
    <!-- Canonical tag -->
    <link rel="canonical" href="https://gava-learning.be/">
</head>
<body class="gava min-vh-100">

    @yield('content')

    @guest
        @if(Route::getCurrentRoute() != null && Route::getCurrentRoute()->getName() != 'login'  && Route::getCurrentRoute()->getName() != 'register' && Route::getCurrentRoute()->getName() != 'landing')
            @include('components.login-popup')
        @endif
    @endguest
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('extra-js')
</body>
</html>