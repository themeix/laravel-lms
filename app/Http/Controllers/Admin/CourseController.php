<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseLesson;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use ImageSaveTrait, SendNotification;
    protected $model, $lectureModel, $lessonModel;

    public function __construct(Course $course, CourseLesson $course_lesson,  CourseLecture $course_lecture)
    {
        $this->model = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
        $this->lessonModel = new Crud($course_lesson);
    }

    public function courseReviewPending(){
        if (!Auth::user()->can('all_course')) {
            abort('403');
        } // end permission checking

        $data['courses'] = Course::where('status', 2)->get();
        return view('admin.course.waitingForReview', $data);
    }


    public function index(){

        if (!Auth::user()->can('all_course')) {
            abort('403');
        } // end permission checking

        $data['courses'] = $this->model->getOrderById('DESC');
        return view('admin.course.index', $data);

    }


    public function courseApproved(){

        if (!Auth::user()->can('approved_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Approved Courses';
        $data['courses'] = Course::where('status', 1)->get();
        return view('admin.course.approved', $data);
    }

    public function courseHold(){

        if (!Auth::user()->can('hold_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Hold Courses';
        $data['courses'] = Course::where('status', 3)->get();
        return view('admin.course.hold', $data);
    }


    public function courseStatusChange(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->status = $request->status;
        $course->save();



        return response()->json([
            'data' => 'success',
        ]);

    }


    public function show($uuid){

        return view('admin.course.edit');
    }


    public function edit($uuid){

        return view('admin.course.edit');
    }


    public function update($uuid){



        return view('admin.course.edit');
    }

    public function delete($uuid){

        return view('admin.course.edit');
    }

    public function courseEnroll(){

        $data['users'] = User::where('type', 3)->get();
        $data['courses'] = Course::where('status', 1)->get();

        return view('admin.course.enrollCourse', $data);
    }




}
