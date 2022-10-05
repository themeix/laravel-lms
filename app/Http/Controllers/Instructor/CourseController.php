<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseLesson;
use App\Models\CourseTag;
use App\Models\CourseUploadRule;
use App\Models\DifficultyLevel;
use App\Models\KeyPoints;
use App\Models\Language;
use App\Models\LearnKeyPoint;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Carbon\Exceptions\BadComparisonUnitException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{

    use ImageSaveTrait, SendNotification;
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
        $data['courses'] = Course::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate();
        $data['number_of_course'] = Course::where('user_id', auth()->id())->count();
        return view('instructor.course.index', $data);
    }


    public function create()
    {

        $data['rules'] = CourseUploadRule::all();
        $data['tags'] = Tag::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['key_points'] = KeyPoints::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['languages'] = Language::orderBy('name', 'asc')->select('id', 'name')->get();
        $data['difficulty_levels'] = DifficultyLevel::orderBy('name', 'asc')->select('id', 'name')->get();

        /*$selected_tags = [];

        $data['selected_tags'] = $selected_tags;*/


        $data['categories'] = Category::orderBy('name','asc')->get();


        return view('instructor.course.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'language_id'=>'required',
            'difficulty_level_id' => 'required',
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => 'required',
            'learner_accessibility' => 'required',
            'image' => 'nullable',
            'video' => 'nullable',

        ]);


        if (Course::where('slug', Str::slug($request->title))->count() > 0)
        {
            $slug = Str::slug($request->title) . '-'. rand(100000, 999999);
        } else {
            $slug = Str::slug($request->title);
        }


        if ($request->image) {
            $image = $this->saveImage('course', $request->image, null, null); // new file upload into server
        }

        if ($request->video) {
            $video = $this->uploadFile('course', $request->video); // new file upload into server
        }


        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => $slug,
            'status' => 2,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'language_id' => $request->language_id,
            'price' => $request->price,
            'difficulty_level_id' => $request->difficulty_level_id,
            'learner_accessibility' => $request->learner_accessibility,
            'image' => $image ?? null,
            'video' => $video ?? null,
            'intro_video_check' => $request->intro_video_check,
            'youtube_video_id' => $request->youtube_video_id ?? null,
        ];

        $course = $this->model->create($data);


        if ($request->tag_ids){
            foreach ($request->tag_ids as $tag_id){
                $courseTag= new CourseTag();
                $courseTag->course_id = $course->id;
                $courseTag->tag_id = $tag_id;
                $courseTag->save();
            }
        }


        if ($request->key_points){
            foreach ($request->key_points as $key_point){
                $learn_Key_point = new LearnKeyPoint();
                $learn_Key_point->course_id = $course->id;
                $learn_Key_point->key_points_id = $key_point;
                $learn_Key_point->save();
            }
        }


        /*if ($request['key_points']) {
            if (count(@$request['key_points']) > 0) {
                foreach ($request['key_points'] as $item) {
                    if (@$item['name']){
                        $key_point = new LearnKeyPoint();
                        $key_point->course_id = $course->id;
                        $key_point->name = @$item['name'];
                        $key_point->save();
                    }
                }
            }
        }*/

        Alert::toast('Course Created Successfully.', 'Success');

        return redirect()->route('instructor.course.index')->with('success-message', 'Course Created Successfully.');

    }















    public function edit($uuid)
    {
        $data['navCourseUploadActiveClass'] = 'active';

        $data['rules'] = CourseUploadRule::all();
        $data['course'] = $this->model->getRecordByUuid($uuid);
        $data['keyPoints'] = LearnKeyPoint::whereCourseId($data['course']->id)->get();

        if (\request('step') == 'category')
        {
            $data['categories'] = Category::active()->orderBy('name', 'asc')->select('id', 'name')->get();
            $data['tags'] = Tag::orderBy('name', 'asc')->select('id', 'name')->get();
            $data['languages'] = Language::orderBy('name', 'asc')->select('id', 'name')->get();
            $data['difficulty_levels'] = DifficultyLevel::orderBy('name', 'asc')->select('id', 'name')->get();
            if (old('category_id'))
            {
                $data['subcategories'] = Subcategory::where('category_id', old('category_id'))->select('id', 'name')->orderBy('name', 'asc')->get();
            } elseif ($data['course']->category_id)
            {
                $data['subcategories'] = Subcategory::where('category_id', $data['course']->category_id)->select('id', 'name')->orderBy('name', 'asc')->get();
            } else {
                $data['subcategories'] = [];
            }

            $selected_tags = [];

            if (old('tag'))
            {
                $selected_tags = old('tag');

            } elseif ($data['course']->tags->count() > 0)
            {
                foreach ($data['course']->tags as $tag)
                {
                    $selected_tags[] = $tag->id;
                }
            } else {
                $selected_tags = [];
            }

            $data['selected_tags'] = $selected_tags;

            return view('instructor.course.edit-category', $data);

        } elseif (\request('step') == 'lesson') {

            return view('instructor.course.lesson', $data);

        } elseif (\request('step') == 'submit') {

            return view('instructor.course.submit-lesson', $data);

        } else {
            return view('instructor.course.edit', $data);
        }
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
    public function delete($id)
    {
        //
    }


    public function show($uuid){

    }


    public function getSubcategories(Request $request) {
        $subCategories = SubCategory::where('category_id', $request->category_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($subCategories);
    }
}
