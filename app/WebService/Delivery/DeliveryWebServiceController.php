<?php
// Author: Ng Jun Chen
namespace App\WebService\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryWebServiceController extends Controller
{

    public function index()
    {
        header("Content-Type:application/json");

        $delivery = Delivery::all();

        if ($delivery->isEmpty()) {
            $this->response(200, "Delivery data Not Found.", NULL);
        } else {
            $this->response(200, "Delivery Data Found", $delivery);
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