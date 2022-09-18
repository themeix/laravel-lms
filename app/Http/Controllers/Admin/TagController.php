<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Tools\Repositories\Crud;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{

    protected $model;

    public function __construct(Tag $tag)
    {
        $this->model = new Crud($tag);
    }

    public function index(){


        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        }*/

        // end permission checking

        $data['tags'] = $this->model->getOrderById('DESC', 25);
        return view('admin.tag.index', $data);
    }

    public function create(){


        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        } */
        // end permission checking

        return view('admin.tag.create');
    }


    public function store(Request $request)
    {
        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        }*/

        // end permission checking

        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $this->model->create($data); // create new tag

        return redirect()->route('tag.index')->with('create-message', 'Tag created successfully.');
    }



    public function edit($uuid){


        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        }*/

        // end permission checking

        $data['tag'] = $this->model->getRecordByUuid($uuid);

        return view('admin.tag.edit', $data);

    }


    public function update(Request $request, $uuid)
    {
        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        }*/

        // end permission checking

        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        $this->model->updateByUuid($data, $uuid); // update tag


        return redirect()->route('tag.index')->with('update-message', 'Tag updated successfully.');
    }



    public function delete($uuid)
    {
        /*if (!Auth::user()->can('manage_course_tag')) {
            abort('403');
        } */

        // end permission checking


        $this->model->deleteByUuid($uuid); // delete record

        return redirect()->route('tag.index')->with('delete-message', 'Tag deleted successfully.');
    }




}
