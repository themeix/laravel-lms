@extends('layouts.frontEndMaster')
@section('title','Cart')
@section('content')

    @if(sizeof($carts)>0)

        <!--  ====================== Breadcrum  Area Start =============================  -->
        <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
            <div class="container">
                <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium"
                        data-aos="fade-up"
                        data-aos-delay="100">Shopping Cart</h2>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
        <!--  ====================== Breadcrum  Area End =============================  -->
        <!--  ====================== Shopping Cart  Area Start =============================  -->
        <section class="shopping-cart-hero-area md:mt-32 mt-20">
            <div class="container">
                <div class="lg:grid lg:grid-cols-12 flex flex-col mb-8 gap-8">
                    <div class="col-span-9">
                        <div class="shoppin-card-box-all shadow-4xl p-10 bg-white">
                            <h3 class="text-2xl font-medium text-black-200 pb-7  border-b">{{ $quantity }} Courses in
                                Cart</h3>
                            @foreach($carts as $cart)
                                <div class="lg:grid lg:grid-cols-12  lg:gap-12 flex flex-col mt-7 gap-8">
                                    <div class="col-span-8">
                                        <div class="shopping-cart-box ">
                                            <div class="couses-box">
                                                <div class="lg:flex  gap-4 ">
                                                    <div class="flex-col">
                                                        <a href="{{ route('main.courseDetails', $cart->course->slug) }}">
                                                            <img
                                                                class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
                                                                src="{{getImageFile($cart->course->image)}}"
                                                                alt="images"></a>

                                                    </div>
                                                    <div class="flex-col">
                                                        <h4 class="text-black-200 font-medium mb-4"><a
                                                                class="hover:text-blue-600"
                                                                href="{{ route('main.courseDetails', $cart->course->slug) }}">
                                                                {{ $cart->course->title }}
                                                            </a>
                                                        </h4>
                                                        <div class="author-box flex items-center mt-4">
                                                            <div class="course-content">
                                                                <p class="text-sm text-blue-50 font-normal ">
                                                                    <a href="{{ route('main.instructorWiseCourses', $cart->course->instructor->slug) }}"> {{ $cart->course->instructor->name }}</a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        @if($cart->applied_promotion_id != null)

                                                            @php
                                                                $promotion_course = \App\Models\PromotionCourse::where('id', $cart->applied_promotion_id)->first();

                                                                    $promotion = \App\Models\Promotion::where('id', $promotion_course->promotion_id)->first();
                                                            @endphp

                                                            <div class="author-box flex items-center mt-4">
                                                                <div class="course-content">
                                                                    @if($cart->applied_promotion_id != null)

                                                                        <p class="text-sm text-blue-50 font-normal "
                                                                           style="color: #00C851;">
                                                                            Promo: {{ $promotion->name }} - Applied

                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        @endif


                                                        @if($cart->coupon_id != null)

                                                            @php
                                                                $coupon = \App\Models\Coupon::where('id', $cart->coupon_id)->first();
                                                            @endphp

                                                            <div class="author-box flex items-center mt-4">
                                                                <div class="course-content">
                                                                    @if($cart->applied_coupon_id != null)

                                                                        <p class="text-sm text-blue-50 font-normal "
                                                                           style="color: #00C851;">
                                                                            Coupon: {{ $coupon->coupon_code_name }} - Applied

                                                                        </p>

                                                                    @else
                                                                        <p class="text-sm text-blue-50 font-normal "
                                                                           style="color: orangered;">
                                                                            {{ $coupon->coupon_code_name }}
                                                                            - {{$coupon->percentage}}% off

                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-span-4">
                                        <div class="flex justify-between">
                                            <div class="flex-col">
                                                <p class="font-medium text-black-200 mb-10">Price</p>

                                                @if($cart->applied_coupon_id != null || $cart->applied_promotion_id != null)
                                                    <p class="text-gray-800">
                                                        <del>$ {{ $cart->main_price }}</del>
                                                    </p>
                                                    <p class="text-gray-800">$ {{ $cart->price }}</p>
                                                @else
                                                    <p class="text-gray-800">$ {{ $cart->main_price }}</p>
                                                @endif
                                            </div>
                                            <div class="flex-col">
                                                <p class="font-medium text-black-200 mb-10"> Action </p>
                                                <p>
                                                    <a href="{{ route('student.cartDelete', $cart->id) }}"
                                                       style="color: red;">
                                                        Remove
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="coupon-code-box border-b pb-6 mt-6">
                                    @if($cart->coupon_id != null && $cart->applied_coupon_id == null)
                                        <form action="{{ route('student.applyCoupon') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $cart->id }}">

                                            <div class="forms-box flex gap-3">
                                                <input
                                                    class=" appearance-none border-blue-50 border py-2 px-4 rounded placeholder-blue-50 outline-blue-600"
                                                    name="coupon_code" id="coupon_code"
                                                    type="text" placeholder="Coupon Code"/>
                                                <button
                                                    class=" py-2 px-4 inline-block hover:bg-black-200 rounded bg-blue-600 text-white transition duration-500 apply-coupon-code"
                                                    type="submit">Apply
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-span-3 ">
                        <div class="order-summery shadow-4xl p-10 bg-white">
                            <h3 class="text-2xl font-medium text-black-200 mb-4">Order summery</h3>
                            <div class="flex justify-between mb-4">
                                <div class="flex-col">
                                    <p class="">Items ({{ $quantity }}) :</p>
                                </div>
                                <div class="flex-col">
                                    <p class="">$ {{ $total }}</p>
                                </div>
                            </div>
                            <div class="flex justify-between mb-4 border-b pb-4">
                                <div class="flex-col">
                                    <p class="">({{ $discount_percent }}%) off:</p>
                                </div>
                                <div class="flex-col">
                                    <p class="">
                                        <del>$ {{ $discount_amount }}</del>
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-between mb-4 border-b pb-4">
                                <div class="flex-col">
                                    <p class="text-black-200 text-lg ">Total:</p>
                                </div>
                                <div class="flex-col">
                                    <p class=" text-2xl font-medium text-black-200">$ {{$total_after_discount}}</p>
                                </div>
                            </div>
                            <div class="order-button mt-6">
                                <a class="py-3 w-full mb-4 bg-blue-600 text-white block text-center px-6 rounded-md text-lg font-medium transition duration-500 hover:text-black-200 hover:bg-blue-100"
                                   href="{{ route('student.checkout') }}">Checkout</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  ====================== Shopping Cart  Area End =============================  -->
    @else
        <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
            <div class="container">
                <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200   font-medium"
                        data-aos="fade-up"
                        data-aos-delay="100" style="color: #FF5733!important;">No Items in Cart</h2>
                    <br>
                    <h6>PLEASE ADD COURSE IN YOUR CART</h6>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
    @endif
@endsection

{{--@push('scripts')
    <script src="{{asset('frontend/custom/js/cart-list.js')}}"></script>
@endpush--}}

