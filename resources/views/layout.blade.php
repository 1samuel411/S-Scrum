<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset = "UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>S-SCRUM</title>

    <link rel='stylesheet' href='/css/style.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/loading.js"></script>
    <script src="/js/scroll.js"></script>
    <script src="/js/contact.js"></script>
</head>

<p id = "head" style = "padding-top:-200px;">
</p>

<div class = "loading" id = "loadingBar">
    <img src = "/images/loading.gif" class = "loadingBar">
</div>

<header>
    <nav class = "toolbar" id = "header">
        <ul class = "ulNav">
            <div>
                <img class = "logo" src = "/images/logo.png">
            </div>
            @if ((Session::get('authorized')) == true)
                <li class = "liNav"><a href='/account'>{{Session::get('username')}}</a></li>
            @else
                <li class = "liNav"><a href='/login'>Login/Register</a></li>
            @endif
            <li class = "liNav"><a onclick = "scollToLocation('contact')" href="javascript:;">Contact</a></li>
            <li class = "liNav"><a onclick = "scollToLocation('about')" href="javascript:;">About</a></li>
            <li class = "liNav"><a onclick = "scollToLocation('home')" href="javascript:;">Home</a></li>
        </ul>
    </nav>
</header>

<body id = "home" style = "padding-top:-500px;">
    <div style = "margin-left:100px; margin-right:100px;">
        @yield('content')
    </div>
</body>

</html>