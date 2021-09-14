<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmtpController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::get('/cart', function () {
//     return view('posts.index');
// });
Route::get('/admin', [DashboardController::class, 'accessAdmin'])->name('admin')->middleware('auth');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
// Route::get('/', function(){
//     return view('home');
// })->name('home');
Route::get('/', [ProductsController::class, 'viewProducts'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/products', [ ProductsController::class, 'viewProducts' ])->name('v_products');
Route::post('/products', [ ProductsController::class, 'addProduct' ])->name('upload_product');

// Route::get('/art', function(){
//     return view('img');
// });

Route::post('add-to-cart', [ProductsController::class, 'addToCart'])->name('addToCart');
Route::get('/viewcart', [ProductsController::class, 'addToCart'])->name('cart');

Route::get('stripe', [StripeController::class, 'stripe'])->middleware(['auth'])->name('stripe');
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
