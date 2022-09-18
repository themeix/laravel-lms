<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DifficultyLevelController;
use App\Http\Controllers\Admin\EmailManagementController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SpecialPromotionalTagController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\RulesBenifitsController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;



Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin');

//Category
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store')/*->middleware('isDemo')*/;

Route::get('category/edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{uuid}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{uuid}', [CategoryController::class, 'destroy'])->name('category.delete')/*->middleware('isDemo')*/;





//SubCategory
Route::get('subCategory/index', [SubCategoryController::class, 'index'])->name('subCategory.index');
Route::get('subCategory/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
Route::get('subCategory/edit', [SubCategoryController::class, 'edit'])->name('subCategory.edit');

//Tag
Route::get('tag/index', [TagController::class, 'index'])->name('tag.index');
Route::get('tag/create', [TagController::class, 'create'])->name('tag.create');
Route::get('tag/edit', [TagController::class, 'edit'])->name('tag.edit');

//Language
Route::get('language/index', [LanguageController::class, 'index'])->name('language.index');
Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
Route::get('language/edit', [LanguageController::class, 'edit'])->name('language.edit');

//Difficulty Level
Route::get('difficultyLevel/index', [DifficultyLevelController::class, 'index'])->name('difficultyLevel.index');
Route::get('difficultyLevel/create', [DifficultyLevelController::class, 'create'])->name('difficultyLevel.create');
Route::get('difficultyLevel/edit', [DifficultyLevelController::class, 'edit'])->name('difficultyLevel.edit');

//Promotional Tag

Route::get('promotionalTag/index', [SpecialPromotionalTagController::class, 'index'])->name('promotionalTag.index');
Route::get('promotionalTag/create', [SpecialPromotionalTagController::class, 'create'])->name('promotionalTag.create');
Route::get('promotionalTag/edit', [SpecialPromotionalTagController::class, 'edit'])->name('promotionalTag.edit');


//Rules & Benifits
Route::get('rulesBenifits/index', [RulesBenifitsController::class, 'index'])->name('rulesBenifits.index');
Route::get('rulesBenifits/create', [RulesBenifitsController::class, 'create'])->name('rulesBenifits.create');
Route::get('rulesBenifits/edit', [RulesBenifitsController::class, 'edit'])->name('rulesBenifits.edit');


//Course
Route::get('course/index', [CourseController::class, 'index'])->name('course.index');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::get('course/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::get('course/enroll', [CourseController::class, 'courseEnroll'])->name('course.enroll');
Route::get('course/approved', [CourseController::class, 'courseApproved'])->name('course.approved');
Route::get('course/hold', [CourseController::class, 'courseHold'])->name('course.hold');
Route::get('course/reviewPending', [CourseController::class, 'courseReviewPending'])->name('course.reviewPending');



//Instructor
Route::get('instructor/index', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
Route::get('instructor/edit', [InstructorController::class, 'edit'])->name('instructor.edit');
Route::get('instructor/show', [InstructorController::class, 'show'])->name('instructor.show');
Route::get('instructor/blocked', [InstructorController::class, 'blockedInstructor'])->name('instructor.blocked');
Route::get('instructor/pending', [InstructorController::class, 'pendingInstructor'])->name('instructor.pending');
Route::get('instructor/approved', [InstructorController::class, 'approvedInstructor'])->name('instructor.approved');


//Student
Route::get('student/index', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('student/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::get('student/show', [StudentController::class, 'show'])->name('student.show');


//Coupon
Route::get('coupon/index', [CouponController::class, 'index'])->name('coupon.index');
Route::get('coupon/create', [CouponController::class, 'create'])->name('coupon.create');
Route::get('coupon/edit', [CouponController::class, 'edit'])->name('coupon.edit');
Route::get('coupon/show', [CouponController::class, 'show'])->name('coupon.show');


//Promotion
Route::get('promotion/index', [PromotionController::class, 'index'])->name('promotion.index');
Route::get('promotion/create', [PromotionController::class, 'create'])->name('promotion.create');
Route::get('promotion/edit', [PromotionController::class, 'edit'])->name('promotion.edit');
Route::get('promotion/show', [PromotionController::class, 'show'])->name('promotion.show');


//Support Ticket
Route::get('supportTicket/index', [SupportTicketController::class, 'index'])->name('supportTicket.index');
Route::get('supportTicket/openTicket', [SupportTicketController::class, 'openTicket'])->name('supportTicket.openTicket');

//Email Management
Route::get('emailTemplate/index', [EmailManagementController::class, 'index'])->name('emailTemplate.index');
Route::get('emailTemplate/create', [EmailManagementController::class, 'create'])->name('emailTemplate.create');
Route::get('emailTemplate/edit', [EmailManagementController::class, 'edit'])->name('emailTemplate.edit');
Route::get('emailTemplate/show', [EmailManagementController::class, 'show'])->name('emailTemplate.show');
Route::get('emailTemplate/sendEmail', [EmailManagementController::class, 'sendEmail'])->name('emailTemplate.sendEmail');


//Blog Category
Route::get('blogCategory/index', [BlogCategoryController::class, 'index'])->name('blogCategory.index');
Route::get('blogCategory/create', [BlogCategoryController::class, 'create'])->name('blogCategory.create');
Route::get('blogCategory/edit', [BlogCategoryController::class, 'edit'])->name('blogCategory.edit');
