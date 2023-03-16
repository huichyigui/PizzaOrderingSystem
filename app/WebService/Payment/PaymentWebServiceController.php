<?php
// Author: Beh Guo Hao
namespace App\WebService\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentWebServiceController extends Controller
{
    public function index()
    {
        header("Content-Type:application/json");

        $payment = PaymentWebService::getPayment();

        if ($payment->isEmpty()) {
            $this->response(200, "Payment Not Found.", NULL);
        } else {
            $this->response(200, "Payment Found", $payment);
        }
    }

    public function response($status, $status_message, $data)
    {
        header("HTTP/1.1 {$status} {$status_message}");

        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;

        $json_response = json_encode($response);
        echo $json_response;
    }
}
