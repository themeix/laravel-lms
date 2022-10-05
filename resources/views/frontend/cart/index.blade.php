@extends('layouts.frontEndMaster')
@section('title','Dashboard')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
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
            <div class="lg:grid lg:grid-cols-12 flex flex-col gap-8">
                <div class="col-span-9">
                    <div class="shoppin-card-box-all shadow-4xl p-10 bg-white">
                        <h3 class="text-2xl font-medium text-black-200 pb-7  border-b">1 Course in Cart</h3>
                        <div class="lg:grid lg:grid-cols-12  lg:gap-12 flex flex-col mt-7 gap-8">
                            <div class="col-span-8">
                                <div class="shopping-cart-box ">
                                    <div class="couses-box">
                                        <div class="lg:flex  gap-4 ">
                                            <div class="flex-col">
                                                <a href="course.html"> <img class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
                                                                            src="{{asset('frontend/assets/images/shopping-cart.webp')}}" alt="images"></a>

                                            </div>
                                            <div class="flex-col">
                                                <h4 class="text-black-200 font-medium mb-4"> <a class="hover:text-blue-600" href="course.html">Learn Figma - UI/UX Design Essential
                                                        TrainingLearn</a>  </h4>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-span-4">
                                <div class="flex justify-between">
                                    <div class="flex-col">
                                        <p class="font-medium text-black-200 mb-10">Price</p>
                                        <p class="text-gray-800">$ 39.99</p>
                                    </div>
                                    <div class="flex-col">
                                        <p class="font-medium text-black-200 mb-10"> Remove </p>
                                        <p>
                                            <a href="">
                                                <svg class="m-auto" width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.90039 2.6V2.8H10.1004V2.6C10.1004 2.17565 9.93182 1.76869 9.63176 1.46863C9.3317 1.16857 8.92474 1 8.50039 1C8.07604 1 7.66908 1.16857 7.36902 1.46863C7.06896 1.76869 6.90039 2.17565 6.90039 2.6ZM5.90039 2.8V2.6C5.90039 1.91044 6.17432 1.24912 6.66191 0.761522C7.14951 0.273928 7.81083 0 8.50039 0C9.18995 0 9.85127 0.273928 10.3389 0.761522C10.8265 1.24912 11.1004 1.91044 11.1004 2.6V2.8H15.6004C15.733 2.8 15.8602 2.85268 15.9539 2.94645C16.0477 3.04021 16.1004 3.16739 16.1004 3.3C16.1004 3.43261 16.0477 3.55979 15.9539 3.65355C15.8602 3.74732 15.733 3.8 15.6004 3.8H14.4336L13.6336 13.3424C13.5728 14.067 13.242 14.7424 12.7067 15.2346C12.1714 15.7269 11.4708 16 10.7436 16H6.25719C5.53007 15.9999 4.8295 15.7267 4.29431 15.2345C3.75912 14.7423 3.42837 14.067 3.36759 13.3424L2.56759 3.8H1.40039C1.26778 3.8 1.14061 3.74732 1.04684 3.65355C0.953069 3.55979 0.900391 3.43261 0.900391 3.3C0.900391 3.16739 0.953069 3.04021 1.04684 2.94645C1.14061 2.85268 1.26778 2.8 1.40039 2.8H5.90039ZM7.50039 6.5C7.50039 6.43434 7.48746 6.36932 7.46233 6.30866C7.4372 6.248 7.40037 6.19288 7.35394 6.14645C7.30752 6.10002 7.25239 6.06319 7.19173 6.03806C7.13107 6.01293 7.06605 6 7.00039 6C6.93473 6 6.86971 6.01293 6.80905 6.03806C6.74839 6.06319 6.69327 6.10002 6.64684 6.14645C6.60041 6.19288 6.56358 6.248 6.53845 6.30866C6.51332 6.36932 6.50039 6.43434 6.50039 6.5V12.3C6.50039 12.3657 6.51332 12.4307 6.53845 12.4913C6.56358 12.552 6.60041 12.6071 6.64684 12.6536C6.69327 12.7 6.74839 12.7368 6.80905 12.7619C6.86971 12.7871 6.93473 12.8 7.00039 12.8C7.06605 12.8 7.13107 12.7871 7.19173 12.7619C7.25239 12.7368 7.30752 12.7 7.35394 12.6536C7.40037 12.6071 7.4372 12.552 7.46233 12.4913C7.48746 12.4307 7.50039 12.3657 7.50039 12.3V6.5ZM10.0004 6C9.72439 6 9.50039 6.224 9.50039 6.5V12.3C9.50039 12.4326 9.55307 12.5598 9.64684 12.6536C9.74061 12.7473 9.86778 12.8 10.0004 12.8C10.133 12.8 10.2602 12.7473 10.3539 12.6536C10.4477 12.5598 10.5004 12.4326 10.5004 12.3V6.5C10.5004 6.224 10.2764 6 10.0004 6Z"
                                                        fill="#757F8F" />
                                                </svg>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="coupon-code-box mt-6">
                            <form action="#">
                                <div class="forms-box flex gap-3">
                                    <input
                                        class=" appearance-none border-blue-50 border py-3 px-4 rounded placeholder-blue-50 outline-blue-600"
                                        type="text" placeholder="Coupon Code">
                                    <button
                                        class=" py-3 px-4 inline-block hover:bg-black-200 rounded bg-blue-600 text-white transition duration-500"
                                        type="button">Apply</button>
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
                                <p class="">items (1) :</p>
                            </div>
                            <div class="flex-col">
                                <p class="">$ 39.99</p>
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
                                <p class=" text-2xl font-medium text-black-200">$ 39.99</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="flex-col">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            </div>
                            <div class="flex-col">
                                <p class="text-gray-800"> with our company <a class="text-blue-600" href="#">privacy
                                        policy</a> and conditions of use. </p>
                            </div>
                        </div>
                        <div class="order-button mt-6">
                            <a class="py-3 w-full mb-4 bg-blue-600 text-white block text-center px-6 rounded-md text-lg font-medium transition duration-500 hover:text-black-200 hover:bg-blue-100"
                               href="checkout.html">Checkout</a>
                            <a class="py-3 w-full mb-4 hover:bg-blue-600 hover:text-white block text-center px-6 rounded-md text-lg font-medium transition duration-500 text-black-200 bg-blue-100"
                               href="#">Cancel Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== Shopping Cart  Area End =============================  -->
    <!--  ====================== More Courses  Area Start =============================  -->
    <section class="more-courses-area py-20 xl:py-28">
        <div class="container">
            <div class="section-title">
                <h3 class="font-medium text-black-200 text-3xl">You might also like </h3>
            </div>
            <div class="relative">
                <div class="courses-slider-box mt-10">
                    <div class="lessons-item group hover:-translate-y-2 duration-500" data-aos="fade-up"
                         data-aos-delay="300">
                        <div class="lessons-images relative overflow-hidden">
                            <a href="course.html">
                                <img class="rounded-t-md max-h-64 w-full object-cover" src="{{asset('frontend/assets/images/webdesign-1.webp')}}"
                                     alt="images">
                            </a>
                            <div class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                            </div>
                            <div
                                class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                <ul class="inline-flex items-cente flex-wrap">
                                    <li>
                                        <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://www.facebook.com/">
                                            <svg class="  group-hover:text-white " width=" 10" height="14" viewBox="0 0 10 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="http://twitter.com/">
                                            <svg class=" group-hover:text-white " width="18" height="14" viewBox="0 0 18 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://pinterest.com/">
                                            <svg class=" group-hover:text-white " width="14" height="14" viewBox="0 0 14 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                      fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                            <div class="name-box flex justify-between">
                                <a class="hover:text-blue-600" href="author.html">Albert Flores</a>

                                <span class="text-blue-50">12 July, 2022</span>
                            </div>
                            <h3 class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                <a href="course.html">3 Quick Tricks to Boost Customer Retention</a>
                            </h3>
                            <div class="reviews-box flex justify-between pt-5">
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                                        fill="#757F8F"></path>
                                    <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F"></rect>
                                 </svg>
                              </span>
                                    <p>1 hour 20 min</p>
                                </div>
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7903 5.63406L11.754 4.90408L9.50265 0.352135C9.44116 0.227506 9.34 0.126615 9.21504 0.0652895C8.90163 -0.0890138 8.52078 0.0395723 8.36408 0.352135L6.11271 4.90408L1.0764 5.63406C0.937548 5.65384 0.810599 5.71912 0.713403 5.81803C0.595899 5.93848 0.531149 6.10053 0.533381 6.26856C0.535613 6.4366 0.604643 6.59688 0.725305 6.71418L4.36914 10.2572L3.50827 15.2602C3.48808 15.3766 3.501 15.4963 3.54555 15.6057C3.5901 15.7151 3.6645 15.8099 3.76032 15.8793C3.85614 15.9488 3.96955 15.99 4.08767 15.9984C4.2058 16.0068 4.32393 15.982 4.42865 15.9269L8.93337 13.5648L13.4381 15.9269C13.5611 15.9922 13.7039 16.0139 13.8407 15.9902C14.1859 15.9308 14.418 15.6044 14.3585 15.2602L13.4976 10.2572L17.1414 6.71418C17.2406 6.61724 17.3061 6.49064 17.3259 6.35216C17.3795 6.00597 17.1375 5.68549 16.7903 5.63406Z"
                                        fill="#FFD102"></path>
                                 </svg>
                              </span>
                                    <p>5.0 (80 Reviews)</p>
                                </div>
                            </div>
                            <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="cart.html">Add to Cart</a>
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="checkout.html">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="lessons-item group hover:-translate-y-2 duration-500" data-aos="fade-up"
                         data-aos-delay="600">
                        <div class="lessons-images relative overflow-hidden">
                            <a href="course.html">
                                <img class="rounded-t-md max-h-64 w-full object-cover" src="{{asset('frontend/assets/images/webdesign-2.webp')}}"
                                     alt="images">
                            </a>
                            <div class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                            </div>
                            <div
                                class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                <ul class="inline-flex items-cente flex-wrap">
                                    <li>
                                        <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://www.facebook.com/">
                                            <svg class="  group-hover:text-white " width=" 10" height="14" viewBox="0 0 10 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="http://twitter.com/">
                                            <svg class=" group-hover:text-white " width="18" height="14" viewBox="0 0 18 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://pinterest.com/">
                                            <svg class=" group-hover:text-white " width="14" height="14" viewBox="0 0 14 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                      fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                            <div class="name-box flex justify-between">
                                <a class="hover:text-blue-600" href="author.html">Jacob Jones</a>
                                <span class="text-blue-50">12 July, 2022</span>
                            </div>
                            <h3 class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                <a href="course.html">Psychology in Web Design: How to Use it Right</a>
                            </h3>
                            <div class="reviews-box flex justify-between pt-5">
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                                        fill="#757F8F"></path>
                                    <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F"></rect>
                                 </svg>
                              </span>
                                    <p>1 hour 20 min</p>
                                </div>
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7903 5.63406L11.754 4.90408L9.50265 0.352135C9.44116 0.227506 9.34 0.126615 9.21504 0.0652895C8.90163 -0.0890138 8.52078 0.0395723 8.36408 0.352135L6.11271 4.90408L1.0764 5.63406C0.937548 5.65384 0.810599 5.71912 0.713403 5.81803C0.595899 5.93848 0.531149 6.10053 0.533381 6.26856C0.535613 6.4366 0.604643 6.59688 0.725305 6.71418L4.36914 10.2572L3.50827 15.2602C3.48808 15.3766 3.501 15.4963 3.54555 15.6057C3.5901 15.7151 3.6645 15.8099 3.76032 15.8793C3.85614 15.9488 3.96955 15.99 4.08767 15.9984C4.2058 16.0068 4.32393 15.982 4.42865 15.9269L8.93337 13.5648L13.4381 15.9269C13.5611 15.9922 13.7039 16.0139 13.8407 15.9902C14.1859 15.9308 14.418 15.6044 14.3585 15.2602L13.4976 10.2572L17.1414 6.71418C17.2406 6.61724 17.3061 6.49064 17.3259 6.35216C17.3795 6.00597 17.1375 5.68549 16.7903 5.63406Z"
                                        fill="#FFD102"></path>
                                 </svg>
                              </span>
                                    <p>5.0 (80 Reviews)</p>
                                </div>
                            </div>
                            <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="cart.html">Add to Cart</a>
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="checkout.html">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="lessons-item group hover:-translate-y-2 duration-500" data-aos="fade-up"
                         data-aos-delay="900">
                        <div class="lessons-images relative overflow-hidden">
                            <a href="course.html">
                                <img class="rounded-t-md max-h-64 w-full object-cover" src="{{asset('frontend/assets/images/webdesign-3.webp')}}"
                                     alt="images">
                            </a>
                            <div class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                            </div>
                            <div
                                class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                <ul class="inline-flex items-cente flex-wrap">
                                    <li>
                                        <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://www.facebook.com/">
                                            <svg class="  group-hover:text-white " width=" 10" height="14" viewBox="0 0 10 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="http://twitter.com/">
                                            <svg class=" group-hover:text-white " width="18" height="14" viewBox="0 0 18 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://pinterest.com/">
                                            <svg class=" group-hover:text-white " width="14" height="14" viewBox="0 0 14 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                      fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                            <div class="name-box flex justify-between">
                                <a class="hover:text-blue-600" href="author.html">Kathryn Murphy</a>
                                <span class="text-blue-50">12 July, 2022</span>
                            </div>
                            <h3 class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                <a href="course.html">How to Get Started With UX Research</a>
                            </h3>
                            <div class="reviews-box flex justify-between pt-5">
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                                        fill="#757F8F"></path>
                                    <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F"></rect>
                                 </svg>
                              </span>
                                    <p>1 hour 20 min</p>
                                </div>
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7903 5.63406L11.754 4.90408L9.50265 0.352135C9.44116 0.227506 9.34 0.126615 9.21504 0.0652895C8.90163 -0.0890138 8.52078 0.0395723 8.36408 0.352135L6.11271 4.90408L1.0764 5.63406C0.937548 5.65384 0.810599 5.71912 0.713403 5.81803C0.595899 5.93848 0.531149 6.10053 0.533381 6.26856C0.535613 6.4366 0.604643 6.59688 0.725305 6.71418L4.36914 10.2572L3.50827 15.2602C3.48808 15.3766 3.501 15.4963 3.54555 15.6057C3.5901 15.7151 3.6645 15.8099 3.76032 15.8793C3.85614 15.9488 3.96955 15.99 4.08767 15.9984C4.2058 16.0068 4.32393 15.982 4.42865 15.9269L8.93337 13.5648L13.4381 15.9269C13.5611 15.9922 13.7039 16.0139 13.8407 15.9902C14.1859 15.9308 14.418 15.6044 14.3585 15.2602L13.4976 10.2572L17.1414 6.71418C17.2406 6.61724 17.3061 6.49064 17.3259 6.35216C17.3795 6.00597 17.1375 5.68549 16.7903 5.63406Z"
                                        fill="#FFD102"></path>
                                 </svg>
                              </span>
                                    <p>5.0 (80 Reviews)</p>
                                </div>
                            </div>
                            <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="cart.html">Add to Cart</a>
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="checkout.html">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="lessons-item group hover:-translate-y-2 duration-500" data-aos="fade-up"
                         data-aos-delay="1200">
                        <div class="lessons-images relative overflow-hidden">
                            <a href="course.html">
                                <img class="rounded-t-md max-h-64 w-full object-cover" src="{{asset('frontend/assets/images/webdesign-4.webp')}}"
                                     alt="images">
                            </a>
                            <div class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                            </div>
                            <div
                                class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                <ul class="inline-flex items-cente flex-wrap">
                                    <li>
                                        <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://www.facebook.com/">
                                            <svg class="  group-hover:text-white " width=" 10" height="14" viewBox="0 0 10 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="http://twitter.com/">
                                            <svg class=" group-hover:text-white " width="18" height="14" viewBox="0 0 18 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                    fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                           href="https://pinterest.com/">
                                            <svg class=" group-hover:text-white " width="14" height="14" viewBox="0 0 14 14"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                      fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                            <div class="name-box flex justify-between">
                                <a class="hover:text-blue-600" href="author.html">Jerome Bell</a>
                                <span class="text-blue-50">12 July, 2022</span>
                            </div>
                            <h3 class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                <a href="course.html">How to Kickstart Your UX Career in 2022</a>
                            </h3>
                            <div class="reviews-box flex justify-between pt-5">
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                                        fill="#757F8F"></path>
                                    <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F"></rect>
                                 </svg>
                              </span>
                                    <p>1 hour 20 min</p>
                                </div>
                                <div class="flex items-center">
                              <span class="mr-2">
                                 <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7903 5.63406L11.754 4.90408L9.50265 0.352135C9.44116 0.227506 9.34 0.126615 9.21504 0.0652895C8.90163 -0.0890138 8.52078 0.0395723 8.36408 0.352135L6.11271 4.90408L1.0764 5.63406C0.937548 5.65384 0.810599 5.71912 0.713403 5.81803C0.595899 5.93848 0.531149 6.10053 0.533381 6.26856C0.535613 6.4366 0.604643 6.59688 0.725305 6.71418L4.36914 10.2572L3.50827 15.2602C3.48808 15.3766 3.501 15.4963 3.54555 15.6057C3.5901 15.7151 3.6645 15.8099 3.76032 15.8793C3.85614 15.9488 3.96955 15.99 4.08767 15.9984C4.2058 16.0068 4.32393 15.982 4.42865 15.9269L8.93337 13.5648L13.4381 15.9269C13.5611 15.9922 13.7039 16.0139 13.8407 15.9902C14.1859 15.9308 14.418 15.6044 14.3585 15.2602L13.4976 10.2572L17.1414 6.71418C17.2406 6.61724 17.3061 6.49064 17.3259 6.35216C17.3795 6.00597 17.1375 5.68549 16.7903 5.63406Z"
                                        fill="#FFD102"></path>
                                 </svg>
                              </span>
                                    <p>5.0 (80 Reviews)</p>
                                </div>
                            </div>
                            <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="cart.html">Add to Cart</a>
                                <a class="border-blue-20  border inline-block py-2.5 px-5 rounded   hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="checkout.html">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-arrows hidden xl:block">
                    <button
                        class="slider-prev group  h-12 w-12 rounded-full bg-blue-5 hover:bg-blue-600 transition duration-500 flex items-center justify-center">
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="group-hover:fill-white"
                                  d="M0.292892 8.70711C-0.0976315 8.31658 -0.0976315 7.68342 0.292892 7.29289L6.65685 0.928932C7.04738 0.538408 7.68054 0.538408 8.07107 0.928932C8.46159 1.31946 8.46159 1.95262 8.07107 2.34315L2.41421 8L8.07107 13.6569C8.46159 14.0474 8.46159 14.6805 8.07107 15.0711C7.68054 15.4616 7.04738 15.4616 6.65685 15.0711L0.292892 8.70711ZM21 9H1V7H21V9Z"
                                  fill="
                           #035AE0" />
                        </svg>
                    </button>
                    <button
                        class="slider-next h-12 w-12 rounded-full bg-blue-5 hover:bg-blue-600 transition duration-500 group flex items-center justify-center">
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class=" group-hover:fill-white"
                                  d="M20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM0 9H20V7H0V9Z"
                                  fill="
                           #035AE0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== More Courses  Area End =============================  -->
    <!--  ====================== Newsleter  Area Start =============================  -->
    <section class="newsleter-area  relative  md:my-32">
        <div class="container">
            <div class="grid lg:grid-cols-12 bg-blue-600 md:p-16 p-8 rounded-xl relative">
                <div class="md:col-span-8">
                    <div class="newsleter-left lg:w-10/12">
                        <h2 class="xl:text-5xl mb-4 lg:text-4xl md:text-3xl text-2xl font-medium text-white  "> Subscribe
                            to newsletter </h2>
                        <p class="text-white">Produce following as be didn't sitting on appeared not he is he upper work
                            spread observed, hung spot. </p>
                        <form>
                            <div class=" md:w-10/12 relative mt-5">
                                <input type="email"
                                       class="block py-6 pl-5  pr-37.5   w-full  text-base  bg-white rounded-full border  border-blue-100  focus:border-white placeholder-gray-600 outline-none duration-300"
                                       placeholder="Enter your email" required="">
                                <button type="submit"
                                        class=" absolute top-2.25 right-2 bg-blue-600 text-base text-white font-medium  hover:bg-blue-5 hover:text-black-200  transition-all duration-300 rounded-full   outline-none px-8 py-4  ">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="md:col-span-4 hidden lg:block">
                    <div class="cta-shape-images absolute">
                        <img src="{{asset('frontend/assets/images/shape-images.png')}}" alt="images">
                    </div>
                    <div class="newletter-man absolute bottom-0 right-0">
                        <img src="{{asset('frontend/assets/images/cta-man.png')}}" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== Newsleter  Area End =============================  -->
@endsection
