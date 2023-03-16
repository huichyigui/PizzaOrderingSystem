<?php
// Author: Fong Zhi Jun
namespace App\WebService\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DesignPattern\Decorator\UserBase;
use App\DesignPattern\Decorator\AdminDecorator;

class UserWebServiceController extends Controller
{
    public function index()
    {
        header("Content-Type:application/json");

        $admindecorator = new UserBase();
        $admindecorator = new AdminDecorator($admindecorator);
        $userCollection = $admindecorator->getAllUsers();

        if ($userCollection->isEmpty()) {
            $this->response(200, "User Not Found.", NULL);
        } else {
            $this->response(200, "Users Found", $userCollection);
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
