<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(){

        return view('admin.course.index');
    }

    public function create(){

        return view('admin.course.create');
    }

    public function edit(){

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
