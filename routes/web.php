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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product-detail/{productId}', 'ProductController@detail')->name('product.detail');

Route::get('/seller', 'SellerController@index')->name('seller.index');

Route::get('/compare', 'CompareController@index')->name('compare.index');

Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');

Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');

Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/request-event-plan', 'CartController@eventPlan')->name('cart.eventPlan')->middleware('auth'); //note: numpang di cart, klo controller event plannya udah ada pindahin ke eventplan@add
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
