<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\InstructorDashboardController;


Route::get('dashboard', [InstructorDashboardController::class, 'index'])->name('instructor');
