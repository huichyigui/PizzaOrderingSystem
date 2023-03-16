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

<h2 style="text-align:center">Checkout</h2>

<div class="row" style="margin:auto; width:80%">
<div class="col-25">
    <div class="container">
      <h4>Cart Item <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{ $totalQty }}</b></span></h4>
      @foreach ($cartItems as $item)      
      <p><span class="quantity">{{ $item['quantity'] }}x</span>
      {{ $item['menu_name'] }}      
      <span class="price">{{ $item['total_price'] }}</span></p>         
      @endforeach
      <hr>
      <p>Total <span class="price" style="color:black"><b>RM {{$finalPrice}}</b></span></p>
    </div>
  </div>

  <div class="col-75">
    <div class="container">
      <form action="{{ route('payment') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="row">
          <div class="col-50">
            <h3>Personal Information</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <label for="phone"><i class="fa fa-phone"></i> Contact No.</label>
            <input type="tel" id="contact" name="contact" placeholder="012-3456789" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="54 Jalan 15th Street" required>
            
            <label for="payment_method"><i class="fa fa-credit-card"></i> Payment Method</label>
            <select id="payment_method" class="payment" name="payment_method" required>
              <option value="" disabled selected>Select your option</option>
              <option value="cash">Cash On Delivery</option>
              <option value="credit-card">Credit Card</option>
              <option value="e-wallet">E-Wallet</option>
            </select>            
          </div>
        </div>
        <input type="submit" value="Continue" class="btn">
      </form>
    </div>
  </div>
  
  
</div>


  </body>
</html>
