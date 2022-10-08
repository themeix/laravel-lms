@extends('layouts.frontEndMaster')
@section('title','Dashboard')
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
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10">
                @foreach($categories as $category)
                <div
                    class="popular-course-item p-5 border-gray-300 rounded-md shadow-2xl  border transition duration-500 hover:border-blue-600"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="popular-course-img overflow-hidden rounded-md">
                        <img
                            class=" w-[100%] max-h-52 rounded-md  object-cover transition duration-500 transform group-hover:scale-125"
                            src="{{asset('frontend/assets/images/courses/courses-4.webp')}}" alt="images">
                    </div>
                    <div class=" popular-text text-center my-6 ">
                        <h4><a class="md:text-2xl text-xl text-black-200 font-medium  transition duration-500 hover:text-blue-600"
                               href="course-catagory.html">{{$category->name}}</a> </h4>
                        <p class="md:text-lg  font-medium">{{ @$category->courses->count() }} Courses</p>
                    </div>
                    <p class="text-sm text-black-200 mb-2">20+ Instrunctor</p>
                    <div class="poppular-course-footer flex justify-between items-center">
                        <div class="flex-col">
                            <div class="flex">
                                <div class="author-images-box group  flex  items-center relative">
                                    <img class="w-10 h-10 object-cover border border-blue-600 rounded-full"
                                         src="{{asset('frontend/assets/images/hero-author-1.png')}}" alt="images">
                                    <div class="absolute left-0  items-center opacity-0 ml-6 group-hover:opacity-100 flex ">
                                        <div class="w-3 h-3 -mr-2 rotate-45 bg-blue-600 relative z-100"></div>
                                        <span
                                            class="relative z-10 p-2 text-xs w-24 leading-none text-white whitespace-no-wrap bg-blue-600 shadow-lg">C.
                                    Womack</span>
                                    </div>
                                </div>
                                <div class="author-images-box group right-3 flex  items-center relative">
                                    <img class="w-10 h-10 object-cover border border-blue-600 rounded-full"
                                         src="{{asset('frontend/assets/images/hero-author-2.png')}}" alt="images">
                                    <div class="absolute left-0  items-center opacity-0 ml-6 group-hover:opacity-100 flex ">
                                        <div class="w-3 h-3 -mr-2 rotate-45 bg-blue-600 relative z-100"></div>
                                        <span
                                            class="relative z-10 p-2 text-xs w-24 leading-none text-white whitespace-no-wrap bg-blue-600 shadow-lg">C.
                                    Womack</span>
                                    </div>
                                </div>
                                <div class="author-images-box group
                                 right-5 flex  items-center relative">
                                    <img class="w-10 h-10 object-cover border border-blue-600 rounded-full"
                                         src="{{asset('frontend/assets/images/hero-author-3.png')}}" alt="images">
                                    <div class="absolute left-0  items-center opacity-0 ml-6 group-hover:opacity-100 flex ">
                                        <div class="w-3 h-3 -mr-2 rotate-45 bg-blue-600 relative z-100"></div>
                                        <span
                                            class="relative z-10 p-2 text-xs w-24 leading-none text-white whitespace-no-wrap bg-blue-600 shadow-lg">C.
                                    Womack</span>
                                    </div>
                                </div>
                                <div class="author-images-box group
                                 right-7 flex  items-center relative">
                                    <img class="w-10 h-10 object-cover border border-blue-600 rounded-full"
                                         src="{{asset('frontend/assets/images/author/4.webp')}}" alt="images">
                                    <div class="absolute left-0  items-center opacity-0 ml-6 group-hover:opacity-100 flex ">
                                        <div class="w-3 h-3 -mr-2 rotate-45 bg-blue-600 relative z-100"></div>
                                        <span
                                            class="relative z-10 p-2 text-xs w-24 leading-none text-white whitespace-no-wrap bg-blue-600 shadow-lg">P.
                                    Blair</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col">
                            <div class="youtube-button  flex items-center gap-4 ">
                                <a class="popup-youtube popup-icon relative bg-blue-600 font-semibold w-10 h-10 rounded-full items-center justify-center flex"
                                   href="https://www.youtube.com/watch?v=bY-mOdgz7zQ">
                              <span>
                                 <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.69614 5.13397C10.3628 5.51887 10.3628 6.48113 9.69614 6.86603L2.30383 11.134C1.63717 11.5189 0.803833 11.0377 0.803833 10.2679V1.73205C0.803833 0.962251 1.63717 0.481125 2.30383 0.866025L9.69614 5.13397Z"
                                        fill="white"></path>
                                 </svg>
                              </span>
                                </a>
                                <a class="  popup-youtube hover:text-black-200 transition duration-500"
                                   href="https://www.youtube.com/watch?v=bY-mOdgz7zQ">200 Lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="popular-button mt-10 text-center">
                <a class="py-4 font-medium rounded transition duration-700 hover:bg-blue-800  hover:border-blue-600 hover:text-white px-8 border inline-block border-gray-300"
                   href="course-catagory.html">View All Courses</a>
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
