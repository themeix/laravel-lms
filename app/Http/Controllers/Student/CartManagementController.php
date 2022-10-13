<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CartManagement;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Withdraw;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartManagementController extends Controller
{
    public function addToCart(Request $request)
    {


    }












    public function goToCheckout(Request $request)
    {
        if ($request->has('proceed_to_checkout')) {
            return redirect(route('student.checkout'));
        } elseif ($request->has('pay_from_lmszai_wallet')) {
            $carts = CartManagement::whereUserId(@Auth::user()->id)->get();

            if ($carts->sum('price') > instructor_available_balance()) {
                $this->showToastrMessage('warning', 'Insufficient balance');
                return redirect()->back();
            } else {

                $order =  $this->placeOrder('buy');
                $order->payment_status = 'paid';
                $order->save();

                /** ====== Send notification =========*/
                $text = "New student enrolled";
                $target_url = route('instructor.all-student');
                foreach ($order->items as $item) {
                    if ($item->course) {
                        $this->send($text, 2, $target_url, $item->course->user_id);
                    }
                }

                $text = "Course has been sold";
                $this->send($text, 1, null, null);

                /** ====== Send notification =========*/

                $withdrow = new Withdraw();
                $withdrow->transection_id = rand(1000000, 9999999);;
                $withdrow->amount = $carts->sum('price');
                $withdrow->payment_method = 'buy';
                $withdrow->status = 1;
                $withdrow->save();


                $this->showToastrMessage('success', 'Payment has been completed');
                return redirect()->route('student.thank-you');
            }
        } elseif ($request->has('cancel_order')) {
            CartManagement::whereUserId(@Auth::user()->id)->delete();
            $this->showToastrMessage('warming', 'Order has been cancel');
            return redirect(url('/'));
        } else {
            abort(404);
        }
    }

    public function cartDelete($id)
    {
        $cart = CartManagement::findOrFail($id);
        $cart->delete();
        $this->showToastrMessage('success', 'Removed from cart list!');
        return redirect()->back();
    }
}
