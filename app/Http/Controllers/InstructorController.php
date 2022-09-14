<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(){

        return view('admin.instructor.index');
    }

    public function create(){

        return view('admin.instructor.create');
    }

    public function edit(){

        return view('admin.instructor.edit');
    }


    public function show(){

        return view('admin.instructor.show');
    }

    public function pendingInstructor(){

        return view('admin.instructor.pending');
    }

    public function blockedInstructor(){

        return view('admin.instructor.blocked');
    }

    public function approvedInstructor(){

        return view('admin.instructor.approved');
    }
}
