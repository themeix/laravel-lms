<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendIndexController;


Route::get('/', [FrontendIndexController::class, 'index'])->name('main.index');
Route::get('/index2', [FrontendIndexController::class, 'index2'])->name('main.index2');

Route::get('/category1', [FrontendIndexController::class, 'category1'])->name('main.category1');
Route::get('/category2', [FrontendIndexController::class, 'category2'])->name('main.category2');
Route::get('/category3', [FrontendIndexController::class, 'category3'])->name('main.category3');
Route::get('/category4', [FrontendIndexController::class, 'category4'])->name('main.category4');

Route::get('/about1', [FrontendIndexController::class, 'about1'])->name('main.about1');
Route::get('/about2', [FrontendIndexController::class, 'about2'])->name('main.about2');

Route::get('/cart', [CartController::class, 'index'])->name('main.cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('main.checkout');

Route::get('/contact', [FrontendIndexController::class, 'contact'])->name('main.contact');


Route::get('/authorWiseCourse', [FrontendIndexController::class, 'authorWiseCourse'])->name('main.authorWiseCourse');

Route::get('/courseDetails', [FrontendIndexController::class, 'courseDetails'])->name('main.courseDetails');

Route::get('/blog/index', [BlogController::class, 'index'])->name('main.blog.index');
Route::get('/blog/details', [BlogController::class, 'details'])->name('main.blog.details');
