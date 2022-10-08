<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendIndexController;


Route::get('/', [FrontendIndexController::class, 'index'])->name('main.index');
Route::get('/index2', [FrontendIndexController::class, 'index2'])->name('main.index2');

Route::get('allCourses1', [FrontendIndexController::class, 'allCourses1'])->name('main.allCourses1');
Route::get('allCourses2', [FrontendIndexController::class, 'allCourses2'])->name('main.allCourses2');

Route::get('categoryWiseCourses1', [FrontendIndexController::class, 'categoryWiseCourses1'])->name('main.categoryWiseCourses1');
Route::get('category/categoryWiseCourses2', [FrontendIndexController::class, 'categoryWiseCourses2'])->name('main.categoryWiseCourses2');



Route::get('/courseCategory1', [FrontendIndexController::class, 'courseCategory1'])->name('main.courseCategory1');
Route::get('/courseCategory2', [FrontendIndexController::class, 'courseCategory2'])->name('main.courseCategory2');

Route::get('/about1', [FrontendIndexController::class, 'about1'])->name('main.about1');
Route::get('/about2', [FrontendIndexController::class, 'about2'])->name('main.about2');

Route::get('/cart', [CartController::class, 'index'])->name('main.cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('main.checkout');

Route::get('/contact', [FrontendIndexController::class, 'contact'])->name('main.contact');


Route::get('/authorWiseCourse', [FrontendIndexController::class, 'authorWiseCourse'])->name('main.authorWiseCourse');

Route::get('/courseDetails', [FrontendIndexController::class, 'courseDetails'])->name('main.courseDetails');

Route::get('/blog/index', [BlogController::class, 'index'])->name('main.blog.index');
Route::get('/blog/details', [BlogController::class, 'details'])->name('main.blog.details');
