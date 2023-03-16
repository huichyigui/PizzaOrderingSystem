<?php
// Author: Beh Guo Hao
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Security\ErrorHandling;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){
        if(auth()->user()){ //check login status for access control
            $item = Menu::where('menu_id', $id)->get();
            $cart =  Cart::where('user_id', auth()->user()->id)->get();
            $err = new ErrorHandling;

            if($item[0]->stock){ //check menu stock
                foreach($cart as $items){
                    if($items['menu_id']==$id){ //check if item added to cart before
                        $request->session()->put('qty', 1);
                        $this->updateCart($request);

                        if(session()->get('stockExceed')){
                            $err->outOfStock();
                            session()->forget('stockExceed');
                        }
                        else{
                            session()->flash('status', 'Item is added to cart successfully !');
                        }

                        return redirect()->route('menu');
                    }
                }

                Cart::insert([
                    'user_id' => auth()->user()->id,
                    'menu_id' => $item[0]->menu_id,
                    'menu_name' => $item[0]->name,
                    'quantity' => 1,
                    'price' => $item[0]->price,
                    'total_price' => $item[0]->price*1,
                    'image' => $item[0]->image,
                    'status' => $item[0]->status
                ]);

                $this->updateCartQty();
                session()->flash('status', 'Item is added to cart successfully !');
            }
            else{
                $err->outOfStock();
            }

            return redirect()->route('menu');
        }
        else{
            abort(401);
        }
    }

    public function getCart(){
        if(auth()->user()){
            $finalPrice = 0;
            $cart = Cart::where('user_id', auth()->user()->id)->get();

            if(!$cart->isEmpty()){
                foreach($cart as $item){
                    $finalPrice += $item['total_price'];
                }

                return view('cart', ['name' => 'cart', 'cartItems'=>$cart, 'finalPrice'=>$finalPrice]);
            }
            else{
                return redirect()->route('menu')->with('status', 'Opps, your cart is empty! Place order now!');
            }
        }
        else{
            abort(401);
        }

    }

    public function updateCart(Request $request)
    {
        $item = Menu::where('menu_id', $request->id)->get();
        $cart= Cart::where('user_id', auth()->user()->id)
                    ->where('menu_id', $request->id)
                    ->get();

        if($request->session()->get('qty')){ //if add to cart from menu page only plus 1
            $quantity = $cart[0]->quantity + $request->session()->get('qty');
        }
        else{
            $quantity = $request->quantity;
        }

        if($quantity <= $item[0]->stock){ //check menu stock
            Cart::where('user_id', auth()->user()->id)
                ->where('menu_id', $request->id)
                ->update([
                    'quantity' => $quantity,
                    'total_price' => $cart[0]->price * $quantity,
                ]);

            $this->updateCartQty();

            //clear qty after update done
            $request->session()->forget('qty');

            session()->flash('status', 'Item is updated successfully !');
        }
        else{
            session()->put('stockExceed', true);
            $request->session()->forget('qty');
            $stock = new ErrorHandling;
            $stock->outOfStock();
        }

        return redirect()->route('cartPage');
    }

    public function removeItem(Request $request)
    {
        Cart::where('user_id', auth()->user()->id)
                ->where('menu_id', $request->id)
                ->delete();

        $this->updateCartQty();

        session()->flash('status', 'Item is removed successfully !');

        if(Cart::get()){ //if cart not empty, remain cart page
            return redirect()->route('cartPage');
        }
        else{
            return redirect()->route('menu');
        }
    }

    public function clearAllCart()
    {
        Cart::where('user_id', auth()->user()->id)->truncate();

        $this->updateCartQty();
        session()->flash('status', 'All Item Cart Clear Successfully !');

        return redirect()->route('menu');
    }

    //update cart header red dot number
    public function updateCartQty()
    {
        $totalQuantity = 0;
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        foreach($cart as $item){
            $totalQuantity += $item['quantity'];
        }
        session()->put('cartTotQty', $totalQuantity);
    }
}
