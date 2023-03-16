  {{-- Author: Fong Zhi Jun --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Manage User</title>
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
                                    <div class="page-body ">
                                        <div class="card-header text-center">
                                            <h3>Manage User</h3>
                                        </div>
                                        <div class="card-body ">
                                            <table class="table table-hover table-dark text-center">
                                                <thead class="thead-inverse text-center">
                                                    <tr>
                                                        <th class="text-center">User ID</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Role Level</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($users as $user)
                                                        <tr>
                                                            <th scope="row" class="text-center">{{ $user->id }}
                                                            </th>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->role_level }}</td>
                                                            <td>
                                                                <form action="{{ route('user.delete', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
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
