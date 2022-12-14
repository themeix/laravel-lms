<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResource;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResourceController extends Controller
{

    use ImageSaveTrait;

    protected $resourceModel, $courseModel;

    public function __construct(CourseResource $resources, Course $course)
    {
        $this->resourceModel = new CRUD($resources);
        $this->courseModel = new CRUD($course);
    }
    public function index($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['resources'] = CourseResource::where('course_id', $data['course']->id)->paginate();

        return view('instructor.course.resources.index', $data);
    }


    public function create($course_uuid)
    {
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        return view('instructor.course.resources.create', $data);
    }


    public function store(Request $request, $course_uuid)
    {
        $request->validate([
            "file" => "required|mimes:zip|max:5000"
        ]);

        $course = $this->courseModel->getRecordByUuid($course_uuid);

        $resource = new CourseResource();
        $resource->course_id = $course->id;

        if ($request->hasFile('file')) {
            $image_details = $this->uploadFileWithDetails('course_resource', $request->file);
            $resource->file = $image_details['path'];
            $resource->original_filename = $image_details['original_filename'];
            $resource->size = $image_details['size'] . 'MB';
        }

        $resource->save();


        Alert::toast('Resource Created Successfully.', 'success');

        return redirect()->route('instructor.course.resource.index',  $course_uuid)->with('create-message', 'Resource created successfully.');
    }


    public function delete($uuid)
    {
        $resource = $this->resourceModel->getRecordByUuid($uuid);
        $this->deleteVideoFile($resource->file);
        $this->resourceModel->deleteByUuid($uuid);

        Alert::toast('Resource Deleted Successfully.', 'success');

        return redirect()->back()->with('delete-message', 'Resource Deleted successfully.');;
    }
}
