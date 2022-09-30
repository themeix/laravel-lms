<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\NoticeBoard;
use App\Models\OrderItem;
use App\Tools\Repositories\Crud;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class NoticeBoardController extends Controller
{
    use SendNotification;
    protected $model, $courseModel;

    public function __construct(NoticeBoard $noticeBoard, Course $course)
    {
        $this->model = new CRUD($noticeBoard);
        $this->courseModel = new CRUD($course);
    }
    public function courseWiseNoticeIndex()
    {
        $data['navNoticeBoardActiveClass'] = 'active';
        $data['courses'] = Course::whereUserId(Auth::user()->id)->paginate();
        return view('instructor.notice.courseWiseNotice', $data);

    }

    public function index($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['notices'] = NoticeBoard::whereCourseId($data['course']->id)->whereUserId(Auth::user()->id)->paginate();
        return view('instructor.notice.index', $data);
    }


    public function create($course_uuid)
    {
        $data['pageTitle'] = 'Add Notice';
        $data['navNoticeBoardActiveClass'] = 'active';
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);

        return view('instructor.notice.create', $data);
    }

    public function store(Request $request, $course_uuid)
    {
        $request->validate([
            'topic' => 'required',
            'details' => 'required'
        ]);

        $course = $this->courseModel->getRecordByUuid($course_uuid);
        $notice = new NoticeBoard();
        $notice->course_id = $course->id;
        $notice->topic = $request->topic;
        $notice->details = $request->details;
        $notice->save();

        /** ====== send notification to student ===== */
        $students = OrderItem::where('course_id', $course->id)->select('user_id')->get();
        foreach ($students as $student)
        {
            $text = "New notice has been added";
            $taget_url = route('student.my-course.show', $course->slug);
            $this->send($text, 3, $taget_url, $student->user_id);
        }
        /** ====== send notification to student ===== */

        Alert::toast('Notice Created Successfully.', 'success');
        return redirect()->route('instructor.notice.index', $course_uuid)->with('create-message', 'Notice created successfully.');
    }

    public function view($course_uuid, $uuid)
    {
        $data['pageTitle'] = 'Notice View';
        $data['navNoticeBoardActiveClass'] = 'active';
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['notice'] = $this->model->getRecordByUuid($uuid);
        return view('instructor.notice.view', $data);
    }

    public function edit($course_uuid, $uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['notice'] = $this->model->getRecordByUuid($uuid);
        return view('instructor.notice.edit', $data);

    }

    public function update(Request $request, $course_uuid, $uuid)
    {
        $request->validate([
            'topic' => 'required',
            'details' => 'required'
        ]);

        $notice = $this->model->getRecordByUuid($uuid);
        $notice->topic = $request->topic;
        $notice->details = $request->details;
        $notice->save();

        Alert::toast('Notice Updated Successfully.', 'success');
        return redirect()->route('instructor.notice.index', $course_uuid)->with('update-message', 'Notice Updated successfully.');
    }


    public function show($course_uuid, $uuid){
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['notice'] = $this->model->getRecordByUuid($uuid);
        return view ('instructor.notice.show' , $data);
    }

    public function delete($uuid)
    {
        $this->model->deleteByUuid($uuid);
        Alert::toast('Notice Deleted Successfully.', 'success');
        return redirect()->back()->with('update-message', 'Notice Deleted successfully.');
    }

}
