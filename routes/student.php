<?php

use App\Http\Controllers\Student\CartManagementController;

use App\Http\Controllers\Student\MyCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentDashboardController;
use RealRashid\SweetAlert\Facades\Alert;


Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student');


//Cart & Checkout Management
Route::get('cart', [CartManagementController::class, 'cartList'])->name('student.cart');
Route::get('getQuantity', [CartManagementController::class, 'getQuantity'])->name('student.getQuantity');

Route::get('fetch-bank', [CartManagementController::class, 'fetchBank'])->name('student.fetchBank');

Route::get('getStates', [CartManagementController::class,'getStates'])->name('student.getStates');

Route::get('checkout', [CartManagementController::class, 'checkout'])->name('student.checkout');
Route::post('apply-coupon', [CartManagementController::class, 'applyCoupon'])->name('student.applyCoupon');
Route::get('addToCart', [CartManagementController::class, 'addToCart'])->name('student.addToCart');
Route::get('buyNow', [CartManagementController::class, 'buyNow'])->name('student.buyNow');
Route::get('cart-delete/{id}', [CartManagementController::class, 'cartDelete'])->name('student.cartDelete');
Route::post('processOrder', [CartManagementController::class, 'processOrder'])->name('student.processOrder');

Route::get('thank-you', [MyCourseController::class, 'thankYou'])->name('student.thankYou');


//Student Buying Courses
Route::get('my-learning', [MyCourseController::class,'myLearningCourseList'])->name('student.learning');
Route::get('download-invoice/{item_id}', [MyCourseController::class, 'downloadInvoice'])->name('student.download-invoice');
Route::get('my-course/{slug}/{action_type?}/{quiz_uuid?}/{answer_id?}', [MyCourseController::class, 'myCourseShow'])->name('student.my-course.show');
