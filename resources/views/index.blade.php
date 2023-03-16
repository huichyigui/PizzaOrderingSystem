{{-- Author: Gui Hui Chyi --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Home</title>
    @include('base.head')
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img style="filter: brightness(55%)" src="{{ asset('user/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('base.header')
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Tap<span class="text-warning">N</span>Go!
                                        </h1>
                                        <p>
                                            Freedom's tasty, come and take a bite out of it. Pure, unadulterated,
                                            don't-tell-me-what-to-do-freedom, the kind that makes you feel, well...
                                            Free. So grab your taste buddies - and let's hustle.
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ url('menu') }}" class="btn1">
                                                View Menu
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Tap<span class="text-warning">N</span>Go!
                                        </h1>
                                        <p>
                                            Freedom's tasty, come and take a bite out of it. Pure, unadulterated,
                                            don't-tell-me-what-to-do-freedom, the kind that makes you feel, well...
                                            Free. So grab your taste buddies - and let's hustle.
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ url('menu') }}" class="btn1">
                                                View Menu
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Tap<span class="text-warning">N</span>Go!
                                        </h1>
                                        <p>
                                            Freedom's tasty, come and take a bite out of it. Pure, unadulterated,
                                            don't-tell-me-what-to-do-freedom, the kind that makes you feel, well...
                                            Free. So grab your taste buddies - and let's hustle.
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ url('menu') }}" class="btn1">
                                                View Menu
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>
    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('user/images/bg_1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                We Are Tap<span class="text-warning">N</span>Go
                            </h2>
                        </div>
                        <p class="text-justify">
                            It’s a simple equation that keeps our customers coming back for more. Always fresh toppings
                            and great service plus low, low prices equals great pizza. Here at TapNGo Pizza, we
                            strive to give our customers the best. We're one of the few family-owned companies left that
                            still truly care about our customers. <br><br>
                            Our customers can count on prompt and quality service, high-quality food made from
                            high-quality products with the freshest ingredients available and great prices. Whether
                            you’re looking to feed your family or cater a gathering or lunch meeting, feeding a large
                            group is both easy and affordable at TapNGo Pizza.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    @include('base.footer')
    @include('base.script')
</body>

</html>
