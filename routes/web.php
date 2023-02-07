<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthMiddleware;


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

Route::get('/','FrontEndController@index');



Route::get('/contactUs','ContractUsController@view')->name('contact');
Route::post('/contactUs', 'ContractUsController@show')->name('contact_show');
Route::get('/aboutUs','aboutUsController@view')->name('about');
Route::get('/help','helpController@view')->name('help');
Route::get('/offers','offersController@view')->name('offers');
Route::get('/profile','profileController@view')->name('profile');

/* user cancel order route */
Route::get('order-cancel-{id}', 'profileController@OrderCancel')->name('order_cancel');



Route::get('/category/dish/show/{category_id}','FrontEndController@dish_show')->name('category_dish');

/*============== cart route start here =======================*/

Route::post('/cart/add', 'cartController@insert')->name('add_to_cart');
Route::get('/cart/show', 'cartController@show')->name('cart_show');
Route::get('/cart/remove/{rowId}', 'cartController@remove')->name('remove_item');
Route::post('/cart/update', 'cartController@update')->name('update_cart');

/*============== cart route end here =======================*/

/*============== check out route start here =======================*/

Route::get('/checkout/payment', 'CheckOutController@payment')->name('checkout_payment');
Route::post('/checkout/new/order','CheckOutController@order')->name('new_order');
Route::get('/checkout/order/complete','CheckOutController@complete')->name('order_complete');

// stripe payment only
Route::get('/stripe-payment', 'StripeController@handleGet');
Route::post('/stripe-payment', 'StripeController@handlePost')->name('stripe.payment');


/*============== check out route end here =======================*/


/*============== customer route start here =======================*/

Route::get('/register/customer','CustomerController@show')->name('sign_up');
Route::post('/store/customer/','CustomerController@store')->name('store_customer');

Route::get('/login/customer/','CustomerController@login')->name('login_in');
Route::post('/logout/customer/','CustomerController@logout')->name('log_out');
Route::post('/check/customer/login','CustomerController@check')->name('check_login');

                            /* wishlist */
Route::post('/wishlist-insert', 'WishlistController@store')->name('add_to_wishlist');
Route::get('/wish-destroy-000{wishlist}999', 'WishlistController@destroy')->name('wish_destroy');
                            /*// wishlist */

Route::get('/shipping', 'CustomerController@shipping');
Route::post('/shipping/store', 'CustomerController@save')->name('store_shipping');

/*=================== coupon apply =============*/

Route::post('/coupon-apply','CouponController@apply')->name('coupon_apply');


/*============== front route end here =======================*/





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


                   //Report routes

Route::get('/report', 'ReportController@bookingReport')->name('booking_report');


// Route::get('/home', 'HomeController@dashBoard')->name('home');


Route::prefix('category')->group(function (){

    /*============== Category start here ==========================================*/
    Route::get('/add','categoryController@index')->name('show_cate_table');
    Route::post('/save','categoryController@save')->name('cate_save');
    Route::get('/manage','categoryController@manage')->name('manage_cate');
    // Route::get('/delete/{category_id}','categoryController@delete')->name('cate_delete');
    Route::post('/update','categoryController@update')->name('cate_update');
    Route::get('/active/{category_id}','categoryController@active')->name('category_active');
    Route::get('/Inactive/{category_id}','categoryController@Inactive')->name('Inactive_cate');

    /*============== Category end here ==========================================*/

});

Route::prefix('delivery_boy')->group(function (){
    /*============== Delivery Boy start here ==========================================*/
    Route::get('/add', 'deliverBoyController@index')->name('show_boy_table');
    Route::post('/save', 'deliverBoyController@save_boy')->name('save_delivery_boy');
    Route::get('/manage', 'deliverBoyController@boy_manage')->name('manage_delivery_boy');
    Route::get('/delete/{delivery_boy_id}', 'deliverBoyController@boy_delete')->name('delivery_boy_delete');
    Route::post('/update', 'deliverBoyController@boy_update')->name('delivery_boy_update');
    Route::get('/inactive/{delivery_boy_id}', 'deliverBoyController@boy_inactive')->name('delivery_boy_inactive');
    Route::get('/active/{delivery_boy_id}', 'deliverBoyController@boy_active')->name('delivery_boy_active');

    /*============== Delivery Boy end here ==========================================*/
});

Route::prefix('coupon')->group(function () {

    /*============== Coupon start here ==========================================*/

    Route::get('/add', 'CouponController@index')->name('show_coupon_table');
    Route::post('/save', 'CouponController@code_save')->name('save_coupon_code');
    Route::get('/manage', 'CouponController@code_manage')->name('manage_coupon_table');
    Route::get('/delete/{coupon_id}', 'CouponController@code_delete')->name('delete_coupon_code');
    Route::post('/update', 'CouponController@code_update')->name('update_coupon_code');
    Route::get('/active/{coupon_id}', 'CouponController@code_active')->name('active_coupon_code');
    Route::get('/inactive/{coupon_id}', 'CouponController@code_inactive')->name('inactive_coupon_code');

    /*============== Coupon end here ==========================================*/
});

Route::prefix('dish')->group(function () {

    /*============== Dish start here ==========================================*/

    Route::get('/add', 'DishController@index')->name('show_dish_table');
    Route::post('/save', 'DishController@save_dish')->name('save_dish_table');
    Route::get('/manage', 'DishController@manage_dish')->name('manage_dish_table');
    Route::get('/delete/{dish_id}', 'DishController@dish_delete')->name('delete_dish');
    Route::post('/update', 'DishController@dish_update')->name('update_dish');
    Route::get('/inactive/{dish_id}', 'DishController@inactive')->name('dish_inactive');
    Route::get('/active/{dish_id}', 'DishController@active')->name('dish_active');
});
/*============== Dish end here ==========================================*/
Route::prefix('order')->middleware([CheckAuthMiddleware::class])->group( function () {

    /*============== Order start here ==========================================*/
    Route::get('/manage', 'OrderController@manageOrder')->name('show_order');
    Route::get('/cancel-order', 'OrderController@orderCancel')->name('cancelled_order');
    Route::get('/view/detail/{order_id}', 'OrderController@viewOrder')->name('view_order');
    Route::get('/view/invoice/{order_id}', 'OrderController@viewInvoice')->name('view_order_invoice');
    Route::get('/download/invoice/{order_id}', 'OrderController@downloadInvoice')->name('download_order_invoice');
    Route::get('/order-complete-{order_id}', 'OrderController@complete')->name('order_complete');
    Route::get('/delete/{order_id}', 'OrderController@deleteOrder')->name('delete_order');
    /*============== Order end here ==========================================*/
});
