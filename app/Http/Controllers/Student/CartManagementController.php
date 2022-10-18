<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\CartManagement;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\State;
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

            Alert::error('Error', 'You are not allowed to add course to cart!');

            return redirect()->back();
        }


        else {

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

                            Alert::info('Info', "You've already request the course & status is pending!");
                            return redirect()->back();

                        } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            Alert::info('Info', "You've already purchased the course!");
                            return redirect()->back();

                        }
                    }
                }

                //Check  if course is your own or not

                $ownCourseCheck = Course::whereUserId(Auth::user()->id)->where('id', $request->course_id)->first();

                if ($ownCourseCheck) {
                    Alert::info('Info', "This is your course. No need to purchase.");
                    return redirect()->back();
                }

                $courseExits = Course::find($request->course_id);
                if (!$courseExits) {

                    Alert::error('Info', "Course not found!");
                    return redirect()->back();
                }
            }

            $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereCourseId($request->course_id)->first();

            if ($cartExists) {

                Alert::warning('Warning', "Already added to cart!");
                return redirect()->route('main.cart');

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


                    Alert::success('Success', 'Free Course added to your learning list!');

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


            Alert::success('Success', 'Course added to your Cart!');

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

                        Alert::info('Info', "You've already request the course & status is pending!");
                        return redirect()->back();

                    } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                        Alert::info('Info', "You've already purchased the course!");
                        return redirect()->back();

                    }
                }
            }

            //Check  if course is your own or not

            $ownCourseCheck = Course::whereUserId(Auth::user()->id)->where('id', $request->course_id)->first();

            if ($ownCourseCheck) {
                Alert::info('Info', "This is your course. No need to purchase.");
                return redirect()->back();
            }

            $courseExits = Course::find($request->course_id);
            if (!$courseExits) {

                Alert::error('Info', "Course not found!");
                return redirect()->back();
            }
        }

        $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereCourseId($request->course_id)->first();

        if ($cartExists) {

            Alert::warning('Warning', "Already added to cart!");
            return redirect()->route('main.cart');

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


                Alert::success('Success', 'Free Course added to your learning list!');

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


        Alert::success('Success', 'Course added to your Cart!');

        return redirect()->route('main.cart');
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


    public function goToCheckout(Request $request)
    {

    }

    public function cartDelete($id)
    {
        $cart = CartManagement::findOrFail($id);
        $cart->delete();
        Alert::warning('Warning', 'Course removed from your Cart!');
        return redirect()->back();
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
