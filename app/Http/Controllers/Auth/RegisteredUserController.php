<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'regex:/(^[a-zA-Z\\s]*$)/u', 'max:255'],
            'email' => ['required', 'string', 'regex:/(^[a-zA-Z0-9\\w.]+[@]+[a-zA-Z0-9\\w]+[.]+[a-zA-Z0-9\\w]*$)/u', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'regex:/(^\d{3}-?\d{7}-?$)/u', 'max:255'],
            'role_level' => ['required', 'integer'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'role_level' => $request->role_level,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::dashboard);
    }
}
