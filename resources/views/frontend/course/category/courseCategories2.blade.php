@extends('layouts.frontEndMaster')
@section('title','Course Categories')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 py-20  bg-blue-100 relative overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium"
                    data-aos="fade-up" data-aos-delay="100"> Categories</h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-aos="fade-up" data-aos-delay="200">
                <li><a class="hover:text-blue-600 transition duration-500" href="{{route ('main.index2')}}">Home </a></li>
                <li>/</li>
                <li>Course Categories</li>
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
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2  gap-6">
                @foreach($categories as $category)
                    <div
                        class="popular-topics--box text-center   bg-white  hover:shadow-lg p-4  rounded-md transition duration-500"
                        data-aos="fade-up" data-aos-delay="50">
                        <div class="popular-icon mb-6 inline-block ">
              <span class="w-16 h-16">
                <img src="{{getImageFile($category->image_path)}}" width="80" height="80" alt="category">
              </span>
                        </div>
                        <h3 class="md:text-2xl text-xl font-semibold text-black-200 mb-1 hover:text-blue-600">
                            <a href="course-catagory.html">{{$category->name}} </a>
                        </h3>
                        <p class="text-lg">{{ @$category->courses->where('status', 1)->count() }} Courses</p>
                    </div>
                @endforeach
            </div>
            <div class="button-xl text-center md:mt-20 mt-10">
                <a class="py-5 px-8 rounded-md border-slate-200 border inline-block hover:bg-blue-600 hover:border-blue-200 hover:text-white transition duration-500 font-medium"
                   href="{{route('main.allCategories2')}}">View All Categories</a>
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
                                <h2 class="text-4xl font-bold text-blue-600" id="hours"></h2>
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
                            <a class="py-4 px-12 rounded-full border-slate-200 font-medium border inline-block bg-blue-600 hover:border-blue-200 hover:bg-black-200 text-white transition duration-500"
                               href="#">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ====================== DiscountPost Area End =============================  -->
    <!--  ====================== Newsleter  Area Start =============================  -->
    <section class="newsleter-area  relative my-20 md:my-32">
        <div class="container">
            {{ View::make('layouts.partials.newsLetter') }}
        </div>
    </section>
    <!--  ====================== Newsleter  Area End =============================  -->
@endsection
