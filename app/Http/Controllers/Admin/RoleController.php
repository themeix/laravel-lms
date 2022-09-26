<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {

        /*if (!Auth::user()->can('user_management')) {
            abort('403');
        }*/

        // end permission checking

        $data['roles'] = Role::all();

        return view('admin.role.index', $data);
    }


    public function create()
    {
        /*if (!Auth::user()->can('user_management')) {
            abort('403');
        }*/

        // end permission checking

        $data['roles'] = Role::all();
        $data['permissions'] = Permission::all();

        return view('admin.role.create', $data);
    }


    public function store(Request $request)
    {
        /*if (!Auth::user()->can('user_management')) {
            abort('403');
        }*/

        // end permission checking

        $request->validate([
            'name' => ['required', 'max:255'],
            'permissions' => ['required', 'array', 'min:1'],
        ]);


        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        $role->givePermissionTo($request->permissions);

        Alert::toast('Role Created Successfully.', 'success');

        return redirect()->route('role.index')->with('create-message', 'Role Created successfully.');

    }



    public function edit($id)
    {
       /* if (!Auth::user()->can('user_management')) {
            abort('403');
        } */

        // end permission checking

        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::all();
        $data['selected_permissions'] = DB::table('role_has_permissions')->where('role_id', $id)->select('permission_id')->pluck('permission_id')->toArray();

        return view('admin.role.edit', $data);
    }


    public function update(Request $request, $id)
    {
        /*if (!Auth::user()->can('user_management')) {
            abort('403');
        }*/

        // end permission checking

        $request->validate([
            'name' => ['required', 'max:255'],
            'permissions' => ['required', 'array', 'min:1'],
        ]);


        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        DB::table('role_has_permissions')->where('role_id', $id)->delete();

        $role->givePermissionTo($request->permissions);

        Artisan::call('cache:clear');

        Alert::toast('Role Updated Successfully.', 'success');


        return redirect()->route('role.index')->with('update-message', 'Role Updated successfully.');
    }


    public function delete($id)
    {
        /*if (!Auth::user()->can('user_management')) {
            abort('403');
        }*/

        // end permission checking

        $role = Role::find($id);
        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        $role->delete();

        Alert::toast('Role Deleted Successfully.', 'warning');

        return redirect()->route('role.index')->with('delete-message', 'Role Deleted successfully.');

    }
}
