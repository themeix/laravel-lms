<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendIndexController extends Controller
{
    public function index(){



        return view('frontend.index');
    }
}
