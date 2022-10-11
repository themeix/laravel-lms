<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Tools\Repositories\Crud;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LanguageController extends Controller
{

    use ImageSaveTrait;
    protected $model;

    public function __construct(Language $language)
    {
        $this->model = new Crud($language);
    }


    public function index(){


        /*if (!Auth::user()->can('manage_language')) {
            abort('403');
        }*/

        // end permission checking

        $data['languages'] = $this->model->getOrderById('DESC', 25);
        return view('admin.language.index', $data);

    }

    public function create(){

        /*if (!Auth::user()->can('manage_language')) {
            abort('403');
        } */

        // end permission checking

        return view('admin.language.create');
    }


    public function store(Request $request)
    {
       /* if (!Auth::user()->can('manage_language')) {
            abort('403');
        } */

        // end permission checking

        $request->validate([
            'name' => ['required', 'unique:languages', 'string', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
        ];

        $this->model->create($data); // create new Language

        Alert::toast('Language created Successfully.', 'success');

        return redirect()->route('language.index')->with('create-message', 'Language created successfully.');

    }


    public function edit($uuid){


        /*if (!Auth::user()->can('manage_language')) {
            abort('403');
        }*/

        // end permission checking

        $data['language'] = $this->model->getRecordByUuid($uuid);

        return view('admin.language.edit', $data);

    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_language')) {
            abort('403');
        }*/

        // end permission checking

        $language = $this->model->getRecordByUuid($uuid);
        $request->validate([
            'name' => 'required|string|max:255|unique:languages,name,'.$language->id,
        ]);

        $data = [
            'name' => $request->name,
        ];

        $this->model->updateByUuid($data, $uuid); // update language

        Alert::toast('Language Updated Successfully.', 'success');

        return redirect()->route('language.index')->with('update-message', 'Language updated successfully.');
    }



    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_language')) {
            abort('403');
        } */

        // end permission checking


        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('Language Deleted Successfully.', 'warning');

        return redirect()->route('language.index')->with('delete-message', 'Language deleted successfully.');
    }
}
