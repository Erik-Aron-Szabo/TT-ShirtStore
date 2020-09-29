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

// Route::get('/', function() {
//   return view('index');
// });

Auth::routes();
Route::post('/add', 'ProductController@store')->name('add');

Route::resource('/', 'ProductController');
Route::get('/a', 'ProductController@a');

Route::get('handle-payment', 'PayPalPaymentController@handlePayment')->name('make.payment');
Route::get('cancel-payment', 'PayPalPaymentController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'PayPalPaymentController@paymentSuccess')->name('success.payment');

Route::get('/cart', function () {
  return view('cart');
});

Route::get('/detials/{id}', 'ProductController@show')->name('description');
