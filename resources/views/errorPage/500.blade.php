{{-- Author: Gui Hui Chyi --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo Pizza | 500</title>
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
                <h1>5<span>0</span>0</h1>
            </div>
            <br>
            <br>
            <br>
            <p>The server encountered an internal error or misconfiguration and was unable to complete your request.</p>
            <a href="#">Home Page</a>
        </div>
    </div>
    @include('base.footer')
    @include('base.script')
</body>

</html>
