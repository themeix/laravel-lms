<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    public function thankYou()
    {
        $data['pageTitle'] = 'New Enroll Course';
        $new_order = Order::whereUserId(auth()->id())->latest()->first();
        $data['new_courses'] = [];
        if ($new_order) {
            $newCourseIds = OrderItem::whereOrderId($new_order->id)->pluck('course_id')->toArray();
            $data['new_courses'] = Course::whereIn('id', $newCourseIds)->get();
        }
        return view('frontend.thankyou', $data);
    }
}
