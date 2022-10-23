<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function allEnrollStudentIndex(){

        $data['orderItems'] = OrderItem::whereIn('course_id', function ($query)
        {
            $query->select('id')->from('courses')->where('user_id', auth()->user()->id);

        })->whereIn('order_id', function ($query)
        {
            $query->select('id')->from('orders')->where('payment_status', 'paid');

        })->get();

        return view('instructor.allEnrollStudent', $data);
    }
}
