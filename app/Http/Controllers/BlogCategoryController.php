<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
