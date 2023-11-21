<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributController;
use App\Http\Controllers\Admin\AttributevalueController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CoupanController;
use App\Http\Controllers\WishlistController;

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

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('pages/{url_key}', [FrontendController::class, 'page'])->name('pages');
Route::get('blog/{identifier}', [FrontendController::class, 'blog'])->name('blog');
Route::get('products/{url_key}', [FrontendController::class, 'productdetail'])->name('products');
Route::get('shop', [FrontendController::class, 'shop'])->name('shop');


Route::resource('checkout', CheckoutController::class);

Route::get('success', [CheckoutController::class, 'success'])->name('success');



Route::get('Customer/Singup', [CustomerController::class, 'customerresister'])->name('customer/singup');
Route::get('customer/singin', [CustomerController::class, 'signin'])->name('customer/singin');
Route::post('customer/store', [CustomerController::class, 'store'])->name('customer/store');
Route::get('myaccount', [CustomerController::class, 'myaccount'])->name('myaccount');
Route::get('orders', [CustomerController::class, 'user_orders'])->name('orders');
Route::get('accountdetail/{id}', [CustomerController::class, 'userdetail'])->name('accountdetail');
Route::get('view/{id}', [CustomerController::class, 'view'])->name('view');
Route::get('orderdetail/{id}', [CustomerController::class, 'order_detail'])->name('orderdetail');
Route::get('address', [CustomerController::class, 'saved_address'])->name('address');
Route::post('customer/login', [CustomerController::class, 'login_check'])->name('customer/login');
Route::get('customer/logout', [CustomerController::class, 'userlog_out'])->name('customer/logout');
Route::post('user/update/{id}', [CustomerController::class, 'userupdate'])->name('user/update');
Route::get ('customers', [CustomerController::class,'customers'])->name('customers');


 

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('loginpost', [UserController::class, 'loginpost'])->name('loginpost');

Route::get('categories/{url_key}', [CategoryController::class, 'get_product_by_category'])->name('categories');
route::get('categorryproduct',[CategoryController::class,'categoryproduct'])->name('categorryproduct');
Route::resource('contact', ContactController::class,);
route::get('contactus', [ContactController::class, 'contactus'])->name('contactus');

Route::resource('cart', CartController::class,);
Route::resource('coupan',CoupanController::class,);
Route::post('applycoupon',[CartController::class,'coupon'],)->name('applycoupon');
Route::post('cancelcoupon',[CartController::class,'cancelcoupon'],)->name('cancelcoupon');


route::resource('mywishlist',WishlistController::class,);


Route::group(['middleware' => ['auth', 'check_admin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('customerorders', [OrderController::class, 'index'])->name('customerorders');
    Route::get('orderview/{id}', [OrderController::class,'orderview'])->name('orderview');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('user', UserController::class,);
    Route::resource('permission', PermissionController::class,);
    Route::get('searchpermission', [PermissionController::class, 'searchpermission'])->name('searchpermission');

    Route::resource('role', RoleController::class,);
    Route::resource('page', PageController::class,);
    Route::resource('block', BlockController::class,);
    Route::delete('deletepage', [PageController::class, 'pagedelete'])->name('deletepage');
    Route::delete('deleteblock', [BlockController::class, 'deleteblock'])->name('deleteblock');
    Route::resource('slider', SliderController::class,);
    Route::delete('sliderdelete', [SliderController::class, 'sliderdelete'])->name('sliderdelete');
    Route::resource('category', CategoryController::class,);
    Route::resource('product', ProductController::class,);
    Route::delete('productdelete', [ProductController::class, 'productdelete'])->name('productdelete');
    Route::get('getproduct', [ProductController::class, 'getproduct_by_status'])->name('getproduct');
    Route::get('getproductbystock', [ProductController::class, 'getproduct_by_stock_status'])->name('getproductbystock');
    Route::get('searchproduct', [ProductController::class, 'searchproduct'])->name('searchproduct');
    Route::resource('attribute', AttributController::class,);
    Route::delete('deleteattribute', [AttributController::class, 'deleteattribute'])->name('deleteattribute');
    Route::resource('attributevalue', AttributevalueController::class,);
    Route::delete('deleteattributevalue', [AttributevalueController::class, 'deleteattributevalue'])->name('deleteattributevalue');
});
 