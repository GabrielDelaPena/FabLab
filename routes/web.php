<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('others.welcome');
})->name('home');

Route::get('/contact', function () {
    return view('others.contact');
})->name('contact');

/** Admin */

// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// Route::get('/item', [AdminController::class, 'show'])->name('admin.item');

Route::resource('admin', AdminController::class);

/** Products */

Route::resource('producten', ProductsController::class);

/** Login */

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

/** Logout */

Route::get('/logout', [LogoutController::class, 'signout'])->name('logout');

/** Student */

Route::resource('student', StudentController::class);

/** Recharge */

// Route::get('/recharge', [RechargeController::class, 'index'])->name('recharge');
// Route::get('/recharge', [RechargeController::class, 'store'])->name('recharge.store');
// Route::post('/recharge', [RechargeController::class, 'successPaid'])->name('recharge.successPaid');

Route::resource('recharge', RechargeController::class);
/** Cart */

Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

/** Payment */

Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

/** Orders */

Route::get('/orders', [OrderController::class, 'index'])->name('orders');

/** Paypal */

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

/** Error */

Route::get('/error', function () {
    return view('error');
})->name('error');
