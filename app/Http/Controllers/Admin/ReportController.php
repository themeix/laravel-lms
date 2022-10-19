<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
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
}
