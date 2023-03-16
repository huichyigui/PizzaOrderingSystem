<?php

namespace App\DesignPattern\State;

use App\DesignPattern\State\StateInterface;
use Illuminate\Support\Facades\DB;

class processingState implements StateInterface{

    public function nextState($deliveryID){
        DB::table('deliveries')
            ->where('deliveryID', $deliveryID)
            ->update(['deliveryStatus' => 'Delivering']);
    }

}