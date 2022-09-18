<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecialPromotionTag;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;

class SpecialPromotionalTagController extends Controller
{

    protected $model;
    public function __construct(SpecialPromotionTag $model)
    {
        $this->model = new Crud($model);
    }

    public function index()
    {
        $data['navCourseActiveClass'] = "mm-active";
        $data['subNavSpecialPromotionIndexActiveClass'] = "mm-active";
        $data['specials'] = $this->model->all();

        return view('admin.promotionalTag.index', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
