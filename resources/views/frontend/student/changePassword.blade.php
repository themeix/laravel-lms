@extends('layouts.frontEndMaster')
@section('title','Profile')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium"
                    data-aos="fade-up"
                    data-aos-delay="100">Change Password</h2>
            </div>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>
    <!--  ====================== Breadcrum  Area End =============================  -->
    <!--  ====================== villing address Area Start =============================  -->
    <section class="villing-address-area md:py-28 py-20">
        <div class="container">
            <form action="{{ route('student.changePasswordStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" lg:grid-cols-12 gap-6">
                    <div class="col-span-12 ">
                        <div class="villing-address-box border mt-4 p-4">
                            <div class="countery-box border-blue-5  rounded ">

                                <div class="grid md:grid-cols-2 gap-4">

                                    <div class="flex-col  gap-4">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg">Old Password<span
                                                    class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                value="{{ old('old_password') }}"
                                                name="old_password" id="old_password"
                                                type="password" placeholder="Old Password"/>

                                            @if ($errors->has('old_password'))
                                                <span class="text-danger" style="color:red;"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('old_password') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="flex-col  gap-4">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg">New Password<span
                                                    class="text-blue-800">*</span>
                                            </p>
                                            <input
                                                class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                value="{{ old('new_password') }}"
                                                name="new_password" id="new_password"
                                                type="password" placeholder="New Password"/>

                                            @if ($errors->has('new_password'))
                                                <span class="text-danger" style="color: red;"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('new_password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="flex-col  gap-4">
                                        <div class="flex-col">
                                            <div class="discount-button">
                                                <button type="submit"
                                                    class="py-2 px-8 rounded-full border-slate-200 font-medium border inline-block bg-blue-600 hover:border-blue-200 hover:bg-black-200 text-white  !transition   !duration-500 ">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
