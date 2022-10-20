@extends('layouts.frontEndMaster')
@section('title','Thank You')
@section('content')

    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-title md:w-7/12 m-auto text-center z-10 relative">
                <h5 class="xl:text-5xl lg:text-4xl md:text-4xl text-3xl text-black-200  font-small"
                    data-aos="fade-up"
                    data-aos-delay="100">Thank you for Purchasing Course</h5>
            </div>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>

    <section class="shopping-cart-hero-area md:mt-32 mt-20">
        <div class="container">
            <div class="lg:grid lg:grid-cols-12 flex flex-col mb-8 gap-8">
                <div class="col-span-9">
                    <div class="shoppin-card-box-all shadow-4xl p-10 bg-white">
                        <h3 class="text-2xl font-medium text-black-200 pb-7  border-b"> Purchased Courses</h3>
                        @if($new_courses != null)
                            @foreach($new_courses as $course)
                                <div class="lg:grid lg:grid-cols-12  lg:gap-12 flex flex-col mt-7 gap-8">
                                    <div class="col-span-8">
                                        <div class="shopping-cart-box ">
                                            <div class="couses-box">
                                                <div class="lg:flex  gap-4 ">
                                                    <div class="flex-col">
                                                        <a href="{{ route('main.courseDetails', $course->uuid) }}">
                                                        <img class="max-h-32 object-cover max-w-52 rounded mb-3 lg:mb-0"
                                                             src="{{asset('frontend/assets/images/shopping-cart.webp')}}"
                                                             alt="images">
                                                            </a>

                                                    </div>
                                                    <div class="flex-col">
                                                        <h4 class="text-black-200 font-medium mb-4">
                                                            <a href="{{ route('main.courseDetails', $course->uuid) }}"> {{ $course->title }}</a>
                                                        </h4>
                                                        <div class="author-box flex items-center mt-4">
                                                            <div class="course-content">
                                                                <p class="text-sm text-blue-50 font-normal ">
                                                                    <a href="{{ route('main.instructorWiseCourses', $course->instructor->uuid) }}"> {{ $course->instructor->name }}</a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-span-3 ">
                    <div class="order-summery shadow-4xl p-10 bg-white">
                        <div class="order-button mt-6">
                            <a class="py-3 w-full mb-4 bg-blue-600 text-white block text-center px-6 rounded-md text-lg font-medium transition duration-500 hover:text-black-200 hover:bg-blue-100"
                               href="{{ route('main.index') }}">My Learn Page</a>

                        </div>
                        <div class="order-button mt-6">
                            <a class="py-3 w-full mb-4 bg-blue-600 text-white block text-center px-6 rounded-md text-lg font-medium transition duration-500 hover:text-black-200 hover:bg-blue-100"
                               href="{{ route('main.index') }}">Back to Home</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


