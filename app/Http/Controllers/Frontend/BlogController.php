<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $data['blogs'] = Blog::where('status' , 1)->orderBy('created_at', 'desc')->get();

        return view('frontend.blog.index', $data);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('frontend.blog.details', $blog);
    }
}
