<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Tools\Repositories\Crud;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
class BlogCategoryController extends Controller
{

    protected $model;
    public function __construct(BlogCategory $category)
    {
        $this->model = new Crud($category);
    }

    public function index(){

        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        }*/

        $data['blogCategories'] = $this->model->getOrderById('DESC');

        return view('admin.blogCategory.index', $data);
    }

    public function create(){

       /* if (!Auth::user()->can('manage_blog')) {
            abort('403');
        }*/

        return view('admin.blogCategory.create');
    }

    public function store(Request $request){
        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } */

        $request->validate([
            'name' => 'required',
        ]);

        $slug = Str::slug($request->name);

        if (BlogCategory::where('slug', $slug)->count() > 0)
        {
            $slug = Str::slug($request->name) . '-'. rand(100000, 999999);
        }

        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->status,
        ];

        $this->model->create($data); // create new blog

        Alert::toast('Category Created Successfully.', 'success');

        return redirect()->route('blogCategory.index')->with('create-message', 'Category Created successfully.');
    }

    public function edit($uuid){

        $data['blogCategory'] = $this->model->getRecordByUuid($uuid);

        return view('admin.blogCategory.edit', $data);
    }

    public function update(Request $request, $uuid){
        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        }*/

        // end permission checking

        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        Alert::toast('Blog Category Updated Successfully.', 'success');

        return redirect()->route('blogCategory.index')->with('update-message', 'Blog Category Updated successfully.');
    }

    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } */

        // end permission checking

        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('Blog Category Deleted Successfully.', 'warning');

        return redirect()->route('blogCategory.index')->with('delete-message', 'Blog Category Deleted successfully.');
    }

}
