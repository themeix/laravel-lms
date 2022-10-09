@extends('layouts.frontEndMaster')
@section('title','Dashboard')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
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
                <div class="col-span-8 ">
                    <h3 class="text-2xl font-medium text-black-200 pb-7 mb-7">Order Summery</h3>
                    <div class="villing-address-left border border-blue-5 p-4 rounded">
                        <div class="shoppin-card-box-all ">
                            <p class=" text-base ">1 Items in cart </p>
                            <div class="md:grid md:grid-cols-12  md:gap-12  flex-col gap-8 items-center mt-5">
                                <div class="col-span-8 ">
                                    <div class="shopping-cart-box ">
                                        <div class="couses-box">

                                            <div class="lg:flex">
                                                <div class="lg:flex  gap-4 ">
                                                    <div class="flex-col">
                                                        <img class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
                                                             src="{{asset('frontend/assets/images/shopping-cart.webp')}}" alt="images">
                                                    </div>
                                                    <div class="flex-col">
                                                        <h4 class="text-black-200 font-medium mb-4"> <a class="hover:text-blue-600"
                                                                                                        href="course.html">Learn Figma - UI/UX
                                                                Design Essential
                                                                TrainingLearn</a>
                                                        </h4>
                                                        <div class="author-box flex items-center mt-4">
                                                            <img class="w-10 h-10 rounded-full object-fit"
                                                                 src="{{asset('frontend/assets/images/author/3.webp')}}" alt="author">
                                                            <div class="course-content ml-2">
                                                                <h6 class="">
                                                                    <a class="text-base text-black-200 hover:text-blue-800 font-medium duration-300"
                                                                       href="author.html"> Floyd Miles</a>
                                                                </h6>
                                                                <p class="text-sm text-blue-50 font-normal ">
                                                                    Marketing Coordinator
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-4 mt-4 lg:mt-0">
                                    <div class="flex-col lg:text-right w-full">
                                        <p class="text-black-200 font-medium">$39.99</p>
                                        <p class="text-blue-50"><del> $ 100.00 </del></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="villing-address-box border p-4 mt-8">
                        <h3 class="text-2xl font-medium text-black-200 pb-7">Billing Address</h3>
                        <div class="countery-box border-blue-5  rounded ">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="flex-col">
                                    <p class="text-black-200 mb-4 text-lg"> Country<span class="text-blue-800">*</span> </p>
                                    <select class="w-full bg-white text-gray-500">
                                        <option data-display="New York, USA">New York, USA</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Indonesia</option>
                                        <option value="3">Pakistan</option>
                                        <option value="4">Brazil</option>
                                    </select>
                                </div>
                                <div class="flex-col">
                                    <p class="text-black-200 mb-4 text-lg"> Phone <span class="text-blue-800">*</span></p>
                                    <input
                                        class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                        type="text" placeholder="Username">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method mt-10 ">
                        <h3 class="text-2xl font-medium text-black-200 pb-7">Payment Method</h3>



                        <div class="check-box-area border p-5  rounded-md ">
                            <nav class="tabs  ">
                                <button data-target="panel-1" class="tab ml-7 chek-box  relative mb-3 text-black-200 flex items-center gap-2 ">

                                    Pay with Paypal
                                </button><button data-target="panel-2" class="tab ml-7 chek-box relative  mb-3 text-black-200  flex items-center gap-2">

                                    Pay with Credit Card/ Debit Card
                                </button><button data-target="panel-3" class="tab ml-7 chek-box relative mb-3 text-black-200  flex items-center gap-2">

                                    Pay with Bank
                                </button>
                            </nav>
                        </div>

                        <div id="panels">
                            <div class="panel-1 tab-content py-5">
                                <div class="debit-card-box border p-5  rounded mt-5">
                                    <div class="grid md:grid-cols-2 gap-4 mt-5">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Card Number <span class="text-blue-800">*</span></p>
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
                                            <p class="text-black-200 mb-4 text-lg"> Expiration Month <span class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="date">
                                        </div>
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Expiration Year <span class="text-blue-800">*</span>
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
                                            <p class="text-black-200 mb-4 text-lg"> Name <span class="text-blue-800">*</span></p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="text" placeholder="Type Bank name">
                                        </div>
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Account Number <span class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="number" placeholder="1254 5651 4568 554">
                                        </div>
                                    </div>
                                    <div class="deposit-box mt-5">
                                        <div class="grid md:grid-cols-2 gap-4 ">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Deposit By <span class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="text" placeholder="Smith Done">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="file">
                                            </div>
                                        </div>
                                        <p class="text-gray-800 mt-5"> We protect your payment information using encryption to provide
                                            bank-level security. </p>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-2 tab-content py-5">
                                <div class="debit-card-box border p-5  rounded mt-5">

                                    <div class="grid md:grid-cols-2 gap-4 mt-5">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Card Number <span class="text-blue-800">*</span></p>
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
                                            <p class="text-black-200 mb-4 text-lg"> Expiration Month <span class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="date">
                                        </div>
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Expiration Year <span class="text-blue-800">*</span>
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
                                            <p class="text-black-200 mb-4 text-lg"> Name <span class="text-blue-800">*</span></p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="text" placeholder="Type Bank name">
                                        </div>
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Account Number <span class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="number" placeholder="1254 5651 4568 554">
                                        </div>
                                    </div>
                                    <div class="deposit-box mt-5">
                                        <div class="grid md:grid-cols-2 gap-4 ">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Deposit By <span class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="text" placeholder="Smith Done">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="file">
                                            </div>
                                        </div>
                                        <p class="text-gray-800 mt-5"> We protect your payment information using encryption to provide
                                            bank-level security. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-3 tab-content py-5">
                                <div class="debit-card-box border p-5  rounded mt-5">

                                    <div class="grid md:grid-cols-2 gap-4 mt-5">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Card Number <span class="text-blue-800">*</span></p>
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
                                            <p class="text-black-200 mb-4 text-lg"> Expiration Month <span class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="date">
                                        </div>
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Expiration Year <span class="text-blue-800">*</span>
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
                                            <p class="text-black-200 mb-4 text-lg"> Name <span class="text-blue-800">*</span></p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="text" placeholder="Type Bank name">
                                        </div>
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Account Number <span class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                type="number" placeholder="1254 5651 4568 554">
                                        </div>
                                    </div>
                                    <div class="deposit-box mt-5">
                                        <div class="grid md:grid-cols-2 gap-4 ">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Deposit By <span class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="text" placeholder="Smith Done">
                                            </div>
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg"> Deposit Slip <span class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2 px-3 bg-white  text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    type="file">
                                            </div>
                                        </div>
                                        <p class="text-gray-800 mt-5"> We protect your payment information using encryption to provide
                                            bank-level security. </p>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
                <div class="col-span-4">
                    <div class="billing-summery-box p-8 shadow-4xl">
                        <h3 class="text-2xl font-medium text-black-200 pb-7 mb-7">Billing Summery</h3>
                        <div class="item-info flex justify-between mb-6">
                            <p class="text-gray-800">Original price:</p>
                            <p>$ 100.00</p>
                        </div>
                        <div class="item-info flex justify-between mb-6 border-b pb-6">
                            <p class="text-gray-800">Original price:</p>
                            <p><del>$ 100.00</del> </p>
                        </div>
                        <div class="item-info flex justify-between mb-6 border-b pb-4">
                            <p class="text-gray-800">Total:</p>
                            <p class="text-2xl font-medium">$ 39.99</p>
                        </div>
                        <div class="item-check-box">
                            <div class="flex">
                                <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 flex items-center justify-center text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                                 ">
                                <label for="bordered-checkbox-1" class="ml-3"> Please check to acknowledge our Privacy &
                                    Terms Policy </label>
                            </div>
                        </div>
                        <div class="item-button">
                            <a class="bg-blue-600 py-3 w-full  text-center block mt-6 text-white font-medium rounded hover:bg-black-200 transition duration-500"
                               href="#">Pay $39.99</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== villing address Area End =============================  -->
@endsection
