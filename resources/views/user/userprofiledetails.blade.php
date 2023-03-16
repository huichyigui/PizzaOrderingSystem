<!DOCTYPE html>
<html lang="en">
  {{-- Author: Fong Zhi Jun --}}
<head>
    <title>TapNGo | Update Profile</title>
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
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col">
                                                                <form method="POST"
                                                                    action="{{ url('profile/update/proceed') }}"
                                                                    enctype="multipart/form-data">

                                                                    @csrf
                                                                    <h4 class="sub-title">Profile Details</h4>
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <label>User Name</label><br>
                                                                            <input type="text" name="name"
                                                                                id="name"
                                                                                placeholder="Enter Your User Name"
                                                                                required
                                                                                value="{{ auth()->user()->name }}"
                                                                                autofocus @if (auth()->user()->role_level ==1)
                                                                                disabled                                                                                @endif
                                                                                class="form-control
                                                                    @if (isset($validation) && isset($validation->msg->name)) border border-danger @endif">
                                                                            @if (isset($validation) && isset($validation->msg->name))
                                                                                <div class="text-danger">
                                                                                    {{ $validation->msg->name }}</div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Email Address</label><br>
                                                                            <input type="text" name="email"
                                                                                id="name"
                                                                                placeholder="Enter Your Email Address"
                                                                                disabled
                                                                                value="{{ auth()->user()->email }}"
                                                                                autofocus
                                                                                class="form-control
                                                                    @if (isset($validation) && isset($validation->msg->email)) border border-danger @endif">
                                                                            @if (isset($validation) && isset($validation->msg->email))
                                                                                <div class="text-danger">
                                                                                    {{ $validation->msg->email }}</div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Password</label><br>
                                                                            <input type="password" name="password"
                                                                                id="password"
                                                                                placeholder="Enter Your New Password"
                                                                                required value=" " autofocus
                                                                                class="form-control
                                                                    @if (isset($validation) && isset($validation->msg->password)) border border-danger @endif">
                                                                            @if (isset($validation) && isset($validation->msg->password))
                                                                                <div class="text-danger">
                                                                                    {{ $validation->msg->password }}
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Address*</label><br>
                                                                            <input type="text" name="address"
                                                                                id="name"
                                                                                placeholder="Enter Your Address"
                                                                                required
                                                                                value="{{ auth()->user()->address }}"
                                                                                autofocus
                                                                                class="form-control
                                                                    @if (isset($validation) && isset($validation->msg->address)) border border-danger @endif">
                                                                            @if (isset($validation) && isset($validation->msg->address))
                                                                                <div class="text-danger">
                                                                                    {{ $validation->msg->address }}
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Phone Number*</label><br>
                                                                            <input type="text" name="phone_number"
                                                                                id="phone_number"
                                                                                placeholder="Enter Your Phone Number"
                                                                                required
                                                                                value="{{ auth()->user()->phone_number }}"
                                                                                autofocus
                                                                                class="form-control
                                                                    @if (isset($validation) && isset($validation->msg->phone_number)) border border-danger @endif">
                                                                            @if (isset($validation) && isset($validation->msg->phone_number))
                                                                                <div class="text-danger">
                                                                                    {{ $validation->msg->phone_number }}
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                    </div>

                                                                    <x-auth-validation-errors class="text-danger"
                                                                        :errors="$errors" />

                                                                    <div class="pb-4 mt-4">
                                                                        <button type="submit" name="submit"
                                                                            value="edit"
                                                                            class="btn btn-primary">Update</button>
                                                                        <button type="reset"
                                                                            class="btn btn-primary">Clear</button>
                                                                    </div>
                                                                </form>
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
                </div>
            </div>
        </div>
    </div>
    @include('admin.base.a_script')
</body>

</html>
