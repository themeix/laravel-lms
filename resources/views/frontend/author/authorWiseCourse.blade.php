@extends('layouts.frontEndMaster')
@section('title','Dashboard')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
                    data-aos-delay="100">Author</h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-aos="fade-up" data-aos-delay="200">
                <li>
                    <a class="hover:text-blue-600 transition duration-500" href="index.html">Home </a>
                </li>
                <li>/</li>
                <li>
                    <a class="hover:text-blue-600 transition duration-500" href="#"> Author </a>
                </li>
            </ul>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>
    <!--  ====================== Breadcrum  Area End =============================  -->
    <!--  ====================== Hero-author  Area Start =============================  -->
    <div class="hero-author text-center relative md:-mt-20 -mt-16" data-aos="fade-up" data-aos-delay="300">
        <div class="container">
            <img class="w-32 h-32 rounded-full object-cover mx-auto mb-4" src="{{asset('frontend/assets/images/author/3.webp')}}" alt="image">
            <h5 class="font-serif md:text-3xl text-2xl text-black-200 font-medium ">Arlene McCoy</h5>
            <p class="text-base leading-relaxed font-normal">12 Courses published</p>
        </div>
    </div>
    <!--  ====================== Hero-author  Area End =============================  -->
    <!--  ====================== Author  Area Start =============================  -->
    <section class="author-area py-20 ">
        <div class="container mx-auto">
            <div class="tab-slider--nav border-b  mb-8 lg:mb-14">
                <ul class="tab-slider--tabs">
                    <li class="tab-slider--trigger text-xl  font-medium active" rel="tab1">All Courses (12) </li>
                    <li class="tab-slider--trigger text-xl font-medium" rel="tab2">About Me</li>
                    <li class="tab-slider--trigger text-xl  font-medium" rel="tab3">Activity</li>
                </ul>
            </div>
            <div class="tab-slider--container">
                <div id="tab1" class="tab-slider--body">
                    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6 w-full">
                        <div class="lessons-item group hover:-translate-y-2 duration-500" data-aos="fade-up"
                             data-aos-delay="300">
                            <div class="lessons-images relative overflow-hidden">
                                <a href="course.html">
                                    <img class="rounded-t-md max-h-64 w-full object-cover"
                                         src="{{asset('frontend/assets/images/webdesign-1.webp')}}" alt="images">
                                </a>
                                <div
                                    class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                                </div>
                                <div
                                    class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                    <ul class="inline-flex items-cente flex-wrap">
                                        <li>
                                            <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://www.facebook.com/">
                                                <svg class=" text-gray-400 group-hover:text-white " width=" 10"
                                                     height="14" viewBox="0 0 10 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="http://twitter.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="18"
                                                     height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://pinterest.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="14"
                                                     height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                          fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                                <div class="name-box flex justify-between">
                                    <span class="text-blue-50">Albert Flores</span>
                                    <span class="text-blue-50">12 July, 2022</span>
                                </div>
                                <h3
                                    class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
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
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F">
                                                </rect>
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
                                    <img class="rounded-t-md max-h-64 w-full object-cover"
                                         src="{{asset('frontend/assets/images/webdesign-2.webp')}}" alt="images">
                                </a>
                                <div
                                    class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                                </div>
                                <div
                                    class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                    <ul class="inline-flex items-cente flex-wrap">
                                        <li>
                                            <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://www.facebook.com/">
                                                <svg class=" text-gray-400 group-hover:text-white " width=" 10"
                                                     height="14" viewBox="0 0 10 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="http://twitter.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="18"
                                                     height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://pinterest.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="14"
                                                     height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                          fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                                <div class="name-box flex justify-between">
                                    <span class="text-blue-50">Jacob Jones</span>
                                    <span class="text-blue-50">12 July, 2022</span>
                                </div>
                                <h3
                                    class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
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
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F">
                                                </rect>
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
                                    <img class="rounded-t-md max-h-64 w-full object-cover"
                                         src="{{asset('frontend/assets/images/webdesign-3.webp')}}" alt="images">
                                </a>
                                <div
                                    class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                                </div>
                                <div
                                    class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                    <ul class="inline-flex items-cente flex-wrap">
                                        <li>
                                            <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://www.facebook.com/">
                                                <svg class=" text-gray-400 group-hover:text-white " width=" 10"
                                                     height="14" viewBox="0 0 10 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="http://twitter.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="18"
                                                     height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://pinterest.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="14"
                                                     height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                          fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                                <div class="name-box flex justify-between">
                                    <span class="text-blue-50">Kathryn Murphy</span>
                                    <span class="text-blue-50">12 July, 2022</span>
                                </div>
                                <h3
                                    class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
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
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F">
                                                </rect>
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
                                    <img class="rounded-t-md max-h-64 w-full object-cover"
                                         src="{{asset('frontend/assets/images/webdesign-4.webp')}}" alt="images">
                                </a>
                                <div
                                    class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                                </div>
                                <div
                                    class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                    <ul class="inline-flex items-cente flex-wrap">
                                        <li>
                                            <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://www.facebook.com/">
                                                <svg class=" text-gray-400 group-hover:text-white " width=" 10"
                                                     height="14" viewBox="0 0 10 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="http://twitter.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="18"
                                                     height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://pinterest.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="14"
                                                     height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                          fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                                <div class="name-box flex justify-between">
                                    <span class="text-blue-50">Jerome Bell</span>
                                    <span class="text-blue-50">12 July, 2022</span>
                                </div>
                                <h3
                                    class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
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
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F">
                                                </rect>
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
                             data-aos-delay="1500">
                            <div class="lessons-images relative overflow-hidden">
                                <a href="course.html">
                                    <img class="rounded-t-md max-h-64 w-full object-cover"
                                         src="{{asset('frontend/assets/images/webdesign-5.webp')}}" alt="images">
                                </a>
                                <div
                                    class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                                </div>
                                <div
                                    class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                    <ul class="inline-flex items-cente flex-wrap">
                                        <li>
                                            <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://www.facebook.com/">
                                                <svg class=" text-gray-400 group-hover:text-white " width=" 10"
                                                     height="14" viewBox="0 0 10 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="http://twitter.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="18"
                                                     height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://pinterest.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="14"
                                                     height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                          fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                                <div class="name-box flex justify-between">
                                    <span class="text-blue-50">Kristin Watson</span>
                                    <span class="text-blue-50">12 July, 2022</span>
                                </div>
                                <h3
                                    class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                    <a href="course.html">Photoshop Master Course: From Beginner</a>
                                </h3>
                                <div class="reviews-box flex justify-between pt-5">
                                    <div class="flex items-center">
                                        <span class="mr-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                                                    fill="#757F8F"></path>
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F">
                                                </rect>
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
                             data-aos-delay="1800">
                            <div class="lessons-images relative overflow-hidden">
                                <a href="course.html">
                                    <img class="rounded-t-md max-h-64 w-full object-cover"
                                         src="{{asset('frontend/assets/images/webdesign-6.webp')}}" alt="images">
                                </a>
                                <div
                                    class="  overlay-images rounded-t-xl   absolute top-0 w-full h-full bg-blue-5 left-0">
                                </div>
                                <div
                                    class="absolute group-hover:bottom-2 -bottom-28 -right-4 inline-block text-base text-white font-medium bg-size-200 bg-pos-0 hover:bg-pos-100 transition-all duration-300 py-2 px-6">
                                    <ul class="inline-flex items-cente flex-wrap">
                                        <li>
                                            <a class="group bg-facebook-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://www.facebook.com/">
                                                <svg class=" text-gray-400 group-hover:text-white " width=" 10"
                                                     height="14" viewBox="0 0 10 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.27638 0.393359C9.27638 0.290253 9.23542 0.19137 9.16251 0.118463C9.08961 0.0455561 8.99072 0.00459735 8.88762 0.00459735H6.94381C5.96501 -0.0441604 5.00669 0.296473 4.27825 0.95207C3.54981 1.60767 3.11046 2.52493 3.0562 3.50345V5.60276H1.11239C1.00929 5.60276 0.910405 5.64372 0.837498 5.71662C0.764592 5.78953 0.723633 5.88841 0.723633 5.99152V8.01308C0.723633 8.11618 0.764592 8.21507 0.837498 8.28797C0.910405 8.36088 1.00929 8.40184 1.11239 8.40184H3.0562V13.6112C3.0562 13.7143 3.09716 13.8132 3.17006 13.8861C3.24297 13.959 3.34186 14 3.44496 14H5.77753C5.88063 14 5.97952 13.959 6.05242 13.8861C6.12533 13.8132 6.16629 13.7143 6.16629 13.6112V8.40184H8.2034C8.28985 8.40308 8.37425 8.37547 8.44325 8.32337C8.51225 8.27126 8.56191 8.19765 8.58438 8.11416L9.1442 6.0926C9.15967 6.03516 9.16175 5.97493 9.15028 5.91656C9.13881 5.85819 9.11409 5.80323 9.07804 5.75591C9.04199 5.70859 8.99556 5.67018 8.94233 5.64362C8.88909 5.61707 8.83048 5.60309 8.77099 5.60276H6.16629V3.50345C6.18563 3.31099 6.27601 3.13266 6.41978 3.00326C6.56355 2.87387 6.75039 2.80271 6.94381 2.80368H8.88762C8.99072 2.80368 9.08961 2.76272 9.16251 2.68981C9.23542 2.61691 9.27638 2.51802 9.27638 2.41492V0.393359Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-twitter-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="http://twitter.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="18"
                                                     height="14" viewBox="0 0 18 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.6107 1.66066C16.9774 1.94128 16.297 2.1309 15.5818 2.2166C16.3198 1.77503 16.8719 1.08003 17.1351 0.261302C16.4418 0.673137 15.683 0.963023 14.8916 1.11836C14.3595 0.550172 13.6546 0.173569 12.8865 0.0470186C12.1184 -0.0795316 11.33 0.0510517 10.6437 0.418495C9.95738 0.785938 9.4116 1.36968 9.09106 2.0791C8.77051 2.78852 8.69316 3.58391 8.87099 4.3418C7.46609 4.27126 6.09172 3.90611 4.83707 3.27003C3.58243 2.63395 2.47556 1.74117 1.58828 0.649633C1.2849 1.17297 1.11045 1.77973 1.11045 2.42594C1.11011 3.00767 1.25337 3.58049 1.52751 4.09358C1.80165 4.60667 2.1982 5.04416 2.68198 5.36724C2.12093 5.34938 1.57226 5.19778 1.08163 4.92506V4.97056C1.08157 5.78647 1.3638 6.57726 1.88043 7.20877C2.39705 7.84027 3.11625 8.27359 3.91599 8.43519C3.39552 8.57605 2.84985 8.5968 2.32019 8.49587C2.54583 9.19791 2.98536 9.81181 3.57723 10.2516C4.16911 10.6915 4.88371 10.9352 5.621 10.9487C4.36942 11.9312 2.82372 12.4642 1.23256 12.4618C0.950707 12.4619 0.669089 12.4455 0.38916 12.4125C2.00428 13.451 3.88439 14.0021 5.80454 14C12.3045 14 15.8579 8.61647 15.8579 3.9474C15.8579 3.79571 15.8541 3.6425 15.8473 3.49081C16.5385 2.99097 17.1351 2.37201 17.6092 1.66293L17.6107 1.66066Z"
                                                        fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="group bg-linkedin-100  w-8 h-8 rounded-full flex items-center justify-center duration-300 mr-2"
                                               href="https://pinterest.com/">
                                                <svg class="text-gray-400 group-hover:text-white " width="14"
                                                     height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.2003 4.8783H7.8001V6.1733C8.1746 5.4285 9.135 4.7593 10.5777 4.7593C13.3434 4.7593 14 6.2419 14 8.9621V14H11.2V9.5816C11.2 8.0325 10.8255 7.1589 9.8721 7.1589C8.5498 7.1589 8.0003 8.1004 8.0003 9.5809V14H5.2003V4.8783ZM0.399 13.881H3.199V4.7593H0.399V13.881ZM3.6001 1.785C3.6002 2.01969 3.55366 2.25206 3.46317 2.46861C3.37268 2.68516 3.24006 2.88156 3.073 3.0464C2.73448 3.38284 2.27627 3.57116 1.799 3.57C1.32257 3.56968 0.865418 3.38184 0.5264 3.0471C0.359948 2.8817 0.22777 2.68508 0.137441 2.4685C0.047111 2.25193 0.000405392 2.01966 0 1.785C0 1.3111 0.189 0.8575 0.5271 0.5229C0.86582 0.187711 1.32317 -0.000209448 1.7997 1.75185e-07C2.2771 1.75185e-07 2.7349 0.1883 3.073 0.5229C3.4104 0.8575 3.6001 1.3111 3.6001 1.785Z"
                                                          fill="currentcolor"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                                <div class="name-box flex justify-between">
                                    <span class="text-blue-50">Esther Howard</span>
                                    <span class="text-blue-50">12 July, 2022</span>
                                </div>
                                <h3
                                    class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                    <a href="course.html">User Experience (UX): The Ultimate Guide</a>
                                </h3>
                                <div class="reviews-box flex justify-between pt-5">
                                    <div class="flex items-center">
                                        <span class="mr-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                                                    fill="#757F8F"></path>
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F">
                                                </rect>
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
                    <div class="popular-button mt-10 text-center" data-aos="fade-up" data-aos-delay="2100">
                        <a class="py-4 font-medium rounded transition duration-700 hover:bg-blue-800  hover:border-blue-600 hover:text-white px-8 border inline-block border-gray-300"
                           href="#">Load more </a>
                    </div>
                </div>
                <div id="tab2" class="tab-slider--body" style="display: none;">
                    <div class="w-full">Familiarity quite the the regretting way thing early it me, I twists
                        population have recently handpainted, work watch assumed word aggressively he the which
                        seeing nation terms, and classes the it would and there to such our to will but to their
                        researches not. Are only of up herself dreams. Watching blind examples dull contracts. Must
                        I yourself dragged lift place be how not out dragged the forwards, the be known or would
                        they turn at facility set the in think I into hours. The off of to the frame. Her accept the
                        would samples and several the series in I to o'clock to in then the uniforms, ocean. At
                        discharge got become comment on this of into and was out problems century of avoided there
                        looked quite bad brothers hometown created, on into ridden then with observed, to monitors
                        the them. Familiarity publication it had he yet employees, and. Harmonics, came population
                        the quickly acquired on hides. Packed, necessary the by continued of somehow folks field
                        outcome rent to economics, the being name happiness of place that this on to were his it
                        believe. In happening, are and reasoning having decorated work to times, on months term
                        emerged. River ever get chest up for desk text was clock, to him, keep decision-making.
                        Stash some found at company, continued will let of the came same why that movement parents'
                        of without so is one movement the getting been hides. The prudently, western tricks
                        rewritten systems have countries small only success.
                    </div>
                </div>
                <div id="tab3" class="tab-slider--body" style="display: none;">
                    <div class="w-full">
                        <canvas id="myChart" width="1288" height="644"
                                style="display: block; box-sizing: border-box; height: 644px; width: 1288px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== Author  Area End =============================  -->
@endsection
