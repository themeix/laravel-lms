<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendIndexController;


Route::get('/', [FrontendIndexController::class, 'index'])->name('main.index');
