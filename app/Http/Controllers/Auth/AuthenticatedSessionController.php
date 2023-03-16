<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\DesignPattern\Decorator\UserBase;
use App\DesignPattern\Decorator\CustomerDecorator;
use App\DesignPattern\Decorator\AdminDecorator;

use App\Models\Cart;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        //Beh Guo Hao
        //get cart red quantity indicator
        $totalQuantity = 0;
        $cart = Cart::where('user_id', auth()->user()->id)->get();

        foreach($cart as $item){
            $totalQuantity += $item['quantity'];
        }
        session()->put('cartTotQty', $totalQuantity);

        $path = '';

        if(Auth::user()->role_level == 8){
            $admindecorator = new UserBase();
            $admindecorator = new AdminDecorator($admindecorator);

            $path = $admindecorator->getPath();

            //logging security practice, by: Ng Jun Chen
            $email = $request->input('email');
            $password = $request->input('password');

            Log::channel('authentication')->info('admin login success', [
                'email' => $email,
                'password' => $password
            ]);
        } else {
            $userdecorator = new UserBase();

            $path = $userdecorator->getPath();

            //logging security practice, by: Ng Jun Chen
            $email = $request->input('email');
            $password = $request->input('password');

            Log::channel('authentication')->info('user login success', [
                'email' => $email,
                'password' => $password
            ]);
        }

        return redirect($path);
        
        //return redirect()->intended(RouteServiceProvider::dashboard);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
