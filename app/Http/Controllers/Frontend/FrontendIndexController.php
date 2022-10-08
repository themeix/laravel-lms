<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendIndexController extends Controller
{
    public function index(){
        $data['categories'] = Category::take(8)->get();
        $data['courses'] = Course::where('status', 1)->take(6)->get();
        return view('frontend.index', $data);
    }

    public function index2(){
        $data['categories'] = Category::take(8)->get();
        $data['courses'] = Course::where('status', 1)->take(6)->get();
        return view('frontend.index2',$data);
    }

    public function allCourses1(){
        $data['courses'] = Course::all();
        return view('frontend.course.allCourses1',$data);
    }

    public function allCourses2(){
        $data['courses'] = Course::all();
        return view('frontend.course.allCourses2',$data);
    }


    public function categoryWiseCourses1(){

        return view('frontend.course.category.categoryWiseCourse1');
    }

    public function categoryWiseCourses2(){
        return view('frontend.course.category.categoryWiseCourse2');
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
