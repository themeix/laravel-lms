<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmit;
use App\Models\Course;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssignmentController extends Controller
{
    use ImageSaveTrait;
    protected $assignmentModel, $courseModel, $assignmentSubmitModel;

    public function __construct(Assignment $assignment, Course $course, AssignmentSubmit $assignmentSubmit)
    {
        $this->assignmentModel = new CRUD($assignment);
        $this->courseModel = new CRUD($course);
        $this->assignmentSubmitModel = new CRUD($assignmentSubmit);
    }
    public function index($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['assignments'] = Assignment::where('course_id', $data['course']->id)->paginate();
        return view('instructor.course.assignment.index', $data);
    }


    public function create($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        return view('instructor.course.assignment.create', $data);
    }

    public function store(Request $request, $course_uuid)
    {
        $request->validate([
            'name' => 'required|max:255',
            'marks' => 'required|integer',
            "file" => "mimes:pdf,zip|max:10000"
        ]);

        $course = $this->courseModel->getRecordByUuid($course_uuid);

        $assignment = new Assignment();
        $assignment->course_id = $course->id;
        $assignment->name = $request->name;
        $assignment->marks = $request->marks;
        $assignment->description = $request->description;
        $assignment->status = 1;

        if ($request->hasFile('file')){
            $file_details = $this->uploadFileWithDetails('assignment', $request->file);
            $assignment->file = $file_details['path'];
            $assignment->original_filename = $file_details['original_filename'];
            $assignment->size = $file_details['size'] . 'MB';
        }

        $assignment->save();

        Alert::toast('Assignment Created Successfully.', 'success');
        return redirect()->route('instructor.course.assignment.index', $course_uuid)->with('create-message', 'Assignment created successfully.');
    }



    public function edit($course_uuid, $uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['assignment'] = $this->assignmentModel->getRecordByUuid($uuid);

        return view('instructor.course.assignment.edit', $data);
    }

    public function update(Request $request, $course_uuid, $uuid)
    {
        $request->validate([
            'name' => 'required|max:255',
            'marks' => 'required|integer',
            "file" => "mimes:pdf,zip|max:10000"
        ]);

        $course = $this->courseModel->getRecordByUuid($course_uuid);

        $assignment = $this->assignmentModel->getRecordByUuid($uuid);
        $assignment->course_id = $course->id;
        $assignment->name = $request->name;
        $assignment->marks = $request->marks;
        $assignment->description = $request->description;
        $assignment->status = 1;

        if ($request->hasFile('file')){
            $this->deleteVideoFile($assignment->file);
            $file_details = $this->uploadFileWithDetails('assignment', $request->file);
            $assignment->file = $file_details['path'];
            $assignment->original_filename = $file_details['original_filename'];
            $assignment->size = $file_details['size'] . 'MB';
        }

        $assignment->save();

        Alert::toast('Assignment Updated Successfully.', 'success');
        return redirect()->route('instructor.course.assignment.index', $course_uuid)->with('update-message', 'Assignment Updated successfully.');
    }


    public function delete($uuid)
    {
        /*
         * Need to check any student this assignment attended or not.
         * if attended this assignment, need to discuss this assignment will be deleted or not.
         */

        $assignment = $this->assignmentModel->getRecordByUuid($uuid);
        $this->deleteVideoFile($assignment->file);
        $this->assignmentModel->deleteByUuid($uuid);
        Alert::toast('Assignment Deleted Successfully.', 'success');
        return redirect()->back()->with('delete-message', 'Assignment Deleted successfully.');
    }

    public function assessmentIndex(Request $request, $course_uuid, $assignment_uuid)
    {
        $data['navCourseActiveClass'] = 'active';
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['assignment'] = $this->assignmentModel->getRecordByUuid($assignment_uuid);
        if ($request->done)
        {
            $data['navDoneActive'] = 'active';
            $data['tabDoneActive'] = 'show active';
        } else {
            $data['navPendingActive'] = 'active';
            $data['tabPendingActive'] = 'show active';
        }

        $data['assignmentSubmitsPending'] = AssignmentSubmit::where('assignment_id', $data['assignment']->id)->whereNull('marks')->paginate(15, ['*'], 'pending');
        $data['assignmentSubmitsDone'] = AssignmentSubmit::where('assignment_id', $data['assignment']->id)->whereNotNull('marks')->paginate(15, ['*'], 'done');

        return view('instructor.course.assignment.assessment.index', $data);
    }

    public function assessmentSubmitMarkUpdate(Request $request, $assignment_submit_uuid)
    {
        $assignmentSubmit = $this->assignmentSubmitModel->getRecordByUuid($assignment_submit_uuid);
        $assignmentSubmit->marks = $request->marks;
        $assignmentSubmit->notes = $request->notes;
        $assignmentSubmit->save();

        Alert::toast('Marks Updated Successfully.', 'success');
        return redirect()->back()->with('update-message', 'Marks Updated successfully.');
    }


    public function studentAssignmentDownload(Request $request)
    {

        $assignmentSubmit = $this->assignmentSubmitModel->getRecordById($request->id);
        if ($assignmentSubmit->file){

            $filepath = public_path($assignmentSubmit->file);
            dd($filepath);
            return response()->download($filepath);
        } else {
            $data['msg'] = 'No File Found!';
            $data['status'] = 404;
            return response()->json([
                'data' => $data
            ]);
        }

    }
}
