<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $data['blogs'] = Blog::where('status' , 1)->orderBy('created_at', 'desc')->get();
        $data['latest_blogs'] = Blog::where('status' , 1)->orderBy('created_at', 'desc')->take(4)->get();
        $data['blog_categories'] = BlogCategory::where('status', 1)->get();
        return view('frontend.blog.index', $data);
    }

    public function blogDetails($slug)
    {
        $data['blog'] = Blog::where('slug', $slug)->first();
        $data['latest_blogs'] = Blog::where('status' , 1)->whereNot('id', $data['blog']->id)->orderBy('created_at', 'desc')->take(4)->get();
        $data['blog_categories'] = BlogCategory::where('status', 1)->get();
        $data['latest_blogs_for_under'] = Blog::where('status', 1)->whereNot('id', $data['blog']->id)->orderBy('created_at', 'desc')->take(2)->get();
        return view('frontend.blog.details', $data);
    }

    public function categoryWiseBlog($slug){
        $data['blog_category'] = BlogCategory::where('slug', $slug)->first();
        $data['blogs'] = Blog::where('blog_category_id', $data['blog_category']->id)->where('status' , 1)->orderBy('created_at', 'desc')->get();
        $data['latest_blogs'] = Blog::where('status' , 1)->orderBy('created_at', 'desc')->take(4)->get();
        $data['blog_categories'] = BlogCategory::where('status', 1)->get();

        return view('frontend.blog.categoryWiseBlog', $data);
    }

    public function archives($slug){

    }

}
