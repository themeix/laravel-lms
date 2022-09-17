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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $data['categories'] = $this->model->getOrderById('DESC', 25);

        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $request->image ? $this->saveImage('category', $request->image, null, null) :   null
        ];

        $this->model->create($data); // create new category

        return redirect()->route('category.index')->with('create-message', 'Category added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {

        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */


        // end permission checking

        $data['category'] = $this->model->getRecordByUuid($uuid);


        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $image
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        return redirect()->route('category.index')->with('update-message', 'Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
