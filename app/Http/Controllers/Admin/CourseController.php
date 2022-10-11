<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lecture_views;
use App\Models\CourseLecture;
use App\Models\CourseLectureView;
use App\Models\CourseLesson;
use App\Models\Instructor;
use App\Models\Order_item;
use App\Models\OrderItem;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    use ImageSaveTrait, SendNotification;
    protected $model, $lectureModel, $lessonModel;

    public function __construct(Course $course, CourseLesson $course_lesson,  CourseLecture $course_lecture)
    {
        $this->model = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
        $this->lessonModel = new Crud($course_lesson);
    }

    public function courseReviewPending(){
        if (!Auth::user()->can('all_course')) {
            abort('403');
        } // end permission checking

        $data['courses'] = Course::where('status', 2)->get();
        return view('admin.course.waitingForReview', $data);
    }


    public function index(){

        if (!Auth::user()->can('all_course')) {
            abort('403');
        } // end permission checking

        $data['courses'] = $this->model->getOrderById('DESC');
        return view('admin.course.index', $data);

    }


    public function courseApproved(){

        if (!Auth::user()->can('approved_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Approved Courses';
        $data['courses'] = Course::where('status', 1)->get();
        return view('admin.course.approved', $data);
    }

    public function courseHold(){

        if (!Auth::user()->can('hold_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Hold Courses';
        $data['courses'] = Course::where('status', 3)->get();
        return view('admin.course.hold', $data);
    }


    public function courseStatusChange(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $course->status = $request->status;
        $course->save();

        return response()->json([
            'data' => 'success',
        ]);

    }


    public function show($uuid){

        $data['course'] = $this->model->getRecordByUuid($uuid);

        return view('admin.course.show', $data);
    }



    public function delete($uuid){

        $course = $this->model->getRecordByUuid($uuid);
        $order_item = OrderItem::whereCourseId($course->id)->first();

        if ($order_item)
        {
            Alert::toast('You can not deleted. Because already student purchased this course!', 'warning');
            return redirect()->back()->with('delete-message', 'You can not deleted. Because already student purchased this course!');
        }

        //start:: lesson delete
        $lessons = $this->lessonModel->all();
        if (count($lessons) > 0)
        {
            foreach ($lessons as $lesson)
            {
                //start:: lecture delete
                $lectures = CourseLecture::where('lesson_id', $lesson->id)->get();
                if (count($lectures) > 0)
                {
                    foreach ($lectures as $lecture)
                    {
                        $lecture = CourseLecture::find($lecture->id);
                        if ($lecture)
                        {
                            $this->deleteFile($lecture->file_path); // delete file from server

                            if ($lecture->type == 'vimeo')
                            {
                                if ($lecture->url_path)
                                {
                                    $this->deleteVimeoVideoFile($lecture->url_path);
                                }
                            }

                            CourseLectureView::where('course_lecture_id', $lecture->id)->get()->map(function ($q) {
                                $q->delete();
                            });

                            $this->lectureModel->delete($lecture->id); // delete record
                        }
                    }
                }
                //end:: lecture delete
                $this->lessonModel->delete($lesson->id);
            }
        }
        //end: lesson delete

        $this->deleteFile($course->image);
        $this->deleteVideoFile($course->video);
        $course->delete();

        Alert::toast('Course Deleted Successfully.', 'warning');
        return redirect()->back()->with('delete-message', 'Course Deleted successfully.');

    }

    public function courseEnroll(){

        $data['users'] = User::where('type', 3)->get();
        $data['courses'] = Course::where('status', 1)->get();

        return view('admin.course.enrollCourse', $data);
    }




}
