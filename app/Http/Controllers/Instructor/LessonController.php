<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseLesson;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{
    use ImageSaveTrait, SendNotification;

    protected $model;
    protected $courseModel;
    protected $lectureModel;

    public function __construct(CourseLesson $course_lesson, Course $course, CourseLecture $course_lecture)
    {
        $this->model = new Crud($course_lesson);
        $this->courseModel = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
    }

    public function index($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['course_lessons'] = $this->model->getOrderById('ASC');
        return view('instructor.course.lessons.index', $data);
    }


    public function create($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        return view('instructor.course.lessons.create', $data);
    }


    public function store(Request $request, $course_uuid)
    {
        $course = $this->courseModel->getRecordByUuid($course_uuid);

        $request->validate([
            'name' => ['required'],
        ]);

        $data = [
            'course_id' => $course->id,
            'name' => $request->name,
            'short_description' => $request->short_description ?  : null,
        ];

        $this->model->create($data);

        Alert::toast('Lesson Created Successfully.', 'success');

        return redirect()->route('instructor.course.lesson.index',  $course_uuid)->with('create-message', 'Lesson created successfully.');
    }



    public function edit($course_uuid, $uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['course_lesson'] = $this->model->getRecordByUuid($uuid);

        return view('instructor.course.lessons.edit', $data);
    }


    public function update(Request $request, $course_uuid, $uuid)
    {
        $lesson = $this->model->getRecordByUuid($uuid);
        $course = $this->courseModel->getRecordByUuid($course_uuid);

        $request->validate([
            'name' => ['required'],
        ]);

        $data = [
            'course_id' => $course->id,
            'name' => $request->name,
            'short_description' => $request->short_description ?  : null,
        ];

        $this->model->update($data, $lesson->id);

        Alert::toast('Lesson Updated Successfully.', 'success');

        return redirect()->route('instructor.course.lesson.index',  $course_uuid)->with('update-message', 'Lesson Updated successfully.');
    }

    public function lectureIndex_Create($course_uuid, $lesson_uuid){
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['course_lesson'] = $this->model->getRecordByUuid($lesson_uuid);
        $data['course_lectures'] = CourseLecture::where('lesson_id', $data['course_lesson']->id);

        return view('instructor.course.lessons.lectures.index', $data);
    }

    public function lectureStore(Request $request, $course_uuid, $lesson_uuid){
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['course_lesson'] = $this->model->getRecordByUuid($lesson_uuid);

    }

    public function delete($id)
    {
        //
    }
}
