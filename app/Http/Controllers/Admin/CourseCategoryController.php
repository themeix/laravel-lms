<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CourseCategoryController extends Controller
{
    use  ImageSaveTrait, General;

    /*protected $model;
    public function __construct(CourseCategory $category)
    {
        $this->model = new Crud($category);
    }*/


    public function index(){

        return view('admin.category.index');
    }

    public function create(){

        return view('admin.category.create');
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => Str::slug($request->name),
            'image' => $request->image ? $this->saveImage('category', $request->image, null, null) :   null
        ];

        $this->model->create($data); // create new category

        return $this->controlRedirection($request, 'category', 'Category');


    }

    public function edit(){

        return view('admin.category.edit');
    }

}
