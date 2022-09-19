<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StateController extends Controller
{
    private $model;
    protected $countryModel;
    public function __construct(State $state, Country $country)
    {
        $this->model = new Crud($state);
        $this->countryModel = new Crud($country);
    }

    public function index()
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $data['states'] = $this->model->getOrderById('DESC');

        return view('admin.state.index', $data);
    }


    public function create()
    {
        $data['countries'] = $this->countryModel->all();
        return view('admin.state.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'name' => 'required|string|max:255',


        ]);

        $data = [

            'country_id' => $request->country_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $this->model->create($data); // create new country

        Alert::toast('State Created Successfully.', 'success');

        return redirect()->route('state.index')->with('create-message', 'State created successfully.');
    }


    public function edit($uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */


        // end permission checking

        $data['state'] = $this->model->getRecordByUuid($uuid);
        $data['countries'] = $this->countryModel->all();


        return view('admin.state.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking



        $request->validate([
            'country_id' => 'required',
            'name' => 'required|string|max:255',
        ]);

        $data = [
            'country_id' => $request->country_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ];

        $this->model->updateByUuid($data, $uuid); // update Country

        Alert::toast('State Updated Successfully.', 'success');

        return redirect()->route('state.index')->with('update-message', 'State Updated successfully.');
    }


    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('State Deleted Successfully.', 'warning');

        return redirect()->route('country.index')->with('delete-message', 'State Deleted successfully.');
    }
}
