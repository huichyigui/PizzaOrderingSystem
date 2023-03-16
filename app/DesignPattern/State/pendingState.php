<?php

namespace App\DesignPattern\State;

use App\DesignPattern\State\StateInterface;
use Illuminate\Support\Facades\DB;

class pendingState implements StateInterface{

    public function nextState($deliveryID){
        DB::table('deliveries')
            ->where('deliveryID', $deliveryID)
            ->update(['deliveryStatus' => 'Processing']);
    }

}