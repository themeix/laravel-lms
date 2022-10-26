<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\ImageSaveTrait;

class InstructorDashboardController extends Controller
{
    use ImageSaveTrait;

    public function index()
    {

        Alert::toast('Welcome to your Dashboard.', 'success');

        return view('instructor.instructorDashboard');
    }

    public function profile()
    {
        $data['countries'] = Country::all();

        $data['user'] = Auth::user();

        $data['instructor'] = Auth::user()->instructor;

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        return view('instructor.profile', $data);
    }

    public function profileStore(Request $request)
    {
        $instructor = Auth::user()->instructor;

        $user = Auth::user();

        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'postal_code' => 'required',
            'about_me' => 'required',
            'image' => 'file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);


        if (User::where('id', '!=', $instructor->user_id)->where('email', $request->email)->count() > 0) {
            Alert::toast('Email already exist.', 'warning');
            return redirect()->back();
        }


        if ($request->image) {
            $this->deleteFile($user->image); // delete file from server
            $image = $this->saveImage('user', $request->image, null, null); // new file upload into server
        } else {
            $image = $user->image;
        }


        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->image = $image;
        $user->save();



        $instructor->user_id = $user->id;
        $instructor->first_name = $request->first_name;
        $instructor->last_name = $request->last_name;
        $instructor->phone_number = $request->phone_number;
        $instructor->address = $request->address;
        $instructor->gender = $request->gender;
        $instructor->country_id = $request->country_id;
        $instructor->state_id = $request->state_id;
        $instructor->city_id = $request->city_id;
        $instructor->postal_code = $request->postal_code;
        $instructor->about_me = $request->about_me;
        $instructor->facebook = $request->facebook;
        $instructor->twitter = $request->twitter;
        $instructor->linkedin = $request->linkedin;
        $instructor->pinterest = $request->pinterest;
        $instructor->save();

        Alert::toast('Your profile updated successfully.', 'success');
        return redirect()->back();


    }

    public function changePassword()
    {
        return view('instructor.changePassword');
    }

    public function changePasswordStore(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $request->validate([
            'old_password' => ['required', 'string', 'min:6'],
            'new_password' => ['required', 'string', 'min:6'],
        ]);


        if ($request->old_password != $request->new_password) {

            if (!Hash::check($request->old_password, $user->password)) {
                Alert::toast('Your old password does not matched!', 'error');
            } else {
                $user->password = Hash::make($request->new_password);
                $user->save();

                Alert::toast('Your password has been updated.', 'success');
            }
        } else {
            Alert::toast('Your old and new password can not be same!', 'error');
        }

        return redirect()->back();

    }
}
