<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class FrontendIndexController extends Controller
{

    public function index(){
        $data['categories'] = Category::take(8)->get();
        $data['courses'] = Course::where('status', 1)->take(6)->get();
        $data['instructors'] = Instructor::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.index', $data);
    }

    public function index2(){
        $data['categories'] = Category::take(8)->get();
        $data['courses'] = Course::where('status', 1)->take(6)->get();
        $data['instructors'] = Instructor::where('status', 1)->orderBy('id', 'desc')->get();
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


    public function categoryWiseCourses1($uuid){
        $data['category'] = Category::where('uuid', $uuid)->first();
        $data['courses'] = Course::where('category_id', $data['category']->id)->where('status', 1)->get();
        $data['categories'] = Category::take(5)->get();
        return view('frontend.course.category.categoryWiseCourse1', $data);
    }

    public function categoryWiseCourses2($uuid){
        $data['category'] = Category::where('uuid', $uuid)->first();
        $data['courses'] = Course::where('category_id', $data['category']->id)->where('status', 1)->get();
        $data['categories'] = Category::take(5)->get();
        return view('frontend.course.category.categoryWiseCourse2', $data);
    }

    public function allCategories1(){
        $data['categories'] = Category::all();
        return view('frontend.course.category.courseCategories1', $data);
    }

    public function allCategories2(){
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



    public function instructorWiseCourses($uuid){
        $data['instructor'] = Instructor::where('uuid', $uuid)->first();
        $data['courses'] = Course::where('instructor_id', $data['instructor']->id)->where('status', 1)->get();
        return view('frontend.author.authorWiseCourse',$data);
    }




    public function contact(){
        return view('frontend.contact.index');
    }

}
