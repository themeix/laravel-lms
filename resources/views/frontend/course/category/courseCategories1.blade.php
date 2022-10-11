@extends('layouts.frontEndMaster')
@section('title','Course Categories')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 py-20  bg-blue-100 relative overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium" data-aos="fade-up"
                    data-aos-delay="100"> Categories </h2>
            </div>
            <ul class="flex gap-2 justify-center mt-6 relative z-10" data-aos="fade-up" data-aos-delay="200">
                <li><a class="hover:text-blue-600 transition duration-500" href="{{route('main.index')}}">Home </a> </li>
                <li>/</li>
                <li> Course Categories </li>
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
                        <img src="{{getImageFile($category->image_path)}}" width="80" height="80" alt="category">
                     </span>
                        </div>
                        <h3 class="md:text-2xl text-xl font-semibold text-black-200 mb-2 hover:text-blue-600">
                            <a
                                href="course-catagory.html"> {{$category->name}}
                            </a>
                        </h3>
                        <p class="text-lg">{{ @$category->courses->count() }} Courses</p>
                    </div>
                @endforeach

            </div>
            <div class="button-xl text-center md:mt-12 mt-8">
                <a class="py-5 px-8 rounded-full border-slate-200 border inline-block hover:bg-blue-600 hover:border-blue-200 hover:text-white  !transition   !duration-500  font-medium"
                   href="{{route('main.allCategories1')}}">View All Categories</a>
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
            <div class="grid lg:grid-cols-12 bg-blue-600 md:p-16 p-8 rounded-xl relative">
                <div class="md:col-span-8">
                    <div class="newsleter-left lg:w-10/12">
                        <h2 class="xl:text-5xl mb-4 lg:text-4xl md:text-3xl text-2xl font-medium text-white  ">
                            Subscribe to
                            newsletter
                        </h2>
                        <p class="text-white">Produce following as be didn't sitting on appeared not he is he upper
                            work
                            spread observed, hung spot.
                        </p>
                        <form>
                            <div class=" md:w-10/12 relative mt-5">
                                <input type="search"
                                       class="block py-6 pl-5  pr-37.5  appearance-none  w-full  text-base  bg-white rounded-full border  border-blue-100  focus:border-white placeholder-black-200 outline-none duration-300"
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
