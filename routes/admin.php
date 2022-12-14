<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\KeyPointsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use App\Models\BlogCategory;
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
use App\Http\Controllers\Admin\RulesBenefitsController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController;



Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin');

//Get Cities & States
Route::get('getStates', [AdminDashboardController::class,'getStates'])->name('admin.getStates');
Route::get('getCities', [AdminDashboardController::class,'getCities'])->name('admin.getCities');


//Profile & Password
Route::get('profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
Route::post('profile-store', [AdminDashboardController::class, 'profileStore'])->name('admin.profileStore')->middleware('isDemo');
Route::get('change-password', [AdminDashboardController::class, 'changePassword'])->name('admin.changePassword');
Route::post('change-password-store', [AdminDashboardController::class, 'changePasswordStore'])->name('admin.changePasswordStore')->middleware('isDemo');


//Category
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('isDemo');
Route::get('category/edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{uuid}', [CategoryController::class, 'update'])->name('category.update')->middleware('isDemo');
Route::post('category/delete/{uuid}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('isDemo');





//SubCategory
Route::get('subCategory/index', [SubCategoryController::class, 'index'])->name('subCategory.index');
Route::get('subCategory/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subCategory.store')->middleware('isDemo');
Route::get('subCategory/edit/{uuid}', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
Route::post('subCategory/update/{uuid}', [SubcategoryController::class, 'update'])->name('subCategory.update')->middleware('isDemo');
Route::post('subCategory/delete/{uuid}', [SubcategoryController::class, 'delete'])->name('subCategory.delete')->middleware('isDemo');


//Tag
Route::get('tag/index', [TagController::class, 'index'])->name('tag.index');
Route::get('tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('tag/store', [TagController::class, 'store'])->name('tag.store')->middleware('isDemo');
Route::get('tag/edit/{uuid}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('update/{uuid}', [TagController::class, 'update'])->name('tag.update')->middleware('isDemo');
Route::post('delete/{uuid}', [TagController::class, 'delete'])->name('tag.delete')->middleware('isDemo');



//Language
Route::get('language/index', [LanguageController::class, 'index'])->name('language.index');
Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
Route::post('language/store', [LanguageController::class, 'store'])->name('language.store')->middleware('isDemo');
Route::get('language/edit/{uuid}', [LanguageController::class, 'edit'])->name('language.edit');
Route::post('language/update/{uuid}', [LanguageController::class, 'update'])->name('language.update')->middleware('isDemo');
Route::post('language/delete/{uuid}', [LanguageController::class, 'delete'])->name('language.delete')->middleware('isDemo');


//Key Points
Route::get('keyPoints/index', [KeyPointsController::class, 'index'])->name('keyPoints.index');
Route::get('keyPoints/create', [KeyPointsController::class, 'create'])->name('keyPoints.create');
Route::post('keyPoints/store', [KeyPointsController::class, 'store'])->name('keyPoints.store')->middleware('isDemo');
Route::get('keyPoints/edit/{uuid}', [KeyPointsController::class, 'edit'])->name('keyPoints.edit');
Route::post('keyPoints/update/{uuid}', [KeyPointsController::class, 'update'])->name('keyPoints.update')->middleware('isDemo');
Route::post('keyPoints/delete/{uuid}', [KeyPointsController::class, 'delete'])->name('keyPoints.delete')->middleware('isDemo');


//Difficulty Level
Route::get('difficultyLevel/index', [DifficultyLevelController::class, 'index'])->name('difficultyLevel.index');
Route::get('difficultyLevel/create', [DifficultyLevelController::class, 'create'])->name('difficultyLevel.create');
Route::post('difficultyLevel/store', [difficultyLevelController::class, 'store'])->name('difficultyLevel.store')->middleware('isDemo');
Route::get('difficultyLevel/edit/{uuid}', [difficultyLevelController::class, 'edit'])->name('difficultyLevel.edit');
Route::post('difficultyLevel/update/{uuid}', [difficultyLevelController::class, 'update'])->name('difficultyLevel.update')->middleware('isDemo');
Route::post('difficultyLevel/delete/{uuid}', [difficultyLevelController::class, 'delete'])->name('difficultyLevel.delete')->middleware('isDemo');


//Promotional Tag

Route::get('promotionalTag/index', [SpecialPromotionalTagController::class, 'index'])->name('promotionalTag.index');
Route::get('promotionalTag/create', [SpecialPromotionalTagController::class, 'create'])->name('promotionalTag.create');
Route::get('promotionalTag/edit', [SpecialPromotionalTagController::class, 'edit'])->name('promotionalTag.edit');
Route::post('promotionalTag/store', [SpecialPromotionalTagController::class, 'store'])->name('promotionalTag.store')->middleware('isDemo');
Route::get('promotionalTag/edit/{uuid}', [SpecialPromotionalTagController::class, 'edit'])->name('promotionalTag.edit');
Route::post('promotionalTag/update/{uuid}', [SpecialPromotionalTagController::class, 'update'])->name('promotionalTag.update')->middleware('isDemo');
Route::post('promotionalTag/delete/{uuid}', [SpecialPromotionalTagController::class, 'delete'])->name('promotionalTag.delete')->middleware('isDemo');


//Rules & Benefits
Route::get('rulesBenefits/index', [RulesBenefitsController::class, 'index'])->name('rulesBenefits.index');
Route::get('rulesBenefits/create', [RulesBenefitsController::class, 'create'])->name('rulesBenefits.create');
Route::get('rulesBenefits/edit', [RulesBenefitsController::class, 'edit'])->name('rulesBenefits.edit');



//Course
Route::get('reviewPendingCourse', [CourseController::class, 'courseReviewPending'])->name('course.reviewPending');
Route::get('course/index', [CourseController::class, 'index'])->name('course.index');
Route::get('course/show/{uuid}', [CourseController::class, 'show'])->name('course.show');
Route::get('course/edit/{uuid}', [CourseController::class, 'edit'])->name('course.edit');
Route::post('course/update/{uuid}', [CourseController::class, 'update'])->name('course.update')->middleware('isDemo');
Route::post('course/delete/{uuid}', [CourseController::class, 'delete'])->name('course.delete')->middleware('isDemo');
Route::get('enrollStudent', [CourseController::class, 'courseEnroll'])->name('course.enroll');
Route::get('approvedCourse', [CourseController::class, 'courseApproved'])->name('course.approved');
Route::get('holdCourse', [CourseController::class, 'courseHold'])->name('course.hold');
Route::post('change-course-status', [CourseController::class, 'courseStatusChange'])->name('admin.course.statusChange')->middleware('isDemo');




//Instructor
Route::get('instructor/index', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
Route::get('createInstructor', [InstructorController::class, 'create'])->name('createInstructor');
Route::post('instructor/store', [InstructorController::class, 'store'])->name('instructor.store')->middleware('isDemo');
Route::get('instructor/edit/{uuid}', [InstructorController::class, 'edit'])->name('instructor.edit');
Route::post('instructor/update/{uuid}', [InstructorController::class, 'update'])->name('instructor.update')->middleware('isDemo');
Route::get('instructor/show/{uuid}', [InstructorController::class, 'show'])->name('instructor.show');
Route::post('instructor/delete/{uuid}', [InstructorController::class, 'delete'])->name('instructor.delete')->middleware('isDemo');

Route::post('change-instructor-status', [InstructorController::class, 'changeInstructorStatus'])->name('admin.instructor.changeInstructorStatus')->middleware('isDemo');

Route::get('blockedInstructor', [InstructorController::class, 'blockedInstructor'])->name('instructor.blocked');
Route::get('approvedInstructor', [InstructorController::class, 'approvedInstructor'])->name('instructor.approved');


Route::get('get-state-by-location/{country_id}', [InstructorController::class, 'getStateByCountry']);
Route::get('get-city-by-state/{state_id}', [InstructorController::class, 'getCityByState']);



//Student
Route::get('student/index', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('createStudent', [StudentController::class, 'create'])->name('createStudent');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store')->middleware('isDemo');
Route::get('student/show/{uuid}', [StudentController::class, 'show'])->name('student.show');
Route::get('student/edit/{uuid}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('student/update/{uuid}', [StudentController::class, 'update'])->name('student.update')->middleware('isDemo');
Route::post('student/delete/{uuid}', [StudentController::class, 'delete'])->name('student.delete')->middleware('isDemo');
Route::post('student/change-student-status', [StudentController::class, 'changeStudentStatus'])->name('admin.student.changeStudentStatus')->middleware('isDemo');
Route::get('blockedStudent', [StudentController::class, 'blockedStudent'])->name('student.blocked');
Route::get('approvedStudent', [StudentController::class, 'approvedStudent'])->name('student.approved');




//Coupon
Route::get('coupon/index', [CouponController::class, 'index'])->name('coupon.index');
Route::get('coupon/create', [CouponController::class, 'create'])->name('coupon.create');
Route::get('createCoupon', [CouponController::class, 'create'])->name('createCoupon');
Route::post('coupon/store', [CouponController::class, 'store'])->name('coupon.store');
Route::get('coupon/edit/{uuid}', [CouponController::class, 'edit'])->name('coupon.edit');
Route::post('coupon/update/{uuid}', [CouponController::class, 'update'])->name('coupon.update');
Route::post('coupon/delete/{uuid}', [CouponController::class, 'delete'])->name('coupon.delete');


//Promotion
Route::get('promotion/index', [PromotionController::class, 'index'])->name('promotion.index');
Route::get('promotion/create', [PromotionController::class, 'create'])->name('promotion.create');
Route::get('createPromotion', [PromotionController::class, 'create'])->name('createPromotion');
Route::post('promotion/store', [PromotionController::class, 'store'])->name('promotion.store')->middleware('isDemo');
Route::get('promotion/edit/{uuid}', [PromotionController::class, 'edit'])->name('promotion.edit');
Route::get('promotion/show/{uuid}', [PromotionController::class, 'show'])->name('promotion.show');
Route::post('promotion/update/{uuid}', [PromotionController::class, 'update'])->name('promotion.update')->middleware('isDemo');
Route::post('promotion/delete/{uuid}', [PromotionController::class, 'delete'])->name('promotion.delete')->middleware('isDemo');
Route::get('promotion/editCourse/{uuid}', [PromotionController::class, 'editPromotionCourse'])->name('promotion.editCourse');
Route::post('promotion/changeStatus', [PromotionController::class, 'changePromotionStatus'])->name('promotion.changeStatus')->middleware('isDemo');
Route::get('promotion/addPromotionalCourse', [PromotionController::class, 'addPromotionCourseList'])->name('promotion.addPromotionalCourse')->middleware('isDemo');
Route::get('promotion/removePromotionalCourse', [PromotionController::class, 'removePromotionCourseList'])->name('promotion.removePromotionalCourse')->middleware('isDemo');


//Bank
//Category
Route::get('bank/index', [BankController::class, 'index'])->name('bank.index');
Route::get('bank/create', [BankController::class, 'create'])->name('bank.create');
Route::post('bank/changeStatus', [BankController::class, 'changeStatus'])->name('bank.changeStatus')->middleware('isDemo');
Route::post('bank/store', [BankController::class, 'store'])->name('bank.store')->middleware('isDemo');
Route::get('bank/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
Route::post('bank/update/{id}', [BankController::class, 'update'])->name('bank.update');
Route::post('bank/delete/{id}', [BankController::class, 'delete'])->name('bank.delete')->middleware('isDemo');



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
Route::post('blogCategory/store', [BlogCategoryController::class, 'store'])->name('blogCategory.store')->middleware('isDemo');
Route::get('blogCategory/edit/{uuid}', [BlogCategoryController::class, 'edit'])->name('blogCategory.edit');
Route::post('blogCategory/update/{uuid}', [BlogCategoryController::class, 'update'])->name('blogCategory.update')->middleware('isDemo');
Route::post('blogCategory/delete/{uuid}', [BlogCategoryController::class, 'delete'])->name('blogCategory.delete')->middleware('isDemo');



//Blog
Route::get('blogPost/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('blogPost/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('createBlogPost', [BlogController::class, 'create'])->name('createBlogPost');
Route::post('blogPost/store', [BlogController::class, 'store'])->name('blog.store')->middleware('isDemo');
Route::get('blogPost/edit/{uuid}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('blogPost/update/{uuid}', [BlogController::class, 'update'])->name('blog.update')->middleware('isDemo');
Route::get('blogPost/show/{uuid}', [BlogController::class, 'show'])->name('blog.show');
Route::post('blogPost/delete/{uuid}', [BlogController::class, 'delete'])->name('blog.delete')->middleware('isDemo');


//Blog Comment
Route::get('blogComment/index', [BlogCommentController::class, 'index'])->name('blogComment.index');




//Role
Route::get('role/index', [RoleController::class, 'index'])->name('role.index');
Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('role/store', [RoleController::class, 'store'])->name('role.store')->middleware('isDemo');
Route::get('role/edit/{uuid}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('role/update/{uuid}', [RoleController::class, 'update'])->name('role.update')->middleware('isDemo');
Route::post('role/delete/{uuid}', [RoleController::class, 'delete'])->name('role.delete')->middleware('isDemo');


//User
Route::get('user/index', [UserController::class, 'index'])->name('user.index');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::get('createUser', [UserController::class, 'create'])->name('createUser');
Route::post('user/store', [UserController::class, 'store'])->name('user.store')->middleware('isDemo');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('isDemo');
Route::post('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware('isDemo');


//Location - Country
Route::get('location/index', [CountryController::class, 'index'])->name('location.index');
Route::get('location/create', [CountryController::class, 'create'])->name('location.create');
Route::post('location/store', [CountryController::class, 'store'])->name('location.store')->middleware('isDemo');
Route::get('location/edit/{uuid}', [CountryController::class, 'edit'])->name('location.edit');
Route::post('location/update/{uuid}', [CountryController::class, 'update'])->name('location.update')->middleware('isDemo');
Route::post('location/delete/{uuid}', [CountryController::class, 'delete'])->name('location.delete')->middleware('isDemo');




//Location - State
Route::get('location/state-index/{country_uuid}', [StateController::class, 'index'])->name('state.index');
Route::get('location/state-create{country_uuid}', [StateController::class, 'create'])->name('state.create');
Route::post('location/state-store{country_uuid}', [StateController::class, 'store'])->name('state.store')->middleware('isDemo');
Route::get('location/state-edit/{country_uuid}/{uuid}', [StateController::class, 'edit'])->name('state.edit');
Route::post('location/state-update/{country_uuid}/{uuid}', [StateController::class, 'update'])->name('state.update')->middleware('isDemo');
Route::post('location/state-delete/{country_uuid}/{uuid}', [StateController::class, 'delete'])->name('state.delete')->middleware('isDemo');



//Location - Country
Route::get('location/city-index/{country_uuid}/{state_uuid}', [CityController::class, 'index'])->name('city.index');
Route::get('location/city-create/{country_uuid}/{state_uuid}', [CityController::class, 'create'])->name('city.create');
Route::post('location/city-store/{country_uuid}/{state_uuid}', [CityController::class, 'store'])->name('city.store')->middleware('isDemo');
Route::get('location/city-edit/{country_uuid}/{state_uuid}/{uuid}', [CityController::class, 'edit'])->name('city.edit');
Route::post('location/city-update/{country_uuid}/{state_uuid}/{uuid}', [CityController::class, 'update'])->name('city.update')->middleware('isDemo');
Route::post('location/city-delete/{country_uuid}/{state_uuid}/{uuid}', [CityController::class, 'delete'])->name('city.delete')->middleware('isDemo');


//Manage Order
Route::get('all-order', [ReportController::class, 'allOrder'])->name('report.allOrder');
Route::get('all-order/show/{uuid}', [ReportController::class, 'singleOrder'])->name('report.singleOrder.show');

Route::get('order-pending', [ReportController::class, 'orderReportPending'])->name('report.order-pending');
Route::get('order-pending/show/{uuid}', [ReportController::class, 'orderReportPendingShow'])->name('report.order-pending.show');


Route::get('order-cancelled', [ReportController::class, 'orderReportCancelled'])->name('report.orderCancelled');
Route::get('order-cancelled/show/{uuid}', [ReportController::class, 'orderReportCancelledShow'])->name('report.orderCancelled.show');

Route::get('order-paid/{uuid}/{status}', [ReportController::class, 'orderReportPaidStatus'])->name('report.order-paid')->middleware('isDemo');


//Currency
Route::get('currency/index', [CurrencyController::class, 'index'])->name('currency.index');
Route::get('currency/create', [CurrencyController::class, 'create'])->name('currency.create');
Route::post('currency/store', [CurrencyController::class, 'store'])->name('currency.store')->middleware('isDemo');
Route::get('currency/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
Route::post('currency/update/{id}', [CurrencyController::class, 'update'])->name('currency.update')->middleware('isDemo');
Route::post('currency/delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete')->middleware('isDemo');

//Settings

Route::post('save-setting', [SettingController::class, 'saveSetting'])->name('setting.save')->middleware('isDemo');
Route::get('payment-method/paypal', [SettingController::class, 'paypal'])->name('payment-method.paypal');
Route::get('payment-method/stripe', [SettingController::class, 'stripe'])->name('payment-method.stripe');
Route::get('payment-method/sslcommerz', [SettingController::class, 'sslcommerz'])->name('payment-method.sslcommerz');

Route::get('upload-method/vimeo', [SettingController::class, 'vimeo'])->name('upload-method.vimeo');
Route::post('upload-method/vimeo-store', [SettingController::class, 'vimeoSettingsStore'])->name('vimeo-settings.store')->middleware('isDemo');

Route::get('upload-method/aws', [SettingController::class, 'aws'])->name('upload-method.aws');
Route::post('upload-method/aws-store', [SettingController::class, 'awsSettingsStore'])->name('aws-settings.store')->middleware('isDemo');
