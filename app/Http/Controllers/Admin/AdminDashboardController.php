<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminDashboardController extends Controller
{
    public function index(){

        Alert::toast('Welcome to your Dashboard.', 'success');

        return view('admin.adminDashboard');
    }
}
