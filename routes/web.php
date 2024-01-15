<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* Ajax */
Route::get('ajax/getLocation', [LocationController::class, 'get_location'])->name('ajax.location')->middleware(AuthenticateMiddleware::class);

/* Login - Logout - Register */
Route::get('login', [LoginController::class, 'page_login'])->name('page.login')->middleware(LoginMiddleware::class);
Route::post('check_login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::post('register', [LoginController::class, 'register'])->name('auth.register');

/* -------------------------------------------------------------------------------Server Routes------------------------------------------------------------------------------- */


/* --------------------------------------------Page Account --------------------------------------------*/
Route::get('account', [AccountController::class, 'account'])->name('page.account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
Route::get('account&admin', [AccountController::class, 'account_admin'])->name('page.account_admin')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
Route::get('account&user', [AccountController::class, 'account_user'])->name('page.account_user')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
Route::get('account&add', [AccountController::class, 'add_account'])->name('page.add_account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
Route::get('account&search', [AccountController::class, 'search_account'])->name('page.search_account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
Route::get('account&edit', [AccountController::class, 'edit_account'])->name('page.edit_account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);

/*Create Account*/
Route::post('account&save', [AccountController::class, 'create_account'])->name('page.save_account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/*Delete Account*/
Route::get('account&delete', [AccountController::class, 'delete_account'])->name('page.delete_account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/*Update Account*/
Route::post('account&update', [AccountController::class, 'update_account'])->name('page.update_account')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);

/* --------------------------------------------Page Product --------------------------------------------*/
Route::get('product', [ProductController::class, 'page_product'])->name('page.product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
Route::get('product&search', [ProductController::class, 'search_product'])->name('page.search_product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);

/* Page Add Product*/
Route::get('product&add', [ProductController::class, 'page_add_product'])->name('page.add_product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/* page Edit Product*/
Route::get('product&edit', [ProductController::class, 'page_edit_product'])->name('page.edit_product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/*Create Product*/
Route::post('product&create', [ProductController::class, 'create_product'])->name('page.create_product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/*Update Product*/
Route::post('product&update', [ProductController::class, 'update_product'])->name('page.update_product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/*Delete Product*/
Route::get('product&delete', [ProductController::class, 'delete_product'])->name('page.delete_product')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);

/* Add and Edit Category */
Route::get('product&add_category', [ProductController::class, 'add_category'])->name('page.add_category')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
/* Delete category */
Route::get('product&delete_category', [ProductController::class, 'delete_category'])->name('page.delete_category')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);


/* --------------------------------------------Page Dashboard --------------------------------------------*/
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('page.dashboard')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);

/* --------------------------------------------Page Order --------------------------------------------*/
Route::get('order', [OrderController::class, 'index'])->name('page.order')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
//search order
Route::get('order&search', [OrderController::class, 'search'])->name('page.search_order')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);
//update
Route::post('order&update', [OrderController::class, 'update'])->name('update')->middleware(AuthenticateMiddleware::class)->middleware(LoginMiddleware::class);


/* -------------------------------------------------------------------------------Client Routes------------------------------------------------------------------------------- */

// index
Route::get('/index', [HomeController::class, 'index'])->name('page.index');
//profile
Route::post('/update', [HomeController::class, 'update_profile'])->name('page.update_account_user')->middleware(AuthenticateMiddleware::class);;
//shop cart
Route::get('/cart', [CartController::class, 'page_cart'])->name('page.cart')->middleware(AuthenticateMiddleware::class);
//add cart
Route::post('/add_cart', [HomeController::class, 'add_cart'])->name('page.add_cart')->middleware(AuthenticateMiddleware::class);
//delete cart
Route::get('/delete_cart', [CartController::class, 'delete_cart'])->name('delete_cart')->middleware(AuthenticateMiddleware::class);
//buy 
Route::get('/buy', [CartController::class, 'buy'])->name('buy')->middleware(AuthenticateMiddleware::class);
