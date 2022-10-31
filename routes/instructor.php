<?php

use App\Http\Controllers\Instructor\AccountController;
use App\Http\Controllers\Instructor\AssignmentController;
use App\Http\Controllers\Instructor\CertificateController;
use App\Http\Controllers\Instructor\DiscussionController;
use App\Http\Controllers\Instructor\ExamController;
use App\Http\Controllers\Instructor\KeyPointsController;
use App\Http\Controllers\Instructor\LessonController;
use App\Http\Controllers\Instructor\LiveClassController;
use App\Http\Controllers\Instructor\NoticeBoardController;
use App\Http\Controllers\Instructor\ResourceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\InstructorDashboardController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\StudentController;


Route::get('dashboard', [InstructorDashboardController::class, 'index'])->name('instructor');

//Profile & Password
Route::get('profile', [InstructorDashboardController::class, 'profile'])->name('instructor.profile');
Route::post('profile-store', [InstructorDashboardController::class, 'profileStore'])->name('instructor.profileStore');
Route::get('change-password', [InstructorDashboardController::class, 'changePassword'])->name('instructor.changePassword');
Route::post('change-password-store', [InstructorDashboardController::class, 'changePasswordStore'])->name('instructor.changePasswordStore');


//Course Routes Start
Route::get('course/index', [CourseController::class, 'index'])->name('instructor.course.index');
Route::get('createCourse', [CourseController::class, 'create'])->name('instructor.createCourse');
Route::post('course/store', [CourseController::class, 'store'])->name('instructor.course.store')/*->middleware('isDemo')*/;
Route::get('course/show/{uuid}', [CourseController::class, 'show'])->name('instructor.course.show');
Route::get('course/edit/{uuid}', [CourseController::class, 'edit'])->name('instructor.course.edit');

Route::post('course/update/{uuid}', [CourseController::class, 'update'])->name('instructor.course.update');

Route::delete('course/course-delete/{uuid}', [CourseController::class, 'delete'])->name('instructor.course.delete')->middleware('isDemo');
//Course Routes End


//Course Resource Routes Start
Route::get('course/upload-finished/{uuid}', [CourseController::class, 'uploadFinished'])->name('instructor.course.course.upload-finished');
Route::get('course/getSubCategory', [CourseController::class, 'getSubcategories'])->name('instructor.course.course.getSubCategory');
Route::get('course/resource/index/{course_uuid}', [ResourceController::class, 'index'])->name('instructor.course.resource.index');
Route::get('course/resource/create/{course_uuid}', [ResourceController::class, 'create'])->name('instructor.course.resource.create');
Route::post('course/resource/store/{course_uuid}', [ResourceController::class, 'store'])->name('instructor.course.resource.store')/*->middleware('isDemo')*/;
Route::post('course/resource/delete/{uuid}', [ResourceController::class, 'delete'])->name('instructor.course.resource.delete')/*->middleware('isDemo')*/;
//Course Resource Routes End





//Course Exam Routes Start
Route::get('course/exam/{course_uuid}', [ExamController::class, 'index'])->name('instructor.course.exam.index');
Route::get('course/exam/create/{course_uuid}', [ExamController::class, 'create'])->name('instructor.course.exam.create');
Route::post('course/exam/store/{course_uuid}', [ExamController::class, 'store'])->name('instructor.course.exam.store')/*->middleware('isDemo')*/;
Route::get('course/exam/edit/{uuid}', [ExamController::class, 'edit'])->name('instructor.course.exam.edit');
Route::post('course/exam/update/{uuid}', [ExamController::class, 'update'])->name('instructor.course.exam.update')/*->middleware('isDemo')*/;
Route::get('course/exam/view/{uuid}', [ExamController::class, 'view'])->name('instructor.course.exam.view');
Route::post('course/exam/delete/{uuid}', [ExamController::class, 'delete'])->name('instructor.course.exam.delete')/*->middleware('isDemo')*/;
Route::get('course/exam/question/{uuid}', [ExamController::class, 'question'])->name('instructor.exam.question');
Route::post('course/exam/save-mcq-question/{uuid}', [ExamController::class, 'saveMcqQuestion'])->name('instructor.exam.save-mcq-question')/*->middleware('isDemo')*/;
Route::post('course/exam/bulk-upload-mcq/{uuid}', [ExamController::class, 'bulkUploadMcq'])->name('instructor.exam.bulk-upload-mcq')/*->middleware('isDemo')*/;
Route::get('course/exam/edit-mcq/{question_uuid}', [ExamController::class, 'editMcq'])->name('instructor.exam.edit-mcq');
Route::post('course/exam/update-mcq-question/{question_uuid}', [ExamController::class, 'updateMcqQuestion'])->name('instructor.exam.update-mcq-question')/*->middleware('isDemo')*/;
Route::get('course/exam/delete-question/{question_uuid}', [ExamController::class, 'deleteQuestion'])->name('exam.delete-question')/*->middleware('isDemo')*/;

//Course Exam Routes End


//Learn Key Points Routes Start Here

Route::get('course/key-points/index/{course_uuid}', [KeyPointsController::class, 'index'])->name('instructor.course.key-points.index');

Route::get('course/key-points/create/{course_uuid}', [KeyPointsController::class, 'create'])->name('instructor.course.key-points.create');

Route::post('course/key-points/store/{course_uuid}', [KeyPointsController::class, 'store'])->name('instructor.course.key-points.store')/*->middleware('isDemo')*/;

Route::get('course/key-points/edit/{course_uuid}/{id}', [KeyPointsController::class, 'edit'])->name('instructor.course.key-points.edit')/*->middleware('isDemo')*/;

Route::post('course/key-points/store/{course_uuid}/{id}', [KeyPointsController::class, 'update'])->name('instructor.course.key-points.update')/*->middleware('isDemo')*/;

Route::post('course/key-points/delete/{id}', [KeyPointsController::class, 'delete'])->name('instructor.course.key-points.delete')/*->middleware('isDemo')*/;

//Learn Key Points Routes Ends Here



//Course Lesson & Lectures Routes Start
Route::get('course/lesson/index/{course_uuid}', [LessonController::class, 'index'])->name('instructor.course.lesson.index');
Route::get('course/lesson/create/{course_uuid}', [LessonController::class, 'create'])->name('instructor.course.lesson.create');
Route::post('course/lesson/store/{course_uuid}', [LessonController::class, 'store'])->name('instructor.course.lesson.store')/*->middleware('isDemo')*/;

Route::get('course/lesson/edit/{course_uuid}/{uuid}', [LessonController::class, 'edit'])->name('instructor.course.lesson.edit');

Route::post('course/lesson/update/{course_uuid}/{uuid}', [LessonController::class, 'update'])->name('instructor.course.lesson.update')/*->middleware('isDemo')*/;

Route::post('course/lesson/delete/{uuid}', [LessonController::class, 'delete'])->name('instructor.course.lesson.delete')/*->middleware('isDemo')*/;

Route::get('course/lecture/{course_uuid}/{lesson_uuid}', [LessonController::class, 'lectureIndex_Create'])->name('instructor.course.lecture.index');

Route::post('course/lecture-store/{course_uuid}/{lesson_uuid}', [LessonController::class, 'lectureStore'])->name('instructor.course.lecture.store');

//Course Lesson & Lectures Routes End


// Course Assignment Routes Start
Route::get('course/assignment/index/{course_uuid}', [AssignmentController::class, 'index'])->name('instructor.course.assignment.index');
Route::get('course/assignment/create/{course_uuid}', [AssignmentController::class, 'create'])->name('instructor.course.assignment.create');
Route::post('course/assignment/store/{course_uuid}', [AssignmentController::class, 'store'])->name('instructor.course.assignment.store')/*->middleware('isDemo')*/;
Route::get('course/assignment/edit/{course_uuid}/{uuid}', [AssignmentController::class, 'edit'])->name('instructor.course.assignment.edit');
Route::post('course/assignment/update/{course_uuid}/{uuid}', [AssignmentController::class, 'update'])->name('instructor.course.assignment.update')/*->middleware('isDemo')*/;
Route::post('course/assignment/delete/{uuid}', [AssignmentController::class, 'delete'])->name('instructor.course.assignment.delete')/*->middleware('isDemo')*/
;
Route::get('course/assessments/index/{course_uuid}/{assignment_uuid}', [AssignmentController::class, 'assessmentIndex'])->name('instructor.course.assessment.index');
Route::post('course/assessments/update/{assignment_submit_uuid}', [AssignmentController::class, 'assessmentSubmitMarkUpdate'])->name('instructor.course.assessment.submitMarkUpdate')/*->middleware('isDemo')*/;
Route::get('course/assessments/download', [AssignmentController::class, 'studentAssignmentDownload'])->name('instructor.course.assessment.download')/*->middleware('isDemo')*/;
// Course Assignment Routes End


//All Enroll Student List
Route::get('all-enrollStudent/index', [StudentController::class, 'allEnrollStudentIndex'])->name('instructor.allEnrollStudent.index');


//Notice Routes Start
Route::get('notice/index/{course_uuid}', [NoticeBoardController::class, 'index'])->name('instructor.notice.index');
Route::get('notice/edit/{course_uuid}/{uuid}', [NoticeBoardController::class, 'edit'])->name('instructor.notice.edit');
Route::post('notice/update/{course_uuid}/{uuid}', [NoticeBoardController::class, 'update'])->name('instructor.notice.update');
Route::get('notice/show/{course_uuid}/{uuid}', [NoticeBoardController::class, 'show'])->name('instructor.notice.show');
Route::post('notice/delete/{uuid}', [NoticeBoardController::class, 'delete'])->name('instructor.notice.delete');
Route::get('notice/create/{course_uuid}', [NoticeBoardController::class, 'create'])->name('instructor.notice.create');
Route::post('notice/store/{course_uuid}', [NoticeBoardController::class, 'store'])->name('instructor.notice.store');
Route::get('notice/courseWiseNotice/index', [NoticeBoardController::class, 'courseWiseNoticeIndex'])->name('instructor.courseWiseNotice.index');
//Notice Routes End



//Live Class Routes Start
Route::get('liveClass/courseWiseLiveClass', [LiveClassController::class, 'courseWiseLiveClassIndex'])->name('instructor.courseWiseLiveClass.index');
Route::get('liveClass/index/{course_uuid}', [LiveClassController::class, 'index'])->name('instructor.liveClass.index');
Route::get('liveClass/create/{course_uuid}', [LiveClassController::class, 'create'])->name('instructor.liveClass.create');
//Live Class Routes End


//Course Discussion Routes Start
Route::get('discussion/index', [DiscussionController::class, 'index'])->name('instructor.discussion.index');
//Course Discussion Routes End



//Account Routes Start
Route::get('account/index', [AccountController::class, 'index'])->name('instructor.account.index');
//Account Routes End
