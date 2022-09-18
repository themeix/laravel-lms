<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $model;
    protected $categoryModel;

    public function __construct(Subcategory $subcategory, Category $category)
    {
        $this->model = new Crud($subcategory);
        $this->categoryModel = new Crud($category);
    }


    public function index(){


        /*if (!Auth::user()->can('manage_course_subcategory')) {
            abort('403');
        } */

        // end permission checking

        $data['subcategories'] = $this->model->getOrderById('DESC', 25);;

        return view('admin.subCategory.index', $data);
    }

    public function create(){


        /*if (!Auth::user()->can('manage_course_subcategory')) {
            abort('403');
        } */

        // end permission checking

        $data['categories'] = $this->categoryModel->all();
        return view('admin.subcategory.create', $data);

    }

    public function store(Request $request)
    {
        /*if (!Auth::user()->can('manage_course_subcategory')) {
            abort('403');
        } */

        // end permission checking

        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'max:120']
        ]);

        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $this->model->create($data); // create new category

        return redirect()->route('subCategory.index')->with('create-message', 'Sub Category created successfully.');

    }



    public function edit($uuid)
    {
        /*if (!Auth::user()->can('manage_course_subcategory')) {
            abort('403');
        }*/

        // end permission checking

        $data['subcategory'] = $this->model->getRecordByUuid($uuid);
        $data['categories'] = $this->categoryModel->all();
        return view('admin.subcategory.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_course_subcategory')) {
            abort('403');
        } */

        // end permission checking

        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'max:120']
        ]);

        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];


        $this->model->updateByUuid($data, $uuid); // update category

        return redirect()->route('subCategory.index')->with('update-message', 'Sub Category updated successfully.');
    }

    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_course_subcategory')) {
            abort('403');
        } */

        // end permission checking

        $this->model->deleteByUuid($uuid); // delete record

        return redirect()->route('subCategory.index')->with('delete-message', 'Sub Category deleted successfully.');
    }
}
