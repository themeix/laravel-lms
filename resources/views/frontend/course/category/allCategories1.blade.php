@extends('layouts.frontEndMaster')
@section('title','All Categories')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 py-20  bg-blue-100 relative overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
                    data-aos-delay="100"> Categories </h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-aos="fade-up" data-aos-delay="200">
                <li><a class="hover:text-blue-600 transition duration-500" href="{{route('main.index')}}">Home </a></li>
                <li>/</li>
                <li> Course Categories</li>
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
            <div class="shape-box ">
                <div class="shpae absolute -top-10 right-0 hidden lg:block">
                    <img src="{{asset('frontend/assets/images/topics-shape-1.png')}}" alt="images">
                </div>
                <div class="shpae absolute -bottom-40 left-0 hidden lg:block">
                    <img src="{{asset('frontend/assets/images/topics-shape-2.png')}}" alt="images">
                </div>
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2  gap-6">
                @foreach($categories as $category)
                    <div
                        class="popular-topics-box text-center p-10 border group border-blue-20 hover:border-blue-600  !transition   !duration-500  hover:bg-blue-100 rounded-md"
                        data-aos="fade-up" data-aos-delay="50">
                        <div class="tioics-icon mb-6 inline-block !transition   !duration-500 ">
                     <span class="w-16 h-16">
                        <a href="{{route('main.categoryWiseCourses1', $category->slug)}}">
                            <img src="{{getImageFile($category->image_path)}}" width="80" height="80" alt="category">
                            </a>
                     </span>
                        </div>
                        <h3 class="md:text-2xl text-xl font-semibold text-black-200 mb-2 hover:text-blue-600">
                            <a
                                href="{{route('main.categoryWiseCourses1', $category->slug)}}"> {{$category->name}}
                            </a>
                        </h3>
                        <a href="{{route('main.categoryWiseCourses1', $category->slug)}}">
                            <p class="text-lg">{{ @$category->courses->where('status', 1)->count() }} Courses</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--  ====================== Popular Courses  Area End =============================  -->

    <!--  ====================== Newsleter  Area Start =============================  -->

    {{ View::make('layouts.partials.newsLetter') }}

    <!--  ====================== Newsleter  Area End =============================  -->

@endsection
