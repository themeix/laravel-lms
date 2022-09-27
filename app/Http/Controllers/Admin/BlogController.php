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
use Illuminate\Support\Str;
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
        if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } // end permission checking

        $data['blog'] = $this->model->getRecordByUuid($uuid);
        $data['blogTags'] = $data['blog']->tags->pluck('tag_id')->toArray();
        $data['blogCategories'] = BlogCategory::all();
        $data['tags'] = Tag::all();
        return view('admin.blog.edit', $data);
    }

    public function update(Request $request, $uuid){
        if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } // end permission checking

        $blog = $this->model->getRecordByUuid($uuid);


        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255'],
            'details' => ['required'],
            'status' => ['required'],
            'blog_category_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg|file|max:1024'
        ]);


        if ($request->image)
        {
            $this->deleteFile($blog->image); // delete file from server

            $image = $this->saveImage('blog', $request->image, null, null); // new file upload into server

        } else {
            $image = $blog->image;
        }

        if (Blog::where('slug', $request->slug)->where('uuid', '!=', $uuid)->count() > 0)
        {
            $slug = Str::slug($request->slug) . '-'. rand(100000, 999999);
        } else {
            $slug = Str::slug($request->slug);
        }

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'details' => $request->details,
            'blog_category_id' => $request->blog_category_id,
            'image' => $image,
            'status'=> $request->status
        ];

        $blog = $this->model->updateByUuid($data, $uuid); // update category

        if ($request->tag_ids){
            BlogTag::where('blog_id', $blog->id)->delete();
            foreach ($request->tag_ids as $tag_id){
                $blogTag = new BlogTag();
                $blogTag->blog_id = $blog->id;
                $blogTag->tag_id = $tag_id;
                $blogTag->save();
            }
        }

        Alert::toast('Blog Post Updated Successfully.', 'success');

        return redirect()->route('blog.index')->with('update-message', 'Blog Post Updated successfully.');

    }

    public function delete($uuid){

        if (!Auth::user()->can('manage_blog')) {
            abort('403');
        }

        // end permission checking

        $blog = $this->model->getRecordByUuid($uuid);
        BlogTag::where('blog_id', $blog->id)->delete();
        $this->deleteFile($blog->image); // delete file from server
        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('Blog Post Deleted Successfully.', 'warning');

        return redirect()->route('blog.index')->with('delete-message', 'Blog Post Deleted successfully.');

    }

}
