<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseLesson;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
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

    public function index(){

        if (!Auth::user()->can('all_course')) {
            abort('403');
        } // end permission checking

        $data['courses'] = $this->model->getOrderById('DESC');
        return view('admin.course.index', $data);

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
        return view('admin.course.enrollCourse');
    }

    public function courseApproved(){
        return view('admin.course.approved');
    }

    public function courseHold(){
        return view('admin.course.hold');
    }

    public function courseReviewPending(){
        return view('admin.course.reviewPendig');
    }
}
