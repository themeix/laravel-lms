<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\SendNotification;

class ReportController extends Controller
{
    use SendNotification;
    public function orderReportPending()
    {
        if (!Auth::user()->can('finance')) {
            abort('403');
        } // end permission checking

        $data['orders'] = Order::where('payment_status', 'pending')->withCount([
            'items as total_admin_commission' => function ($q) {
                $q->select(DB::raw("SUM(admin_commission)"));
            },

            'items as total_owner_balance' => function ($q) {
                $q->select(DB::raw("SUM(owner_balance)"));
            },
        ])->paginate(25);


        $data['grand_total'] = Order::where('payment_status', 'pending')->sum('grand_total');

        $data['total_platform_charge'] = Order::where('payment_status', 'pending')->sum('platform_charge');
        $total_order_admin_commission = Order::where('payment_status', 'pending')->withCount([
            'items as total_sell_commission' => function ($q) {
                $q->select(DB::raw('SUM(admin_commission)'));
            }
        ])->get();
        $data['total_admin_commission'] = $total_order_admin_commission->sum('total_admin_commission');

        $total_admin_sell = Order::where('payment_status', 'pending')->withCount([
            'items as total_admin_commission' => function ($q) {
                $q->select(DB::raw("SUM(admin_commission)"));
            },
        ])->get();

        $data['total_revenue'] = $total_admin_sell->sum(function ($q) {
            return $q->platform_charge + $q->total_admin_commission;
        });

        return view('admin.report.orderReportPending', $data);
    }



    public function orderReportPendingShow($uuid){
        if (!Auth::user()->can('finance')) {
            abort('403');
        } // end permission checking

        $data['order'] = Order::where('uuid', $uuid)->first();

        return view ('admin.report.showSingleReportPending', $data);
    }


    public function orderReportCancelled()
    {
        if (!Auth::user()->can('finance')) {
            abort('403');
        } // end permission checking

        $data['orders'] = Order::where('payment_status', 'cancelled')->withCount([
            'items as total_admin_commission' => function ($q) {
                $q->select(DB::raw("SUM(admin_commission)"));
            },

            'items as total_owner_balance' => function ($q) {
                $q->select(DB::raw("SUM(owner_balance)"));
            },
        ])->paginate(25);


        $data['grand_total'] = Order::where('payment_status', 'cancelled')->sum('grand_total');

        $data['total_platform_charge'] = Order::where('payment_status', 'cancelled')->sum('platform_charge');
        $total_order_admin_commission = Order::where('payment_status', 'cancelled')->withCount([
            'items as total_sell_commission' => function ($q) {
                $q->select(DB::raw('SUM(admin_commission)'));
            }
        ])->get();
        $data['total_admin_commission'] = $total_order_admin_commission->sum('total_admin_commission');

        $total_admin_sell = Order::where('payment_status', 'cancelled')->withCount([
            'items as total_admin_commission' => function ($q) {
                $q->select(DB::raw("SUM(admin_commission)"));
            },
        ])->get();
        $data['total_revenue'] = $total_admin_sell->sum(function ($q) {
            return $q->platform_charge + $q->total_admin_commission;
        });

        return view('admin.report.orderReportCancelled', $data);
    }


    public function orderReportCancelledShow($uuid){
        if (!Auth::user()->can('finance')) {
            abort('403');
        } // end permission checking

        $data['order'] = Order::where('uuid', $uuid)->first();

        return view ('admin.report.showSingleReportCancelled', $data);
    }



    public function orderReportPaidStatus($uuid, $status)
    {
        $order = Order::where('uuid', $uuid)->first();
        $order->payment_status = $status;
        $order->save();


        /** ====== send notification to student ===== */
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        foreach ($orderItems as $orderItem)
        {
            if ($status == 'paid') {
                $text = "Your new course has been approved and added.";
                $target_url = route('student.my-course.show', @$orderItem->course->slug);

                /** ====== Send notification to instructor =========*/
                $text2 = "New student enrolled";
                $target_url2 = route('instructor.allEnrollStudent.index');
                $this->send($text2, 2, $target_url2, @$orderItem->course->user_id);
                /** ====== Send notification to instructor =========*/

                Alert::toast('Order Payment Paid Successfully.', 'success');

                return redirect()->route('report.order-pending')->with('update-message', 'Order Payment Paid Successfully.');

            } else {
                $text = "Your bank payment has been cancelled.";
                $target_url = route('student.learning');

                Alert::toast('Order Cancelled.', 'warning');

                return redirect()->route('report.order-pending')->with('warning-message', 'Order Cancelled.');
            }

            $this->send($text, 3, $target_url, $order->user_id);
        }
        /** ====== send notification to student ===== */
    }
}
