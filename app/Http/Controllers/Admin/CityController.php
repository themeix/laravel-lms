<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    private $model;
    protected $stateModel;
    protected $countryModel;
    public function __construct(State $state, City $city, Country $country)
    {
        $this->model = new Crud($city);
        $this->stateModel = new Crud($state);
        $this->countryModel = new Crud($country);
    }

    public function index($country_uuid, $state_uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking

        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $data['state'] = $this->stateModel->getRecordByUuid($state_uuid);

        $data['cities'] = City::where('state_id', $data['state']->id)->get();

        return view('admin.location.cities.index', $data);
    }


    public function create($country_uuid, $state_uuid)
    {
        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $data['state'] = $this->stateModel->getRecordByUuid($state_uuid);

        return view('admin.location.cities.create', $data);
    }


    public function store(Request $request, $country_uuid, $state_uuid)
    {

        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $data['state'] = $this->stateModel->getRecordByUuid($state_uuid);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = [

            'state_id' => $data['state']->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $this->model->create($data); // create new city

        Alert::toast('City Created Successfully.', 'success');

        return redirect()->route('city.index', [$country_uuid, $state_uuid])->with('create-message', 'City created successfully.');
    }


    public function edit($country_uuid, $state_uuid, $uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }
        // end permission checking

        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $data['state'] = $this->stateModel->getRecordByUuid($state_uuid);

        $data['city'] = $this->model->getRecordByUuid($uuid);

        return view('admin.location.cities.edit', $data);
    }


    public function update(Request $request, $country_uuid, $state_uuid,  $uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }
        // end permission checking

        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $state = $this->stateModel->getRecordByUuid($state_uuid);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = [
            'state_id' => $state->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ];

        $this->model->updateByUuid($data, $uuid); // update City

        Alert::toast('City Updated Successfully.', 'success');

        return redirect()->route('city.index',[$country_uuid, $state_uuid])->with('update-message', 'City Updated successfully.');
    }


    public function delete($country_uuid, $state_uuid, $uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }
        // end permission checking

        $country = $this->countryModel->getRecordByUuid($country_uuid);

        $state = $this->stateModel->getRecordByUuid($state_uuid);

        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('City Deleted Successfully.', 'warning');

        return redirect()->route('city.index', [$country_uuid, $state_uuid])->with('delete-message', 'City Deleted successfully.');
    }
}
