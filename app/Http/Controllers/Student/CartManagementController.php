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

class CartManagementController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            $response['msg'] = "You need to login first!";
            $response['status'] = 401;
            return response()->json($response);
        }

        if ($request->course_id) {
            $courseOrderExits = OrderItem::whereCourseId($request->course_id)->whereUserId(Auth::user()->id)->first();

            if ($courseOrderExits) {
                $order = Order::find($courseOrderExits->order_id);
                if ($order) {
                    if ($order->payment_status == 'due') {
                        OrderItem::whereOrderId($courseOrderExits->order_id)->get()->map(function ($q) {
                            $q->delete();
                        });
                        $order->delete();
                    } elseif ($order->payment_status == 'pending') {
                        $response['msg'] = "You've already request the course & status is pending!";
                        $response['status'] = 402;
                        return response()->json($response);
                    } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                        $response['msg'] = "You've already purchased the course!";
                        $response['status'] = 402;
                        return response()->json($response);
                    }
                }
            }

            $ownCourseCheck = Course::whereUserId(Auth::user()->id)->where('id', $request->course_id)->first();

            if ($ownCourseCheck) {
                $response['msg'] = "This is your course. No need to add to cart.";
                $response['status'] = 402;
                return response()->json($response);
            }

            $courseExits = Course::find($request->course_id);
            if (!$courseExits) {
                $response['msg'] = "Course not found!";
                $response['status'] = 404;
                return response()->json($response);
            }
        }

        if ($request->product_id) {
            $productExits = Product::find($request->product_id);
            if (!$productExits) {
                $response['msg'] = "Product not found!";
                $response['status'] = 404;
                return response()->json($response);
            }
        }

        $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereCourseId($request->course_id)->orWhere($request->product_id)->first();
        if ($cartExists) {
            $response['msg'] = "Already added to cart!";
            $response['status'] = 409;
            return response()->json($response);
        }

        if ($courseExits->learner_accessibility == 'free') {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->order_number = rand(100000, 999999);
            $order->payment_status = 'free';
            $order->save();

            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->user_id = Auth::user()->id;
            $order_item->course_id = $courseExits->id;
            $order_item->owner_user_id = $courseExits->user_id ?? null;
            $order_item->unit_price = 0;
            $order_item->admin_commission = 0;
            $order_item->owner_balance = 0;
            $order_item->sell_commission = 0;
            $order_item->save();

            $response['msg'] = "Free Course added to your my learning list!";
            $response['status'] = 200;
            return response()->json($response);
        }

        $cart = new CartManagement();
        $cart->user_id = Auth::user()->id;
        $cart->course_id = $request->course_id;
        $cart->product_id = $request->product_id;
        $cart->main_price = $courseExits->price;

        if ($request->course_id) {
            $cart->price = $courseExits->price;
        } elseif ($request->product_id) {
            $cart->price = $productExits->price;
        }

        $cart->save();

        $response['quantity'] = CartManagement::whereUserId(Auth::user()->id)->count();
        $response['msg'] = "Added to cart";
        $response['msgInfoChange'] = "Added to cart";
        $response['status'] = 200;

        return response()->json($response);
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
