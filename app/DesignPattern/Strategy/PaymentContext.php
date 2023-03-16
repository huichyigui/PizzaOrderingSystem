<?php
// Author: Beh Guo Hao
namespace App\DesignPattern\Strategy;
use App\DesignPattern\Strategy\PaymentStrategy;

abstract class PaymentContext{
    private $paymentStrategy;

    function getPaymentStrategy(){
        return $this->paymentStrategy;
    }

    function setPaymentStrategy($strategy){
        $this->paymentStrategy= $strategy;
    }

    function pay(){
        $this->paymentStrategy->pay();
    }
}

