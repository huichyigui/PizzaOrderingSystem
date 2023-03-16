<?php
// Author: Gui Hui Chyi
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\DesignPattern\Iterator\IteratorCollection;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminIndex extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = "Dashboard";
        $dataIT = new IteratorCollection();

        $admin = new Collection();
        $admin->count = User::where('role_level', 8)->get()->count();
        $admin->title = "Total Admin";
        $admin->icon = "icofont-man-in-glasses";
        $admin->link = "viewAllUsers";
        $admin->name = "Admin";

        $customer = new Collection();
        $customer->count = User::where('role_level', 1)->get()->count();
        $customer->title = "Total Customer";
        $customer->icon = "icofont-users";
        $customer->link = "viewAllUsers";
        $customer->name = "Customer";

        $rider = new Collection();
        $rider->count = User::where('role_level', 2)->get()->count();
        $rider->title = "Total Rider";
        $rider->icon = "icofont-hotel-boy-alt";
        $rider->link = "viewAllUsers";
        $rider->name = "Rider";

        $menu = new Collection();
        $menu->count = Menu::where('status', 'active')->get()->count();
        $menu->title = "Active Food Menu";
        $menu->icon = "icofont-fast-food";
        $menu->link = "manageMenu";
        $menu->name = "Menu";

        $order = new Collection();
        $order->count = Order::get()->count();
        $order->title = "Total Orders";
        $order->icon = "icofont-basket";
        $order->link = "#";
        $order->name = "Order";

        $sale = new Collection();
        $sale->count = "RM " . DB::table("payments")->sum('amount_paid');
        $sale->title = "Total Sales";
        $sale->icon = "icofont-money";
        $sale->link = "#";
        $sale->name = "Sales";

        $dataIT->addItem($customer);
        $dataIT->addItem($rider);
        $dataIT->addItem($admin);
        $dataIT->addItem($menu);
        $dataIT->addItem($order);
        $dataIT->addItem($sale);

        $notifications = auth()->user()->unreadNotifications;

        return view('admin/a_index', [
            'name' => $name,
            'dataIT' => $dataIT->getIterator(),
            'notifications' => $notifications,
        ]);
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
