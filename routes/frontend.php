<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendIndexController;


//Index Page
Route::get('/', [FrontendIndexController::class, 'index'])->name('main.index');
Route::get('/index2', [FrontendIndexController::class, 'index2'])->name('main.index2');


//All Courses
Route::get('allCourses1', [FrontendIndexController::class, 'allCourses1'])->name('main.allCourses1');
Route::get('allCourses2', [FrontendIndexController::class, 'allCourses2'])->name('main.allCourses2');


//Category Wise Courses
Route::get('categoryWiseCourses1/{uuid}', [FrontendIndexController::class, 'categoryWiseCourses1'])->name('main.categoryWiseCourses1');
Route::get('category/categoryWiseCourses2/{uuid}', [FrontendIndexController::class, 'categoryWiseCourses2'])->name('main.categoryWiseCourses2');


//Instructor Wise Courses
Route::get('/instructorWiseCourses/{uuid}', [FrontendIndexController::class, 'instructorWiseCourses'])->name('main.instructorWiseCourses');


//Single Course
Route::get('/courseDetails', [FrontendIndexController::class, 'courseDetails'])->name('main.courseDetails');


//All Categories
Route::get('/allCategories1', [FrontendIndexController::class, 'allCategories1'])->name('main.allCategories1');
Route::get('/allCategories2', [FrontendIndexController::class, 'allCategories2'])->name('main.allCategories2');


//About Us
Route::get('/about1', [FrontendIndexController::class, 'about1'])->name('main.about1');
Route::get('/about2', [FrontendIndexController::class, 'about2'])->name('main.about2');


//Cart & Checkout
Route::get('/cart', [CartController::class, 'index'])->name('main.cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('main.checkout');


//Contact Us
Route::get('/contact', [FrontendIndexController::class, 'contact'])->name('main.contact');


//NewsLetter
Route::post('newsletter/store',[NewsletterController::class, 'store'])->name('main.newsletter.store');


//Blog
Route::get('/blog/index', [BlogController::class, 'index'])->name('main.blog.index');
Route::get('/blog/details', [BlogController::class, 'details'])->name('main.blog.details');
