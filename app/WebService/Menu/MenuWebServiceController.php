<?php
// Author: Gui Hui Chyi
namespace App\WebService\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuWebServiceController extends Controller
{
    public function index($category)
    {
        header("Content-Type:application/json");

        $menu = MenuWebService::getMenu($category);

        if (!empty($category)) {
            if ($menu->isEmpty()) {
                $this->response(200, "Menu Not Found.", NULL);
            } else {
                $this->response(200, "Menu Found", $menu);
            }
        } else {
            $this->response(400, "Invalid Request", NULL);
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
