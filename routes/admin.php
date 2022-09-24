<?php

use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\RoleController;
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

//Category
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store')/*->middleware('isDemo')*/;

Route::get('category/edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{uuid}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{uuid}', [CategoryController::class, 'delete'])->name('category.delete')/*->middleware('isDemo')*/;





//SubCategory
Route::get('subCategory/index', [SubCategoryController::class, 'index'])->name('subCategory.index');
Route::get('subCategory/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subCategory.store')/*->middleware('isDemo')*/;
Route::get('subCategory/edit/{uuid}', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
Route::post('subCategory/update/{uuid}', [SubcategoryController::class, 'update'])->name('subCategory.update')/*->middleware('isDemo')*/;
Route::get('subCategory/delete/{uuid}', [SubcategoryController::class, 'delete'])->name('subCategory.delete')/*->middleware('isDemo')*/;

//Tag
Route::get('tag/index', [TagController::class, 'index'])->name('tag.index');
Route::get('tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('tag/store', [TagController::class, 'store'])->name('tag.store')/*->middleware('isDemo')*/;
Route::get('tag/edit/{uuid}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('update/{uuid}', [TagController::class, 'update'])->name('tag.update')/*->middleware('isDemo')*/;
Route::get('delete/{uuid}', [TagController::class, 'delete'])->name('tag.delete')/*->middleware('isDemo')*/;



//Language
Route::get('language/index', [LanguageController::class, 'index'])->name('language.index');
Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
Route::post('language/store', [LanguageController::class, 'store'])->name('language.store')/*->middleware('isDemo')*/;
Route::get('language/edit/{uuid}', [LanguageController::class, 'edit'])->name('language.edit');
Route::post('language/update/{uuid}', [LanguageController::class, 'update'])->name('language.update')/*->middleware('isDemo')*/;
Route::get('language/delete/{uuid}', [LanguageController::class, 'delete'])->name('language.delete')/*->middleware('isDemo')*/;



//Difficulty Level
Route::get('difficultyLevel/index', [DifficultyLevelController::class, 'index'])->name('difficultyLevel.index');
Route::get('difficultyLevel/create', [DifficultyLevelController::class, 'create'])->name('difficultyLevel.create');
Route::post('difficultyLevel/store', [difficultyLevelController::class, 'store'])->name('difficultyLevel.store')/*->middleware('isDemo')*/;
Route::get('difficultyLevel/edit/{uuid}', [difficultyLevelController::class, 'edit'])->name('difficultyLevel.edit');
Route::post('difficultyLevel/update/{uuid}', [difficultyLevelController::class, 'update'])->name('difficultyLevel.update')/*->middleware('isDemo')*/;
Route::get('difficultyLevel/delete/{uuid}', [difficultyLevelController::class, 'delete'])->name('difficultyLevel.delete')/*->middleware('isDemo')*/;


//Promotional Tag

Route::get('promotionalTag/index', [SpecialPromotionalTagController::class, 'index'])->name('promotionalTag.index');
Route::get('promotionalTag/create', [SpecialPromotionalTagController::class, 'create'])->name('promotionalTag.create');
Route::get('promotionalTag/edit', [SpecialPromotionalTagController::class, 'edit'])->name('promotionalTag.edit');

Route::post('promotionalTag/store', [SpecialPromotionalTagController::class, 'store'])->name('promotionalTag.store')/*->middleware('isDemo')*/;
Route::get('promotionalTag/edit/{uuid}', [SpecialPromotionalTagController::class, 'edit'])->name('promotionalTag.edit');
Route::post('promotionalTag/update/{uuid}', [SpecialPromotionalTagController::class, 'update'])->name('promotionalTag.update')/*->middleware('isDemo')*/;
Route::get('promotionalTag/delete/{uuid}', [SpecialPromotionalTagController::class, 'delete'])->name('promotionalTag.delete')/*->middleware('isDemo')*/;


//Rules & Benefits
Route::get('rulesBenefits/index', [RulesBenefitsController::class, 'index'])->name('rulesBenefits.index');
Route::get('rulesBenefits/create', [RulesBenefitsController::class, 'create'])->name('rulesBenefits.create');
Route::get('rulesBenefits/edit', [RulesBenefitsController::class, 'edit'])->name('rulesBenefits.edit');


//Course
Route::get('course/index', [CourseController::class, 'index'])->name('course.index');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::get('course/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::get('enrollStudent', [CourseController::class, 'courseEnroll'])->name('course.enroll');
Route::get('approvedCourse', [CourseController::class, 'courseApproved'])->name('course.approved');
Route::get('holdCourse', [CourseController::class, 'courseHold'])->name('course.hold');
Route::get('reviewPendingCourse', [CourseController::class, 'courseReviewPending'])->name('course.reviewPending');



//Instructor
Route::get('instructor/index', [InstructorController::class, 'index'])->name('instructor.index');
Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
Route::post('instructor/store', [InstructorController::class, 'store'])->name('instructor.store')/*->middleware('isDemo')*/;
Route::get('instructor/edit/{uuid}', [InstructorController::class, 'edit'])->name('instructor.edit');
Route::post('instructor/update/{uuid}', [InstructorController::class, 'update'])->name('instructor.update')/*->middleware('isDemo')*/;
Route::get('instructor/show/{uuid}', [InstructorController::class, 'show'])->name('instructor.show');
Route::delete('instructor/delete/{uuid}', [InstructorController::class, 'delete'])->name('instructor.delete')/*->middleware('isDemo')*/;

Route::post('change-instructor-status', [InstructorController::class, 'changeInstructorStatus'])->name('instructor.changeInstructorStatus')/*->middleware('isDemo')*/;

Route::get('blockedInstructor', [InstructorController::class, 'blockedInstructor'])->name('instructor.blocked');
Route::get('approvedInstructor', [InstructorController::class, 'approvedInstructor'])->name('instructor.approved');


Route::get('get-state-by-country/{country_id}', [InstructorController::class, 'getStateByCountry']);
Route::get('get-city-by-state/{state_id}', [InstructorController::class, 'getCityByState']);


//Student
Route::get('student/index', [StudentController::class, 'index'])->name('student.index');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store')/*->middleware('isDemo')*/;
Route::get('student/show/{uuid}', [StudentController::class, 'show'])->name('student.show');
Route::get('student/edit/{uuid}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('student/update/{uuid}', [StudentController::class, 'update'])->name('student.update')/*->middleware('isDemo')*/;
Route::delete('student/delete/{uuid}', [StudentController::class, 'delete'])->name('student.delete')/*->middleware('isDemo')*/;
Route::post('student/change-student-status', [StudentController::class, 'changeStudentStatus'])->name('admin.student.changeStudentStatus')/*->middleware('isDemo')*/;


Route::get('blockedStudent', [StudentController::class, 'blockedInstructor'])->name('student.blocked');
Route::get('approvedStudent', [StudentController::class, 'approvedStudent'])->name('student.approved');

Route::get('student/getStates', [StudentController::class,'getStates'])->name('student.getStates');
Route::get('student/getCities', [StudentController::class,'getCities'])->name('student.getCities');

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
Route::post('blogCategory/store', [BlogCategoryController::class, 'store'])->name('blogCategory.store')/*->middleware('isDemo')*/;
Route::get('blogCategory/edit/{uuid}', [BlogCategoryController::class, 'edit'])->name('blogCategory.edit');
Route::post('blogCategory/update/{uuid}', [BlogCategoryController::class, 'update'])->name('blogCategory.update')/*->middleware('isDemo')*/;
Route::get('blogCategory/delete/{uuid}', [BlogCategoryController::class, 'delete'])->name('blogCategory.delete')/*->middleware('isDemo')*/;


//Blog
Route::get('blogPost/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('blogPost/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('blogPost/store', [BlogController::class, 'store'])->name('blog.store')/*->middleware('isDemo')*/;
Route::get('blogPost/edit/{uuid}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('blogPost/update/{uuid}', [BlogController::class, 'update'])->name('blog.update')/*->middleware('isDemo')*/;
Route::get('blogPost/show', [BlogController::class, 'show'])->name('blog.show');
Route::delete('blogPost/delete/{uuid}', [BlogController::class, 'delete'])->name('blog.delete')/*->middleware('isDemo')*/;


//Blog Comment
Route::get('blogComment/index', [BlogCommentController::class, 'index'])->name('blogComment.index');



//Role
Route::get('role/index', [RoleController::class, 'index'])->name('adminRole.index');
Route::get('role/create', [RoleController::class, 'create'])->name('adminRole.create');
Route::post('role/store', [RoleController::class, 'store'])->name('adminRole.store');
Route::get('role/edit/{uuid}', [RoleController::class, 'edit'])->name('adminRole.edit');
Route::get('role/update/{uuid}', [RoleController::class, 'update'])->name('adminRole.update');
Route::get('role/delete/{uuid}', [RoleController::class, 'delete'])->name('adminRole.delete');


//User
Route::get('user/index', [UserController::class, 'index'])->name('adminUser.index');
Route::get('user/create', [UserController::class, 'create'])->name('adminUser.create');
Route::post('user/store', [UserController::class, 'store'])->name('adminUser.store');
Route::get('user/edit/{uuid}', [UserController::class, 'edit'])->name('adminUser.edit');
Route::get('user/update/{uuid}', [UserController::class, 'update'])->name('adminUser.update');
Route::get('user/delete/{uuid}', [UserController::class, 'delete'])->name('adminUser.delete');



//Location - Country
Route::get('country/index', [CountryController::class, 'index'])->name('country.index');
Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('country/store', [CountryController::class, 'store'])->name('country.store')/*->middleware('isDemo')*/;
Route::get('country/edit/{uuid}', [CountryController::class, 'edit'])->name('country.edit');
Route::post('country/update/{uuid}', [CountryController::class, 'update'])->name('country.update')/*->middleware('isDemo')*/;
Route::get('country/delete/{uuid}', [CountryController::class, 'delete'])->name('country.delete')/*->middleware('isDemo')*/;







//Location - State
Route::get('state/index', [StateController::class, 'index'])->name('state.index');
Route::get('state/create', [StateController::class, 'create'])->name('state.create');
Route::post('state/store', [StateController::class, 'store'])->name('state.store')/*->middleware('isDemo')*/;
Route::get('state/edit/{uuid}', [StateController::class, 'edit'])->name('state.edit');
Route::post('state/update/{uuid}', [StateController::class, 'update'])->name('state.update')/*->middleware('isDemo')*/;
Route::get('state/delete/{uuid}', [StateController::class, 'delete'])->name('state.delete')/*->middleware('isDemo')*/;

//Location - Country
Route::get('city/index', [CityController::class, 'index'])->name('city.index');
Route::get('city/create', [CityController::class, 'create'])->name('city.create');
Route::post('city/store', [CityController::class, 'store'])->name('city.store')/*->middleware('isDemo')*/;
Route::get('city/edit/{uuid}', [CityController::class, 'edit'])->name('city.edit');
Route::post('city/update/{uuid}', [CityController::class, 'update'])->name('city.update')/*->middleware('isDemo')*/;
Route::get('city/delete/{uuid}', [CityController::class, 'delete'])->name('city.delete')/*->middleware('isDemo')*/;
