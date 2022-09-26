<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentDashboardController;


Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student');

Route::get('create', [StudentDashboardController::class, 'create'])->name('student.create');
