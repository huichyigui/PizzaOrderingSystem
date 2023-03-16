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
    <section style="margin: 50px">
        <input type="button" value="Place Order" style="margin: 50px 50px" onclick="window.location='{{ route('orderPlaced') }}'"/>
        <input type="button" value="Check status" style="margin: 50px 50px" onclick="window.location='{{ route('checkStatus') }}'"/>

        <table border="1">
            <tr style="padding:10px">
                <td style="padding:10px">Delivery ID</td>
                <td style="padding:10px">Location</td>
                <td style="padding:10px">start Time</td>
                <td style="padding:10px">End Time</td>
                <td style="padding:10px">Status</td>
            </tr>
            @foreach ($deliveries as $delivery)
                <tr style="padding:10px">
                    <td style="padding:10px">{{ $delivery->deliveryID }}</td>
                    <td style="padding:10px">{{ $delivery->deliveryLocation }}</td>
                    <td style="padding:10px">{{ $delivery->deliveryStartTime }}</td>
                    <td style="padding:10px">{{ $delivery->deliveryEndTime }}</td>
                    <td style="padding:10px">{{ $delivery->deliveryStatus }}</td>
                </tr>
            @endforeach
        </table>

        <form method="POST" action="{{ route('delivery.changeStatus') }}" enctype="multipart/form-data">
            @csrf
            Delivery ID: <input type="text" name="deliveryID" class="form-control">
            <button type="submit">Change Status</button>
        </form>
    </section>
    @include('base.footer')
    @include('base.script')
</body>