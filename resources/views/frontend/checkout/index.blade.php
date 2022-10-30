@extends('layouts.frontEndMaster')
@section('title','Checkout')
@section('content')
    @if(sizeof($carts)>0)

        <!--  ====================== Breadcrum  Area Start =============================  -->
        <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
            <div class="container">
                <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium"
                        data-aos="fade-up"
                        data-aos-delay="100">Checkout</h2>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
        <!--  ====================== Breadcrum  Area End =============================  -->
        <!--  ====================== villing address Area Start =============================  -->
        <section class="villing-address-area md:py-28 py-20">
            <div class="container">
                <form action="{{ route('student.processOrder') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="lg:grid lg:grid-cols-12 gap-6">
                        <div class="col-span-8 ">
                            <h3 class="text-2xl font-medium text-black-200 pb-7 mb-7">Order Summery</h3>
                            <div class="villing-address-left border border-blue-5 p-4 rounded">
                                <div class="shoppin-card-box-all ">
                                    <p class=" text-base ">{{ $quantity }} Items in cart </p>
                                    @foreach($carts as $cart)
                                        <div
                                            class="md:grid md:grid-cols-12  md:gap-12  flex-col gap-8 items-center mt-5">
                                            <div class="col-span-8 ">
                                                <div class="shopping-cart-box ">
                                                    <div class="couses-box">

                                                        <div class="lg:flex">
                                                            <div class="lg:flex  gap-4 ">
                                                                <div class="flex-col">
                                                                    <a href="{{ route('main.courseDetails', $cart->course->slug) }}"><img
                                                                            class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
                                                                            src="{{getImageFile($cart->course->image)}}"
                                                                            alt="images">
                                                                    </a>
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
                                                                                        Promo: {{ $promotion->name }} -
                                                                                        Applied

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
                                                                                        Coupon: {{ $coupon->coupon_code_name }}
                                                                                        - Applied

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
                                            </div>
                                            <div class="col-span-4 mt-4 lg:mt-0">
                                                <div class="flex-col lg:text-right w-full">
                                                    @if($cart->applied_coupon_id != null || $cart->applied_promotion_id != null)
                                                        <p class="text-black-200 font-medium">
                                                            <del> ${{ $cart->main_price }} </del>
                                                        </p>
                                                        <p class="text-black-200 font-medium">
                                                            ${{ $cart->price }}</p>

                                                    @else
                                                        <p class="text-black-200 font-medium">
                                                            ${{ $cart->main_price }}</p>
                                                        <p class="text-blue-50">

                                                        </p>

                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            @if(Auth::user()->type == 2 && Auth::user()->instructor)
                                <div class="villing-address-box border mt-4 p-4">
                                    <h3 class="text-2xl font-medium text-black-200 pb-7">Billing Information</h3>
                                    <div class="countery-box border-blue-5  rounded ">

                                        <div class="grid md:grid-cols-2 gap-4">

                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">First Name <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        value="{{ $instructor->first_name }}"
                                                        name="first_name" id="first_name"
                                                        type="text" placeholder="First name" required/>

                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Last Name <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        value=" {{ $instructor->last_name }}"
                                                        name="last_name" id="last_name"
                                                        type="text" placeholder="Last name" required/>

                                                    @if ($errors->has('last_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Email <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="email" id="email"
                                                        value="{{ $instructor->user->email }}"
                                                        type="email" placeholder="Eamil" required/>

                                                    @if ($errors->has('email'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Phone Number <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="phone_number" value="{{ $instructor->phone_number }}"
                                                        type="number" placeholder="Phone Number" required/>
                                                </div>
                                            </div>


                                            <div class="flex-col select-box">
                                                <p class="text-black-200 mb-4 text-lg"> Country<span
                                                        class="text-blue-800">*</span>
                                                </p>

                                                @if ($instructor->country_id && $instructor->country)
                                                    <input type="text" value="{{ $instructor->country->country_name }}"
                                                           class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                           readonly>
                                                    <input type="hidden" name="country_id"
                                                           value="{{ $instructor->country_id }}">
                                                @else

                                                    <select class="w-full arifSelect bg-white text-gray-500"
                                                            name="country_id"
                                                            id="country_id">
                                                        <option value="">--- Select Country ---</option>

                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                            @if (old('country_id'))
                                                                {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                                @else
                                                                {{ $user->country_id == $country->id ? 'selected' : '' }}
                                                                @endif>
                                                                {{ $country->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                @if ($errors->has('country_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('country_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> State <span
                                                        class="text-blue-800">*</span>
                                                </p>

                                                @if ($instructor->state_id && $instructor->state)
                                                    <input type="text" value="{{ $instructor->state->name }}"
                                                           class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                           readonly>
                                                    <input type="hidden" name="state_id"
                                                           value="{{ $instructor->state_id }}">
                                                @else

                                                    <select class="w-full arifSelect bg-white text-gray-500"
                                                            name="state_id"
                                                            id="state_id">
                                                        <option value="">--- Select State ---</option>

                                                        @if (old('country_id'))
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                                    {{ $state->name }}</option>
                                                            @endforeach
                                                        @else
                                                            @if ($user->country)
                                                                @foreach ($user->country->states as $selected_state)
                                                                    <option value="{{ $selected_state->id }}"
                                                                        {{ $user->state_id == $selected_state->id ? 'selected' : '' }}>
                                                                        {{ $selected_state->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </select>
                                                @endif
                                                @if ($errors->has('state_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('state_id') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="grid  gap-4 pt-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Full Address <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <textarea rows="2"
                                                          class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                          name="address" id="address"
                                                          type="text"
                                                          placeholder="Address">{{ $instructor->address }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @elseif(Auth::user()->type == 3 && Auth::user()->student)
                                <div class="villing-address-box border mt-4 p-4">
                                    <h3 class="text-2xl font-medium text-black-200 pb-7">Billing Information</h3>
                                    <div class="countery-box border-blue-5  rounded ">

                                        <div class="grid md:grid-cols-2 gap-4">

                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">First Name <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        value="{{ $student->first_name }}"
                                                        name="first_name" id="first_name"
                                                        type="text" placeholder="Name" required/>

                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Last Name <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        value=" {{ $student->last_name }}"
                                                        name="last_name" id="last_name"
                                                        type="text" placeholder="Name" required/>

                                                    @if ($errors->has('last_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Email <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="email" id="email"
                                                        value="{{ $student->user->email }}"
                                                        type="email" placeholder="Eamil" required/>

                                                    @if ($errors->has('email'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Phone Number <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="phone_number" value="{{ $student->phone_number }}"
                                                        type="number" placeholder="Phone Number" required/>
                                                </div>
                                            </div>


                                            <div class="flex-col select-box">
                                                <p class="text-black-200 mb-4 text-lg"> Country<span
                                                        class="text-blue-800">*</span>
                                                </p>


                                                @if ($student->country_id && $student->country)
                                                    <input type="text" value="{{ $student->country->country_name }}"
                                                           class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                           readonly>
                                                    <input type="hidden" name="country_id"
                                                           value="{{ $student->country_id }}">
                                                @else

                                                    <select class="w-full arifSelect bg-white text-gray-500"
                                                            name="country_id"
                                                            id="country_id">
                                                        <option value="">--- Select Country ---</option>

                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                            @if (old('country_id'))
                                                                {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                                @else
                                                                {{ $user->country_id == $country->id ? 'selected' : '' }}
                                                                @endif>
                                                                {{ $country->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                @if ($errors->has('country_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('country_id') }}</span>
                                                @endif
                                            </div>

                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> State <span
                                                        class="text-blue-800">*</span>
                                                </p>

                                                @if ($student->state_id && $student->state)
                                                    <input type="text" value="{{ $student->state->name }}"
                                                           class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                           readonly>
                                                    <input type="hidden" name="state_id"
                                                           value="{{ $student->state_id }}">
                                                @else

                                                    <select class="w-full arifSelect bg-white text-gray-500"
                                                            name="state_id"
                                                            id="state_id">
                                                        <option value="">--- Select State ---</option>

                                                        @if (old('country_id'))
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                                    {{ $state->name }}</option>
                                                            @endforeach
                                                        @else
                                                            @if ($user->country)
                                                                @foreach ($user->country->states as $selected_state)
                                                                    <option value="{{ $selected_state->id }}"
                                                                        {{ $user->state_id == $selected_state->id ? 'selected' : '' }}>
                                                                        {{ $selected_state->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </select>
                                                @endif
                                                @if ($errors->has('state_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('state_id') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="grid  gap-4 pt-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Full Address <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <textarea rows="2"
                                                          class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                          name="address" id="address"
                                                          type="text"
                                                          placeholder="Address">{{ $student->address }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="villing-address-box border mt-4 p-4">
                                    <h3 class="text-2xl font-medium text-black-200 pb-7">Billing Information</h3>
                                    <div class="countery-box border-blue-5  rounded ">

                                        <div class="grid md:grid-cols-2 gap-4">

                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">First Name <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        value="{{ old('first_name') }}"
                                                        name="first_name" id="first_name"
                                                        type="text" placeholder="First name" required/>

                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Last Name <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        value="{{ old('last_name') }}"
                                                        name="last_name" id="last_name"
                                                        type="text" placeholder="Last name" required/>

                                                    @if ($errors->has('last_name'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Email <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="email" id="email"
                                                        value="{{ Auth::user()->email }}"
                                                        type="email" placeholder="Eamil" required/>

                                                    @if ($errors->has('email'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="flex-col  gap-4">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg">Phone Number <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        name="phone_number" value="{{ Auth::user()->phone_number }}"
                                                        type="number" placeholder="Phone Number" required/>
                                                    @if ($errors->has('phone_number'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="flex-col select-box">
                                                <p class="text-black-200 mb-4 text-lg"> Country<span
                                                        class="text-blue-800">*</span>
                                                </p>

                                                <select class="w-full arifSelect bg-white text-gray-500"
                                                        name="country_id"
                                                        id="country_id">
                                                    <option value="">--- Select Country ---</option>

                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                        @if (old('country_id'))
                                                            {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                            @else
                                                            {{ $user->country_id == $country->id ? 'selected' : '' }}
                                                            @endif>
                                                            {{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('country_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> State <span
                                                        class="text-blue-800">*</span>
                                                </p>


                                                <select class="w-full arifSelect bg-white text-gray-500"
                                                        name="state_id"
                                                        id="state_id">
                                                    <option value="">--- Select State ---</option>

                                                    @if (old('country_id'))
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}"
                                                                {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                                {{ $state->name }}</option>
                                                        @endforeach
                                                    @else
                                                        @if ($user->country)
                                                            @foreach ($user->country->states as $selected_state)
                                                                <option value="{{ $selected_state->id }}"
                                                                    {{ $user->state_id == $selected_state->id ? 'selected' : '' }}>
                                                                    {{ $selected_state->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </select>
                                                @if ($errors->has('state_id'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('state_id') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="grid  gap-4 pt-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Full Address <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <textarea rows="2"
                                                          class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                          name="address" id="address"
                                                          type="text"
                                                          placeholder="Address">{{ old('address') }} </textarea>
                                                @if ($errors->has('address'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            {{--Payment method--}}
                            <div class="payment-method mt-10 ">
                                <h3 class="text-2xl font-medium text-black-200 pb-7">Payment Method</h3>

                                {{--Bank--}}
                                @if(sizeof($banks) > 0)
                                    <div class="check-box-area border p-5 mb-5  rounded-md ">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="bankPayment" onclick="bankActive(this);"
                                                   class="w-6 h-6 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                   name="payment_method"
                                                   value="bank" {{ old('payment_method') == 'bank' ? 'checked' : '' }}
                                            />
                                            <label for="checked-checkbox"
                                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pay
                                                With Bank</label>
                                        </div>


                                        <div class="debit-card-box border p-5  rounded mt-5">
                                            <div class="grid md:grid-cols-2 gap-4 mt-5">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Name <span
                                                            class="text-blue-800">*</span></p>
                                                    <select class="w-full arifSelect bg-white text-gray-500"
                                                            name="bank_id"
                                                            id="bank_id">
                                                        <option value="">--- Select Bank ---</option>

                                                        @foreach ($banks as $bank)
                                                            <option value="{{ $bank->id }}">
                                                                {{ $bank->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('bank_id'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('bank_id') }}</span>
                                                    @endif

                                                </div>
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Account Number <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline account_number"
                                                        type="number" name="account_number" id="account_number"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="deposit-box mt-5">
                                                <div class="grid md:grid-cols-2 gap-4 ">
                                                    <div class="flex-col">
                                                        <p class="text-black-200 mb-4 text-lg"> Deposit By <span
                                                                class="text-blue-800">*</span>
                                                        </p>
                                                        <input
                                                            class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                            type="text" name="deposit_by"
                                                            value="{{ Auth::user()->name }}" readonly>
                                                    </div>
                                                    <div class="flex-col">
                                                        <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span
                                                                class="text-blue-800">*</span>
                                                        </p>
                                                        <input
                                                            class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                            type="file" name="deposit_slip">
                                                    </div>
                                                </div>

                                                <div class="form-row row">
                                                    <div class="col-md-12 d-none error form-group">
                                                        <div class="alert-danger alert  bank-error-message">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endif


                                {{--SSLCOMMERZE--}}
                                {{-- @if (get_option('paypal_status') == 1)--}}
                                <div class="check-box-area border p-5 mb-5  rounded-md ">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="sslPayment" onclick="sslActive(this);"
                                               class="w-6 h-6 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                               name="payment_method"
                                               value="ssl"
                                        />
                                        <label for="checked-checkbox"
                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pay
                                            With SSLCOMMERZ</label>
                                    </div>
                                </div>
                                {{--@endif--}}

                                {{--paypal--}}
                                {{-- @if (get_option('paypal_status') == 1)--}}
                                <div class="check-box-area border p-5 mb-5  rounded-md ">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="paypalPayment" onclick="paypalActive(this);"
                                               class="w-6 h-6 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                               name="payment_method"
                                               value="paypal"
                                            {{ old('payment_method') == 'paypal' ? 'checked' : '' }}
                                        />
                                        <label for="checked-checkbox"
                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pay
                                            With Paypal</label>

                                    </div>
                                </div>
                                {{--@endif--}}


                                {{--Stripe--}}
                                @if (get_option('stripe_status') == 1)
                                    <div class="check-box-area border p-5 mb-5  rounded-md ">

                                        <div class="flex items-center">
                                            <input type="checkbox" id="stripePayment" onclick="stripeActive(this);"
                                                   class="w-6 h-6 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                   name="payment_method"
                                                   value="stripe" {{ old('payment_method') == 'stripe' ? 'checked' : '' }}
                                            />
                                            <label for="checked-checkbox"
                                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pay
                                                With Credit Card</label>
                                        </div>

                                        <div class="debit-card-box border p-5  rounded mt-5">
                                            <div class="grid md:grid-cols-2 gap-4 mt-5">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Card Number <span
                                                            class="text-blue-800">*</span></p>
                                                    <input
                                                        class=" card-number appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="number" placeholder="1243 5684 5485 2654">
                                                </div>
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Card security code <span
                                                            class="text-blue-800">*</span></p>
                                                    <input
                                                        class=" card-cvc appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="password">
                                                </div>
                                            </div>
                                            <div class="grid md:grid-cols-2 gap-4 mt-5">
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Expiration Month <span
                                                            class="text-blue-800">*</span>
                                                    </p>

                                                    <input
                                                        class=" card-expiry-month appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="text" placeholder="MM">
                                                </div>
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Expiration Year <span
                                                            class="text-blue-800">*</span>
                                                    </p>

                                                    <input
                                                        class=" card-expiry-year appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="text" placeholder="YYYY">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="mb-5 mt-5 p-5 font-normal">
                                    <p>
                                        *** We
                                        protect
                                        your payment information using
                                        encryption to provide
                                        bank-level security.</p>
                                </div>

                            </div>
                        </div>

                        {{--Toatal Area--}}
                        <div class="col-span-4">
                            <div class="billing-summery-box p-8 shadow-4xl">
                                <h3 class="text-2xl font-medium text-black-200 pb-7 mb-7">Billing Summery</h3>
                                <div class="item-info flex justify-between mb-6">
                                    <p class="text-gray-800">Original price:</p>
                                    <p>$ {{ $total }}</p>
                                </div>
                                <div class="item-info flex justify-between mb-6 border-b pb-6">
                                    <p class="text-gray-800">Discount: </p>
                                    <p>
                                        <del>$ {{ $discount_amount }}</del>
                                    </p>
                                </div>
                                <div class="item-info flex justify-between mb-6 border-b pb-4">
                                    <p class="text-gray-800">Selling price:</p>
                                    <p class="text-2xl font-medium">$ {{ $total_after_discount }}</p>
                                </div>

                                <div class="item-button">
                                    <button type="submit"
                                            class="bg-blue-600 py-3 w-full  text-center block mt-6 text-white font-medium rounded hover:bg-black-200 transition duration-500">
                                        Pay $ {{ $total_after_discount }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!--  ====================== villing address Area End =============================  -->

    @else
        <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
            <div class="container">
                <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200 font-medium"
                        data-aos="fade-up"
                        data-aos-delay="100" style="color: #FF5733!important;">No Items Found</h2>
                    <br>
                    <h6>PLEASE ADD COURSE IN YOUR CART</h6>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
    @endif

    <input type="hidden" class="fetchBankRoute" value="{{ route('student.fetchBank') }}">
@endsection



@push('scripts')
    <script src="{{ asset('frontend/custom/js/checkout.js') }}"></script>

    <script src="https://js.stripe.com/v2/"></script>


    <script>
        $(function () {
            var stateSelectedId = '{{ old('state_id') }}';
            $('#country_id').change(function () {
                var country_id = $(this).val();
                $('#state_id').html('<option value="">---Select State---</option>');
                if (country_id != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('student.getStates') }}",
                        data: {country_id: country_id}
                    }).done(function (data) {
                        $.each(data, function (index, item) {
                            if (stateSelectedId == item.id)
                                $('#state_id').append('<option value="' + item.id + '" selected>' + item.name + '</option>');
                            else
                                $('#state_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    });
                }
            });
            $('#country_id').trigger('change');
        });


        function bankActive() {
            document.getElementById("paypalPayment").checked = false;
            document.getElementById("stripePayment").checked = false;
            document.getElementById("sslPayment").checked = false;
        }

        function paypalActive() {
            document.getElementById("bankPayment").checked = false;
            document.getElementById("stripePayment").checked = false;
            document.getElementById("sslPayment").checked = false;
        }

        function stripeActive() {
            document.getElementById("bankPayment").checked = false;
            document.getElementById("paypalPayment").checked = false;
            document.getElementById("sslPayment").checked = false;
        }

        function sslActive() {
            document.getElementById("bankPayment").checked = false;
            document.getElementById("paypalPayment").checked = false;
            document.getElementById("stripePayment").checked = false;
        }


        $(function() {
            var $form = $(".validation");
            $('form.validation').bind('submit', function(e) {
                var $form         = $(".validation"),
                    inputVal = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputVal),
                    $errorStatus = $form.find('div.error'),
                    valid         = true;
                $errorStatus.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorStatus.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-num').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeHandleResponse);
                }

            });

            function stripeHandleResponse(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });


    </script>
@endpush
