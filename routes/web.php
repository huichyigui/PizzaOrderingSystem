<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\AdminIndex;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuDisplayController;
use App\WebService\Menu\MenuWebServiceController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\WebService\User\UserWebServiceController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\WebService\Payment\PaymentWebServiceController;

use App\Http\Controllers\DeliveryController;
use App\WebService\Delivery\DeliveryWebServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

//Gui Hui Chyi
//Home page
Route::get('/index', function () {
    return view('index', ['name' => scriptName()]);
})->name('home');

//Menu display
Route::get('/menu', [MenuDisplayController::class, 'index'])->name('menu');

//Sorting & Filter
Route::get('/menu/{sort}', [MenuDisplayController::class, 'sortMenu'])->name('menuFiltered');
Route::get('/menu/{sort?}/{filter?}', [MenuDisplayController::class, 'filterMenu'])->name('menuFiltered');
Route::get('/menu/{sort?}/{filter?}/{search?}', [MenuDisplayController::class, 'searchMenu'])->name('menuFiltered');

//Once the user was authenticated, then only can access these pages -by: ZJ
Route::prefix('admin')->middleware('auth','isAdmin')->group(function() {
//Route::prefix('admin')->middleware('auth')->group(function () {
    // Admin index page
    Route::get('/index', [AdminIndex::class, 'index'])->name('Dashboard');
    // Admin menu control
    Route::get('/addMenu', function () {
        return view('admin/a_menu_add', ['name' => scriptName()]);
    })->name('Create Menu');
    Route::post('/addMenu/add', [MenuController::class, 'addMenu']);
    Route::get('/manageMenu', [MenuController::class, 'manageMenu'])->name('manageMenu');
    Route::get('/manageMenu/edit/{menu_id}', [MenuController::class, 'edit']);
    Route::put('/manageMenu/update/{menu_id}', 'App\Http\Controllers\MenuController@updateMenu')->name('manageMenu');
    Route::get('/manageMenu/delete/{menu_id}', [MenuController::class, 'softDeleteMenu']);
    Route::get('/manageMenu/recover/{menu_id}', [MenuController::class, 'recoverMenu']);
    Route::post('/mark-as-read',[AdminIndex::class, 'markNotification'])->name('markNotification');

    //User Management
    Route::get('/viewAllUsers', [UserController::class, 'index'])->name('users.index');
    Route::delete('/viewAllUsers/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('userreport', [UserController::class, 'generateReport']);
});

//Menu web service
Route::get('/menuWebService/{category}', [MenuWebServiceController::class, 'index']);
//User web service
Route::get('/userWebService', [UserWebServiceController::class, 'index']);

//Error page
Route::get('/404', function () {
    return view('/errorPage/404', ['name' => scriptName()]);
})->name('404');
Route::get('/500', function () {
    return view('/errorPage/500', ['name' => scriptName()]);
})->name('500');
Route::get('/502', function () {
    return view('/errorPage/502', ['name' => scriptName()]);
})->name('502');

//Extra function
function scriptName()
{
    return Request::route()->getName();
}

//Beh Guo Hao
//Cart control
Route::get('/addToCart/{id}', [CartController::class, 'addToCart'])->name('AddedToCart');
Route::get('cart', [CartController::class, 'getCart'])->name('cartPage');
Route::post('updateCart', [CartController::class, 'updateCart'])->name('cartUpdate');
Route::post('remove', [CartController::class, 'removeItem'])->name('itemRemove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cartClear');

//Checkout
Route::get('checkout', [PaymentController::class, 'getCheckout'])->name('checkout');
Route::post('payment', [PaymentController::class, 'getPaymentMethod'])->name('payment');

//Order
Route::get('placeOrder', [OrderController::class, 'createOrder'])->name('createOrder');
Route::get('order', [OrderController::class, 'getOrder'])->name('orderPage');

Route::get('/401', function () {
    return view('/errorPage/401', ['name' => scriptName()]);
})->name('401');

//Payment web service
Route::get('/paymentWebService', [PaymentWebServiceController::class, 'index']);

//Fong Zhi Jun
Route::group(['middleware' => 'auth', 'verified'], function(){
//Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get(
        '/profile',
        [ProfileController::class, 'index']
    )->name('UserDashboard');

    Route::get(
        '/profile/update',
        [ProfileController::class, 'form']
    )->name('UpdateProfile');

    Route::post('/profile/update/proceed', [ProfileController::class, 'updateUser']);
});

require __DIR__ . '/auth.php';

//For rider module
//Route::prefix('admin')->middleware('auth','isRider')->group(function() { Route::xxxx });
//Jc
//Delivery part
Route::get('/rider',[DeliveryController::class, 'rider']);
Route::get('/checkStatus',[DeliveryController::class, 'checkStatus']);

Route::get('/delivery/pending', [DeliveryController::class, 'pending'])->name('Pending');
Route::get('/delivery/processing', [DeliveryController::class, 'processing'])->name('Processing');
Route::get('/delivery/delivering', [DeliveryController::class, 'delivering'])->name('Delivering');
Route::get('/delivery/delivered', [DeliveryController::class, 'delivered'])->name('Delivered');

Route::post('/delivery', [DeliveryController::class, 'changeStatus'])->name('delivery.changeStatus');

Route::get('/deliveryWebService',[DeliveryWebServiceController::class, 'index']);