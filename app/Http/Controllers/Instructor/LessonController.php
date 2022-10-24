<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseLesson;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    use ImageSaveTrait, SendNotification;

    protected $model;
    protected $courseModel;
    protected $lectureModel;

    public function __construct(CourseLesson $course_lesson, Course $course, CourseLecture $course_lecture)
    {
        $this->model = new Crud($course_lesson);
        $this->courseModel = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        //
    }
}
