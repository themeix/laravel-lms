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
use Illuminate\Support\Facades\Storage;
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
        $data['course_lessons'] = CourseLesson::where('course_id', $data['course']->id)->get();
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
            'short_description' => $request->short_description ?: null,
        ];

        $this->model->create($data);

        Alert::toast('Lesson Created Successfully.', 'success');

        return redirect()->route('instructor.course.lesson.index', $course_uuid)->with('create-message', 'Lesson created successfully.');
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
            'short_description' => $request->short_description ?: null,
        ];

        $this->model->update($data, $lesson->id);

        Alert::toast('Lesson Updated Successfully.', 'success');

        return redirect()->route('instructor.course.lesson.index', $course_uuid)->with('update-message', 'Lesson Updated successfully.');
    }

    public function lectureIndex_Create($course_uuid, $lesson_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['course_lesson'] = $this->model->getRecordByUuid($lesson_uuid);
        $data['course_lectures'] = CourseLecture::where('lesson_id', $data['course_lesson']->id)->get();

        return view('instructor.course.lessons.lectures.index', $data);
    }

    public function lectureStore(Request $request, $course_uuid, $lesson_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['course_lesson'] = $this->model->getRecordByUuid($lesson_uuid);

        $request->validate([
            'title' => ['required'],
            'lecture_type' => ['required'],
            'hour'=> ['required'],
            'minute' => ['required'],
            'second' => ['required'],
        ]);



        if ($request->type == 'video') {
            $request->validate([
                'video_url' => ['required'],
            ]);
        }

        if ($request->type == 'youtube') {
            $request->validate([
                'youtube_url' => ['required'],
            ]);

        }

        if ($request->type == 'vimeo') {
            $request->validate([
                'vimeo_url' => ['required'],
            ]);

        }



        if ($request->type == 'video') {

            if (is_null($request->video_url)) {
                Alert::toast('Please select a video for upload.', 'warning');
                return redirect()->back();
            } else {

                $lecture = new CourseLecture();

                $lecture->course_id = $data['course']->id;
                $lecture->lesson_id = $data['course_lesson']->id;
                $lecture->title = $request->title;
                $file = $this->uploadFileWithDetails('video', $request->video_url);
                $lecture->file_path = $file['path'];        // new file upload into server;
                $lecture->file_size = $file['size'];
                $lecture->file_duration = $request->hour.':'.$request->minute.':'.$request->second;
                $lecture->file_duration_second = $this->timeToSeconds($request->hour, $request->minute, $request->second);
                $lecture->lecture_type = $request->lecture_type;
                $lecture->type = 'video';
                $lecture->url_path = null;
                $lecture->save();


                $course = $data['course'];
                $previous_course_duration = $course->course_duration;
                $present_course_duration = $previous_course_duration + $lecture->file_duration_second;
                $course->course_duration = $present_course_duration;
                $course->save();


                Alert::toast('Lecture uploaded successfully', 'success');
                return redirect()->back();
            }
        }


        if ($request->type == 'youtube') {

            if (empty($request->youtube_url)) {
                Alert::toast('Please give your youtube video url.', 'warning');
                return redirect()->back();
            } else {

                $lecture = new CourseLecture();

                $lecture->course_id = $data['course']->id;
                $lecture->lesson_id = $data['course_lesson']->id;
                $lecture->title = $request->title;
                $lecture->url_path = $request->youtube_url;
                $lecture->file_path = null;
                $lecture->file_duration = $request->hour.':'.$request->minute.':'.$request->second;
                $lecture->file_duration_second = $this->timeToSeconds($request->hour, $request->minute, $request->second);
                $lecture->lecture_type = $request->lecture_type;
                $lecture->type = 'youtube';
                $lecture->save();

                $course = $data['course'];
                $previous_course_duration = $course->course_duration;
                $present_course_duration = $previous_course_duration + $lecture->file_duration_second;
                $course->course_duration = $present_course_duration;
                $course->save();

                Alert::toast('Lecture uploaded successfully', 'success');
                return redirect()->back();
            }
        }


        if ($request->type == 'vimeo') {
            if ($request->file('vimeo_url')) {
                if (env('VIMEO_STATUS') == 'active') {
                    $lecture = new CourseLecture();

                    $lecture->course_id = $data['course']->id;
                    $lecture->lesson_id = $data['course_lesson']->id;
                    $lecture->title = $request->title;
                    $path = $this->uploadVimeoVideoFile($request->title, $request->file('vimeo_url'));
                    $lecture->url_path = $path;
                    $lecture->file_duration = $request->hour.':'.$request->minute.':'.$request->second;
                    $lecture->file_duration_second = $this->timeToSeconds($request->hour, $request->minute, $request->second);
                    $lecture->lecture_type = $request->lecture_type;
                    $lecture->type = 'vimeo';
                    $lecture->file_path = null;
                    $lecture->save();


                    $course = $data['course'];
                    $previous_course_duration = $course->course_duration;
                    $present_course_duration = $previous_course_duration + $lecture->file_duration_second;
                    $course->course_duration = $present_course_duration;
                    $course->save();


                    Alert::toast('Lecture uploaded successfully', 'success');
                    return redirect()->back();
                } else {
                    Alert::toast('At present, upload new video in vimeo service is off. Please try other way.', 'warning');
                }
            } else {
                Alert::toast('Please give your vimeo video url.', 'warning');
                return redirect()->back();
            }
        }

    }

    function timeToSeconds($hour, $minute, $second): int
    {
        $totalSecond = ($hour * 3600) +($minute * 60)  + $second;

        return $totalSecond;
    }




    public function delete($id)
    {
        //
    }
}
