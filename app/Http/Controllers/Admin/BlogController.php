<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Tag;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    use ImageSaveTrait;

    protected $model;
    public function __construct(Blog $blog)
    {
        $this->model = new Crud($blog);
    }

    public function index(){

        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        }*/

        // end permission checking

        $data['blogs'] = $this->model->getOrderById('DESC');

        return view('admin.blog.index',$data);
    }

    public function create(){

        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } */

        // end permission checking

        $data['blogCategories'] = BlogCategory::all();
        $data['tags'] = Tag::all();
        return view('admin.blog.create', $data);

    }

    public function store(Request $request){
        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        }*/

        // end permission checking


        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255'],
            'details' => ['required'],
            'status' => ['required'],
            'blog_category_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg|file|max:1024'
        ]);


        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'details' => $request->details,
            'blog_category_id' => $request->blog_category_id,
            'status' =>$request->status,
            'image' => $request->image ? $this->saveImage('blog', $request->image, null, null) :   null,
        ];

        $blog = $this->model->create($data); // create new blog

        if ($request->tag_ids){
            foreach ($request->tag_ids as $tag_id){
                $blogTag = new BlogTag();
                $blogTag->blog_id = $blog->id;
                $blogTag->tag_id = $tag_id;
                $blogTag->save();
            }
        }

        Alert::toast('Blog Post Created Successfully.', 'success');

        return redirect()->route('blog.index')->with('create-message', 'Blog Post Created successfully.');
    }


    public function show($uuid){
        $data['blog'] = $this->model->getRecordByUuid($uuid);
        return view('admin.blog.show',$data);
    }



    public function edit($uuid){

    }

    public function update(){

    }

    public function delete(){

    }

}
