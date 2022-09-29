<?php

use App\Http\Controllers\Instructor\AccountController;
use App\Http\Controllers\Instructor\AssignmentController;
use App\Http\Controllers\Instructor\CertificateController;
use App\Http\Controllers\Instructor\DiscussionController;
use App\Http\Controllers\Instructor\LiveClassController;
use App\Http\Controllers\Instructor\NoticeBoardController;
use App\Http\Controllers\Instructor\ResourceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\InstructorDashboardController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\StudentController;


Route::get('dashboard', [InstructorDashboardController::class, 'index'])->name('instructor');

Route::get('course/index', [CourseController::class, 'index'])->name('instructor.course.index');

Route::get('createCourse', [CourseController::class, 'create'])->name('instructor.createCourse');

Route::post('course/store', [CourseController::class, 'store'])->name('instructor.course.store')/*->middleware('isDemo')*/
;

Route::get('course/show/{uuid}', [CourseController::class, 'show'])->name('instructor.course.show');

Route::get('course/edit/{uuid}', [CourseController::class, 'edit'])->name('instructor.course.edit');

Route::post('course/update-overview/{uuid}', [CourseController::class, 'updateOverview'])->name('instructor.course.update.overview')/*->middleware('isDemo')*/
;

Route::post('course/update-category/{uuid}', [CourseController::class, 'updateCategory'])->name('instructor.course.course.update.category')/*->middleware('isDemo')*/
;

Route::get('course/upload-finished/{uuid}', [CourseController::class, 'uploadFinished'])->name('instructor.course.course.upload-finished');

Route::get('course/getSubCategory', [CourseController::class, 'getSubcategories'])->name('instructor.course.course.getSubCategory');


Route::get('course/resource/index/{course_uuid}', [ResourceController::class, 'index'])->name('instructor.course.resource.index');
Route::get('course/resource/create/{course_uuid}', [ResourceController::class, 'create'])->name('instructor.course.resource.create');
Route::post('course/resource/store/{course_uuid}', [ResourceController::class, 'store'])->name('instructor.course.resource.store')/*->middleware('isDemo')*/
;
Route::post('course/resource/delete/{uuid}', [ResourceController::class, 'delete'])->name('instructor.course.resource.delete')/*->middleware('isDemo')*/
;


Route::get('course/assignment/index/{course_uuid}', [AssignmentController::class, 'index'])->name('instructor.course.assignment.index');
Route::get('course/assignment/create/{course_uuid}', [AssignmentController::class, 'create'])->name('instructor.course.assignment.create');
Route::post('course/assignment/store/{course_uuid}', [AssignmentController::class, 'store'])->name('instructor.course.assignment.store')/*->middleware('isDemo')*/
;
Route::get('course/assignment/edit/{course_uuid}/{uuid}', [AssignmentController::class, 'edit'])->name('instructor.course.assignment.edit');
Route::post('course/assignment/update/{course_uuid}/{uuid}', [AssignmentController::class, 'update'])->name('instructor.course.assignment.update')/*->middleware('isDemo')*/
;
Route::post('course/assignment/delete/{uuid}', [AssignmentController::class, 'delete'])->name('instructor.course.assignment.delete')/*->middleware('isDemo')*/
;


Route::get('course/assessments/index/{course_uuid}/{assignment_uuid}', [AssignmentController::class, 'assessmentIndex'])->name('instructor.course.assessment.index');
Route::post('course/assessments/update/{assignment_submit_uuid}', [AssignmentController::class, 'assessmentSubmitMarkUpdate'])->name('instructor.course.assessment.submitMarkUpdate')/*->middleware('isDemo')*/;
Route::get('course/assessments/download', [AssignmentController::class, 'studentAssignmentDownload'])->name('instructor.course.assessment.download')/*->middleware('isDemo')*/;




Route::delete('course/course-delete/{uuid}', [CourseController::class, 'delete'])->name('instructor.course.delete')->middleware('isDemo');

Route::get('allEnrollStudent/index', [StudentController::class, 'allEnrollStudentIndex'])->name('instructor.allEnrollStudent.index');


Route::get('notice/index', [NoticeBoardController::class, 'index'])->name('instructor.notice.index');
Route::get('notice/courseWiseNotice/index/{course_uuid}', [NoticeBoardController::class, 'courseWiseNoticeIndex'])->name('courseWiseNotice.index');
Route::get('notice/courseWiseNotice/create/{course_uuid}', [NoticeBoardController::class, 'courseWiseNoticeCreate'])->name('courseWiseNotice.create');









Route::get('liveClass/index', [LiveClassController::class, 'index'])->name('instructor.liveClass.index');
Route::get('liveClass/courseWiseLiveClass/index/{course_uuid}', [LiveClassController::class, 'courseWiseLiveClassIndex'])->name('courseWiseLiveClass.index');
Route::get('liveClass/courseWiseLiveClass/create/{course_uuid}', [LiveClassController::class, 'courseWiseLiveClassCreate'])->name('courseWiseLiveClass.create');




Route::get('certificate/index', [CertificateController::class, 'index'])->name('instructor.certificate.index');

Route::get('discussion/index', [DiscussionController::class, 'index'])->name('instructor.discussion.index');

Route::get('account/index', [AccountController::class, 'index'])->name('instructor.account.index');
