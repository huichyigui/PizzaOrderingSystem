<?php
// Author: Beh Guo Hao
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Delivery;
use Illuminate\Routing\Controller;
use Session;
use DOMDocument;
use XSLTProcessor;

class OrderController extends Controller
{
    public function createOrder()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $payment = Session::get('payment');

        try{
            if($payment == null){
                abort(404);
            }

            Payment::insert([
                'user_id' => auth()->user()->id,
                'name' => strtolower($payment['name']),
                'email' => strtolower($payment['email']),
                'contact' => strtolower($payment['contact']),
                'address' => strtolower($payment['address']),
                'amount_paid' => session()->get('payAmount'),
                'payment_method' => $payment['payment_method'],
                'payment_status' => 'successful'
            ]);

            //Add delivery data details to deliveries table, by: Ng Jun Chen
            $deliveryID = Delivery::select('deliveryID')
                ->orderBy('created_at', 'DESC')
                ->limit(1)
                ->get()[0]->deliveryID;

            $deliveryID = substr($deliveryID, 1);
            $deliveryID = 'D' . (int)++$deliveryID;

            date_default_timezone_set("Asia/Kuala_Lumpur");
            $dt = date('Y-m-d H:i:s');

            Delivery::insert([
                'deliveryID' => $deliveryID,
                'deliveryLocation' => '',
                'deliveryStartTime' => $dt,
                'deliveryEndTime' => $dt,
                'deliveryStatus' => 'Pending'
            ]);

            //get payment id as each order representation
            $p_id = Payment::select('id')
                ->orderBy('created_at', 'DESC')
                ->limit(1)
                ->get()[0]->id;

            foreach ($cart as $order) {
                Order::insert([
                    'user_id' => auth()->user()->id,
                    'menu_id' => strtolower($order['menu_id']),
                    'menu_name' => strtolower($order['menu_name']),
                    'quantity' => $order['quantity'],
                    'price' => $order['total_price'],
                    'address' => strtolower($payment['address']),
                    'payment_id' => $p_id,
                    'order_status' => 'Completed'
                ]);
            }

            //update stock in menu DB
            $menu = Menu::find($cart[0]->menu_id);
            $stockCal = $menu->stock - $cart[0]->quantity;
            $menu->stock = $stockCal;
            $menu->save();

            //clear session
            session()->forget('payAmount');
            session()->forget('cartTotQty');
            session()->forget('payment');

            //clear cart DB
            Cart::truncate();

            return redirect()->route('orderPage');
        }
        catch(Throwable $e){
            report($e);
            abort(502);
        }
    }

    public function getOrder()
    {
        try{
            if (auth()->user()) {
                $orderList = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

                if (!$orderList->isEmpty()) {
                    $xmlFile = $this->generateXMLFile($orderList);

                    return view('order', ['name' => 'order', 'order' => $xmlFile,]);
                } else {
                    return redirect()->route('menu')->with('status', 'Opps, your order is empty! Place order now!');
                }
            } else {
                abort(401);
            }
        }
        catch(Throwable $e){
            report($e);
            abort(502);
        }
    }

    public function generateXMLFile($orderList)
    {        
        $filePath = "xml/order/order.xml";
        $dom = new DOMDocument('1.0', 'UTF-8');
        $xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xml/order/order.xsl"');
        $dom->appendChild($xslt);
        $dom->formatOutput = true;
        $root = $dom->createElement('orders');        

        for ($i = 0; $i < $orderList->count(); $i++) {
            $menu = Menu::find(ucwords($orderList[$i]->menu_id));

            if ($i == 0 || $orderList[$i]->payment_id != $orderList[$i - 1]->payment_id) {
                $payment = Payment::where('user_id', auth()->user()->id)
                    ->where('id', $orderList[$i]->payment_id)
                    ->get();    

                $order = $dom->createElement('order');
                $order->setAttribute('payment_id', htmlentities($orderList[$i]->payment_id));
                $paid = $dom->createElement('totalPrice', htmlentities($payment[0]->amount_paid));
                $order->appendChild($paid);
                $method = $dom->createElement('paymentMethod', htmlentities(ucwords($payment[0]->payment_method)));
                $order->appendChild($method);
                $name = $dom->createElement('name', htmlentities(ucwords($payment[0]->name)));
                $order->appendChild($name);
                $time = $dom->createElement('time', htmlentities($orderList[$i]->created_at));
                $order->appendChild($time);
                $address = $dom->createElement('address', htmlentities(ucwords($orderList[$i]->address)));
                $order->appendChild($address);
            }

            $item = $dom->createElement('item');
            $item->setAttribute('menu_id', htmlentities($orderList[$i]->menu_id));
            $img = $dom->createElement('image', htmlentities(ucwords($menu->image)));
            $item->appendChild($img);
            $name = $dom->createElement('menu_name', htmlentities(ucwords($orderList[$i]->menu_name)));
            $item->appendChild($name);
            $quantity = $dom->createElement('quantity', htmlentities($orderList[$i]->quantity));
            $item->appendChild($quantity);
            $price = $dom->createElement('price', htmlentities($orderList[$i]->price));
            $item->appendChild($price);

            $order->appendChild($item);
            $root->appendChild($order);
        }

        $dom->appendChild($root);

        //Save XML to local directory
        $dom->save($filePath);

        $xsl = new DOMDocument();
        $xsl->load('xml/order/order.xsl');

        //Create the processor and import the stylesheet
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl);

        return $proc->transformToXml($dom);
    }
}
