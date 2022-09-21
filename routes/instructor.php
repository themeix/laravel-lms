<?php

use App\Http\Controllers\Instructor\AccountController;
use App\Http\Controllers\Instructor\CertificateController;
use App\Http\Controllers\Instructor\DiscussionController;
use App\Http\Controllers\Instructor\LiveClassController;
use App\Http\Controllers\Instructor\NoticeBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\InstructorDashboardController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\StudentController;


Route::get('dashboard', [InstructorDashboardController::class, 'index'])->name('instructor');

Route::get('course/index', [CourseController::class, 'index'])->name('instructor.course.index');

Route::get('course/create', [CourseController::class, 'create'])->name('instructor.course.create');

Route::post('course/store', [CourseController::class, 'store'])->name('instructor.course.store')/*->middleware('isDemo')*/;

Route::get('course/edit/{uuid}', [CourseController::class, 'edit'])->name('instructor.course.edit');

Route::post('course/update-overview/{uuid}', [CourseController::class, 'updateOverview'])->name('instructor.course.update.overview')/*->middleware('isDemo')*/;

Route::post('course/update-category/{uuid}', [CourseController::class, 'updateCategory'])->name('instructor.course.course.update.category')/*->middleware('isDemo')*/;

Route::get('course/upload-finished/{uuid}', [CourseController::class, 'uploadFinished'])->name('instructor.course.course.upload-finished');

Route::get('course/getSubCategory', [CourseController::class, 'getSubcategories'])->name('instructor.course.course.getSubCategory');




Route::delete('course/course-delete/{uuid}', [CourseController::class, 'delete'])->name('instructor.course.delete')->middleware('isDemo');

Route::get('allEnrollStudent/index', [StudentController::class, 'allEnrollStudentIndex'])->name('instructor.allEnrollStudent.index');


Route::get('noticeboard/index', [NoticeBoardController::class, 'index'])->name('instructor.noticeboard.index');

Route::get('liveClass/index', [LiveClassController::class, 'index'])->name('instructor.liveClass.index');

Route::get('certificate/index', [CertificateController::class, 'index'])->name('instructor.certificate.index');

Route::get('discussion/index', [DiscussionController::class, 'index'])->name('instructor.discussion.index');

Route::get('account/index', [AccountController::class, 'index'])->name('instructor.account.index');
