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
                <li><a class="hover:text-blue-600 transition duration-500" href="{{route('main.index2')}}">Home </a>
                </li>
                <li>/</li>
                <li>All Courses</li>
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
                            <a href="{{ route('main.courseDetails', $course->uuid) }}">
                                <img class="rounded-t-md max-h-64 w-full object-cover"
                                     src="{{asset('frontend/assets/images/lessons-images-1-1.webp')}}"
                                     alt="images">
                            </a>
                        </div>
                        <div
                            class="lessons-bottom-box p-6 border border-blue-20 border-t-0 rounded-bl-md rounded-br-md">
                            <div class="name-box flex justify-between">
                                <p class="text-blue-600 text-xl font-bold">
                                    @if($course->price != 0.00)
                                        $ {{$course->price}}
                                    @else
                                        Free
                                    @endif
                                </p>
                                <span class="text-blue-50">12 July, 2022</span>
                            </div>
                            <h3 class="md:text-2xl text-xl font-semibold mt-5 text-black-200 mb-2 hover:text-blue-600">
                                <a href="{{ route('main.courseDetails', $course->uuid) }}">{{$course->title}}</a>
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
                            @if(Auth::user() != null)
                                @php
                                    $isPurchased = \App\Models\OrderItem::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();
                                    $ownCourse = \App\Models\Course::where('id', $course->id)->where('user_id', Auth::user()->id)->first();
                                @endphp
                            @endif

                            @if(Auth::user() !=null && (Auth::user()->type == 1 || $isPurchased != null || $ownCourse != null ))
                                <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                    <button class="border-blue-20 border inline-block py-2.5 px-5 rounded-full !transition !duration-500 hover:text-black-200" style="cursor: not-allowed;">
                                        Add To Cart
                                    </button>

                                    <button class="border-blue-20 border inline-block py-2.5 px-5 rounded-full !transition !duration-500 hover:text-black-200" style="cursor: not-allowed;">
                                        Buy Now
                                    </button>
                                </div>
                            @else

                                <div class="reviews-box border-t pt-7 mt-7 flex justify-between">
                                    <form action="{{route('student.addToCart') }}" method="GET"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $course->id }}" name="course_id">
                                        <input type="hidden" value="{{ $course->title }}" name="title">
                                        <input type="hidden" value="{{ $course->price }}" name="price">
                                        <input type="hidden" value="{{ $course->image }}" name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <button
                                            class="border-blue-20 border inline-block py-2.5 px-5 rounded-full hover:bg-blue-600 hover:border-blue-600  !transition   !duration-500  hover:text-white">
                                            Add To Cart
                                        </button>
                                    </form>

                                    <form action="{{ route('student.buyNow') }}" method="GET"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $course->id }}" name="course_id">
                                        <input type="hidden" value="{{ $course->title }}" name="title">
                                        <input type="hidden" value="{{ $course->price }}" name="price">
                                        <input type="hidden" value="{{ $course->image }}" name="image">
                                        <input type="hidden" value="1" name="quantity">
                                        <button
                                            class="border-blue-20 border inline-block py-2.5 px-5 rounded-full hover:bg-blue-600 hover:border-blue-600  !transition   !duration-500  hover:text-white">
                                            Buy Now
                                        </button>
                                    </form>
                                </div>

                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--  ====================== Popular Courses  Area End =============================  -->
    <!--  ====================== Discount Area Start =============================  -->
    {{ View::make('layouts.partials.webinar') }}
    <!--  ====================== Discount Post Area End =============================  -->
    <!--  ====================== Newsleter  Area Start =============================  -->

    {{ View::make('layouts.partials.newsLetter') }}


    <!--  ====================== Newsleter  Area End =============================  -->

@endsection
