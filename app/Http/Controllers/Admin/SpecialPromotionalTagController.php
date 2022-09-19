<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecialPromotionTag;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialPromotionalTagController extends Controller
{

    protected $model;
    public function __construct(SpecialPromotionTag $model)
    {
        $this->model = new Crud($model);
    }

    public function index()
    {
        /*$data['navCourseActiveClass'] = "mm-active";
        $data['subNavSpecialPromotionIndexActiveClass'] = "mm-active";*/
        $data['specials'] = $this->model->all();

        return view('admin.promotionalTag.index', $data);
    }


    public function create()
    {
        return view('admin.promotionalTag.create');
    }


    public function store(Request $request)
    {
        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */

        // end permission checking

        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
        ];

        $this->model->create($data); // create new Language

        Alert::toast('Promotional Tag Created Successfully.', 'success');

        return redirect()->route('promotionalTag.index')->with('create-message', 'Promotional Tag created successfully.');
    }



    public function edit($uuid)
    {
        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */

        // end permission checking

        $data['specials'] = $this->model->getRecordByUuid($uuid);


        return view('admin.promotionalTag.edit', $data);
    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */
        // end permission checking

        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
        ];

        $this->model->updateByUuid($data, $uuid); // update Promotion Tag

        Alert::toast('Promotional Tag Updated Successfully.', 'success');


        return redirect()->route('promotionalTag.index')->with('update-message', 'Promotional Tag updated successfully.');
    }


    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
             abort('403');
         } */

        // end permission checking


        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('Promotional Tag Deleted Successfully.', 'warning');

        return redirect()->route('promotionalTag.index')->with('delete-message', 'Promotional Tag deleted successfully.');
    }
}
