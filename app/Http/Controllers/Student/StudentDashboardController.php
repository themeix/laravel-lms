<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentDashboardController extends Controller
{
    public function index(){

        Alert::toast('Congratulation! Login Successful.', 'success');

        return view('student.studentDashboard');
    }

    public function create(){

    }
}
