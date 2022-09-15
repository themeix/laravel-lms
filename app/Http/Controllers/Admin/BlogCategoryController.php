<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function index(){

        return view('admin.blogCategory.index');
    }

    public function create(){

        return view('admin.blogCategory.create');
    }

    public function edit(){

        return view('admin.blogCategory.edit');
    }

}
