<!DOCTYPE html>
<html lang="en">
  {{-- Author: Fong Zhi Jun --}}
<head>
    <title>TapNGo | User Report | Add</title>
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
                        <div class="pcoded-inner-content pt-0">
                            <div class="align-align-self-end" style="margin-top: 20px">
                                @if (session()->has('success'))
                                    <div class="alert alert-success" id="success">
                                        <button type="button" style="margin-top: 0;" class="close"
                                            data-dismiss="alert" aria-hidden="true">x</button>
                                        {{ session()->get('success') }}
                                    </div>
                                    <script>
                                        // For disappearing alert message //
                                        window.onload = function() {
                                            var seconds = 5;
                                            setTimeout(function() {
                                                document.getElementById("success").style.display = "none";
                                            }, seconds * 1000);
                                        };
                                    </script>
                                @endif
                            </div>
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="card-header text-center">
                                            <h3>User Report List</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table-dark text-center">
                                                <thead class="thead-inverse text-center">
                                                    <tr>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Address</th>
                                                        <th class="text-center">Phone Number</th>
                                                        <th class="text-center">Role Level</th>
                                                        <th class="text-center">Email Verified At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {!! $userreport !!}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <h5 class="pl-4">Total Customers = {{ $customerResult }}</h5>
   
                                    <h5 class="pl-4">Total Riders = {{ $riderResult }}</h5>
                 
                                    <h5 class="pl-4">Total Admins = {{ $adminResult }}</h5>
                                    <p>&nbsp;  </p>
                            
                                    <h5 class="pl-4">Total Users = {{ $totaluser }}</h5>
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
    </div>
    @include('admin.base.a_script')
</body>

</html>
