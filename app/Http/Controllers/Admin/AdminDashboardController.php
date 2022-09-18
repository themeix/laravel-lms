<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminDashboardController extends Controller
{
    public function index(){

        Alert::toast('Congratulation! Login Successful.', 'success');

        return view('admin.adminDashboard');
    }
}
