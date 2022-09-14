<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(){

        return view('admin.promotion.index');
    }

    public function create(){

        return view('admin.promotion.create');
    }

    public function edit(){

        return view('admin.promotion.edit');
    }


    public function show(){

        return view('admin.promotion.show');
    }
}
