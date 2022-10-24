<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartManagement;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class FrontendIndexController extends Controller
{

    public function index()
    {
        $data['categories'] = Category::where('is_feature', 'yes')->take(8)->get();
        $data['showingCategories'] = Category::where('is_showing_course', 'yes')->take(2)->get();
        $data['courses'] = Course::where('status', 1)->take(6)->orderBy('id', 'desc')->get();
        $data['instructors'] = Instructor::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.index', $data);
    }

    public function index2()
    {
        $data['categories'] = Category::where('is_feature', 'yes')->take(8)->get();
        $data['showingCategories'] = Category::where('is_showing_course', 'yes')->take(2)->get();
        $data['courses'] = Course::where('status', 1)->take(6)->orderBy('id', 'desc')->get();
        $data['instructors'] = Instructor::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.index2', $data);
    }

    public function allCourses1()
    {
        $data['courses'] = Course::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.course.allCourses1', $data);
    }

    public function allCourses2()
    {
        $data['courses'] = Course::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.course.allCourses2', $data);
    }


    public function categoryWiseCourses1($slug)
    {
        $data['category'] = Category::where('slug', $slug)->first();
        $data['courses'] = Course::where('category_id', $data['category']->id)->where('status', 1)->get();
        $data['categories'] = Category::take(5)->get();
        return view('frontend.course.category.categoryWiseCourse1', $data);
    }

    public function categoryWiseCourses2($slug)
    {
        $data['category'] = Category::where('slug', $slug)->first();
        $data['courses'] = Course::where('category_id', $data['category']->id)->where('status', 1)->get();
        $data['categories'] = Category::take(5)->get();
        return view('frontend.course.category.categoryWiseCourse2', $data);
    }

    public function allCategories1()
    {
        $data['categories'] = Category::all();
        return view('frontend.course.category.allCategories1', $data);
    }

    public function allCategories2()
    {
        $data['categories'] = Category::all();
        return view('frontend.course.category.allCategories2', $data);
    }

    public function courseDetails($uuid)
    {
        $data['course'] = Course::where('uuid', $uuid)->first();
        $data['instructor'] = Instructor::where('id', $data['course']->instructor_id)->first();
        $data['instructorCourses'] = Course::where('instructor_id', $data['instructor']->id)->where('status', 1)->get();
        return view('frontend.course.courseDetails', $data);
    }

    public function about1()
    {
        return view('frontend.about.about1');
    }

    public function about2()
    {

        $data['instructors'] = Instructor::take(8)->where('status', 1)->get();
        return view('frontend.about.about2', $data);
    }


    public function instructorWiseCourses($uuid)
    {
        $data['instructor'] = Instructor::where('uuid', $uuid)->first();
        $data['courses'] = Course::where('instructor_id', $data['instructor']->id)->where('status', 1)->get();
        return view('frontend.author.authorWiseCourse', $data);
    }


    public function contact()
    {
        return view('frontend.contact.index');
    }





    public function search(Request $request)
    {
        $courses = Course::where('status', 1)->get();
        $categories = Category::all();
        $ins = Instructor::where('status', 1)->get();
        $search = $request->search;

        if ($request->keyword != '') {
            $data['courses'] = Course::where('title', 'like', '%' . $search . '%')->where('status', 1)->get();
            $data['categories'] = Category::where('name', 'like', '%' . $search . '%')->where('status', 1)->get();
            $data['instructors'] = Instructor::where('first_name', 'like', '%' . $search . '%')->where('status', 1)->get();
            $data['instructorsL'] = Instructor::where('last_name', 'like', '%' . $search . '%')->where('status', 1)->get();
        }


        return response()->json($data);
    }


    public function contactMessageStore(Request $request){


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string',
        ]);


        $contact_us = new ContactUs();

        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->phone = $request->phone;
        $contact_us->message = $request->message;
        $contact_us->save();

        Alert::success('Success', 'Message Send Successfully');
        return redirect()->back();
    }

}
