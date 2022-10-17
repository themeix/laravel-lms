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
                <div class="lg:grid lg:grid-cols-12 gap-6">
                    <div class="col-span-6">
                        <div class="villing-address-box border mt-4 p-4">
                            <h3 class="text-2xl font-medium text-black-200 pb-7">Billing Address</h3>
                            <div class="countery-box border-blue-5  rounded ">
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div class="flex-col select-box">
                                        <p class="text-black-200 mb-4 text-lg"> Country<span
                                                class="text-blue-800">*</span>
                                        </p>
                                        <select class="w-full arifSelect bg-white text-gray-500" name="country_id"
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
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('country_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex-col">
                                        <p class="text-black-200 mb-4 text-lg"> State <span
                                                class="text-blue-800">*</span>
                                        </p>
                                        <select class="w-full arifSelect bg-white text-gray-500" name="state_id"
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
                                    </div>
                                </div>

                                <div class="grid  gap-4 pt-4">
                                    <div class="flex-col">
                                        <p class="text-black-200 mb-4 text-lg">Full Address <span class="text-blue-800">*</span>
                                        </p>
                                        <textarea rows="2"
                                                  class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                  name="address"
                                                  type="text" placeholder="Address"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-method mt-10 ">
                            <h3 class="text-2xl font-medium text-black-200 pb-7">Payment Method</h3>


                            <div class="check-box-area border p-5  rounded-md ">
                                <nav class="tabs  ">
                                    <button data-target="panel-0"
                                            class="tab ml-7 chek-box  relative mb-3 text-black-200 flex items-center gap-2 ">

                                        Pay with Bank
                                    </button>
                                    <button data-target="panel-1"
                                            class="tab ml-7 chek-box  relative mb-3 text-black-200 flex items-center gap-2 ">

                                        Pay with Paypal
                                    </button>
                                    <button data-target="panel-2"
                                            class="tab ml-7 chek-box relative  mb-3 text-black-200  flex items-center gap-2">

                                        Pay with Credit Card/ Debit Card
                                    </button>
                                </nav>
                            </div>

                            <div id="panels">
                                <div class="panel-0 tab-content py-5">
                                    <div class="debit-card-box border p-5  rounded mt-5">

                                        <div class="grid md:grid-cols-1 gap-4 mt-5">

                                        </div>
                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Name <span
                                                        class="text-blue-800">*</span></p>
                                                <select class="w-full arifSelect bg-white text-gray-500" name="bank_id"
                                                        id="bank_id">
                                                    <option value="">--- Select Bank ---</option>

                                                    @foreach ($banks as $bank)
                                                        <option value="{{ $bank->id }}">
                                                            {{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Account Number <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number"  name="account_number" id="account_number" readonly>
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
                                                        type="text" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="file">
                                                </div>
                                            </div>
                                            <p class="text-gray-800 mt-5" style="font-style: italic; font-size: 13px; color: gray;">*** We protect your payment information using
                                                encryption to provide
                                                bank-level security.</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-1 tab-content py-5">
                                    <div class="debit-card-box border p-5  rounded mt-5">
                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Card Number <span
                                                        class="text-blue-800">*</span></p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number" placeholder="1243 5684 5485 2654">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Card security code <span
                                                        class="text-blue-800">*</span></p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number" placeholder="Type your security code">
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Expiration Month <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="date">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Expiration Year <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="month">
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-1 gap-4 mt-5">

                                        </div>
                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Name <span
                                                        class="text-blue-800">*</span></p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="text" placeholder="Type Bank name">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Account Number <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number" placeholder="1254 5651 4568 554">
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
                                                        type="text" placeholder="Smith Done">
                                                </div>
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="file">
                                                </div>
                                            </div>
                                            <p class="text-gray-800 mt-5"> We protect your payment information using
                                                encryption to provide
                                                bank-level security. </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-2 tab-content py-5">
                                    <div class="debit-card-box border p-5  rounded mt-5">

                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Card Number <span
                                                        class="text-blue-800">*</span></p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number" placeholder="1243 5684 5485 2654">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Card security code <span
                                                        class="text-blue-800">*</span></p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number" placeholder="Type your security code">
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Expiration Month <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="date">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Expiration Year <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="month">
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-1 gap-4 mt-5">

                                        </div>
                                        <div class="grid md:grid-cols-2 gap-4 mt-5">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Name <span
                                                        class="text-blue-800">*</span></p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="text" placeholder="Type Bank name">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Account Number <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="number" placeholder="1254 5651 4568 554">
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
                                                        type="text" placeholder="Smith Done">
                                                </div>
                                                <div class="flex-col">
                                                    <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span
                                                            class="text-blue-800">*</span>
                                                    </p>
                                                    <input
                                                        class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                        type="file">
                                                </div>
                                            </div>
                                            <p class="text-gray-800 mt-5"> We protect your payment information using
                                                encryption to provide
                                                bank-level security. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-span-6">
                        <div class="billing-summery-box p-8 shadow-4xl mt-4 mb-4" style="border: 1px solid #e5e7eb">
                            <h3 class="text-2xl font-medium text-black-200 pb-2 mb-2">Order Summery</h3>
                            <div class="shoppin-card-box-all ">
                                <p class=" text-base ">{{ $quantity }} Items in cart </p>
                                @foreach($carts as $cart)
                                    <div class="md:grid md:grid-cols-12  md:gap-12  flex-col gap-8 items-center mt-5">
                                        <div class="col-span-8 ">
                                            <div class="shopping-cart-box ">
                                                <div class="couses-box">

                                                    <div class="lg:flex">
                                                        <div class="lg:flex  gap-4 ">
                                                            <div class="flex-col">
                                                                <img
                                                                    class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
                                                                    src="{{asset('frontend/assets/images/shopping-cart.webp')}}"
                                                                    alt="images">
                                                            </div>
                                                            <div class="flex-col">
                                                                <h4 class="text-black-200 font-medium mb-4">
                                                                    <a
                                                                        class="hover:text-blue-600"
                                                                        href="course.html">

                                                                        {{ $cart->course->title }}
                                                                    </a>
                                                                </h4>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-4 mt-4 lg:mt-0">
                                            <div class="flex-col lg:text-right w-full">
                                                <p class="text-black-200 font-medium">$ {{$cart->course->price}}</p>
                                                {{--<p class="text-blue-50">
                                                    <del> $ 100.00</del>
                                                </p>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>




                        <div class="billing-summery-box p-8 shadow-4xl" style="border: 1px solid #e5e7eb">
                            <h3 class="text-2xl font-medium text-black-200 pb-7 mb-7">Billing Summery</h3>
                            <div class="item-info flex justify-between mb-6">
                                <p class="text-gray-800">Original price:</p>
                                <p>$ {{ $total }}</p>
                            </div>
                            {{--<div class="item-info flex justify-between mb-6 border-b pb-6">
                                <p class="text-gray-800">Selling price:</p>
                                <p>
                                    <del>$ {{ $total }}</del>
                                </p>
                            </div>--}}
                            <div class="item-info flex justify-between mb-6 border-b pb-4">
                                <p class="text-gray-800">Total:</p>
                                <p class="text-2xl font-medium">$ {{ $total }}</p>
                            </div>
                            <div class="item-button">
                                <a class="bg-blue-600 py-3 w-full  text-center block mt-6 text-white font-medium rounded hover:bg-black-200 transition duration-500"
                                   href="#">Pay ${{ $total }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  ====================== villing address Area End =============================  -->
    @else
        <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
            <div class="container">
                <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200   font-medium" data-aos="fade-up"
                        data-aos-delay="100" style="color: #FF5733!important;">No Items Found</h2>
                    <br>
                    <h6>Please Add Course in your Cart</h6>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
    @endif




    <input type="hidden" class="fetchBankRoute" value="{{ route('main.fetchBank') }}">


@endsection


@push('scripts')
    <script src="{{ asset('frontend/custom/js/checkout.js') }}"></script>


    <script>
        $(function () {
            var stateSelectedId = '{{ old('state_id') }}';
            $('#country_id').change(function () {
                var country_id = $(this).val();
                $('#state_id').html('<option value="">---Select State---</option>');
                if (country_id != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('main.getStates') }}",
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



    </script>
@endpush
