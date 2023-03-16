{{-- Author: Beh Guo Hao --}}

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Payment</title>
  </head>
  <link href="{{asset('user/css/payment.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <h2 style="text-align:center">Payment</h2>
    
    <div class="row" style="width:60%; margin:auto">
        <div class="col-50">
          <form action="{{ route('createOrder') }}" method="GET" enctype="multipart/form-data">
              <div class="container">
                <div style="margin:10px 0 10px 0">Payment Amount: <b>RM {{$payAmount}}</b></div>
                <hr>
                    {{$paymentMethod->pay()}}
              </div>
              <input type="submit" value="Place order" class="btn" >
            </form>
        </div>
    </div>


</body>
</html>
