{{-- Author: Gui Hui Chyi --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Menu</title>
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
                <h2>Our Menu</h2>
            </div>
            {{-- Sort & Search Bar Start --}}
            <nav class="row border-3 border-radius-8px d-flex p-2 align-items-center justify-content-between">
                <div class="group1 col-12 col-lg-4 px-0">
                    <div id="sort" class="d-flex align-items-center">
                        <h5 class="m-0 h-100 p-2">Sort:</h5>

                        @if ($sort == 'Latest' || $sort == '')
                            <a href="{{ url('/menu/' . 'Earliest' . '/' . $filter . '/' . $search) }}"
                                class="btn btn-sm btn-outline-dark mr-2
                            @if ($sort == 'Latest' || $sort == '') active @endif">
                                Time<i class="fa fa-hourglass-start ml-1"></i>
                            </a>
                        @else
                            <a href="{{ url('/menu/' . 'Latest' . '/' . $filter . '/' . $search) }}"
                                class="btn btn-sm btn-outline-dark mr-2
                        @if ($sort == 'Earliest' || $sort == '') active @endif">
                                Time<i class="fa fa-hourglass-end ml-1"></i>
                            </a>
                        @endif

                        @if ($sort == 'High-Price')
                            <a href="{{ url('/menu/' . 'Low-Price' . '/' . $filter . '/' . $search) }}"
                                class="btn btn-sm btn-outline-dark mr-2
                            @if ($sort == 'High-Price') active @endif">
                                Price<i class='fa fa-sort-amount-desc ml-1'></i>
                            </a>
                        @else
                            <a href="{{ url('/menu/' . 'High-Price' . '/' . $filter . '/' . $search) }}"
                                class="btn btn-sm btn-outline-dark mr-2
                            @if ($sort == 'Low-Price') active @endif">
                                Price<i class='fa fa-sort-amount-asc ml-1'></i>
                            </a>
                        @endif

                        @if ($sort == 'A-Z')
                            <a href="{{ url('/menu/' . 'Z-A' . '/' . $filter . '/' . $search) }}"
                                class="btn btn-sm btn-outline-dark mr-2 @if ($sort == 'A-Z') active @endif">
                                Name<i class='fa fa-sort-alpha-asc ml-1'></i>
                            </a>
                        @else
                            <a href="{{ url('/menu/' . 'A-Z' . '/' . $filter . '/' . $search) }}"
                                class="btn btn-sm btn-outline-dark mr-2 @if ($sort == 'Z-A') active @endif">
                                Name<i class='fa fa-sort-alpha-desc ml-1'></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="group2 col-12 col-lg-4 d-flex">
                    <div id="category" class="d-flex align-items-center">
                        <select name="category" class="form-control form-control-sm">
                            <option value="Any" hidden selected>Select a Category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->category }}"
                                    @if ($filter == $category->category) selected @endif>{{ $category->category }}
                                </option>
                            @empty
                                <option value="" disabled>No category found</option>
                            @endforelse
                        </select>
                        <a href="{{ url('/menu/' . $sort . '/' . $filter . '/' . $search) }}"
                            class="btn btn-sm btn-dark ml-1">Filter</a>
                    </div>
                </div>

                <div class="group3 col-12 col-lg-4">
                    <div id="search" class="d-flex align-items-center">
                        <input type="text" name="search" class="form-control" placeholder="Search Menu">
                        <a href="{{ url('/menu/' . $sort . '/' . $filter . '/' . $search) }}"
                            class="btn btn-sm btn-dark ml-2">Search</a>
                    </div>
                </div>
            </nav>
            {{-- Items starts --}}
            <div class="">
                <div class="row">
                    {{-- Get menu from xml and xslt --}}
                    {!! $menu !!}
                </div>
            </div>
            {{-- Items ends --}}
        </div>
        {{-- Sort & Search Bar End --}}
    </section>
    @include('base.footer')
    @include('base.script')
    <script src="{{ asset('user/js/menu.js') }}"></script>
</body>

</html>
