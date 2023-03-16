<?php

namespace App\DesignPattern\State;

use App\DesignPattern\State\StateInterface;

class deliveredState implements StateInterface{

    public function nextState($deliveryID){
        abort('404');
    }

}