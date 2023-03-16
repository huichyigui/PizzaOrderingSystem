<?php
// Author: Fong Zhi Jun
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\DesignPattern\Decorator\AdminDecorator;
use App\DesignPattern\Decorator\UserBase;
use App\DesignPattern\Decorator\CustomerDecorator;

class ProfileController extends Controller
{
    public function index()
    {
        $name = "UserDashboard";

        return view('user.userdashboard', [
            'name' => $name
        ]);
    }

    public function form()
    {
        $name = "UpdateProfile";

        $test = 1;

        return view('user.userprofiledetails', [
            'name' => $name
        ]);
    }

    public function updateUser(Request $request)
    {
        if (Auth::user()->role_level == 8) {
            $request->validate([
                'name' => ['required', 'regex:/(^[a-zA-Z\\s]*$)/u', 'max:255'],
                'password' => ['required', Rules\Password::defaults()],
                'address' => ['required', 'string'],
                'phone_number' => ['required', 'regex:/(^\d{3}-?\d{7}-?$)/u', 'max:255']
            ]);

            $admindecorator = new UserBase();
            $admindecorator = new AdminDecorator($admindecorator);

            $admindecorator->updateProfileDetails($request);

            return redirect('/admin/index');
        } else {
            $request->validate([
                'password' => ['required', Rules\Password::defaults()],
                'address' => ['required', 'string'],
                'phone_number' => ['required', 'regex:/(^\d{3}-?\d{7}-?$)/u', 'max:255']
            ]);

            $userdecorator = new UserBase();
            $userdecorator->updateProfileDetails($request);

            return redirect(RouteServiceProvider::dashboard);
        }
    }
}
