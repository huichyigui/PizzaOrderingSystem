<?php
// Author: Beh Guo Hao
namespace App\DesignPattern\Strategy;
use App\DesignPattern\Strategy\PaymentStrategy;

class CreditCardPaymentStrategy implements PaymentStrategy{
    function pay(){
        echo '
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
          <i class="fa fa-cc-visa" style="color:navy;"></i>
          <i class="fa fa-cc-amex" style="color:blue;"></i>
          <i class="fa fa-cc-mastercard" style="color:red;"></i>
          <i class="fa fa-cc-discover" style="color:orange;"></i>
        </div>
        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
        <label for="ccnum">Credit card number</label>
        <input type="text" id="ccnum" name="cardnumber" placeholder="1111222233334444" pattern="[0-9]{16}" required>
        
        <div class="row">
          <div class="col-50">
          <label for="expmonth">Exp Month/Year</label>
            <input type="month" id="expmonth" name="expmonth" placeholder="2018" required>
          </div>
          <div class="col-50">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352" pattern="[0-9]{3}" required>
          </div>
        </div>';
    }
}