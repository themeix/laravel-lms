<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EmailManagementController extends Controller
{
    public function index(){

        return view('admin.email.index');
    }

    public function create(){

        return view('admin.email.create');
    }

    public function edit(){

        return view('admin.email.edit');
    }


    public function show(){

        return view('admin.email.show');
    }


    public function sendEmail(){

        return view('admin.email.sendEmail');
    }
}
