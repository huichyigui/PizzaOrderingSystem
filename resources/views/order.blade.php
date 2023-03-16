{{-- Author: Beh Guo Hao --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Order</title>
    @include('base.head')
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img style="filter: brightness(55%)" src="{{ asset('user/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('base.header')
    </div>
    @if (Session::has('status'))
        <div class="p-4 mb-3 bg-green-400 rounded" id="msg">
            <p class="text-green-800" style="background-color:green; color:white; text-align:center; ">{{ Session::pull('status'); }}</p>
        </div>
    @endif

    <script>
        setTimeout(function() {
            $("#msg").fadeOut('fast');
        }, 5000);
    </script>

    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center pb-5">
                <h2>Your Orders</h2>
            </div>

            {{-- Display order items --}}
            <div class="row-container">
                {{-- Get order from xml and xslt --}}
                {!! $order !!}
            </div>
            {{-- Display ends --}}
        </div>

    </section>
    @include('base.footer')
    @include('base.script')
</body>

</html>
