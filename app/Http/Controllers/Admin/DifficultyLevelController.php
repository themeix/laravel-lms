<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseLanguageRequest;
use App\Models\DifficultyLevel;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DifficultyLevelController extends Controller
{

    protected $model;

    public function __construct(DifficultyLevel $difficulty_level)
    {
        $this->model = new Crud($difficulty_level);
    }

    public function index(){

        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */
        // end permission checking

        $data['difficulty_levels'] = $this->model->getOrderById('DESC', 25);

        return view('admin.difficultyLevel.index');
    }

    public function create(){

        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */

        // end permission checking

        return view('admin.difficultyLevel.create');
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

        return redirect()->route('difficultyLevel.index')->with('create-message', 'Difficulty Level created successfully.');
    }

    public function edit($uuid){

        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */

        // end permission checking

        $data['difficulty_level'] = $this->model->getRecordByUuid($uuid);


        return view('admin.difficultyLevel.edit');
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

        $this->model->updateByUuid($data, $uuid); // update difficulty level


        return redirect()->route('difficultyLevel.index')->with('update-message', 'Difficulty Level updated successfully.');
    }

    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_course_difficulty_level')) {
            abort('403');
        } */

        // end permission checking


        $this->model->deleteByUuid($uuid); // delete record

        return redirect()->route('difficultyLevel.index')->with('delete-message', 'Difficulty Level deleted successfully.');
    }
}
