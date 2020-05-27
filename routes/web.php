<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Url;

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


Route::get('/', 'Homee@show');
Route::view('/admin', 'admin.dashboard.index');

Route::get('/CartDisplay/{id}','Site\CarttController@getContent')->name('newcart');
Route::get('/delete/{id}/{ud}', 'Site\CarttController@delete')->name('cart.delete');
Route::get('/ClearCart/{id}', 'Site\CarttController@ClearCart')->name('cart.clear');

  Route::get('/checkouttDisplay', 'Site\CheckouttController@getOrder')->name('order.new');
//  Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');



Route::get('/firstproduct', 'Homee@firstproduct')->name('firstproductlink');
Route::get('/secondproduct', 'Homee@secondproduct')->name('secondproductlink');
Route::get('/adlink', 'Homee@adliink')->name('adlink');



Auth::routes();

require 'admin.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/categoryy/{slug}', 'Site\CategoryController@showw')->name('category.showw');
Route::get('/brand/{slug}', 'Site\BrandController@show')->name('brand.show');


Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::get('/products/{price}', 'ProductController@index')->name('products');
Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');

Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');




Route::group(['middleware' => ['auth']], function () {
  Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
  Route::get('/order', 'Site\CheckoutController@getOrder')->name('order.index');
  Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
});



Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');

Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');

//Route::get('account/profile', 'Site\AccountController@profile')->name('account.profile');
//Route::post('account/profile', 'Site\AccountController@update_avatar');



Route::get('display', 'Site\RatingController@products')->name('products.rate');

Route::post('rating', 'Site\RatingController@productProduct')->name('products.product');


Route::post('/product/{slug}', 'Site\ProductController@show')->name('product.show');

Route::post('/comment/{id}', 'CommentController@store')->name('comments.store');


Route::get('search-results', 'Site\SearchController@search')->name('search.result');

Route::get('profile', 'ProfileController@index');
Route::post('profile/{id}', 'ProfileController@update')->name('profile.edit');


/*Route::post('/cartt/{id}', 'CarttController@store')->name('cartt.store');
Route::get('/cart', 'CarttController@getCart')->name('checkout.cartt');
*/


/*Route::get('AddToCart/{slug}','Site\ProductController@getAddToCart')->name('product.addToCart');


Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cartt', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/item/{id}/remove', 'CartController@removeItem')->name('checkout.cart.remove')->middleware('auth');
//Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::get('/cart/apply-coupon', 'CartController@applyCoupon')->name('cart.coupon')->middleware('auth');

*/

Route::get('/view_admin', 'Admin\AdminController@view')->name('admin.view');
Route::get('/add_admin', 'Admin\AdminController@add')->name('admin.add_admin.add_admin');
Route::get('/delete_admin/{id}', 'Admin\AdminController@delete')->name('admin.delete');
Route::post('/create_admin', 'Admin\AdminController@create')->name('admin.store');

