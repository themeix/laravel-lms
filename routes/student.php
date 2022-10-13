<?php

use App\Http\Controllers\Student\CartManagementController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentDashboardController;
use RealRashid\SweetAlert\Facades\Alert;


Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student');


Route::get('cart-list', [CartManagementController::class, 'cartList'])->name('student.cartList');
Route::post('apply-coupon', [CartManagementController::class, 'applyCoupon'])->name('student.applyCoupon');
Route::get('addToCart', [CartManagementController::class, 'addToCart'])->name('student.addToCart');
Route::post('go-to-checkout', [CartManagementController::class, 'goToCheckout'])->name('student.goToCheckout');
Route::delete('cart-delete/{id}', [CartManagementController::class, 'cartDelete'])->name('student.cartDelete');

