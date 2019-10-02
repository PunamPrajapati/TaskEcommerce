<?php

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
// Route::get('/', function () {
//     return view('frontend/home');
// });

Route::get('/', 'FrontendController@home');

Route::get('/shoePage', 'FrontendController@shoePage');
Route::get('/clothesPage', 'FrontendController@clothesPage');
Route::get('/accessoriesPage', 'FrontendController@accessoriesPage');
Route::get('/toysPage', 'FrontendController@toysPage');
Route::get('/productDetailPage/{id}', 'FrontendController@productDetailPage');

Route::get('/login', 'LoginController@login');
Route::post('/check', 'LoginController@check');
Route::get('/register', 'UserController@register');
Route::post('/userRegister', 'UserController@userRegister');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => 'login'], function () {
    Route::get('/admin', 'DashboardController@dashboard');
});

Route::get('/message', function () {
    return view('message');
});

Route::get('/admin', function () {
    return view('backend/admin');
});

Route::get('/dashboard', function () {
    return view('backend/dashboard');
});

Route::resource('/products', 'ProductController');

Route::post('/addToCart/{id}', 'CartController@add');
Route::get('/cartsItem', 'FrontendController@cartItem');
Route::resource('/cart', 'CartController');
Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::get('/payWithPaypal', 'PaymentController@payWithPaypal');
Route::get('/status', 'PaymentController@getPaymentStatus');
Route::post('/shippment', 'CheckoutController@shippment');
Route::delete('/cancel/{id}', 'CheckoutController@cancel');
Route::get('/order', 'OrderController@orderCreate');
Route::get('/orderBackend', 'OrderController@orderDisplay');
Route::patch('/delivered/{id}', 'OrderController@delivered');
Route::get('/orderShippmentDetail/{id}', 'OrderController@orderShippmentDetail');
Route::get('/orderCartDetail/{id}', 'OrderController@orderCartDetail');

Route::get('/notify/{id}', 'OrderController@notify');
