<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function allEnrollStudentIndex(){
        return view('instructor.allEnrollStudent');
    }
}
