{{-- Author: Ng Jun Chen --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Delivery</title>
    @include('base.head')
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img style="filter: brightness(55%)" src="{{ asset('user/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('base.header')
    </div>
    <div class="background">
        <img style="margin:50px auto; display: block; height: 450px" src="{{ asset('img/delivery/ready.png') }}" alt="">
    </div>
    <div class="desc" style="text-align: center">
        <h1 style="margin: 50px 100px">
            We have received your order.<br>
            Please wait for around 15 to 30 minutes to serve your order... 
        </h1>
    </div>
    @include('base.footer')
    @include('base.script')
</body>