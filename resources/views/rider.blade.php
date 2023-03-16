{{-- Author: jc --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TapNGo | Delivery</title>
    @include('base.head')
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img style="filter: brightness(55%)" src="{{ asset('user/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('base.header')
    </div>
    <section style="padding:50px 50px; ">
        <table class="table table-hover table-dark text-center">
            <thead class="thead-inverse text-center">
                <tr>
                    <th class="text-center">Location</th>
                    <th class="text-center">Start Time</th>
                    <th class="text-center">End Time</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                {!! $deliveryReport !!}
            </tbody>
        </table>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('delivery.changeStatus') }}" enctype="multipart/form-data">
            @csrf
            Delivery ID: <input type="text" name="deliveryID" class="form-control">
            <button type="submit">Change Status</button>
        </form>
    </section>
    @include('base.footer')
    @include('base.script')
</body>
