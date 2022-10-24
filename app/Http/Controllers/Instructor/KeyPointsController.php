<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LearnKeyPoint;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KeyPointsController extends Controller
{

    protected $model;

    public function __construct(LearnKeyPoint $learn_key_point)
    {
        $this->model = new Crud($learn_key_point);
    }

    public function index($course_uuid)
    {
        $data['course'] = Course::where('uuid', $course_uuid)->first();
        $data['key_points'] = LearnKeyPoint::where('course_id', $data['course']->id)->paginate();
        return view('instructor.course.keyPoints.index', $data);
    }

    public function create($course_uuid)
    {
        $data['course'] = Course::where('uuid', $course_uuid)->first();
        return view('instructor.course.keyPoints.create', $data);
    }

    public function store(Request $request, $course_uuid)
    {
        $request->validate([
            "name" => "required"
        ]);

        $course = Course::where('uuid', $course_uuid)->first();

        $key_point = new LearnKeyPoint();
        $key_point->name = $request->name;
        $key_point->course_id = $course->id;
        $key_point->save();

        Alert::toast('Key Point Created Successfully.', 'success');

        return redirect()->route('instructor.course.key-points.index', $course_uuid)->with('create-message', 'Key Point created successfully.');
    }

    public function edit($course_uuid, $id)
    {
        $data['course'] = Course::where('uuid', $course_uuid)->first();
        $data['key_point'] = LearnKeyPoint::where('id', $id)->first();

        return view('instructor.course.keyPoints.edit', $data);
    }

    public function update($course_uuid, $id, Request $request)
    {
        $course = Course::where('uuid', $course_uuid)->first();
        $key_point = LearnKeyPoint::where('id', $id)->first();

        $request->validate([
            "name" => "required"
        ]);

        $key_point->name = $request->name;
        $key_point->course_id = $course->id;
        $key_point->save();

        Alert::toast('Key Point Updated Successfully.', 'success');

        return redirect()->route('instructor.course.key-points.index', $course_uuid)->with('update-message', 'Key Point Updated successfully.');

    }

    public function delete($id)
    {
        $this->model->delete($id); // delete record

        Alert::toast('Key Point Deleted Successfully.', 'warning');

        return redirect()->back()->with('delete-message', 'Key Point Deleted successfully.');
    }
}
