<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\SubCategory;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\ImageSaveTrait;
use RealRashid\SweetAlert\Facades\Alert;


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

        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking

        $data['categories'] = $this->model->getOrderById('DESC');

        return view('admin.category.index', $data);
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'is_showing_course' => $request->is_showing_course ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $request->image ? $this->saveImage('category', $request->image, null, null) :   null
        ];

        $this->model->create($data); // create new category

        Alert::toast('Category Created Successfully.', 'success');

        return redirect()->route('category.index')->with('create-message', 'Category created successfully.');

    }


    public function show($id)
    {
        //
    }


    public function edit($uuid)
    {

        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }


        // end permission checking

        $data['category'] = $this->model->getRecordByUuid($uuid);


        return view('admin.category.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking




        $category = $this->model->getRecordByUuid($uuid);


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg'
        ]);


        if ($request->image)
        {
            $this->deleteFile($category->image); // delete file from server

            $image = $this->saveImage('category', $request->image, null, null); // new file upload into server

        } else {
            $image = $category->image;
        }

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'is_showing_course' => $request->is_showing_course ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $image
        ];


        $this->model->updateByUuid($data, $uuid); // update category

        Alert::toast('Category Updated Successfully.', 'success');

        return redirect()->route('category.index')->with('update-message', 'Category Updated successfully.');
    }


    public function delete($uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking

        $category = $this->model->getRecordByUuid($uuid);

        $data['courses'] = Course::where('category_id', $category->id)->get();
        $data['subCategorires'] = SubCategory::where('category_id', $category->id)->get();

        $courseSize =  sizeof($data['courses']);
        $subCategorySize = sizeof($data['subCategorires']);

        if($courseSize > 0 || $subCategorySize > 0){

            Alert::toast('Sorry ! You can not Delete this category. Because there are dependency.', 'warning');
            return redirect()->route('category.index')->with('delete-message', 'Sorry ! You can not Delete this category. Because there are dependency.');
        }

        else{

            $this->deleteFile($category->image); // delete file from server
            $this->model->deleteByUuid($uuid); // delete record

            Alert::toast('Category Deleted Successfully.', 'warning');
            return redirect()->route('category.index')->with('delete-message', 'Category Deleted successfully.');
        }

    }

}
