<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');
Route::get('/product-detail/{productId}', 'ProductController@detail')->name('product.detail');
Route::get('/home/search', 'ProductController@search')->name('product-search');
Route::get('/home/filter', 'ProductController@filter')->name('product-filter');

Route::get('/seller', 'SellerController@index')->name('seller.index');
Route::get('/seller-detail/{sellerId}', 'SellerController@detail')->name('seller.detail');
Route::get('/seller/search', 'SellerController@search')->name('seller-search');

//MESSAGE
Route::get('/message', 'MessageController@index')->name('message.index')->middleware('auth');
Route::get('/message/{messageId}', 'MessageController@show')->name('message.show');
Route::post('/messageDetail', 'MessageDetailController@store')->name('messageDetail.store');
Route::post('/message', 'MessageController@store')->name('message.store');

Route::get('/compare', 'CompareController@index')->name('compare.index');
Route::get('/add-to-compare/{productId}', 'ProductController@addToCompare')->name('compare.add')->middleware('auth');
Route::get('/compare/remove/{productId}', 'ProductController@remove')->name('compare.remove')->middleware('auth');

Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::get('/wishlist/{productId}', 'WishlistController@store')->name('wishlist.store')->middleware('auth');
Route::get('/wishlist/delete/{productId}', 'WishlistController@destroy')->name('wishlist.delete')->middleware('auth');

// Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');

Route::get('/event-plan', 'EventPlanController@index')->name('eventplan.index')->middleware('auth');
Route::post('/event-plan', 'EventPlanController@store')->name('eventplan.store')->middleware('auth');
Route::get('/event-plan/delete/{eventPlanId}', 'EventPlanController@destroy')->name('eventPlan.delete');


Route::get('/customer/profile/{customerId}', 'CustomerController@show')->name('customer.show')->middleware('auth');
Route::get('/customer/edit/{customerId}', 'CustomerController@edit')->name('customer.edit')->middleware('auth');
Route::post('/customer/update/{customerId}', 'CustomerController@update')->name('customer.update')->middleware('auth');
Route::get('/rating', 'RatingController@index')->name('rating.index')->middleware('auth');
Route::get('/rating/{sellerId}', 'RatingController@index')->name('rating.index')->middleware('auth');
Route::post('/rating/{sellerId}', 'RatingController@store')->name('rating.store')->middleware('auth');

//ORDER SELLER
Route::get('/orders', 'OrderController@sellerOrders')->name('orders.seller');
Route::get('/orders-detail/{orderId}', 'OrderController@sellershow')->name('orders.show');
Route::post('/orders/reject/{orderId}', 'OrderController@rejectOrder')->name('orders.seller.reject');
Route::post('/orders/accept/{orderId}', 'OrderController@acceptOrder')->name('orders.seller.accept');
Route::post('/orders/down-payment/{orderId}', 'OrderController@downPaymentOrder')->name('orders.seller.downPayment');
Route::post('/orders/full-payment/{orderId}', 'OrderController@fullPaymentOrder')->name('orders.seller.fullPayment');
Route::post('/orders/accept-down-payment/{orderId}', 'OrderController@acceptDownPayment')->name('orders.seller.acceptDownPayment');
Route::post('/orders/accept-full-payment/{orderId}', 'OrderController@acceptFullPayment')->name('orders.seller.acceptFullPayment');


//ORDER USER
Route::post('/order', 'OrderController@store')->name('order.store');
Route::get('/order', 'OrderController@index')->name('order.index')->middleware('auth');
Route::get('/order-detail/{orderId}', 'OrderController@show')->name('order.show')->middleware('auth');
Route::get('/order/delete/{orderId}', 'OrderController@destroy')->name('order.delete');
Route::post('/order/request/{userId}', 'OrderController@requestAllOrder')->name('order.request');
//PRODUCT
Route::post('/product', 'ProductController@store')->name('product.store');
Route::get('/product', 'ProductController@sellerProducts')->name('products.seller');
Route::get('/product/delete/{productId}', 'ProductController@destroy')->name('product.delete');
//SELLER LOGIN
Route::get('/login/seller', 'SellerController@showSellerLoginForm')->name('login.seller');
Route::post('/login/seller', 'SellerController@authenticate')->name('login.seller');
//SELLER REGISTER
Route::get('/register/seller', 'SellerController@showSellerRegisterForm')->name('register.seller');
Route::post('/register/seller', 'SellerController@store')->name('register.seller');
//TRANSACTION
Route::get('/transaction', 'TransactionController@index')->name('transaction.index');
Route::post('/transaction/{orderId}/{type}', 'TransactionController@payment')->name('transaction.payment');
