{{-- Author: Beh Guo Hao --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo Pizza | 401</title>
    @include('base.head')
    <link rel="stylesheet" href="{{asset('user/css/errorpage.css')}}">
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img style="filter: brightness(55%)" src="{{ asset('user/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('base.header')
    </div>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>4<span>0</span>1</h1>
            </div>
            <br>
            <br>
            <br>
            <p>You cannot perform this action, please login to continue.</p>
            <a href="/login">Login</a>
        </div>
    </div>
    @include('base.footer')
    @include('base.script')
</body>

</html>
