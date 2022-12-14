@extends('layouts.frontEndMaster')
@section('title','My Learning')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 py-20  bg-blue-100">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
                    data-aos-delay="100">My Learning page</h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-animation="fadeInUp" data-delay="500">
                <li><a class="hover:text-blue-600 transition duration-500" href="{{route('main.index')}}">Home </a></li>
                <li>/</li>
                <li>My Learning</li>
            </ul>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>
    <!--  ====================== Breadcrum  Area End =============================  -->
    <!--  ====================== Course Layout Area Start =============================  -->
    <section class="course-layout-area md:pt-32 pt-20">
        <div class="container">
            <div class="flex flex-col lg:gap-16 gap-10">

                <div class="col-span-12">
                    <div class="course-layout-right">
                        @if(sizeof($orderItems) > 0)

                            @foreach($orderItems as $orderItem)
                                <div class="course-layout-item mt-7 group mb-6" data-aos="fade-up" data-aos-delay="400">
                                    <div
                                        class="md:grid flex flex-col  md:grid-cols-12 gap-6 p-6 border border-blue-20 hover:border-blue-800 transition duration-300 rounded-bl-md rounded-br-md">
                                        <div class="col-span-4">
                                            <div class="course-images  h-full relative overflow-hidden rounded">
                                                <img
                                                    class="group-hover:scale-125  transition duration-500 w-full h-full max-h-64 object-cover rounded"
                                                    src="{{ getImageFile(@$orderItem->course->image_path) }}"
                                                    alt="images">
                                                <div
                                                    class="overlay-images rounded-xl absolute top-0 w-full h-full bg-blue-5 left-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <div class="lessons-bottom-box ">
                                                <div class="flex justify-between items-center">
                                                    <div class="name-box flex justify-between">
                                                        <a class="text-black-200 hover:text-blue-600"
                                                           href="{{ route('main.instructorWiseCourses', $orderItem->course->instructor->slug) }}">{{ @$orderItem->course->instructor->name }}</a>
                                                    </div>
                                                    <div class="name-box flex justify-between">
                                                        <p class="text-blue-600 text-xl font-bold">
                                                            @if($orderItem->unit_price > 0)
                                                                @if(get_currency_placement() == 'after')
                                                                    {{ $orderItem->unit_price }} {{ get_currency_symbol() }}
                                                                @else
                                                                    {{ get_currency_symbol() }} {{ $orderItem->unit_price }}
                                                                @endif

                                                            @else
                                                                Free
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>


                                                <h3
                                                    class="md:text-2xl text-xl font-semibold mt-2 text-black-200 mb-2 hover:text-blue-600">
                                                    <a href="{{ route('student.my-course.show',  @$orderItem->course->slug) }}">{{ @$orderItem->course->title }}</a>
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

                                                    <a href="{{ route('student.my-course.show', @$orderItem->course->slug) }}">
                                                        <button
                                                            class="border-blue-20 border inline-block py-2.5 px-5 rounded-full hover:bg-blue-600 hover:border-blue-600  !transition   !duration-500  hover:text-white">
                                                            View Course
                                                        </button>
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-span-12"
                                 style="padding: 10px; margin: 10px; text-align: center; font-weight: bold; font-size: 24px;">
                                <div class="alert alert-danger">
                                    <h1>No Course Found</h1>
                                </div>
                            </div>

                        @endif

                        {{--<div class="pagination-box mt-1" data-aos="fade-up" data-aos-delay="800">
                            <ul class="flex items-center gap-3">
                                <li>
                                    <a class="group" href="#">
                                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:fill-blue-600 transition duration-300"
                                                  d="M7.09171 13.8347C7.04132 13.8871 6.9811 13.9287 6.91462 13.9571C6.84813 13.9855 6.77671 14.0001 6.70459 14C6.63247 13.9999 6.56111 13.9851 6.4947 13.9565C6.4283 13.9279 6.36821 13.886 6.31798 13.8334L0.168455 7.42063C0.0604486 7.30801 0 7.15696 0 6.9997C0 6.84243 0.0604486 6.69139 0.168455 6.57877L6.31798 0.165947C6.36829 0.113429 6.42844 0.0716877 6.49489 0.0431862C6.56133 0.0146837 6.63272 9.53674e-07 6.70485 9.53674e-07C6.77697 9.53674e-07 6.84836 0.0146837 6.9148 0.0431862C6.98125 0.0716877 7.0414 0.113429 7.09171 0.165947C7.19522 0.273649 7.25317 0.418231 7.25317 0.568785C7.25317 0.719338 7.19522 0.863918 7.09171 0.971621L1.30888 6.9997L7.09171 13.0302C7.19486 13.1378 7.25259 13.2822 7.25259 13.4324C7.25259 13.5827 7.19486 13.727 7.09171 13.8347ZM11.8385 13.8347C11.7882 13.8871 11.7279 13.9287 11.6614 13.9571C11.595 13.9855 11.5235 14.0001 11.4514 14C11.3793 13.9999 11.3079 13.9851 11.2415 13.9565C11.1751 13.9279 11.115 13.886 11.0648 13.8334L4.91529 7.42063C4.80728 7.30801 4.74683 7.15696 4.74683 6.9997C4.74683 6.84243 4.80728 6.69139 4.91529 6.57877L11.0648 0.165947C11.1151 0.113429 11.1753 0.0716877 11.2417 0.0431862C11.3082 0.0146837 11.3796 9.53674e-07 11.4517 9.53674e-07C11.5238 9.53674e-07 11.5952 0.0146837 11.6616 0.0431862C11.7281 0.0716877 11.7882 0.113429 11.8385 0.165947C11.9421 0.273649 12 0.418231 12 0.568785C12 0.719338 11.9421 0.863918 11.8385 0.971621L6.05572 6.9997L11.8385 13.0302C11.9417 13.1378 11.9994 13.2822 11.9994 13.4324C11.9994 13.5827 11.9417 13.727 11.8385 13.8347Z"
                                                  fill="#757F8F" fill-opacity="0.5"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class=" hover:bg-blue-600 bg-blue-100 w-8 transition duration-500 h-8 flex items-center justify-center rounded hover:text-white"
                                       href="#"> 1</a></li>
                                <li>
                                    <a class=" hover:bg-blue-600 bg-blue-100 transition duration-500 w-8 h-8 flex items-center justify-center rounded hover:text-white"
                                       href="#"> 2</a></li>
                                <li>
                                    <a class="group" href="#">
                                        <svg class=" transition duration-300" width="12" height="14"
                                             viewBox="0 0 12 14"
                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:fill-blue-600 transition duration-300"
                                                  d="M4.90829 0.165345C4.95868 0.112906 5.0189 0.071258 5.08538 0.0428597C5.15187 0.0144615 5.22329 -0.000111777 5.29541 6.45511e-07C5.36753 0.000113068 5.43889 0.0149088 5.5053 0.0435142C5.5717 0.0721196 5.63179 0.113955 5.68202 0.166551L11.8315 6.57937C11.9396 6.69199 12 6.84304 12 7.0003C12 7.15757 11.9396 7.30861 11.8315 7.42123L5.68202 13.8341C5.63171 13.8866 5.57156 13.9283 5.50511 13.9568C5.43867 13.9853 5.36728 14 5.29515 14C5.22303 14 5.15164 13.9853 5.0852 13.9568C5.01875 13.9283 4.9586 13.8866 4.90829 13.8341C4.80478 13.7264 4.74683 13.5818 4.74683 13.4312C4.74683 13.2807 4.80478 13.1361 4.90829 13.0284L10.6911 7.0003L4.90829 0.969812C4.80514 0.862166 4.74741 0.717841 4.74741 0.567579C4.74741 0.417317 4.80514 0.272992 4.90829 0.165345ZM0.161455 0.165345C0.211846 0.112906 0.272063 0.071258 0.338551 0.0428597C0.405039 0.0144615 0.476451 -0.000111777 0.548572 6.45511e-07C0.620693 0.000113068 0.692061 0.0149088 0.758463 0.0435142C0.824865 0.0721196 0.884956 0.113955 0.935189 0.166551L7.08471 6.57937C7.19272 6.69199 7.25317 6.84304 7.25317 7.0003C7.25317 7.15757 7.19272 7.30861 7.08471 7.42123L0.935189 13.8341C0.884877 13.8866 0.824723 13.9283 0.758278 13.9568C0.691832 13.9853 0.620442 14 0.548322 14C0.476201 14 0.404811 13.9853 0.338366 13.9568C0.27192 13.9283 0.211767 13.8866 0.161455 13.8341C0.0579472 13.7264 0 13.5818 0 13.4312C0 13.2807 0.0579472 13.1361 0.161455 13.0284L5.94428 7.0003L0.161455 0.969812C0.0583023 0.862166 0.000578599 0.717841 0.000578599 0.567579C0.000578599 0.417317 0.0583023 0.272992 0.161455 0.165345Z"
                                                  fill="rgba(117, 127, 143, 0.5)"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== Course Layout Area End =============================  -->

@endsection


