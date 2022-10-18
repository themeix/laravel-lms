<?php

use App\Http\Controllers\Student\CartManagementController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentDashboardController;
use RealRashid\SweetAlert\Facades\Alert;


Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student');


//Cart & Checkout Management
Route::get('cart', [CartManagementController::class, 'cartList'])->name('main.cart');
Route::get('getQuantity', [CartManagementController::class, 'getQuantity'])->name('main.getQuantity');

Route::get('fetch-bank', [CartManagementController::class, 'fetchBank'])->name('main.fetchBank');

Route::get('getStates', [CartManagementController::class,'getStates'])->name('main.getStates');

Route::get('checkout', [CartManagementController::class, 'checkout'])->name('main.checkout');
Route::post('apply-coupon', [CartManagementController::class, 'applyCoupon'])->name('main.applyCoupon');
Route::get('addToCart', [CartManagementController::class, 'addToCart'])->name('main.addToCart');
Route::get('buyNow', [CartManagementController::class, 'buyNow'])->name('main.buyNow');
Route::get('cart-delete/{id}', [CartManagementController::class, 'cartDelete'])->name('main.cartDelete');


