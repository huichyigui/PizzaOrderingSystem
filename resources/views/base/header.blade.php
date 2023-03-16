{{-- Author: Gui Hui Chyi --}}
<!-- header section strats -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>
                    Tap<span class="text-warning">N</span>Go
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item @if ($name == 'home') active @endif">
                        <a class="nav-link" href="{{ route('home') }}">Home </a>
                    </li>
                    <li class="nav-item @if ($name == 'menu') active @endif">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item @if ($name == 'order') active @endif">
                        <a class="nav-link" href="{{ route('orderPage') }}">Order</a>
                    </li>
                    <li class="nav-item @if ($name == 'cart') active @endif">
                        <a class="nav-link cart" href="{{ route('cartPage') }}">
                            <span>
                                cart
                            </span>

                            @if (Session::get('cartTotQty'))
                                <span class="badge bg-secondary right" style="background-color:red !important;">
                                    {{ Session::get('cartTotQty') }}
                                </span>
                            @endif
                        </a>
                    </li>
                </ul>

                @if (Route::has('login'))
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li class="nav-item @if ($name == 'dashboard') active @endif">
                                @if (auth()->user()->role_level == 8)
                                    <a class="nav-link" href="{{ url('/admin/index') }}">Dashboard</a>
                                @else
                                    <a class="nav-link" href="{{ url('/profile') }}">Dashboard</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item @if ($name == 'login') active @endif">
                                <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item @if ($name == 'login') active @endif">
                                    <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
