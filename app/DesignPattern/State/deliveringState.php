<?php

namespace App\DesignPattern\State;

use App\DesignPattern\State\StateInterface;
use Illuminate\Support\Facades\DB;

class deliveringState implements StateInterface{

    public function nextState($deliveryID){
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $dt = date('Y-m-d H:i:s');

        DB::table('deliveries')
            ->where('deliveryID', $deliveryID)
            ->update([
                'deliveryStatus' => 'Delivered',
                'deliveryEndTime' => $dt
            ]);
    }
    
}