<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendIndexController extends Controller
{
    public function index(){
        $data['categories'] = Category::take(8)->get();
        return view('frontend.index', $data);
    }

    public function index2(){
        $data['categories'] = Category::take(8)->get();
        return view('frontend.index2',$data);
    }

    public function allCourses1(){
        return view('frontend.course.category.allCourses1');
    }

    public function allCourses2(){
        return view('frontend.course.category.allCourses2');
    }

    public function courseCategory1(){
        $data['categories'] = Category::all();
        return view('frontend.course.category.courseCategories1', $data);
    }

    public function courseCategory2(){
        $data['categories'] = Category::all();
        return view('frontend.course.category.courseCategories2',$data);
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
