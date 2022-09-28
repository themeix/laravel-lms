<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Promotion;
use App\Models\PromotionCourse;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PromotionController extends Controller
{
    protected $promotionModel, $promotionCourseModel;
    public function __construct(Promotion $promotion, PromotionCourse $promotionCourseModel)
    {
        $this->promotionModel = new Crud($promotion);
        $this->promotionCourseModel = new Crud($promotionCourseModel);
    }

    public function index(){

        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $data['promotions'] =  $this->promotionModel->getOrderById('DESC');

        return view('admin.promotion.index', $data);
    }

    public function create(){

        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        return view('admin.promotion.create');
    }

    public function store(Request $request){
        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $request->validate([
            'name' => 'required|max:255',
            'percentage' => 'required|numeric|min:1',
            'end_date' => 'date|after_or_equal:start_date',
        ]);



        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->percentage = $request->percentage;
        $promotion->status = $request->status ?? 0;
        $promotion->save();

        Alert::toast('Promotion Created Successfully.', 'success');

        return redirect()->route('promotion.index')->with('create-message', 'Promotion created successfully.');
    }

    public function edit($uuid){

        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $data['promotion'] =  $this->promotionModel->getRecordByUuid($uuid);

        return view('admin.promotion.edit', $data);

    }

    public function update(Request $request, $uuid){
        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $promotion = $this->promotionModel->getRecordByUuid($uuid);
        $promotion->name = $request->name;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->percentage = $request->percentage;
        $promotion->status = $request->status;
        $promotion->save();

        Alert::toast('Promotion Updated Successfully.', 'success');

        return redirect()->route('promotion.index')->with('update-message', 'Promotion Updated successfully.');

    }


    public function show($uuid){

        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $data['promotion'] =  $this->promotionModel->getRecordByUuid($uuid);

        return view('admin.promotion.show', $data);
    }



    public function delete($uuid)
    {
        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $promotion = $this->promotionModel->getRecordByUuid($uuid);
        if($promotion)
        {
            PromotionCourse::where('promotion_id', $promotion->id)->get()->map(function ($q) {
                $q->delete();
            });
        }

        $this->promotionModel->deleteByUuid($uuid);

        Alert::toast('Promotion Deleted Successfully.', 'warning');

        return redirect()->route('promotion.index')->with('delete-message', 'Promotion Deleted successfully.');


    }


    public function editPromotionCourse($uuid)
    {
        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $data['promotion'] =  $this->promotionModel->getRecordByUuid($uuid);
        $data['promotionCourseIds'] =  PromotionCourse::where('promotion_id', $data['promotion']->id)->pluck('course_id')->toArray();
        $data['alreadyAddedPromotionCourseIds'] =  PromotionCourse::where('promotion_id', '!=', $data['promotion']->id)->pluck('course_id')->toArray();
        $data['courses'] =  Course::all();

        return view('admin.promotion.editPromotionCourse', $data);
    }

    public function changePromotionStatus(Request $request)
    {
        if (!Auth::user()->can('manage_promotion')) {
            abort('403');
        } // end permission checking

        $promotion = $this->promotionModel->getRecordById($request->id);
        $promotion->status = $request->status;
        $promotion->save();

        return response()->json([
            'data' => 'success',
        ]);
    }


    public function addPromotionCourseList(Request $request)
    {
        $currentPromotionCourseList = PromotionCourse::where('promotion_id', $request->promotion_id)->where('course_id', $request->course_id)->first();
        if($currentPromotionCourseList) {
            return response()->json([
                'status' => '409',
                'msg' => 'Already added in promotion list!',
            ]);
        }

        $anotherPromotionCourseList = PromotionCourse::where('course_id', $request->course_id)->first();

        if ($anotherPromotionCourseList){
            return response()->json([
                'status' => '409',
                'msg' => 'Already added in another promotion list!'
            ]);
        } else {
            $promotionCourse = new PromotionCourse();
            $promotionCourse->course_id = $request->course_id;
            $promotionCourse->promotion_id = $request->promotion_id;
            $promotionCourse->save();

            return response()->json([
                'status' => '200',
                'msg' => 'Course Added in promotion list.',
                'course_id' => $request->course_id
            ]);
        }
    }


    public function removePromotionCourseList(Request $request)
    {
        $promotionCourse = PromotionCourse::where('course_id', $request->course_id)->first();
        if ($promotionCourse){
            PromotionCourse::where('course_id', $request->course_id)->delete();

            return response()->json([
                'status' => '200',
                'msg' => 'Course remove from promotion list.',
                'course_id' => $request->course_id
            ]);
        }

        return response()->json([
            'status' => '404',
            'msg' => 'Course not found!'
        ]);
    }

}
