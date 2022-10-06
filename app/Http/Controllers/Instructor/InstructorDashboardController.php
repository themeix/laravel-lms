<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InstructorDashboardController extends Controller
{
    public function index(){

        Alert::toast('Welcome to your Dashboard.', 'success');

        return view('instructor.instructorDashboard');
    }
}
