<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index(){

        return view('admin.language.index');
    }

    public function create(){

        return view('admin.language.create');
    }

    public function edit(){

        return view('admin.language.edit');
    }
}
