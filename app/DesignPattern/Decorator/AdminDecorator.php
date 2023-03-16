<?php
// Author: Fong Zhi Jun
namespace App\DesignPattern\Decorator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDecorator extends UserDecorator
{

    public function updateProfileDetails(Request $request)
    {
        User::where('id', (Auth::user()->id))
            ->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number
            ]);

        redirect('/admin/index');
    }

    public function getPath()
    {
        return '/admin/index';
    }

    public function getAllUsers()
    {
        return User::all();
    }
}
