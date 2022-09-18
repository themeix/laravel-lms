<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageSaveTrait;



class CategoryController extends Controller
{
    private $model;
    use   ImageSaveTrait;
    public function __construct(Category $category)
    {
        $this->model = new Crud($category);
    }


    public function index()
    {

        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $data['categories'] = $this->model->getOrderById('DESC', 25);

        return view('admin.category.index', $data);
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'mimes:png|file|dimensions:min_width=60,min_height=60,max_width=60,max_height=60'
        ]);

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $request->image ? $this->saveImage('category', $request->image, null, null) :   null
        ];

        $this->model->create($data); // create new category

        return redirect()->route('category.index')->with('create-message', 'Category created successfully.');

    }


    public function show($id)
    {
        //
    }


    public function edit($uuid)
    {

        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */


        // end permission checking

        $data['category'] = $this->model->getRecordByUuid($uuid);


        return view('admin.category.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $category = $this->model->getRecordByUuid($uuid);

        if ($request->image)
        {
            $this->deleteFile($category->image); // delete file from server

            $image = $this->saveImage('category', $request->image, null, null); // new file upload into server

        } else {
            $image = $category->image;
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'mimes:png|file|dimensions:min_width=60,min_height=60,max_width=60,max_height=60'
        ]);

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $image
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        return redirect()->route('category.index')->with('update-message', 'Category Updated successfully.');
    }


    public function destroy($uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $category = $this->model->getRecordByUuid($uuid);
        $this->deleteFile($category->image); // delete file from server
        $this->model->deleteByUuid($uuid); // delete record

        return redirect()->route('category.index')->with('delete-message', 'Category Deleted successfully.');
    }

}
