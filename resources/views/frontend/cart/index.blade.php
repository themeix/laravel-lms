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
                        data-aos-delay="100">Cart</h2>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
        <!--  ====================== Breadcrum  Area End =============================  -->
        <!--  ====================== Shopping Cart  Area Start =============================  -->
        <section class="shopping-cart-hero-area md:mt-32 mt-20 pb-20">
            <div class="container">
                <div class=" lg:grid-cols-12 flex flex-col gap-8">
                    <div class="col-span-12">

                        <div class="shoppin-card-box-all shadow-4xl p-6 mb-4 bg-white"
                             style="border: 1px solid #e5e7eb">
                            <h3 class="text-2xl font-medium text-black-200 pb-7 ml-6 mt-6  border-b">{{ $quantity }} Courses in
                                Cart</h3>
                            @foreach($carts as $cart)

                                <div class="lg:grid lg:grid-cols-12  lg:gap-12 flex flex-col mb-6 mt-6 ml-6  gap-8">
                                    <div class="col-span-4">
                                        <div class="shopping-cart-box ">
                                            <div class="couses-box">
                                                <div class="lg:flex  gap-4 ">
                                                    <div class="flex-col">
                                                        <a href="course.html"> <img
                                                                class="max-h-20 object-cover max-w-30 rounded mb-3 lg:mb-0"
                                                                src="{{asset('frontend/assets/images/shopping-cart.webp')}}"
                                                                alt="images"></a>

                                                    </div>
                                                    <div class="flex-col">
                                                        <h4 class="text-black-200 font-medium mb-4"><a
                                                                class="hover:text-blue-600" href="course.html">

                                                                {{ $cart->course->title }}
                                                            </a></h4>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-span-4" style="justify-content: center">
                                        <div class="flex justify-between">
                                            <div class="flex-col">
                                                <p class="text-gray-800 mb-6">$ {{$cart->course->price}}</p>

                                                <p>
                                                    <a href="{{ route('main.cartDelete', $cart->id) }}"
                                                       class="confirm-delete">
                                                        <img
                                                            src="{{asset('frontend/custom/image/icons8-remove-48.png')}}"
                                                            width="35px" height="35px" alt="images">
                                                    </a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-span-4" style="margin-bottom: auto; margin-top: auto;">
                                        <form action="#">
                                            <div class="forms-box flex gap-3">
                                                <input
                                                    class=" appearance-none border-blue-50 border py-2 px-4 rounded placeholder-blue-50 outline-blue-600"
                                                    type="text" placeholder="Coupon Code">
                                                <button
                                                    class=" py-2 px-4 inline-block hover:bg-black-200 rounded bg-blue-600 text-white transition duration-500"
                                                    type="button">Apply
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 mb-6">
                                    <hr/>
                                </div>

                            @endforeach
                        </div>

                        <div class="col-span-3">
                            <div class="order-summery shadow-4xl p-10 bg-white">
                                <h3 class="text-2xl font-medium text-black-200 mb-4">Order summery</h3>
                                <div class="flex justify-between mb-4">
                                    <div class="flex-col">
                                        <p class="">Items ({{@$quantity}}) :</p>
                                    </div>
                                    <div class="flex-col">
                                        <p class="">$ {{$cart->course->price}}</p>
                                    </div>
                                </div>
                                <div class="flex justify-between mb-4 border-b pb-4">
                                    <div class="flex-col">
                                        <p class="">Discount 58% off:</p>
                                    </div>
                                    <div class="flex-col">
                                        <p class="">
                                            <del>$ 100.00</del>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex justify-between mb-4 border-b pb-4">
                                    <div class="flex-col">
                                        <p class="text-black-200 text-lg ">Total:</p>
                                    </div>
                                    <div class="flex-col">
                                        <p class=" text-2xl font-medium text-black-200">$ {{ $total }}</p>
                                    </div>
                                </div>
                                <div class="order-button mt-6" style="text-align: right;">
                                    <a class="py-3 w-full mb-4 bg-blue-600 text-white text-center px-6 rounded-md text-lg font-medium transition duration-500 hover:bg-black-200" href="{{ route('main.checkout') }}">
                                        Checkout
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    @else
        <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
            <div class="container">
                <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200   font-medium"
                        data-aos="fade-up"
                        data-aos-delay="100" style="color: #FF5733!important;">No Items in Cart</h2>
                    <br>
                    <h6>Please Add Course in your Cart</h6>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
    @endif
    <!--  ====================== Shopping Cart  Area End =============================  -->

@endsection


