<?php
// Author: Beh Guo Hao
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Models\Cart;
use App\DesignPattern\Strategy\PaymentMethod;
use Throwable;

class PaymentController extends Controller
{
    public function getCheckout()
    {
        try{
            if(!session()->get('cartTotQty')){
                session()->flash('status', 'Opps, your cart is empty.');
                return redirect()->route('menu');
            }

            $cart = Cart::where('user_id', auth()->user()->id)->get();
            $totalQuantity = 0;
            $finalPrice = 0;

            foreach($cart as $item){
                $totalQuantity += $item['quantity'];
                $finalPrice += $item['total_price'];
            }
            session()->put('payAmount', $finalPrice);

            return view('checkout', ['name' => 'checkout', 'cartItems'=>$cart, 'finalPrice'=>$finalPrice, 'totalQty'=>session()->get('cartTotQty')]);
        }
        catch(Throwable $e){
            report($e);
            abort(502);
        }
    }

    public function getPaymentMethod(Request $request)
    {
        try{
            if(!session()->get('cartTotQty')){
                session()->flash('status', 'Opps, your cart is empty.');
                return redirect()->route('menu');
            }

            $pay = session()->get('payAmount');
            
            $paymentMethod = new PaymentMethod($request->payment_method);

            $paymentInfo = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
                'payment_method' => $request->payment_method,
            ];

            $request->session()->put('payment', $paymentInfo);

            return view('payment', ['paymentMethod'=>$paymentMethod, 'payAmount'=>$pay ]);
        }
        catch(Throwable $e){
            report($e);
            abort(502);
        }

    }

}
