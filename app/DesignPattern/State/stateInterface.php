<?php

namespace App\DesignPattern\State;

interface stateInterface
{
    public function nextState($deliveryID);
}
