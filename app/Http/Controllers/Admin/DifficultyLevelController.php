<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DifficultyLevelController extends Controller
{
    public function index(){

        return view('admin.difficultyLevel.index');
    }

    public function create(){

        return view('admin.difficultyLevel.create');
    }

    public function edit(){

        return view('admin.difficultyLevel.edit');
    }
}
