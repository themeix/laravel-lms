<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RulesBenefitsController extends Controller
{
    public function index(){

        return view('admin.rulesBenifits.index');
    }

    public function create(){

        return view('admin.rulesBenifits.create');
    }

    public function edit(){

        return view('admin.rulesBenifits.edit');
    }
}
