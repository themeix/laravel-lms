<section class="newsleter-area  relative my-20 md:my-32">
    <div class="container">

        <div class="grid lg:grid-cols-12 bg-blue-600 md:p-16 p-8 rounded-xl relative">
            <div class="md:col-span-8">
                <div class="newsleter-left lg:w-10/12">
                    <h2 class="xl:text-5xl mb-4 lg:text-4xl md:text-3xl text-2xl font-medium text-white  ">
                        Subscribe to newsletter</h2>
                    <p class="text-white">Produce following as be didn't sitting on appeared not he is he upper
                        work spread observed, hung spot.</p>
                    <form action="{{route('main.newsletter.store')}}" method="post">
                        @csrf
                        <div class=" md:w-10/12 relative mt-5">
                            <input type="email"
                                   class="block py-6 pl-5  pr-37.5  appearance-none  w-full  text-base  bg-white rounded-full border  border-blue-100  focus:border-white placeholder-black-200 outline-none duration-300"
                                   placeholder="Enter your email" name="email" required="">
                            <button type="submit"
                                    class=" absolute top-2.25 right-2 bg-blue-600 text-base text-white font-medium  hover:bg-blue-5 hover:text-black-200  transition-all duration-300 rounded-full   outline-none px-8 py-4  ">
                                Subscribe
                            </button>
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
