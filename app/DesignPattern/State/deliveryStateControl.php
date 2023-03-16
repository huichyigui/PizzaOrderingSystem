<?php

namespace App\DesignPattern\State;

use App\DesignPattern\State\pendingState;
use App\DesignPattern\State\processingState;
use App\DesignPattern\State\deliveringState;
use App\DesignPattern\State\deliveredState;
use Illuminate\Support\Facades\DB;

class deliveryStateControl
{
    public function chgState($deliveryID)
    {
        $deliveryStatus = DB::table('deliveries')
            ->where('deliveryID', $deliveryID)
            ->value('deliveryStatus');

        if ($deliveryStatus == 'Pending') {
            $pendingState = new pendingState();
            $pendingState->nextState($deliveryID);
        } else if ($deliveryStatus == 'Processing') {
            $processingState = new processingState();
            $processingState->nextState($deliveryID);
        } else if ($deliveryStatus == 'Delivering') {
            $deliveringState = new deliveringState();
            $deliveringState->nextState($deliveryID);
        } else if ($deliveryStatus == 'Delivered') {
            $deliveredState = new deliveredState();
            $deliveredState->nextState($deliveryID);
        }
    }
}
