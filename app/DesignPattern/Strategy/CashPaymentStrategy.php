<?php
// Author: Beh Guo Hao
namespace App\DesignPattern\Strategy;
use App\DesignPattern\Strategy\PaymentStrategy;

class CashPaymentStrategy implements PaymentStrategy{
    function pay(){
        echo "Please prepare exact cash amount for our rider, thank you!";
    }
}