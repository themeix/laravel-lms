<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LiveClass;
use App\Tools\Repositories\Crud;
use App\Traits\SendNotification;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LiveClassController extends Controller
{
    use ZoomMeetingTrait, SendNotification;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    protected $model, $courseModel;

    public function __construct(LiveClass $liveClass, Course $course)
    {
        $this->model = new CRUD($liveClass);
        $this->courseModel = new CRUD($course);
    }


    public function index()
    {
        $data['pageTitle'] = 'Live Class';
        $data['navLiveClassActiveClass'] = 'active';

        $now = now();

        $data['courses'] = Course::whereUserId(Auth::user()->id);
        $data['courses'] = $data['courses']->withCount([
            'liveClasses as total_upcoming' => function ($q) use ($now) {
                $q->select(DB::raw("COUNT(id) as total_upcoming"));
                $q->where('date', '>=', $now);

            },
            'liveClasses as total_past' => function ($q) use ($now) {
                $q->select(DB::raw("COUNT(id) as total_past"));
                $q->where('date', '<=', $now);
            },

        ])->paginate();

        return view('instructor.liveclass.index', $data);
    }


    public function courseWiseLiveClassIndex()
    {
        //
    }


    public function courseWiseLiveClassCreate()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
