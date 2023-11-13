<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\AdminOrderController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/book-category/{id}',[HomeController::class,'category'])->name('book-category');
Route::get('/book-detail/{id}',[HomeController::class,'detail'])->name('book-detail');

Route::post('/add-to-cart/{id}',[CartController::class,'index'])->name('add-to-cart');
Route::get('/show-cart',[CartController::class,'show'])->name('show-cart');
Route::post('/update-cart-product/{id}',[CartController::class,'update'])->name('update-cart-product');
Route::get('/remove-cart-product/{id}',[CartController::class,'remove'])->name('remove-cart-product');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-cash-order',[CheckoutController::class,'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');


Route::get('/customer-login',[CustomerAuthController::class,'index'])->name('customer.login');
Route::post('/customer-login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::post('/customer-register',[CustomerAuthController::class,'register'])->name('customer.register');
Route::middleware(['customer',])->group(function () {
    Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer.logout');
    Route::get('/customer-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
    Route::get('/customer-profile',[CustomerAuthController::class,'profile'])->name('customer.profile');
    Route::get('/customer-order',[CustomerOrderController::class,'allOrder'])->name('customer.order');
});





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


    Route::get('/book/add',[BookController::class,'index'])->name('book.add');
    Route::post('/book/store',[BookController::class,'store'])->name('book.store');
    Route::get('/book/manage',[BookController::class,'manage'])->name('book.manage');
    Route::get('/book/edit/{id}',[BookController::class,'edit'])->name('book.edit');
    Route::post('/book/update/{id}',[BookController::class,'update'])->name('book.update');
    Route::get('/book/delete/{id}',[BookController::class,'delete'])->name('book.delete');



    Route::get('/admin/all-order',[AdminOrderController::class,'index'])->name('admin.all-order');
    Route::get('/admin/order-detail/{id}',[AdminOrderController::class,'detail'])->name('admin.order-detail');
    Route::get('/admin/order-edit/{id}',[AdminOrderController::class,'edit'])->name('admin.order-edit');
    Route::post('/admin/order-update/{id}',[AdminOrderController::class,'update'])->name('admin.order-update');
    Route::get('/admin/order-invoice/{id}',[AdminOrderController::class,'showInvoice'])->name('admin.order-invoice');
    Route::get('/admin/print-invoice/{id}',[AdminOrderController::class,'printInvoice'])->name('admin.print-invoice');
    Route::get('/admin/order-delete/{id}',[AdminOrderController::class,'delete'])->name('admin.order-delete');
});
