<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lecture_views;
use App\Models\Course_lesson;
use App\Models\CourseLecture;
use App\Models\CourseLectureView;
use App\Models\CourseLesson;
use App\Models\Instructor;
use App\Models\Order_item;
use App\Models\OrderItem;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class InstructorController extends Controller
{
    use ImageSaveTrait;

    protected $instructorModel, $studentModel;

    public function __construct(Instructor $instructor, Student $student)
    {
        $this->instructorModel = new Crud($instructor);
        $this->studentModel = new Crud($student);
    }

    public function index()
    {
        /*if (!Auth::user()->can('all_instructor')) {
            abort('403');
        }*/

        // end permission checking

        $data['instructors'] = $this->instructorModel->getOrderById('DESC');
        return view('admin.instructor.index', $data);
    }


    public function approvedInstructor()
    {
        /*if (!Auth::user()->can('approved_instructor')) {
            abort('403');
        } */

        // end permission checking

        $instructors = Instructor::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.instructor.approved', compact('instructors'));
    }

    public function blockedInstructor()
    {
        /*if (!Auth::user()->can('approved_instructor')) {
            abort('403');
        }*/

        // end permission checking

        $instructors = Instructor::where('status', 2)->orderBy('id', 'desc')->get();
        return view('admin.instructor.blocked', compact('instructors'));
    }


    public function changeInstructorStatus(Request $request)
    {
        $instructor = Instructor::findOrFail($request->id);
        $user = User::findOrFail($instructor->user_id);

        $instructor->status = $request->status;
        $user->status = $request->status;

        $instructor->save();
        $user->save();

        return response()->json([
            'data' => 'success',
        ]);
    }


    public function create()
    {
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();
        return view('admin.instructor.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'professional_title' => 'required',
            'phone_number' => 'required',
            'postal_code' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'about_me' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
            'pinterest' => 'nullable',
            'image' => 'mimes:jpeg,png,jpg|file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);

        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->type = 2;
        $user->image = $request->image ? $this->saveImage('user', $request->image, null, null) : null;
        $user->save();

        if (Instructor::where('slug', Str::slug($user->name))->count() > 0)
        {
            $slug = Str::slug($user->name) . '-'. rand(100000, 999999);
        } else {
            $slug = Str::slug($user->name);
        }


        $instructor_data = [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'professional_title' => $request->professional_title,
            'phone_number' => $request->phone_number,
            'status' => 1,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'postal_code' => $request->postal_code,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'pinterest' => $request->pinterest,
            'slug' => $slug,

        ];

        $this->instructorModel->create($instructor_data);

        Alert::toast('Instructor Created Successfully.', 'success');

        return redirect()->route('instructor.index')->with('success-message', 'Instructor Created successfully.');

    }


    public function show($uuid)
    {
        $data['instructor'] = $this->instructorModel->getRecordByUuid($uuid);
        $date['userCourseIds'] = Course::whereUserId($data['instructor']->user->id)->pluck('id')->toArray();
        /*if (count($userCourseIds) > 0){
            $orderItems = OrderItem::whereIn('course_id', $userCourseIds)
                ->whereYear("created_at", now()->year)->whereMonth("created_at", now()->month)
                ->whereHas('order', function ($q) {
                    $q->where('payment_status', 'paid');
                });
            $data['total_earning'] = $orderItems->sum('owner_balance');
        }*/

        return view('admin.instructor.show', $data);
    }


    public function edit($uuid)
    {
        $data['instructor'] = $this->instructorModel->getRecordByUuid($uuid);
        $data['user'] = User::findOrfail($data['instructor']->user_id);

        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        return view('admin.instructor.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'professional_title' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'about_me' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
            'pinterest' => 'nullable',
            'image' => 'mimes:jpeg,png,jpg|file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);

        $instructor = $this->instructorModel->getRecordByUuid($uuid);

        $user = User::findOrfail($instructor->user_id);
        if (User::where('id', '!=', $instructor->user_id)->where('email', $request->email)->count() > 0) {
            Alert::toast('Email already exist.', 'warning');
            return redirect()->back();
        }

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:6'
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->image = $request->image ? $this->saveImage('user', $request->image, null, null) : $user->image;
        $user->save();

        if (Instructor::where('slug', Str::slug($user->name))->count() > 0) {
            $slug = Str::slug($user->name) . '-' . rand(100000, 999999);
        } else {
            $slug = Str::slug($user->name);
        }

        $instructor_data = [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'professional_title' => $request->professional_title,
            'phone_number' => $request->phone_number,
            'slug' => $slug,
            'country_id' => $request->country_id,
            'status' => 1,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'postal_code' => $request->postal_code,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'pinterest' => $request->pinterest,
        ];

        $this->instructorModel->updateByUuid($instructor_data, $uuid);

        Alert::toast('Instructor updated Successfully.', 'success');

        return redirect()->route('instructor.index')->with('update-message', 'Instructor updated Successfully.');

    }


    public function getStateByCountry($country_id)
    {
        return State::where('country_id', $country_id)->orderBy('name', 'asc')->get()->toJson();
    }

    public function getCityByState($state_id)
    {
        return City::where('state_id', $state_id)->orderBy('name', 'asc')->get()->toJson();
    }


    public function changeStatus($uuid, $status)
    {
        $instructor = $this->instructorModel->getRecordByUuid($uuid);
        $instructor->status = $status;
        $instructor->save();

        if ($status == 1) {
            $user = User::find($instructor->user_id);
            $user->role = 2;
            $user->save();
        }

        Alert::toast('Status Changed Successfully.', 'success');
        return redirect()->back();
    }


    public function delete($uuid)
    {
        if (!Auth::user()->can('manage_instructor')) {
            abort('403');
        } // end permission checking


        $instructor = $this->instructorModel->getRecordByUuid($uuid);
        $user = User::findOrfail($instructor->user_id);

        $data['courses'] = Course::where('instructor_id', $instructor->id)->get();

        if ($data['courses']->count() > 0) {
            Alert::toast('Instructor has courses. Please delete courses first.', 'warning');
            return redirect()->back();
        }


        if ($instructor && $user) {
            //Start:: Course Delete
            $courses = Course::whereUserId($user->id)->get();
            foreach ($courses as $course) {
                //start:: Course lesson delete
                $lessons = CourseLesson::where('course_id', $course->id)->get();
                if (count($lessons) > 0) {
                    foreach ($lessons as $lesson) {
                        //start:: lecture delete
                        $lectures = CourseLecture::where('lesson_id', $lesson->id)->get();
                        if (count($lectures) > 0) {
                            foreach ($lectures as $lecture) {
                                $lecture = CourseLecture::find($lecture->id);
                                if ($lecture) {
                                    $this->deleteFile($lecture->file_path); // delete file from server

                                    if ($lecture->type == 'vimeo') {
                                        if ($lecture->url_path) {
                                            $this->deleteVimeoVideoFile($lecture->url_path);
                                        }
                                    }

                                    CourseLectureView::where('course_lecture_id', $lecture->id)->get()->map(function ($q) {
                                        $q->delete();
                                    });

                                    CourseLecture::find($lecture->id)->delete(); // delete lecture record
                                }
                            }
                        }
                        //end:: delete lesson record
                        CourseLesson::find($lesson->id)->delete();
                    }
                }
                //end

                $this->deleteFile($course->image);
                $this->deleteVideoFile($course->video);
                $course->delete();
            }
            //End:: Course Delete
        }
        $this->instructorModel->deleteByUuid($uuid);

        Alert::toast('Instructor Deleted Successfully.', 'success');

        return redirect()->route('instructor.index')->with('delete-message', 'Instructor Deleted Successfully.');
    }


}
