{{-- Author: Gui Hui Chyi --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Admin | Menu | Add</title>
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
                                                    <div class="card-header">
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col">
                                                                <form method="POST"
                                                                    action="{{ url('admin/addMenu/add') }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <h4 class="sub-title">Menus</h4>
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <label><span class="text-danger">*</span> Menu Name</label><br>
                                                                            <input type="text" name="name"
                                                                                id="name"
                                                                                placeholder="Enter Menu Name"
                                                                                class="form-control
                                                                                @error('name') border border-danger @enderror">
                                                                            @error('name')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label><span class="text-danger">*</span> Menu Description</label><br>
                                                                            <textarea name="description" id="description"
                                                                                class="form-control
                                                                                @error('description') border border-danger @enderror"
                                                                                rows="3" placeholder="Enter Menu Description" style="resize: none;"></textarea>
                                                                            @error('description')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-border form-group">
                                                                            <label><span class="text-danger">*</span> Menu Image</label><br>
                                                                            <input type="file" name="image"
                                                                                id="menu-file"
                                                                                class="form-control-file">
                                                                            @error('image')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label><span class="text-danger">*</span> Menu Price (RM)</label><br>
                                                                            <input type="text" name="price"
                                                                                id="price"
                                                                                class="form-control
                                                                                @error('price') border border-danger @enderror"
                                                                                placeholder="Enter Menu Price">
                                                                            @error('price')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label><span class="text-danger">*</span> Menu Stock</label><br>
                                                                            <input type="text" name="stock"
                                                                                id="stock"
                                                                                class="form-control
                                                                                @error('stock') border border-danger @enderror"
                                                                                placeholder="Enter Menu Stock">
                                                                            @error('stock')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label><span class="text-danger">*</span> Menu Category</label>
                                                                            <input type="text" name="category"
                                                                                id="category"
                                                                                class="form-control
                                                                                @error('category') border border-danger @enderror"
                                                                                placeholder="Enter Menu Category">
                                                                            @error('category')
                                                                                <div class="text-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="pb-4 mt-4">
                                                                        <button type="submit" name="submit"
                                                                            value="add"
                                                                            class="btn btn-primary">Add</button>
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
