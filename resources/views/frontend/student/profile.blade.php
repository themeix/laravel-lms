@extends('layouts.frontEndMaster')
@section('title','Profile')
@section('content')
    <!--  ====================== Breadcrum  Area Start =============================  -->
    <section class="breadcrumb-area md:py-32 relative py-20  bg-blue-100 overflow-hidden">
        <div class="container">
            <div class="breadcrumb-titel md:w-7/12 m-auto text-center z-10 relative">
                <h2 class="xl:text-6xl lg:text-5xl md:text-4xl text-3xl text-black-200  font-medium"
                    data-aos="fade-up"
                    data-aos-delay="100">Profile of {{$user->name}}</h2>
            </div>
        </div>
        <div class="shape-breadcrumb absolute top-0 right-0">
            <img src="{{asset('frontend/assets/images/about/about-breadcrumb.svg')}}" alt="images">
        </div>
    </section>
    <!--  ====================== Breadcrum  Area End =============================  -->
    <!--  ====================== villing address Area Start =============================  -->


    @if(Auth::user()->student)
        <section class="villing-address-area md:py-28 py-20">
            <div class="container">
                <form action="{{ route('student.profileStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" lg:grid-cols-12 gap-6">
                        <div class="col-span-12 ">
                            <div class="villing-address-box border mt-4 p-4">
                                <div class="countery-box border-blue-5  rounded ">

                                    <div class="grid md:grid-cols-2 gap-4">

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">First Name <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    value="{{ $student->first_name }}"
                                                    name="first_name" id="first_name"
                                                    type="text" placeholder="Name"/>

                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Last Name <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    value=" {{ $student->last_name }}"
                                                    name="last_name" id="last_name"
                                                    type="text" placeholder="Name"/>

                                                @if ($errors->has('last_name'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Email <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="email" id="email"
                                                    value="{{ $student->user->email }}"
                                                    type="email" placeholder="Eamil"/>

                                                @if ($errors->has('email'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Phone Number <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="phone_number" value="{{ $student->phone_number }}"
                                                    type="number" placeholder="Phone Number"/>
                                                @if ($errors->has('phone_number'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Address <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="address" value="{{ $student->address }}"
                                                    type="text" placeholder="Address"/>
                                                @if ($errors->has('address'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Postal Code / Zip Code <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="postal_code" value="{{ $student->postal_code }}"
                                                    type="number" placeholder="Postal Code"/>
                                                @if ($errors->has('postal_code'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('postal_code') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="flex-col select-box">
                                            <p class="text-black-200 mb-4 text-lg"> Country<span
                                                    class="text-blue-800">*</span>
                                            </p>

                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="country_id"
                                                    id="country_id">
                                                <option value="">--- Select Country ---</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                    @if (old('country_id'))
                                                        {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                        @else
                                                        {{ $student->country_id == $country->id ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $country->country_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('country_id'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('country_id') }}</span>
                                            @endif
                                        </div>


                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> State <span
                                                    class="text-blue-800">*</span>
                                            </p>


                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="state_id"
                                                    id="state_id">
                                                <option value="">--- Select State ---</option>

                                                @if(old('country_id'))
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}" {{old('state_id') == $state->id ? 'selected' : ''}} >{{$state->name}}</option>
                                                    @endforeach
                                                @else
                                                    @if($student->country)
                                                        @foreach($student->country->states as $selected_state)
                                                            <option
                                                                value="{{$selected_state->id}}" {{$student->state_id == $selected_state->id ? 'selected' : '' }} >{{$selected_state->name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('state_id') }}</span>
                                            @endif
                                        </div>




                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> City <span
                                                    class="text-blue-800">*</span>
                                            </p>


                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="city_id"
                                                    id="city_id">
                                                <option value="">--- Select City ---</option>

                                                @if(old('state_id'))
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : '' }} >{{$city->name}}</option>
                                                    @endforeach
                                                @else
                                                    @if($student->state)
                                                        @foreach($student->state->cities as $selected_city)
                                                            <option value="{{$selected_city->id}}" {{$student->city_id == $selected_city->id ? 'selected' : '' }} >{{$selected_city->name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                            @if ($errors->has('city_id'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('city_id') }}</span>
                                            @endif
                                        </div>


                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Gender <span
                                                    class="text-blue-800">*</span>
                                            </p>


                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="gender"
                                                    id="gender">
                                                    <option value="">---Select Gender---</option>
                                                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }} >Male</option>
                                                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }} >Female</option>
                                                <option value="Others" {{ $student->gender == 'Others' ? 'selected' : '' }} >Others</option>

                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="grid  gap-4 pt-4">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg">About Me <span
                                                    class="text-blue-800">*</span>
                                            </p>
                                            <textarea rows="3"
                                                      class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                      name="about_me" id="about_me"
                                                      type="text"
                                                      placeholder="Address">{{ $student->about_me }} </textarea>
                                            @if ($errors->has('about_me'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('about_me') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="grid  gap-4 pt-4">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg">Image<span
                                                    class="text-blue-800">*</span>
                                            </p>

                                            <div class="border rounded p-2">
                                                <div class="d-flex flex-column flex-md-row">
                                                    @if($user->image != null)

                                                        <img src="{{getImageFile($user->image)}}"
                                                             id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                             width="170" height="110" alt="Blog Featured Image"/>
                                                    @else

                                                        <img src="{{asset('custom/image/imagePreview.svg')}}"
                                                             id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                             width="170" height="110" alt="Blog Featured Image"/>

                                                    @endif
                                                    <div class="featured-info">
                                                        <p class="my-50">
                                                            <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                        </p>
                                                        <div class="d-inline-block">
                                                            <input class="form-control" type="file" name="image" id="blogCustomFile" accept="image/*" onchange="previewFile(this)"/>
                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                        @endif
                                                        <p> Accepted Size: 300 x 300 (1MB)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex-col mt-4  gap-4">
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
                </form>
            </div>
        </section>
    @else
        <section class="villing-address-area md:py-28 py-20">
            <div class="container">
                <form action="{{ route('student.profileStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" lg:grid-cols-12 gap-6">
                        <div class="col-span-12 ">
                            <div class="villing-address-box border mt-4 p-4">
                                <div class="countery-box border-blue-5  rounded ">

                                    <div class="grid md:grid-cols-2 gap-4">

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">First Name <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    value="{{ old('first_name') }}"
                                                    name="first_name" id="first_name"
                                                    type="text" placeholder="First Name"/>

                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Last Name <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    value="{{ old('last_name') }}"
                                                    name="last_name" id="last_name"
                                                    type="text" placeholder="Last Name"/>

                                                @if ($errors->has('last_name'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Email <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="email" id="email"
                                                    value="{{ old('email') }}"
                                                    type="email" placeholder="Eamil"/>

                                                @if ($errors->has('email'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Phone Number <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="phone_number" value="{{ old('phone_number') }}"
                                                    type="number" placeholder="Phone Number"/>
                                                @if ($errors->has('phone_number'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Address <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="address" value="{{ old('address') }}"
                                                    type="text" placeholder="Address"/>
                                                @if ($errors->has('address'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex-col  gap-4">
                                            <div class="flex-col">
                                                <p class="text-black-200 mb-4 text-lg">Postal Code / Zip Code <span
                                                        class="text-blue-800">*</span>
                                                </p>
                                                <input
                                                    class="appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="postal_code" value="{{ old('postal_code') }}"
                                                    type="number" placeholder="Postal Code"/>
                                                @if ($errors->has('postal_code'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('postal_code') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="flex-col select-box">
                                            <p class="text-black-200 mb-4 text-lg"> Country<span
                                                    class="text-blue-800">*</span>
                                            </p>

                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="country_id"
                                                    id="country_id">
                                                <option value="">--- Select Country ---</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if(old('country_id'))
                                                        {{old('country_id') == $country->id ? 'selected' : '' }}
                                                        @endif >{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('country_id'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('country_id') }}</span>
                                            @endif
                                        </div>


                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> State <span
                                                    class="text-blue-800">*</span>
                                            </p>


                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="state_id"
                                                    id="state_id">
                                                <option value="">--- Select State ---</option>

                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('state_id') }}</span>
                                            @endif
                                        </div>




                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> City <span
                                                    class="text-blue-800">*</span>
                                            </p>


                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="city_id"
                                                    id="city_id">
                                                <option value="">--- Select City ---</option>

                                            </select>
                                            @if ($errors->has('city_id'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('city_id') }}</span>
                                            @endif
                                        </div>


                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg"> Gender <span
                                                    class="text-blue-800">*</span>
                                            </p>


                                            <select class="w-full arifSelect bg-white text-gray-500"
                                                    name="gender"
                                                    id="gender">
                                                <option value="">---Select Gender---</option>
                                                <option value="Male" {{old('gender') == 'Male' ? 'selected' : '' }} >Male</option>
                                                <option value="Female" {{old('gender') == 'Female' ? 'selected' : '' }} >Female</option>
                                                <option value="Others" {{old('gender') == 'Others' ? 'selected' : '' }} >Others</option>

                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="grid  gap-4 pt-4">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg">About Me <span
                                                    class="text-blue-800">*</span>
                                            </p>
                                            <textarea rows="3"
                                                      class=" appearance-none border rounded w-full py-2.5 px-3 bg-white  placeholder-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                                      name="about_me" id="about_me"
                                                      type="text"
                                                      placeholder="Address">{{ old('about_me') }} </textarea>
                                            @if ($errors->has('about_me'))
                                                <span class="text-danger"><i
                                                        class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('about_me') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="grid  gap-4 pt-4">
                                        <div class="flex-col">
                                            <p class="text-black-200 mb-4 text-lg">Image<span
                                                    class="text-blue-800">*</span>
                                            </p>

                                            <div class="border rounded p-2">
                                                <div class="d-flex flex-column flex-md-row">
                                                    @if($user->image != null)

                                                        <img src="{{getImageFile($user->image)}}"
                                                             id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                             width="170" height="110" alt="Blog Featured Image"/>
                                                    @else

                                                        <img src="{{asset('custom/image/imagePreview.svg')}}"
                                                             id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                             width="170" height="110" alt="Blog Featured Image"/>

                                                    @endif
                                                    <div class="featured-info">
                                                        <p class="my-50">
                                                            <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                        </p>
                                                        <div class="d-inline-block">
                                                            <input class="form-control" type="file" name="image" id="blogCustomFile" accept="image/*" onchange="previewFile(this)"/>
                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                        @endif
                                                        <p> Accepted Size: 300 x 300 (1MB)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex-col mt-4  gap-4">
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
                </form>
            </div>
        </section>
    @endif
    <!--  ====================== villing address Area End =============================  -->
@endsection



@push('scripts')

        <script src="{{asset('app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/pages/page-blog-edit.js')}}"></script>


    <script>
        $(function () {
            var stateSelectedId = '{{ old('state_id') }}';
            $('#country_id').change(function () {
                var country_id = $(this).val();
                $('#state_id').html('<option value="">---Select State---</option>');
                if (country_id != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('student.getStates') }}",
                        data: {country_id: country_id}
                    }).done(function (data) {
                        $.each(data, function (index, item) {
                            if (stateSelectedId == item.id)
                                $('#state_id').append('<option value="' + item.id + '" selected>' + item.name + '</option>');
                            else
                                $('#state_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    });
                }
            });
        });

        $(function () {
            var citySelectedId = '{{ old('city_id') }}';
            $('#state_id, #country_id').change(function () {
                var state_id = $(this).val();
                $('#city_id').html('<option value="">---Select City---</option>');
                if (state_id != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('student.getCities') }}",
                        data: {state_id: state_id}
                    }).done(function (data) {
                        $.each(data, function (index, item) {
                            if (citySelectedId == item.id)
                                $('#city_id').append('<option value="' + item.id + '" selected>' + item.name + '</option>');
                            else
                                $('#city_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    });
                }
            });
        });


    </script>
@endpush
