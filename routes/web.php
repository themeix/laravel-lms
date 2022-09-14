<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DifficultyLevelController;
use App\Http\Controllers\PromotionalTagController;
use App\Http\Controllers\RulesBenifitsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CouponController;
Use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\EmailManagementController;
use App\Http\Controllers\BlogCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::group(['namespace' => 'App\Http\Controllers'], function()
{


});*/






    Auth::routes(['register' => false, 'reset' => false]);
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('admin', [AdminDashboardController::class, 'index'])->name('admin');

    //Course Management Routs

    //Category
    Route::get('admin/category/index', [CourseCategoryController::class, 'index'])->name('category.index');
    Route::get('admin/category/create', [CourseCategoryController::class, 'create'])->name('category.create');
    Route::get('admin/category/store', [CourseCategoryController::class, 'store'])->name('category.store');
    Route::get('admin/category/edit', [CourseCategoryController::class, 'edit'])->name('category.edit');

    //SubCategory
    Route::get('admin/subCategory/index', [SubCategoryController::class, 'index'])->name('subCategory.index');
    Route::get('admin/subCategory/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
    Route::get('admin/subCategory/edit', [SubCategoryController::class, 'edit'])->name('subCategory.edit');

    //Tag
    Route::get('admin/tag/index', [TagController::class, 'index'])->name('tag.index');
    Route::get('admin/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::get('admin/tag/edit', [TagController::class, 'edit'])->name('tag.edit');

    //Language
    Route::get('admin/language/index', [LanguageController::class, 'index'])->name('language.index');
    Route::get('admin/language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::get('admin/language/edit', [LanguageController::class, 'edit'])->name('language.edit');

    //Difficulty Level
    Route::get('admin/difficultyLevel/index', [DifficultyLevelController::class, 'index'])->name('difficultyLevel.index');
    Route::get('admin/difficultyLevel/create', [DifficultyLevelController::class, 'create'])->name('difficultyLevel.create');
    Route::get('admin/difficultyLevel/edit', [DifficultyLevelController::class, 'edit'])->name('difficultyLevel.edit');

    //Promotional Tag
    Route::get('admin/promotionalTag/index', [PromotionalTagController::class, 'index'])->name('promotionalTag.index');
    Route::get('admin/promotionalTag/create', [PromotionalTagController::class, 'create'])->name('promotionalTag.create');
    Route::get('admin/promotionalTag/edit', [PromotionalTagController::class, 'edit'])->name('promotionalTag.edit');


    //Rules & Benifits
    Route::get('admin/rulesBenifits/index', [RulesBenifitsController::class, 'index'])->name('rulesBenifits.index');
    Route::get('admin/rulesBenifits/create', [RulesBenifitsController::class, 'create'])->name('rulesBenifits.create');
    Route::get('admin/rulesBenifits/edit', [RulesBenifitsController::class, 'edit'])->name('rulesBenifits.edit');


    //Course
    Route::get('admin/course/index', [CourseController::class, 'index'])->name('course.index');
    Route::get('admin/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::get('admin/course/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('admin/course/enroll', [CourseController::class, 'courseEnroll'])->name('course.enroll');
    Route::get('admin/course/approved', [CourseController::class, 'courseApproved'])->name('course.approved');
    Route::get('admin/course/hold', [CourseController::class, 'courseHold'])->name('course.hold');
    Route::get('admin/course/reviewPending', [CourseController::class, 'courseReviewPending'])->name('course.reviewPending');



    //Instructor
    Route::get('admin/instructor/index', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('admin/instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::get('admin/instructor/edit', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::get('admin/instructor/show', [InstructorController::class, 'show'])->name('instructor.show');
    Route::get('admin/instructor/blocked', [InstructorController::class, 'blockedInstructor'])->name('instructor.blocked');
    Route::get('admin/instructor/pending', [InstructorController::class, 'pendingInstructor'])->name('instructor.pending');
    Route::get('admin/instructor/approved', [InstructorController::class, 'approvedInstructor'])->name('instructor.approved');


    //Student
    Route::get('admin/student/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('admin/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::get('admin/student/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('admin/student/show', [StudentController::class, 'show'])->name('student.show');


    //Coupon
    Route::get('admin/coupon/index', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('admin/coupon/create', [CouponController::class, 'create'])->name('coupon.create');
    Route::get('admin/coupon/edit', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::get('admin/coupon/show', [CouponController::class, 'show'])->name('coupon.show');


    //Promotion
    Route::get('admin/promotion/index', [PromotionController::class, 'index'])->name('promotion.index');
    Route::get('admin/promotion/create', [PromotionController::class, 'create'])->name('promotion.create');
    Route::get('admin/promotion/edit', [PromotionController::class, 'edit'])->name('promotion.edit');
    Route::get('admin/promotion/show', [PromotionController::class, 'show'])->name('promotion.show');


    //Support Ticket
    Route::get('admin/supportTicket/index', [SupportTicketController::class, 'index'])->name('supportTicket.index');
    Route::get('admin/supportTicket/openTicket', [SupportTicketController::class, 'openTicket'])->name('supportTicket.openTicket');

    //Email Management
    Route::get('admin/emailTemplate/index', [EmailManagementController::class, 'index'])->name('emailTemplate.index');
    Route::get('admin/emailTemplate/create', [EmailManagementController::class, 'create'])->name('emailTemplate.create');
    Route::get('admin/emailTemplate/edit', [EmailManagementController::class, 'edit'])->name('emailTemplate.edit');
    Route::get('admin/emailTemplate/show', [EmailManagementController::class, 'show'])->name('emailTemplate.show');
    Route::get('admin/emailTemplate/sendEmail', [EmailManagementController::class, 'sendEmail'])->name('emailTemplate.sendEmail');


    //Blog Category
    Route::get('admin/blogCategory/index', [BlogCategoryController::class, 'index'])->name('blogCategory.index');
    Route::get('admin/blogCategory/create', [BlogCategoryController::class, 'create'])->name('blogCategory.create');
    Route::get('admin/blogCategory/edit', [BlogCategoryController::class, 'edit'])->name('blogCategory.edit');


});
