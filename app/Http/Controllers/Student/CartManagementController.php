<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponCourse;
use App\Models\CouponInstructor;
use App\Models\Instructor;
use App\Models\Bank;
use App\Models\CartManagement;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderBillingAddress;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\PromotionCourse;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Models\Withdraw;
use Stripe;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartManagementController extends Controller
{
    use ImageSaveTrait, SendNotification;


    public function addToCart(Request $request)
    {
        if (Auth::user()->type == 1) {
            Alert::toast("You are not allowed to add course to cart!", 'error');
            return redirect()->back();
        } else {

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

                            Alert::toast("You've already request the course & status is pending!", 'info');
                            return redirect()->back();

                        } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            Alert::toast("You've already purchased the course!", 'info');
                            return redirect()->back();

                        }
                    }
                }

                //Check  if course is your own or not

                $ownCourseCheck = Course::whereUserId(Auth::user()->id)->where('id', $request->course_id)->first();

                if ($ownCourseCheck) {
                    Alert::toast("This is your course. No need to purchase.", 'info');
                    return redirect()->back();
                }

                $courseExits = Course::find($request->course_id);
                if (!$courseExits) {

                    Alert::toast("Course not found!", 'error');
                    return redirect()->back();
                }
            }

            $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereCourseId($request->course_id)->first();

            if ($cartExists) {
                Alert::toast("Already added to cart!", 'warning');
                return redirect()->route('student.cart');

            }

            $courseExits = Course::where('id', $request->course_id)->first();

            if ($courseExits) {
                if ($courseExits->learner_accessibility == 2) {
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

                    Alert::toast('Free Course added to your learning list!', 'success');
                    return redirect()->back();

                }
            }

            /*$have_coupon = CouponCourse::where('course_id', $request->course_id)->where('coupon_id', function ($query){
                $query -> from('coupons')->select('id')->where('start_date', '<=', Carbon::now()->format('Y-m-d'))->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();
            })->latest()->first();*/


            $have_coupon = CouponCourse::where('course_id', $request->course_id)->latest()->first();

            if ($have_coupon) {
                $have_coupon_valid = Coupon::where('id', $have_coupon->id)->where('status', 1)->where('start_date', '<=', Carbon::now()->format('Y-m-d'))->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();
            }

            $have_promotion = PromotionCourse::where('course_id', $request->course_id)->latest()->first();

            /*if ($have_promotion) {
                $startDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->start_date));
                $endDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->end_date));

                if (now()->gt($startDate) && now()->lt($endDate)) {
                    $have_promotion_valid = Promotion::where('id', $have_promotion->promotion_id)->where('status',1)->first();
                }
            }*/


            $cart = new CartManagement();
            $cart->user_id = Auth::user()->id;
            $cart->course_id = $request->course_id;
            if ($have_coupon && $have_coupon_valid) {
                $cart->coupon_id = $have_coupon->id;
            }

            if ($have_promotion) {
                $startDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->start_date));
                $endDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->end_date));

                if (now()->gt($startDate) && now()->lt($endDate)) {
                    $have_promotion_valid = Promotion::where('id', $have_promotion->promotion_id)->where('status', 1)->first();

                    if ($have_promotion_valid) {
                        $cart->promotion_id = $have_promotion->id;
                    }
                }
            }

            $cart->product_id = $request->product_id;
            $cart->main_price = $request->price;
            $cart->price = $request->price;

            $cart->save();

            $quantity = CartManagement::whereUserId(Auth::user()->id)->count();

            Alert::toast('Course added to your Cart!', 'success');
            return redirect()->back();

        }


    }

    public function buyNow(Request $request)
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

                        Alert::toast("You've already request the course & status is pending!", 'info');
                        return redirect()->back();

                    } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                        Alert::toast("You've already purchased the course!", 'info');
                        return redirect()->back();

                    }
                }
            }

            //Check  if course is your own or not

            $ownCourseCheck = Course::whereUserId(Auth::user()->id)->where('id', $request->course_id)->first();

            if ($ownCourseCheck) {
                Alert::toast("This is your course. No need to purchase.", 'info');
                return redirect()->back();
            }

            $courseExits = Course::find($request->course_id);
            if (!$courseExits) {

                Alert::toast("Course not found!", 'error');
                return redirect()->back();
            }
        }

        $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereCourseId($request->course_id)->first();

        if ($cartExists) {

            Alert::toast("Already added to cart!", 'warning');
            return redirect()->route('student.cart');

        }

        $courseExits = Course::where('id', $request->course_id)->first();

        if ($courseExits) {
            if ($courseExits->learner_accessibility == 2) {
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

                Alert::toast('Free Course added to your learning list!', 'success');
                return redirect()->back();

            }
        }


        $have_coupon = CouponCourse::where('course_id', $request->course_id)->latest()->first();

        if ($have_coupon) {
            $have_coupon_valid = Coupon::where('id', $have_coupon->id)->where('status', 1)->where('start_date', '<=', Carbon::now()->format('Y-m-d'))->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();
        }


        $have_promotion = PromotionCourse::where('course_id', $request->course_id)->latest()->first();


        $cart = new CartManagement();
        $cart->user_id = Auth::user()->id;
        $cart->course_id = $request->course_id;
        $cart->product_id = $request->product_id;

        if ($have_coupon && $have_coupon_valid) {
            $cart->coupon_id = $have_coupon->id;
        }

        if ($have_promotion) {
            $startDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->start_date));
            $endDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->end_date));

            if (now()->gt($startDate) && now()->lt($endDate)) {
                $have_promotion_valid = Promotion::where('id', $have_promotion->promotion_id)->where('status', 1)->first();

                if ($have_promotion_valid) {
                    $cart->promotion_id = $have_promotion->id;
                }
            }
        }

        $cart->main_price = $request->price;
        $cart->price = $request->price;

        $cart->save();

        $quantity = CartManagement::whereUserId(Auth::user()->id)->count();

        Alert::toast('Course added to your Cart!', 'success');
        return redirect()->route('student.cart');
    }

    public function cartList()
    {
        $data['carts'] = CartManagement::whereUserId(Auth::user()->id)->get();

        foreach ($data['carts'] as $cart) {
            if ($cart->promotion_id != null) {
                $have_promotion = PromotionCourse::where('id', $cart->promotion_id)->first();

                if ($have_promotion && $cart->applied_promotion_id != $cart->promotion_id) {
                    $startDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->start_date));
                    $endDate = date('d-m-Y H:i:s', strtotime(@$have_promotion->promotion->end_date));

                    if (now()->gt($startDate) && now()->lt($endDate)) {
                        $have_promotion_valid = Promotion::where('id', $have_promotion->promotion_id)->where('status', 1)->first();

                        if ($have_promotion_valid) {

                            $previous_discount_percent = $cart->discount_percent;
                            $previous_discount_amount = $cart->discount;

                            $promotion_discount_amount = ($cart->price * $have_promotion_valid->percentage) / 100;
                            $after_discount_price = $cart->price - $promotion_discount_amount;

                            $present_discount_percent = $previous_discount_percent + $have_promotion_valid->percentage;
                            $present_discount_amount = $previous_discount_amount + $promotion_discount_amount;

                            $cart->applied_promotion_id = $have_promotion->id;
                            $cart->price = $after_discount_price;
                            $cart->discount = $present_discount_amount;
                            $cart->discount_percent = $present_discount_percent;
                            $cart->save();
                        }
                    }
                }

            }
        }

        $data['total'] = CartManagement::whereUserId(Auth::user()->id)->sum('main_price');
        $data['total_after_discount'] = CartManagement::whereUserId(Auth::user()->id)->sum('price');
        $data['discount_percent'] = CartManagement::whereUserId(Auth::user()->id)->sum('discount_percent');
        $data['discount_amount'] = CartManagement::whereUserId(Auth::user()->id)->sum('discount');


        $quantity = CartManagement::whereUserId(Auth::user()->id)->count();

        return view('frontend.cart.index', $data)->with('quantity', $quantity);
    }

    public function getQuantity()
    {
        $quantity = CartManagement::whereUserId(Auth::user()->id)->count();

        return response()->json($quantity);
    }


    public function checkout()
    {
        $data['carts'] = CartManagement::whereUserId(Auth::user()->id)->get();
        $data['total'] = CartManagement::whereUserId(Auth::user()->id)->sum('main_price');
        $data['total_after_discount'] = CartManagement::whereUserId(Auth::user()->id)->sum('price');
        $data['discount_percent'] = CartManagement::whereUserId(Auth::user()->id)->sum('discount_percent');
        $data['discount_amount'] = CartManagement::whereUserId(Auth::user()->id)->sum('discount');

        $data['countries'] = Country::orderBy('country_name', 'asc')->get();

        $data['banks'] = Bank::orderBy('name', 'asc')->where('status', 1)->get();

        if (Auth::user()->type == 3) {
            $data['student'] = Student::whereUserId(Auth::user()->id)->first();
        }

        if (Auth::user()->type == 2) {
            $data['instructor'] = Instructor::whereUserId(Auth::user()->id)->first();
        }

        $data['user'] = User::find(Auth::user()->id);

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        $data['quantity'] = CartManagement::whereUserId(Auth::user()->id)->count();

        return view('frontend.checkout.index', $data);
    }

    public function applyCoupon(Request $request)
    {
        if (!Auth::check()) {
            Alert::toast('You need to login first!', 'warning');
            return redirect()->back();
        }

        if (!$request->coupon_code) {
            Alert::toast('Enter coupon code!', 'warning');
            return redirect()->back();
        }


        if ($request->id) {
            $cart = CartManagement::where('id', $request->id)->first();
            $cart_price = $cart->main_price;
            if (!$cart) {
                Alert::toast('Cart item not found!', 'error');
                return redirect()->back();
            }

            $coupon = Coupon::where('coupon_code_name', $request->coupon_code)->where('start_date', '<=', Carbon::now()->format('Y-m-d'))->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();

            if ($coupon) {
                if (floatval($cart_price) < $coupon->minimum_amount) {
                    Alert::toast("Minimum " . get_currency_code() . $coupon->minimum_amount . " need to buy for use this coupon!", 'warning');
                    return redirect()->back();
                }
            }
            if (!$coupon) {
                Alert::toast('Invalid coupon code!', 'warning');
                return redirect()->back();
            }


            if (CartManagement::whereUserId(@Auth::user()->id)->whereAppliedCouponId($coupon->id)->count() > 0) {
                Alert::toast("You've already used this coupon!", 'warning');
                return redirect()->back();

            }

            $discount_price = ($cart->price * $coupon->percentage) / 100;

            $previous_discount_amount = $cart->discount;
            $previous_discount_percent = $cart->discount_percent;

            $present_discount_amount = $previous_discount_amount + $discount_price;
            $previous_discount_percent = $previous_discount_percent + $coupon->percentage;

            if ($coupon->coupon_type == 1) {
                $cart->price = round($cart->price - $discount_price);
                $cart->discount = $present_discount_amount;
                $cart->applied_coupon_id = $coupon->id;
                $cart->discount_percent = $previous_discount_percent;
                $cart->save();

                /*$carts = CartManagement::whereUserId(@Auth::user()->id)->get();*/
                Alert::toast("Coupon Applied", 'success');
                return redirect()->back();
                /*$response['price'] = $cart->price;
                $response['discount'] = $cart->discount;
                $response['total'] = get_number_format($carts->sum('price'));
                $response['platform_charge'] = get_platform_charge($carts->sum('price'));
                $response['grand_total'] = get_number_format($carts->sum('price') + get_platform_charge($carts->sum('price')));
                $response['status'] = 200;
                return response()->json($response);*/
            } elseif ($coupon->coupon_type == 2) {
                if ($cart->course) {
                    $user_id = $cart->course->user_id;
                } else {
                    $user_id = $cart->product->user_id;
                }

                $couponInstructor = CouponInstructor::where('coupon_id', $coupon->id)->where('user_id', $user_id)->orderBy('id', 'desc')->first();
                if ($couponInstructor) {

                    $cart->price = round($cart->price - $discount_price);
                    $cart->discount = $present_discount_amount;
                    $cart->applied_coupon_id = $coupon->id;
                    $cart->discount_percent = $previous_discount_percent;
                    $cart->save();

                    /*$carts = CartManagement::whereUserId(@Auth::user()->id)->get();*/
                    Alert::toast("Coupon Applied", 'success');
                    return redirect()->back();
                    /*$response['price'] = $cart->price;
                    $response['discount'] = $cart->discount;
                    $response['total'] = get_number_format($carts->sum('price'));
                    $response['platform_charge'] = get_platform_charge($carts->sum('price'));
                    $response['grand_total'] = get_number_format($carts->sum('price') + get_platform_charge($carts->sum('price')));
                    $response['status'] = 200;
                    return response()->json($response);*/
                } else {
                    $response['msg'] = "Invalid coupon code!";
                    $response['status'] = 404;
                    return response()->json($response);
                }
            } elseif ($coupon->coupon_type == 3) {
                $couponCourse = CouponCourse::where('coupon_id', $coupon->id)->where('course_id', $cart->course_id)->orderBy('id', 'desc')->first();
                if ($couponCourse) {

                    $cart->price = round($cart->price - $discount_price);
                    $cart->discount = $present_discount_amount;
                    $cart->applied_coupon_id = $coupon->id;
                    $cart->discount_percent = $previous_discount_percent;
                    $cart->save();

                    /*$carts = CartManagement::whereUserId(@Auth::user()->id)->get();*/
                    Alert::toast("Coupon Applied", 'success');
                    return redirect()->back();
                    /*$response['price'] = $cart->price;
                    $response['discount'] = $cart->discount;
                    $response['total'] = get_number_format($carts->sum('price'));
                    $response['platform_charge'] = get_platform_charge($carts->sum('price'));
                    $response['grand_total'] = get_number_format($carts->sum('price') + get_platform_charge($carts->sum('price')));
                    $response['status'] = 200;
                    return response()->json($response);*/
                } else {
                    Alert::toast('Invalid coupon code!', 'warning');
                    return redirect()->back();
                }
            } else {
                Alert::toast('Invalid coupon code!', 'warning');
                return redirect()->back();
            }
        } else {
            Alert::toast('Cart item not found!', 'error');
            return redirect()->back();
        }
    }


    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($cities);
    }


    public function cartDelete($id)
    {
        $cart = CartManagement::findOrFail($id);
        $cart->delete();
        Alert::toast('Course removed from your Cart!', 'warning');
        return redirect()->back();
    }

    //Processing Payment & Order
    public function processOrder(Request $request)
    {

        if (empty($request->first_name) || empty($request->last_name)) {
            Alert::toast('Please give your full name!', 'warning');
            return redirect()->back();
        }

        if (empty($request->email) || empty($request->phone_number)) {
            Alert::toast('Please give your contact information!', 'warning');
            return redirect()->back();
        }


        if (is_null($request->payment_method)) {
            Alert::toast('Please select payment method', 'warning');
            return redirect()->back();
        }


        if ($request->payment_method == 'bank') {
            if (empty($request->deposit_by) || is_null($request->deposit_slip) || empty($request->account_number) || empty($request->bank_id)) {
                Alert::toast('Invalid bank information!', 'error');
                return redirect()->back();
            }
        }

        $order = $this->placeOrder($request->payment_method);
        /** order billing address */

        if (!auth::user()->student) {
            $student = new Student();
            $student->user_id = auth::user()->id;
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->phone_number = $request->phone_number;
            $student->country_id = $request->country_id;
            $student->state_id = $request->state_id;
            $student->address = $request->address;
            $student->save();
        }

        if (auth::user()->student) {
            $student = Student::find(auth::user()->student->id);
            $student->fill($request->all());
            $student->save();
        }

        if ($request->payment_method == 'bank') {
            $deposit_by = $request->deposit_by;
            $deposit_slip = $this->uploadFileWithDetails('bank', $request->deposit_slip);

            $order->payment_status = 'pending';
            $order->deposit_by = $deposit_by;
            $order->deposit_slip = $deposit_slip['path'];
            $order->payment_method = 'bank';
            $order->bank_id = $request->bank_id;
            $order->save();

            /** ====== Send notification =========*/
            $text = "New course enrolled pending request";
            $target_url = route('report.order-pending');
            $this->send($text, 1, $target_url, null);
            /** ====== Send notification =========*/

            Alert::toast('Request has been Placed! Please Wait for Approve', 'success');
            return redirect()->route('student.thankYou');
        }

        elseif ($request->payment_method == 'stripe') {

            try {
                $stripe_grand_total_with_conversion_rate = $order->grand_total * (get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 0);
                $stripe_grand_total_with_conversion_rate = (float)preg_replace("/[^0-9.]+/", "", number_format($stripe_grand_total_with_conversion_rate, 2));

                $stripeToken = $request->stripeToken;
                Stripe\Stripe::setApiKey(get_option('STRIPE_SECRET_KEY'));
                $charge = Stripe\Charge::create([
                    "amount" => ($stripe_grand_total_with_conversion_rate * 100),
                    "currency" => get_option('stripe_currency'),
                    "source" => $stripeToken,
                    "description" => 'Payment for purchase'
                ]);

                if ($charge->status == 'succeeded') {
                    $order->payment_status = 'paid';
                    $order->payment_method = 'stripe';
                    $order->save();

                    /** ====== Send notification =========*/
                    $text = "New student enrolled";
                    $target_url = route('instructor.allEnrollStudent.index');
                    foreach ($order->items as $item) {
                        if ($item->course) {
                            $this->send($text, 2, $target_url, $item->course->user_id);
                        }
                    }

                    $text = "Course has been sold";
                    $this->send($text, 1, null, null);

                    /** ====== Send notification =========*/

                    Alert::toast('Payment has been completed', 'success');
                    return redirect()->route('student.thankYou');
                }
            } catch (\Stripe\Error\Card $e) {
                // The card has been declined
                Alert::toast('Payment has been declined', 'error');
                return redirect(url('/'));
            }
        }


    }


    private function placeOrder($payment_method)
    {
        $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_number = rand(100000, 999999);
        $order->sub_total = $carts->sum('price');
        $order->discount = $carts->sum('discount');
        $order->platform_charge = get_platform_charge($carts->sum('price'));
        $order->current_currency = get_currency_code();
        $order->grand_total = $order->sub_total + $order->platform_charge;
        $order->payment_method = $payment_method;

        $payment_currency = '';
        $conversion_rate = '';


        if ($payment_method == 'paypal') {
            $payment_currency = get_option('paypal_currency');
            $conversion_rate = get_option('paypal_conversion_rate') ? get_option('paypal_conversion_rate') : 0;
        } elseif ($payment_method == 'stripe') {
            $payment_currency = get_option('stripe_currency');
            $conversion_rate = get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 0;
        } elseif ($payment_method == 'bank') {
            $payment_currency = get_option('bank_currency');
            $conversion_rate = get_option('bank_conversion_rate') ? get_option('bank_conversion_rate') : 0;
        }

        $order->payment_currency = $payment_currency;
        $order->conversion_rate = $conversion_rate;

        if ($conversion_rate) {
            $order->grand_total_with_conversation_rate = ($order->sub_total + $order->platform_charge) * $conversion_rate;
        }

        $order->save();


        foreach ($carts as $cart) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->user_id = Auth::user()->id;
            if ($cart->course_id) {
                $order_item->course_id = $cart->course_id;
                $order_item->owner_user_id = $cart->course ? $cart->course->user_id : null;
            }

            if ($cart->product_id) {
                $order_item->product_id = $cart->product_id;
                $order_item->owner_user_id = $cart->product ? $cart->product->user_id : null;
                $order_item->type = 2;
            }
            $order_item->unit_price = $cart->price;
            if (get_option('sell_commission')) {
                $order_item->admin_commission = admin_sell_commission($cart->price);
                $order_item->owner_balance = $cart->price - admin_sell_commission($cart->price);
                $order_item->sell_commission = get_option('sell_commission');
            } else {
                $order_item->owner_balance = $cart->price;
            }

            $order_item->save();
        }

        CartManagement::whereUserId(@Auth::user()->id)->delete();
        return $order;
    }


    //Banking & Payment Section Starts

    public function fetchBank(Request $request)
    {
        $bank_id = Bank::find($request->bank_id);
        if ($bank_id) {
            return response()->json([
                'account_number' => $bank_id->account_number,
            ]);
        }
    }


}
