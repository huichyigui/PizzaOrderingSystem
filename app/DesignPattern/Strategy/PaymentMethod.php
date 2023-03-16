<?php
// Author: Beh Guo Hao
namespace App\DesignPattern\Strategy;
use App\DesignPattern\Strategy\CashPaymentStrategy;
use App\DesignPattern\Strategy\CreditCardPaymentStrategy;
use App\DesignPattern\Strategy\EWalletPaymentStrategy;
use App\DesignPattern\Strategy\PaymentContext;

class PaymentMethod extends PaymentContext{

    function __construct($method){
        if($method == 'cash'){
            $this->setPaymentStrategy(new CashPaymentStrategy());
        }
        elseif($method == 'credit-card'){
            $this->setPaymentStrategy(new CreditCardPaymentStrategy());
        }
        else{
            $this->setPaymentStrategy(new EWalletPaymentStrategy());
        }        
    }
}