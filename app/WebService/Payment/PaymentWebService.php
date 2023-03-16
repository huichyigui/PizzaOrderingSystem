<?php
// Author: Beh Guo Hao
namespace App\WebService\Payment;

use Illuminate\Support\Facades\DB;

class PaymentWebService
{
    //Function for web service
    public static function getPayment()
    {
        $paymentCollection = DB::table('payments')->get();

        return $paymentCollection;
    }
}
