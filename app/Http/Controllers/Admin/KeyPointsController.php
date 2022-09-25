<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KeyPoints;
use App\Models\Tag;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KeyPointsController extends Controller
{
    protected $model;

    public function __construct(KeyPoints $keyPoints)
    {
        $this->model = new Crud($keyPoints);
    }
    public function index(){
        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        }*/

        // end permission checking

        $data['keyPoints'] = $this->model->getOrderById('DESC');
        return view('admin.keyPoints.index', $data);
    }

    public function create(){
        /*if (!Auth::user()->can('manage_course_tag')) {
                    abort('403');
                }*/

        // end permission checking

        return view('admin.keyPoints.create');
    }

    public function store(Request $request){
        /*if (!Auth::user()->can('manage_course_tag')) {
                    abort('403');
                }*/

        // end permission checking

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => 'nullable',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ];

        $this->model->create($data); // create new tag

        Alert::toast('Key Point Created Successfully.', 'success');

        return redirect()->route('keyPoints.index')->with('create-message', 'Key Point created successfully.');
    }

    public function edit($uuid){
        /*if (!Auth::user()->can('manage_course_tag')) {
                    abort('403');
                }*/

        // end permission checking

        $data['keyPoint'] = $this->model->getRecordByUuid($uuid);

        return view('admin.keyPoints.edit', $data);
    }

    public function update(Request $request, $uuid){
        /*if (!Auth::user()->can('manage_course_tag')) {
                    abort('403');
                }*/

        // end permission checking

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => 'nullable',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ];
        $this->model->updateByUuid($data, $uuid); // update tag

        Alert::toast('Key Point Updated Successfully.', 'success');

        return redirect()->route('keyPoints.index')->with('update-message', 'Key Point updated successfully.');
    }

    public function delete($uuid){
        /*if (!Auth::user()->can('manage_course_tag')) {
                    abort('403');
                } */

        // end permission checking


        $this->model->deleteByUuid($uuid); // delete record

        Alert::toast('Key Point Deleted Successfully.', 'warning');

        return redirect()->route('keyPoints.index')->with('delete-message', 'Key Point deleted successfully.');
    }


}
