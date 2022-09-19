<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    private $model;
    protected $stateModel;
    public function __construct(State $state, City $city)
    {
        $this->model = new Crud($city);
        $this->stateModel = new Crud($state);
    }

    public function index()
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $data['cities'] = $this->model->getOrderById('DESC');

        return view('admin.city.index', $data);
    }


    public function create()
    {
        $data['states'] = $this->stateModel->all();
        return view('admin.city.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required',
            'name' => 'required|string|max:255',


        ]);

        $data = [

            'state_id' => $request->state_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $this->model->create($data); // create new city

        Alert::toast('City Created Successfully.', 'success');

        return redirect()->route('city.index')->with('create-message', 'City created successfully.');
    }


    public function edit($uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */


        // end permission checking

        $data['city'] = $this->model->getRecordByUuid($uuid);
        $data['states'] = $this->stateModel->all();


        return view('admin.city.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking



        $request->validate([
            'state_id' => 'required',
            'name' => 'required|string|max:255',
        ]);

        $data = [
            'state_id' => $request->state_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ];

        $this->model->updateByUuid($data, $uuid); // update City

        Alert::toast('City Updated Successfully.', 'success');

        return redirect()->route('city.index')->with('update-message', 'City Updated successfully.');
    }


    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        } */

        // end permission checking

        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('City Deleted Successfully.', 'warning');

        return redirect()->route('city.index')->with('delete-message', 'City Deleted successfully.');
    }
}
