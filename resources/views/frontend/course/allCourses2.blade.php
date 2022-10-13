@extends('layouts.frontEndMaster')
@section('title','All Courses')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 py-20  bg-blue-100 relative overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
                    data-aos-delay="100"> All Courses </h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-aos="fade-up" data-aos-delay="200">
                <li><a class="hover:text-blue-600 transition duration-500" href="{{route('main.index2')}}">Home </a> </li>
                <li>/</li>
                <li>All Courses </li>
            </ul>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>
    <!--  ====================== Breadcrum  Area End =============================  -->
    <!--  ====================== Popular Courses  Area Start =============================  -->
    <section class="popular-course-area md:pt-32 pt-20">
        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
                @foreach($courses as $course)
                    <div class="lessons-item group hover:-translate-y-2 duration-500  hover:shadow-md transition"
                         data-aos="fade-up" data-aos-delay="500">
                        <div class="lessons-images relative overflow-hidden">
                            <a href="course.html">
                                <img class="rounded-t-md max-h-64 w-full object-cover"
                                     src="{{asset('frontend/assets/images/lessons-images-1-1.webp')}}"
                                     alt="images">
                            </a>
                        </div>
                        <div
                            class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                            <div class="name-box flex justify-between">
                                <p class="text-blue-600 text-xl font-bold">$ {{$course->price}}</p>
                                <span class="text-blue-50">12 July, 2022</span>
                            </div>
                            <h3 class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                <a href="course.html">{{$course->title}}</a>
                            </h3>
                            <div class="reviews-box flex justify-between pt-5">
                                <div class="flex items-center">
                  <span class="mr-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M11.9641 9.13397C12.6308 9.51887 12.6308 10.4811 11.9641 10.866L8.03589 13.134C7.36922 13.5189 6.53589 13.0377 6.53589 12.2679V7.73205C6.53589 6.96225 7.36922 6.48113 8.03589 6.86603L11.9641 9.13397Z"
                          fill="#757F8F"/>
                      <rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="#757F8F"/>
                    </svg>
                  </span>
                                    <p>1 hour 20 min</p>
                                </div>
                                <div class="flex items-center">
                  <span class="mr-2">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M16.7903 5.63406L11.754 4.90408L9.50265 0.352135C9.44116 0.227506 9.34 0.126615 9.21504 0.0652895C8.90163 -0.0890138 8.52078 0.0395723 8.36408 0.352135L6.11271 4.90408L1.0764 5.63406C0.937548 5.65384 0.810599 5.71912 0.713403 5.81803C0.595899 5.93848 0.531149 6.10053 0.533381 6.26856C0.535613 6.4366 0.604643 6.59688 0.725305 6.71418L4.36914 10.2572L3.50827 15.2602C3.48808 15.3766 3.501 15.4963 3.54555 15.6057C3.5901 15.7151 3.6645 15.8099 3.76032 15.8793C3.85614 15.9488 3.96955 15.99 4.08767 15.9984C4.2058 16.0068 4.32393 15.982 4.42865 15.9269L8.93337 13.5648L13.4381 15.9269C13.5611 15.9922 13.7039 16.0139 13.8407 15.9902C14.1859 15.9308 14.418 15.6044 14.3585 15.2602L13.4976 10.2572L17.1414 6.71418C17.2406 6.61724 17.3061 6.49064 17.3259 6.35216C17.3795 6.00597 17.1375 5.68549 16.7903 5.63406Z"
                          fill="#FFD102"/>
                    </svg>
                  </span>
                                    <p>5.0 (80 Reviews)</p>
                                </div>
                            </div>
                            <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                <a class="border-blue-20 border  inline-block py-2.5 px-5 rounded-md  hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="cart.html">Add to Cart</a>
                                <a class="border-blue-20 border  inline-block py-2.5 px-5 rounded-md  hover:bg-blue-600 hover:border-blue-600 transition duration-500 hover:text-white"
                                   href="checkout.html">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--  ====================== Popular Courses  Area End =============================  -->
    <!--  ====================== Discount Area Start =============================  -->
    <section class="discount-area relative md:py-32 py-20 bg-cover bg-center md:mt-32 mt-20 bg-blue-100"
             style="background-image:url({{asset('frontend/assets/images/home-2/discount-effect-home-2-background.svg')}})">
        <div class="container">
            <div class="lg:grid lg:grid-cols-12  ">
                <div class="col-span-4 hidden lg:block ">
                    <div class="discount-images absolute bottom-0">
                        <img src="{{asset('frontend/assets/images/home-2/discount-man.svg')}}" alt="imges">
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="flex-col lg:pl-40">
                        <div class="discount-title ">
                            <h2 class="lg:text-5xl md:text-4xl text-2xl font-bold text-black-200"><span
                                    class="text-blue-600">50%
                              Discount </span> On All Of
                                Our New & Upcoming Courses
                            </h2>
                        </div>
                        <div class="discount-time text-center pt-10 grid lg:grid-cols-4 grid-cols-2  gap-8">
                            <div class="flex-col bg-white p-6 shadow-sm">
                                <p class="text-4xl font-bold text-blue-600" id="days"></p>
                                <p class="text-gray-800">Days</p>
                            </div>
                            <div class="flex-col bg-white p-6 shadow-sm">
                                <p class="text-4xl font-bold text-blue-600" id="hours"></p>
                                <p class="text-gray-800">Hours</p>
                            </div>
                            <div class="flex-col bg-white p-6 shadow-sm">
                                <p class="text-4xl font-bold text-blue-600" id="minutes"></p>
                                <p class="text-gray-800">Minutes</p>
                            </div>
                            <div class="flex-col bg-white p-6 shadow-sm">
                                <p class="text-4xl font-bold text-blue-600" id="seconds"></p>
                                <p class="text-gray-800">Seconds</p>
                            </div>
                        </div>
                        <div class="discount-button  mt-10">
                            <a class="py-4 px-12 rounded-md border-slate-200 font-medium border inline-block bg-blue-600 hover:border-blue-200 hover:bg-black-200 text-white transition duration-500"
                               href="#">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== Discount Post Area End =============================  -->
    <!--  ====================== Newsleter  Area Start =============================  -->
    <section class="newsleter-area  relative my-20 md:my-32">
        <div class="container">
            {{ View::make('layouts.partials.newsLetter') }}
        </div>
    </section>
    <!--  ====================== Newsleter  Area End =============================  -->

@endsection
