<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Student\CartManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendIndexController;


//Index Page
Route::get('/', [FrontendIndexController::class, 'index'])->name('main.index');
Route::get('/index-style-2', [FrontendIndexController::class, 'index2'])->name('main.index2');


//All Courses
Route::get('all-courses-style-1', [FrontendIndexController::class, 'allCourses1'])->name('main.allCourses1');
Route::get('all-courses-style-2', [FrontendIndexController::class, 'allCourses2'])->name('main.allCourses2');


//Category Wise Courses
Route::get('category-courses-style-1/{uuid}', [FrontendIndexController::class, 'categoryWiseCourses1'])->name('main.categoryWiseCourses1');
Route::get('category-courses-style-2/{uuid}', [FrontendIndexController::class, 'categoryWiseCourses2'])->name('main.categoryWiseCourses2');


//Instructor Wise Courses
Route::get('/instructor-courses/{uuid}', [FrontendIndexController::class, 'instructorWiseCourses'])->name('main.instructorWiseCourses');


//Single Course
Route::get('/course-details', [FrontendIndexController::class, 'courseDetails'])->name('main.courseDetails');


//All Categories
Route::get('/all-categories-style-1', [FrontendIndexController::class, 'allCategories1'])->name('main.allCategories1');
Route::get('/all-categories-style-2', [FrontendIndexController::class, 'allCategories2'])->name('main.allCategories2');


//About Us
Route::get('/about-style-1', [FrontendIndexController::class, 'about1'])->name('main.about1');
Route::get('/about-style-2', [FrontendIndexController::class, 'about2'])->name('main.about2');



//Contact Us
Route::get('/contact', [FrontendIndexController::class, 'contact'])->name('main.contact');


//NewsLetter
Route::post('newsletter/store',[NewsletterController::class, 'store'])->name('main.newsletter.store');


//Blog
Route::get('/blog/index', [BlogController::class, 'index'])->name('main.blog.index');
Route::get('/blog/details', [BlogController::class, 'details'])->name('main.blog.details');


//Cart & Checkout
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartManagementController::class, 'cartList'])->name('main.cart');
    Route::get('checkout', [CartManagementController::class, 'goToCheckout'])->name('main.checkout');
    Route::post('apply-coupon', [CartManagementController::class, 'applyCoupon'])->name('student.applyCoupon');
    Route::get('addToCart', [CartManagementController::class, 'addToCart'])->name('student.addToCart');
    Route::get('cart-delete/{id}', [CartManagementController::class, 'cartDelete'])->name('main.cartDelete');
});
