<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionalTagController extends Controller
{
    public function index(){

        return view('admin.promotionalTag.index');
    }

    public function create(){

        return view('admin.promotionalTag.create');
    }

    public function edit(){

        return view('admin.promotionalTag.edit');
    }
}
