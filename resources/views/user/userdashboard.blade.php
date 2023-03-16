  {{-- Author: Fong Zhi Jun --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | User | Dashboard</title>
    @include('admin.base.a_head')
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('user.userheader')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('user.usersidebar')
                    <div class="pcoded-content">
                        <!-- Warning-color Breadcrumb card start -->
                        <div class="card borderless-card" style="margin-bottom: 0px">
                            <div class="card-block warning-breadcrumb">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('admin/index') }}">
                                                <i class="icofont icofont-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">{{ $name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Warning-color Breadcrumb card end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <h3>Welcome! You are logged in.</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.base.a_script')
</body>

</html>
