@extends('layouts.frontEndMaster')
@section('title','Cart')
@section('content')

    @if(sizeof($carts)>0)
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
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
                <div class="lg:grid lg:grid-cols-12 flex flex-col gap-8">
                    <div class="col-span-9">
                        <div class="shoppin-card-box-all shadow-4xl p-10 bg-white">
                            <h3 class="text-2xl font-medium text-black-200 pb-7  border-b">{{ $quantity }} Course in
                                Cart</h3>

                            @foreach($carts as $cart)
                                <div class="lg:grid lg:grid-cols-12  lg:gap-12 flex flex-col mt-7 gap-8">
                                    <div class="col-span-8">
                                        <div class="shopping-cart-box ">
                                            <div class="couses-box">
                                                <div class="lg:flex  gap-4 ">
                                                    <div class="flex-col">
                                                        <a href="course.html"> <img
                                                                class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
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
                                    <div class="col-span-4">
                                        <div class="flex justify-between">
                                            <div class="flex-col">
                                                <p class="font-medium text-black-200 mb-10">Price</p>
                                                <p class="text-gray-800">$ {{$cart->course->price}}</p>
                                            </div>
                                            <div class="flex-col">
                                                <p class="font-medium text-black-200 mb-10"> Action </p>
                                                <p>
                                                    <a href="{{ route('main.cartDelete', $cart->id) }}">
                                                        <svg class="m-auto" width="17" height="16" viewBox="0 0 17 16"
                                                             fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.90039 2.6V2.8H10.1004V2.6C10.1004 2.17565 9.93182 1.76869 9.63176 1.46863C9.3317 1.16857 8.92474 1 8.50039 1C8.07604 1 7.66908 1.16857 7.36902 1.46863C7.06896 1.76869 6.90039 2.17565 6.90039 2.6ZM5.90039 2.8V2.6C5.90039 1.91044 6.17432 1.24912 6.66191 0.761522C7.14951 0.273928 7.81083 0 8.50039 0C9.18995 0 9.85127 0.273928 10.3389 0.761522C10.8265 1.24912 11.1004 1.91044 11.1004 2.6V2.8H15.6004C15.733 2.8 15.8602 2.85268 15.9539 2.94645C16.0477 3.04021 16.1004 3.16739 16.1004 3.3C16.1004 3.43261 16.0477 3.55979 15.9539 3.65355C15.8602 3.74732 15.733 3.8 15.6004 3.8H14.4336L13.6336 13.3424C13.5728 14.067 13.242 14.7424 12.7067 15.2346C12.1714 15.7269 11.4708 16 10.7436 16H6.25719C5.53007 15.9999 4.8295 15.7267 4.29431 15.2345C3.75912 14.7423 3.42837 14.067 3.36759 13.3424L2.56759 3.8H1.40039C1.26778 3.8 1.14061 3.74732 1.04684 3.65355C0.953069 3.55979 0.900391 3.43261 0.900391 3.3C0.900391 3.16739 0.953069 3.04021 1.04684 2.94645C1.14061 2.85268 1.26778 2.8 1.40039 2.8H5.90039ZM7.50039 6.5C7.50039 6.43434 7.48746 6.36932 7.46233 6.30866C7.4372 6.248 7.40037 6.19288 7.35394 6.14645C7.30752 6.10002 7.25239 6.06319 7.19173 6.03806C7.13107 6.01293 7.06605 6 7.00039 6C6.93473 6 6.86971 6.01293 6.80905 6.03806C6.74839 6.06319 6.69327 6.10002 6.64684 6.14645C6.60041 6.19288 6.56358 6.248 6.53845 6.30866C6.51332 6.36932 6.50039 6.43434 6.50039 6.5V12.3C6.50039 12.3657 6.51332 12.4307 6.53845 12.4913C6.56358 12.552 6.60041 12.6071 6.64684 12.6536C6.69327 12.7 6.74839 12.7368 6.80905 12.7619C6.86971 12.7871 6.93473 12.8 7.00039 12.8C7.06605 12.8 7.13107 12.7871 7.19173 12.7619C7.25239 12.7368 7.30752 12.7 7.35394 12.6536C7.40037 12.6071 7.4372 12.552 7.46233 12.4913C7.48746 12.4307 7.50039 12.3657 7.50039 12.3V6.5ZM10.0004 6C9.72439 6 9.50039 6.224 9.50039 6.5V12.3C9.50039 12.4326 9.55307 12.5598 9.64684 12.6536C9.74061 12.7473 9.86778 12.8 10.0004 12.8C10.133 12.8 10.2602 12.7473 10.3539 12.6536C10.4477 12.5598 10.5004 12.4326 10.5004 12.3V6.5C10.5004 6.224 10.2764 6 10.0004 6Z"
                                                                fill="#757F8F"/>
                                                        </svg>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="coupon-code-box mt-6">
                                <form action="#">
                                    <div class="forms-box flex gap-3">
                                        <input
                                            class=" appearance-none border-blue-50 border py-3 px-4 rounded placeholder-blue-50 outline-blue-600"
                                            type="text" placeholder="Coupon Code">
                                        <button
                                            class=" py-3 px-4 inline-block hover:bg-black-200 rounded bg-blue-600 text-white transition duration-500"
                                            type="button">Apply
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
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
                            {{--<div class="flex gap-3">
                                <div class="flex-col">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" required>
                                </div>
                                <div class="flex-col">
                                    <p class="text-gray-800">Agree with our company <a class="text-blue-600" href="#">privacy
                                            policy</a> and conditions of use. </p>
                                </div>
                            </div>--}}
                            <div class="order-button mt-6">
                                <a class="py-3 w-full mb-4 bg-blue-600 text-white block text-center px-6 rounded-md text-lg font-medium transition duration-500 hover:bg-black-200"
                                   href="{{ route('main.checkout') }}">Checkout</a>

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
                    <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200   font-medium" data-aos="fade-up"
                        data-aos-delay="100" style="color: red !important;">No Items in Cart</h2>
                </div>
            </div>
            <div class="shape-breadcrumb absolute top-0 right-0">
                <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
            </div>
        </section>
    @endif
    <!--  ====================== Shopping Cart  Area End =============================  -->

@endsection
