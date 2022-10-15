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
