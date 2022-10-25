<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index($country_uuid)
    {
        if (!Auth::user()->can('application_setting')) {
            abort('403');
        }

        // end permission checking
        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $data['states'] = State::where('country_id', $data['country']->id)->orderBy('name', 'asc')->get();

        return view('admin.location.states.index', $data);
    }


    public function create($country_uuid)
    {

        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);
        return view('admin.location.states.create', $data);
    }


    public function store(Request $request, $country_uuid)
    {
        $country = $this->countryModel->getRecordByUuid($country_uuid);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = [

            'country_id' => $country->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        $this->model->create($data); // create new location

        Alert::toast('State Created Successfully.', 'success');

        return redirect()->route('state.index', $country->uuid)->with('create-message', 'State created successfully.');
    }


    public function edit($country_uuid, $uuid)
    {
        if (!Auth::user()->can('application_setting')) {
            abort('403');
        }
        // end permission checking

        $data['country'] = $this->countryModel->getRecordByUuid($country_uuid);

        $data['state'] = $this->model->getRecordByUuid($uuid);

        return view('admin.location.states.edit', $data);
    }


    public function update(Request $request, $country_uuid, $uuid)
    {
        if (!Auth::user()->can('application_setting')) {
            abort('403');
        }

        // end permission checking

        $country = $this->countryModel->getRecordByUuid($country_uuid);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = [
            'country_id' => $country->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ];

        $this->model->updateByUuid($data, $uuid); // update Country

        Alert::toast('State Updated Successfully.', 'success');

        return redirect()->route('state.index', $country->uuid)->with('update-message', 'State Updated successfully.');
    }


    public function delete($country_uuid, $uuid)
    {
        if (!Auth::user()->can('application_setting')) {
            abort('403');
        }

        // end permission checking

        $country = $this->countryModel->getRecordByUuid($country_uuid);

        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('State Deleted Successfully.', 'warning');

        return redirect()->route('state.index' , $country->uuid)->with('delete-message', 'State Deleted successfully.');
    }
}
