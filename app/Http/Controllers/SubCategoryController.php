<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){

        return view('admin.subCategory.index');
    }

    public function create(){

        return view('admin.subCategory.create');
    }

    public function edit(){

        return view('admin.subCategory.edit');
    }
}
