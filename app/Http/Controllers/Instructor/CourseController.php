<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lesson;
use App\Models\CourseLecture;
use App\Models\CourseLesson;
use App\Models\SubCategory;
use App\Tools\Repositories\Crud;
use Carbon\Exceptions\BadComparisonUnitException;
use Illuminate\Http\Request;

class CourseController extends Controller
{


    protected $model, $lectureModel, $lessonModel, $categoryModel, $subCategoryModel;

    public function __construct(Course $course, CourseLesson $course_lesson,  CourseLecture $course_lecture, Category $category, SubCategory $subCategory)
    {
        $this->model = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
        $this->lessonModel = new Crud($course_lesson);

        $this->categoryModel = new Crud($category);
        $this->subCategoryModel = new Crud($subCategory);
    }

    public function index()
    {
        return view('instructor.course.index');
    }


    public function create()
    {
        $data['categories'] = Category::orderBy('name','asc')->get();


            $data['subCategories'] = SubCategory::where('category_id', old('category_id'))->orderBy('name', 'asc')->get();


        return view('instructor.course.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
