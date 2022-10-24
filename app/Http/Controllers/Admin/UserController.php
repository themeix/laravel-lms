<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        if (!Auth::user()->can('user_management')) {
            abort('403');
        }

        // end permission checking

        $data['users'] = User::whereType(1)->get();
        return view('admin.user.index', $data);
    }


    public function create()
    {
        if (!Auth::user()->can('user_management')) {
            abort('403');
        }

        // end permission checking

        $data['title'] = 'Add User';
        $data['roles'] = Role::all();
        return view('admin.user.create', $data);
    }


    public function store(Request $request)
    {
        if (!Auth::user()->can('user_management')) {
            abort('403');
        }

        // end permission checking

        $request->validate([
            'name' => ['required', 'max:120'],
            'email' => ['required', 'email', 'unique:users'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'role_name' => ['required'],
            'password' => ['required', 'string', 'min:6'],
            'status' => ['required'],
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->type = 1;
        $user->status = $request->status;
        $user->assignRole($request->role_name);
        $user->email_verified_at = Carbon::now()->format("Y-m-d H:i:s");
        $user->save();

        Alert::toast('User Created Successfully.', 'success');

        return redirect()->route('user.index')->with('create-message', 'User Created successfully.');

    }



    public function edit($id)
    {
        if (!Auth::user()->can('user_management')) {
            abort('403');
        }

        // end permission checking

        $data['roles'] = Role::all();
        $data['user'] = User::find($id);
        return view('admin.user.edit', $data);
    }


    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('user_management')) {
            abort('403');
        }

        // end permission checking


        $request->validate([
            'name' => ['required', 'max:120'],
            'email' => ['required', 'email'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'role_name' => ['required'],
            'status' => ['required'],
        ]);


        if (User::whereEmail($request->email)->where('id', '!=', $id)->count() > 0)
        {
            Alert::toast('Email already exist.', 'warning');
            return redirect()->back();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user ->status = $request->status;
        if ($request->role_name)
        {
            DB::table('model_has_roles')->where('role_id', $user->roles->first()->id)->where('model_id', $id)->delete();
        }
        $user->assignRole($request->role_name);
        $user->save();

        Alert::toast('User Updated Successfully.', 'success');

        return redirect()->route('user.index')->with('update-message', 'User Updated successfully.');
    }


    public function delete($id)
    {
        if (!Auth::user()->can('user_management')) {
            abort('403');
        }

        // end permission checking

        User::whereId($id)->delete();

        Alert::toast('User Deleted Successfully.', 'warning');

        return redirect()->route('user.index')->with('delete-message', 'User Deleted successfully.');
    }
}
