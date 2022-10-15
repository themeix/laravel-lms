<?php

use App\Http\Controllers\Student\CartManagementController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentDashboardController;
use RealRashid\SweetAlert\Facades\Alert;


Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student');




