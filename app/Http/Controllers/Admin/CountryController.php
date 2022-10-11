<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    private $model;
    public function __construct(Country $country)
    {
        $this->model = new Crud($country);
    }

    public function index()
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking

        $data['countries'] = $this->model->getOrderById('DESC');

        return view('admin.country.index', $data);
    }


    public function create()
    {
        return view('admin.country.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|unique:countries,country_name',
            'short_name' => 'required|string|max:10',
            'phonecode' => 'required|string|max:20',
            'continent' => 'required|string|max:255',

        ]);

        $data = [

            'country_name' => $request->country_name,
            'short_name' => $request->short_name,
            'phonecode' => $request->phonecode,
            'continent' => $request->continent,
            'slug' => Str::slug($request->name),
        ];

        $this->model->create($data); // create new country

        Alert::toast('Country Created Successfully.', 'success');

        return redirect()->route('country.index')->with('create-message', 'Country created successfully.');
    }


    public function edit($uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }


        // end permission checking

        $data['country'] = $this->model->getRecordByUuid($uuid);


        return view('admin.country.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking

        $country = $this->model->getRecordByUuid($uuid);

        $request->validate([
            'country_name' => 'required|unique:countries,country_name,'.$country->id,
            'short_name' => 'required|string|max:10',
            'phonecode' => 'required|string|max:20',
            'continent' => 'required|string|max:255',
        ]);

        $data = [
            'country_name' => $request->country_name,
            'short_name' => $request->short_name,
            'slug' => Str::slug($request->name),
            'phonecode' => $request->phonecode,
            'continent' => $request->continent,

        ];

        $this->model->updateByUuid($data, $uuid); // update Country

        Alert::toast('Country Updated Successfully.', 'success');

        return redirect()->route('country.index')->with('update-message', 'Country Updated successfully.');
    }


    public function delete($uuid)
    {
        if (!Auth::user()->can('manage_course_category')) {
            abort('403');
        }

        // end permission checking

        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('Country Deleted Successfully.', 'warning');

        return redirect()->route('country.index')->with('delete-message', 'Country Deleted successfully.');
    }
}
