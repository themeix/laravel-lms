<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\ImageSaveTrait;

class AdminDashboardController extends Controller
{
    use ImageSaveTrait;

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($cities);
    }



    public function index()
    {

        Alert::toast('Welcome to your Dashboard.', 'success');

        return view('admin.adminDashboard');
    }

    public function profile()
    {
        $data['user'] = Auth::user();
        return view('admin.profile', $data);
    }

    public function profileStore(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => 'required',
            'address' => 'required',
            'image' => 'file|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1024'
        ]);


        $anotherUser = User::where('email', $request->email)->whereNot('id', Auth::user()->id)->get();

        if (sizeof($anotherUser)>0) {

            Alert::toast('Email already exist.', 'warning');
            return redirect()->back();

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->image = $request->image ? $this->saveImage('user', $request->image, null, null) : $user->image;
        $user->save();

        Alert::toast('Your profile updated successfully.', 'success');
        return redirect()->back();
    }

    public function changePassword()
    {
        return view('admin.changePassword');
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
