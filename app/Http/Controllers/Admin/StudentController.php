<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Instructor;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{

    use ImageSaveTrait;

    private $model;
    public function __construct( Student $student)
    {
        $this->studentModel = new Crud($student);
    }

    public function index()
    {
        $data['students'] = $this->studentModel->getOrderById('DESC');
        return view('admin.student.index', $data);
    }


    public function approvedStudent()
    {
        /*if (!Auth::user()->can('approved_instructor')) {
            abort('403');
        } */

        // end permission checking

        $students = Student::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.student.approved', compact('students'));
    }

    public function blockedInstructor()
    {
        /*if (!Auth::user()->can('approved_instructor')) {
            abort('403');
        }*/

        // end permission checking

        $students = Student::where('status', 2)->orderBy('id', 'desc')->get();
        return view('admin.student.blocked', compact('students'));
    }




    public function create()
    {
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        return view('admin.student.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'phone_number' => 'required',
            'address'=>'required',
            'gender' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'postal_code' => 'required',
            'about_me' => 'required',
            'image' => 'mimes:jpeg,png,jpg|file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);


        $user = new User();
        $user->name = $request->first_name . ' '. $request->last_name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->type = 3;
        $user->image =  $request->image ? $this->saveImage('user', $request->image, null, null) :   null;
        $user->save();

        $student_data = [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'gender' => $request->gender,
            'status' =>1,
            'postal_code' => $request->postal_code,
            'about_me' => $request->about_me,
            'address' => $request->address,
        ];


        $this->studentModel->create($student_data);

        Alert::toast('Student Created Successfully.', 'success');

        return redirect()->route('student.index')->with('create-message', 'Student Created Successfully.');
    }




    public function show($uuid)
    {

        $data['student'] = $this->studentModel->getRecordByUuid($uuid);

        /*$allUserOrder = Order::where('user_id', $data['student']->user_id);
        $paidOrderIds = $allUserOrder->where('payment_status', 'paid')->pluck('id')->toArray();*/

        /*$allUserOrder = Order::where('user_id', $data['student']->user_id);
        $freeOrderIds = $allUserOrder->where('payment_status', 'free')->pluck('id')->toArray();*/

        /*$orderIds = array_merge($paidOrderIds, $freeOrderIds);

        $data['orderItems'] = Order_item::whereIn('order_id', $orderIds)->latest()->paginate(15);*/

        return view('admin.student.show', $data);
    }


    public function edit($uuid)
    {
        $data['student'] = $this->studentModel->getRecordByUuid($uuid);
        $data['user'] = User::findOrfail($data['student']->user_id);

        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        if (old('country_id'))
        {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id'))
        {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        return view('admin.student.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'about_me' => 'required',
            'image' => 'mimes:jpeg,png,jpg|file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);

        $student = $this->studentModel->getRecordByUuid($uuid);

        $user = User::findOrfail($student->user_id);

        if (User::where('id', '!=', $student->user_id)->where('email', $request->email)->count() > 0) {
            Alert::toast('Email already exist.', 'warning');
            return redirect()->back()->with('warning-message', 'Email already exist.');;
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

        $student_data = [
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

        $this->studentModel->updateByUuid($student_data, $uuid);

        Alert::toast('Student Updated Successfully.', 'success');
        return redirect()->route('student.index')->with('update-message', 'Student Updated successfully.');
    }


    public function delete($uuid)
    {
        $student = $this->studentModel->getRecordByUuid($uuid);
        /*$instructor = Instructor::whereUserId($student->user_id)->first();
        if ($instructor){
            $this->showToastrMessage('error', 'You can\'t delete it. Because this user already an instructor. If you want to delete, at first you delete from instructor.');
            return redirect()->back();
        }*/
        if ($student){
            $this->deleteFile(@$student->user->image);
        }
        User::find($student->user_id)->delete();
        $this->studentModel->deleteByUuid($uuid);

        Alert::toast('Student Deleted Successfully.', 'warning');
        return redirect()->route('student.index')->with('delete-message', 'Student Deleted successfully.');
    }


    public function getStates(Request $request) {
        $states = State::where('country_id', $request->country_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($states);
    }


    public function getCities(Request $request) {
        $cities = City::where('state_id', $request->state_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($cities);
    }


}
