<?php
// Author: Fong Zhi Jun
namespace App\DesignPattern\Decorator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class UserBase implements DecoratorInterface
{

    public function updateProfileDetails(Request $request)
    {
        User::where('id', (Auth::user()->id))
            ->update([
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number
            ]);

        redirect(RouteServiceProvider::dashboard);
    }

    public function getPath()
    {
        return '/profile';
    }
}
