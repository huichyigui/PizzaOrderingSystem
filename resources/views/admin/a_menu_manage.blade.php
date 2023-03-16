{{-- Author: Gui Hui Chyi --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Admin | Manage Menu</title>
    <meta name="_token" content="{{ csrf_token() }}" />
    @include('admin.base.a_head')
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.base.a_header')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('admin.base.a_sidebar')
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
                                                    <div class="card-block">
                                                        <div class="row" id="manage_menu">
                                                            <div class="col">
                                                                <a href="{{ url('admin/addMenu') }}"
                                                                    class="btn btn-warning"
                                                                    style="margin-bottom:20px; border-radius: 20px;">New
                                                                    Menu</a>
                                                                <h4 class="sub-title">Menu Lists</h4>
                                                                <div class="card-block table-border-style">
                                                                    <div class="table-responsive">
                                                                        <table id="datatable"
                                                                            class="table data-table-export table-hover nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="table-plus">#</th>
                                                                                    <th>Name</th>
                                                                                    <th>Image</th>
                                                                                    <th>Stock</th>
                                                                                    <th>Price (RM)</th>
                                                                                    <th>Category</th>
                                                                                    <th>Description</th>
                                                                                    <th class="datatable-nosort">Action
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if (isset($activeIT) && $activeIT->hasCurrent())
                                                                                    @while ($activeIT->hasCurrent())
                                                                                        @php $item = $activeIT->next() @endphp
                                                                                        <tr id="{{ $item->menu_id }}">
                                                                                            <td>{{ $activeIT->position() }}
                                                                                            </td>
                                                                                            <td>{{ $item->name }}</td>
                                                                                            <td>
                                                                                                <img src="{{ asset('img/menu/' . $item->image) }}"
                                                                                                    width="40px"
                                                                                                    height="40px"
                                                                                                    alt="{{ $item->name }}">
                                                                                            </td>
                                                                                            <td>{{ $item->stock }}
                                                                                            </td>
                                                                                            <td>{{ $item->price }}
                                                                                            </td>
                                                                                            <td>{{ $item->category }}
                                                                                            </td>
                                                                                            <td>{{ $item->description }}
                                                                                            </td>
                                                                                            <td
                                                                                                class="datatable-nosort">
                                                                                                <a href="{{ url('admin/manageMenu/edit')}}/{{Crypt::encrypt($item->menu_id)}}"
                                                                                                    class="badge badge-primary"><i
                                                                                                        class="ti-pencil"></i></a>
                                                                                                <a href="{{ url('admin/manageMenu/delete/' . $item->menu_id) }}"
                                                                                                    class="badge badge-danger"><i
                                                                                                        class="ti-trash"
                                                                                                        title="delete"
                                                                                                        onclick="return confirm('Do you want to delete this menu?')"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endwhile
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h4 class="sub-title">Deleted Menu</h4>
                                                                <div class="card-block table-border-style">
                                                                    <div class="table-responsive">
                                                                        <table
                                                                            class="table data-table-export table-hover nowrap">
                                                                            <thead>
                                                                                <th class="table-plus">#</th>
                                                                                <th>Name</th>
                                                                                <th>Image</th>
                                                                                <th>Stock</th>
                                                                                <th>Price (RM)</th>
                                                                                <th>Category</th>
                                                                                <th>Description</th>
                                                                                <th class="datatable-nosort">Action</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if (isset($inactiveIT) && $inactiveIT->hasCurrent())
                                                                                    @while ($inactiveIT->hasCurrent())
                                                                                        @php $item = $inactiveIT->next() @endphp
                                                                                        <tr id="{{ $item->menu_id }}">
                                                                                            <td>{{ $inactiveIT->position() }}
                                                                                            </td>
                                                                                            <td>{{ $item->name }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <img src="{{ asset('img/menu/' . $item->image) }}"
                                                                                                    width="40px"
                                                                                                    height="40px"
                                                                                                    alt="{{ $item->name }}">
                                                                                            </td>
                                                                                            <td>{{ $item->stock }}
                                                                                            </td>
                                                                                            <td>{{ $item->price }}
                                                                                            </td>
                                                                                            <td>{{ $item->category }}
                                                                                            </td>
                                                                                            <td>{{ $item->description }}
                                                                                            </td>
                                                                                            <td
                                                                                                class="datatable-nosort">
                                                                                                <a href="{{ url('admin/manageMenu/edit')}}/{{Crypt::encrypt($item->menu_id)}}"
                                                                                                    class="badge badge-primary"><i
                                                                                                        class="ti-pencil"></i></a>
                                                                                                <a href="{{ url('admin/manageMenu/recover/' . $item->menu_id) }}"
                                                                                                    class="badge badge-danger"><i
                                                                                                        class="ti-back-left"
                                                                                                        title="recover"
                                                                                                        onclick="return confirm('Do you want to recover this menu?')"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endwhile
                                                                                @endif
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
