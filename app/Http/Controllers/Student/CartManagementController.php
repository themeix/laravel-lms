<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Bank;
use App\Models\CartManagement;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Models\Withdraw;

use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
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


            $cart = new CartManagement();
            $cart->user_id = Auth::user()->id;
            $cart->course_id = $request->course_id;
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


        $cart = new CartManagement();
        $cart->user_id = Auth::user()->id;
        $cart->course_id = $request->course_id;
        $cart->product_id = $request->product_id;
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
        $data['total'] = CartManagement::whereUserId(Auth::user()->id)->sum('price');

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
        $data['total'] = CartManagement::whereUserId(Auth::user()->id)->sum('price');

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


    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($states);
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

        if (is_null($request->payment_method)) {
            Alert::toast('Please Select Payment Method', 'warning');
            return redirect()->back();
        }


        if ($request->payment_method == 'bank') {
            if (empty($request->deposit_by) || is_null($request->deposit_slip) || empty($request->account_number) || empty($request->bank_id)) {
                Alert::toast('Bank Information Not Valid!', 'error');
                return redirect()->back();
            }
        }

        $order = $this->placeOrder($request->payment_method);
        /** order billing address */

        if(!auth::user()->student || !auth::user()->instuctor){

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
            $order->deposit_by =  $deposit_by;
            $order->deposit_slip =  $deposit_slip['path'];
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
        /*$order->current_currency = get_currency_code();*/
        $order->grand_total = $order->sub_total + $order->platform_charge;
        $order->payment_method = $payment_method;

        $payment_currency = '';
        $conversion_rate = '';

        if ($payment_method == 'bank') {
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
