<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){

        return view('admin.coupon.index');
    }

    public function create(){

        return view('admin.coupon.create');
    }

    public function edit(){

        return view('admin.coupon.edit');
    }


    public function show(){

        return view('admin.coupon.show');
    }
}
