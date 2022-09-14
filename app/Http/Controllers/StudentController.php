<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        return view('admin.student.index');
    }

    public function create(){

        return view('admin.student.create');
    }

    public function edit(){

        return view('admin.student.edit');
    }


    public function show(){

        return view('admin.student.show');
    }
}
