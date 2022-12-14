<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponCourse;
use App\Models\CouponInstructor;
use App\Models\Course;
use App\Models\User;
use App\Tools\Repositories\Crud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class CouponController extends Controller
{
    protected $model;

    public function __construct(Coupon $coupon)
    {
        $this->couponModel = new Crud($coupon);
    }

    public function index()
    {

        if (!Auth::user()->can('manage_coupon')) {
            abort('403');
        }

        // end permission checking

        $data['coupons'] = $this->couponModel->getOrderById('DESC');
        return view('admin.coupon.index', $data);
    }

    public function create()
    {

        if (!Auth::user()->can('manage_coupon')) {
            abort('403');
        }

        // end permission checking


        $data['courses'] = Course::where('learner_accessibility', 1)->where('status', 1)->get();
        $data['instructors'] = User::whereType(2)->get();

        return view('admin.coupon.create', $data);
    }

    public function store(Request $request)
    {

        if (!Auth::user()->can('manage_coupon')) {
            abort('403');
        }

        // end permission checking


        $request->validate([
            'coupon_code_name' => 'required|unique:coupons,coupon_code_name',
            'coupon_type' => ['required'],
            'percentage' => ['required'],
            'minimum_amount' => ['required'],
            'maximum_use_limit' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'status' => ['required']
        ]);


        $coupon = new Coupon();
        $coupon->coupon_code_name = $request->coupon_code_name;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->status = $request->status ?? 1;
        $coupon->percentage = $request->percentage;
        $coupon->minimum_amount = $request->minimum_amount;
        $coupon->maximum_use_limit = $request->maximum_use_limit;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->save();

        if ($request->coupon_type == 2) {
            if (count($request->instructor_ids) > 0) {
                foreach ($request->instructor_ids as $instructor_id) {
                    $coupon_instructor = new CouponInstructor();
                    $coupon_instructor->coupon_id = $coupon->id;
                    $coupon_instructor->user_id = $instructor_id;
                    $coupon_instructor->save();
                }
            }

        }

        if ($request->coupon_type == 3) {
            if (count($request->course_ids) > 0) {
                foreach ($request->course_ids as $course_id) {

                    $coupon_course = new CouponCourse();
                    $coupon_course->coupon_id = $coupon->id;
                    $coupon_course->course_id = $course_id;
                    $coupon_course->save();
                }
            }
        }


        Alert::toast('Coupon Created Successfully.', 'success');

        return redirect()->route('coupon.index')->with('create-message', 'Coupon Created successfully.');

    }

    public function edit($uuid)
    {

        if (!Auth::user()->can('manage_coupon')) {
            abort('403');
        }

        // end permission checking

        $data['courses'] = Course::where('learner_accessibility', 1)->where('status', 1)->get();
        $data['instructors'] = User::whereType(2)->get();
        $data['coupon'] = $this->couponModel->getRecordByUuid($uuid);
        $data['selectedCourseIDs'] = $data['coupon']->couponCourses->pluck('course_id')->toArray();
        $data['selectedInstructorIDs'] = $data['coupon']->couponInstructors->pluck('user_id')->toArray();

        return view('admin.coupon.edit', $data);
    }

    public function update(Request $request, $uuid)
    {

        if (!Auth::user()->can('manage_coupon')) {
            abort('403');
        }

        // end permission checking

        $coupon = $this->couponModel->getRecordByUuid($uuid);

        $request->validate([
            'coupon_code_name' => 'required|min:2|max:255|unique:coupons,coupon_code_name,' . $coupon->id,
            'coupon_type' => ['required'],
            'percentage' => ['required'],
            'minimum_amount' => ['required'],
            'start_date' => ['required'],
            'maximum_use_limit' => ['required'],
            'status' => ['required'],
            'end_date' => ['required'],
        ]);


        $data = [
            'coupon_code_name' => $request->coupon_code_name,
            'coupon_type' => $request->coupon_type,
            'status' => $request->status,
            'percentage' => $request->percentage,
            'minimum_amount' => $request->minimum_amount,
            'maximum_use_limit' => $request->maximum_use_limit,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        $this->couponModel->updateByUuid($data, $uuid); // update Coupon

        /*if ($request->coupon_type == 2) {
            if (count($request->instructor_ids) > 0) {
                CouponInstructor::whereCouponId($coupon->id)->delete();
                foreach ($request->instructor_ids as $instructor_id) {
                    $coupon_instructor = new CouponInstructor();
                    $coupon_instructor->coupon_id = $coupon->id;
                    $coupon_instructor->user_id = $instructor_id;
                    $coupon_instructor->save();
                }
            }

        }*/

        /*if ($request->coupon_type == 3) {
            if (count($request->course_ids) > 0) {
                CouponCourse::whereCouponId($coupon->id)->delete();
                foreach ($request->course_ids as $course_id) {
                    $coupon_course = new CouponCourse();
                    $coupon_course->coupon_id = $coupon->id;
                    $coupon_course->course_id = $course_id;
                    $coupon_course->save();
                }
            }

        }*/

        Alert::toast('Coupon Updated Successfully.', 'success');

        return redirect()->route('coupon.index')->with('update-message', 'Coupon Updated successfully.');
    }

    public function delete($uuid)
    {

        if (!Auth::user()->can('manage_coupon')) {
            abort('403');
        }

        // end permission checking


        $coupon = $this->couponModel->getRecordByUuid($uuid);
        CouponCourse::whereCouponId($coupon->id)->delete();
        CouponInstructor::whereCouponId($coupon->id)->delete();
        $this->couponModel->deleteByUuid($uuid);

        Alert::toast('Coupon Deleted Successfully.', 'warning');

        return redirect()->route('coupon.index')->with('delete-message', 'Coupon Deleted successfully.');
    }
}
