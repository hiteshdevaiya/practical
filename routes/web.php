<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name( 'index');
Auth::routes();
Route::get('/home', action: function () {
    return redirect()->to(  '/');
})->name('home');

Route::get('/cart/{product}', [CartController::class, 'addToCart'])->name( 'cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name( 'cart.update');
Route::get('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name( 'cart.remove');
Route::get('/cart', [CartController::class, 'viewCart'])->name( 'cart');

Route::group(['middleware' => ['auth', 'auth']], function () {
    Route::get('/checkout', [OrderController::class, 'placeOrder'])->name( 'place.order');
});
