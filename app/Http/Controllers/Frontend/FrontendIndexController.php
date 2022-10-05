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

    public function index2(){
        return view('frontend.index2');
    }

    public function category1(){
        return view('frontend.course.category.category1');
    }

    public function category2(){
        return view('frontend.course.category.category2');
    }

    public function category3(){
        return view('frontend.course.category.category3');
    }

    public function category4(){
        return view('frontend.course.category.category4');
    }

    public function courseDetails(){
        return view('frontend.course.courseDetails');
    }

    public function about1(){
        return view('frontend.about.about1');
    }
    public function about2(){
        return view('frontend.about.about2');
    }
    public function authorWiseCourse(){
        return view('frontend.author.authorWiseCourse');
    }

    public function contact(){
        return view('frontend.contact.index');
    }

}
