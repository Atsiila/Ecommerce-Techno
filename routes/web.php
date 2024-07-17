<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KategorisController;
use App\Htpp\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

use App\Http\Middleware\IsAdmin;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    
    Route::resource('user', App\Http\Controllers\UsersController::class);
    Route::resource('kategori', App\Http\Controllers\KategorisController::class);
    Route::resource('produk', App\Http\Controllers\ProdukController::class);

});

Route::get('/', [FrontController::class, 'index']);
Route::get('contact', [FrontController::class, 'contact']);
Route::get('shop', [FrontController::class, 'shop']);
Route::get('track', [FrontController::class, 'track']);
Route::get('checkout', [FrontController::class, 'checkout']);
Route::get('produk_detail/{id}', [FrontController::class, 'produkDetail']);
Route::get('about', [FrontController::class, 'about']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');



Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
Route::post('/checkout/place-order', 'CheckoutController@placeOrder')->name('checkout.placeOrder');

Route::get('/order-confirmation', function () {
    return view('order_confirmation');
})->name('order.confirmation');








