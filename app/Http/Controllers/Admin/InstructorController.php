<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Order_item;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
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

        $data['instructors'] = $this->instructorModel->getOrderById('DESC', 25);;
        return view('admin.instructor.index', $data);
    }


    public function create()
    {
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

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
            'address' => 'required',
            'gender' => 'required',
            'about_me' => 'required',
            'image' => 'mimes:jpeg,png,jpg|file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);

        $user = new User();
        $user->name = $request->first_name . ' '. $request->last_name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->image =  $request->image ? $this->saveImage('user', $request->image, null, null) :   null;
        $user->save();

        /*$student_data = [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'postal_code' => $request->postal_code,
        ];

        $this->studentModel->create($student_data);*/

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
            'slug' => $slug,
            'status' => 1,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'postal_code' => $request->postal_code,
            'social_link' => json_encode($request->social_link),
        ];

        $this->instructorModel->create($instructor_data);

        Alert::toast('Instructor Created Successfully.', 'success');

        return redirect()->route('category.index')->with('success-message', 'Instructor Created successfully.');

    }


    public function show($uuid)
    {
        $data['instructor'] = $this->instructorModel->getRecordByUuid($uuid);
        $userCourseIds = Course::whereUserId($data['instructor']->user->id)->pluck('id')->toArray();
        if (count($userCourseIds) > 0){
            $orderItems = Order_item::whereIn('course_id', $userCourseIds)
                ->whereYear("created_at", now()->year)->whereMonth("created_at", now()->month)
                ->whereHas('order', function ($q) {
                    $q->where('payment_status', 'paid');
                });
            $data['total_earning'] = $orderItems->sum('owner_balance');
        }

        return view('admin.instructor.show', $data);
    }


    public function edit($uuid)
    {
        $data['instructor'] = $this->instructorModel->getRecordByUuid($uuid);
        $data['user'] = User::findOrfail($data['instructor']->user_id);

        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        if (old('country_id'))
        {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id'))
        {
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
            'image' => 'mimes:jpeg,png,jpg|file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);

        $instructor = $this->instructorModel->getRecordByUuid($uuid);

        $user = User::findOrfail($instructor->user_id);
        if (User::where('id', '!=', $instructor->user_id)->where('email', $request->email)->count() > 0) {
            Alert::toast('Email already exist.', 'warning');
            return redirect()->back();
        }

        $user->name = $request->first_name . ' '. $request->last_name;
        $user->email = $request->email;
        if ($request->password){
            $request->validate([
                'password' => 'required|string|min:6'
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->image =  $request->image ? $this->saveImage('user', $request->image, null, null) :   $user->image;
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
            'slug' => $slug,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'postal_code' => $request->postal_code,
            'social_link' => json_encode($request->social_link),
        ];

        $this->instructorModel->updateByUuid($instructor_data, $uuid);

        Alert::toast('Instructor updated Successfully.', 'success');

        return redirect()->route('instructor.index')->with('success-message', 'Instructor updated Successfully.');

    }


    public function destroy($id)
    {
        //
    }

    public function getStateByCountry($country_id)
    {
        return State::where('country_id', $country_id)->orderBy('name', 'asc')->get()->toJson();
    }

    public function getCityByState($state_id)
    {
        return City::where('state_id', $state_id)->orderBy('name', 'asc')->get()->toJson();
    }

    public function changeInstructorStatus(Request $request)
    {
        $instructor = Instructor::findOrFail($request->id);
        $instructor->status = $request->status;
        $instructor->save();

        return response()->json([
            'data' => 'success',
        ]);
    }


    public function changeStatus($uuid, $status)
    {
        $instructor = $this->instructorModel->getRecordByUuid($uuid);
        $instructor->status = $status;
        $instructor->save();

        if ($status == 1)
        {
            $user = User::find($instructor->user_id);
            $user->role = 2;
            $user->save();
        }

        Alert::toast('Status Changed Successfully.', 'success');
        return redirect()->back();
    }


    public function pending()
    {
        /*if (!Auth::user()->can('pending_instructor')) {
            abort('403');
        }*/

        // end permission checking

        $data['instructors'] = Instructor::pending()->orderBy('id', 'desc')->paginate(25);
        return view('admin.instructor.pending', $data);
    }

    public function approved()
    {
        /*if (!Auth::user()->can('approved_instructor')) {
            abort('403');
        } */

        // end permission checking

        $data['instructors'] = Instructor::approved()->orderBy('id', 'desc')->paginate(25);
        return view('admin.instructor.approved', $data);
    }

    public function blocked()
    {
        /*if (!Auth::user()->can('approved_instructor')) {
            abort('403');
        }*/

        // end permission checking

        $data['instructors'] = Instructor::blocked()->orderBy('id', 'desc')->paginate(25);
        return view('admin.instructor.blocked', $data);
    }

}
