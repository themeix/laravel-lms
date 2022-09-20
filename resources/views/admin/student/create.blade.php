@extends('layouts.adminMaster')
@section('title','Create Student')


@push('styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
@endpush

@section('content')
    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Student</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('student.index')}}">Student List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Student
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('student.index')}}">
                        <button type="button" class="btn btn-primary">Student List</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="bs-validation">
                <div class="col-md-12 col-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <h4 class="card-title">Bootstrap Validation</h4>
                        </div>--}}
                        <div class="card-body">
                            <form class="needs-validation" action="{{route('student.store')}}" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first_name">First Name</label>

                                            <input
                                                    type="text"
                                                    name="first_name" value="{{old('first_name')}}"
                                                    class="form-control"
                                                    id="first_name"
                                                    placeholder="First Name"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="last_name">Last Name</label>

                                            <input
                                                    type="text"
                                                    name="last_name" value="{{old('last_name')}}"
                                                    id="last_name"
                                                    class="form-control"
                                                    placeholder="Last Name"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('last_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-default-email1">Email</label>
                                            <input
                                                    type="email"
                                                    name="email" value="{{old('email')}}" placeholder="Email"
                                                    class="form-control"
                                                    required
                                            />
                                            @if ($errors->has('email'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-default-password1">Password</label>
                                            <input

                                                    type="password" name="password" value="{{old('password')}}" placeholder="Password"
                                                    class="form-control"
                                                    required
                                            />
                                            @if ($errors->has('password'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="phone_number">Phone Number</label>

                                            <input
                                                    type="text"
                                                    name="phone_number" value="{{old('phone_number')}}"
                                                    placeholder="Phone number"
                                                    class="form-control"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Address</label>

                                            <input
                                                    type="text"
                                                    name="address" value="{{old('address')}}" placeholder="Address"
                                                    class="form-control"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Postal Code</label>

                                            <input
                                                    type="text"
                                                    name="postal_code" value="{{old('postal_code')}}" placeholder="Postal Code"
                                                    class="form-control"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('postal_code'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('postal_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Select Country</label>

                                            <select name="country_id" id="country_id" class="form-select">
                                                <option value="">---Select Country---</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if(old('country_id'))
                                                        {{old('country_id') == $country->id ? 'selected' : '' }}
                                                        @endif >{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-select">
                                                <option value="">---Select State---</option>
                                                @if(old('country_id'))
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}" {{old('state_id') == $state->id ? 'selected' : ''}} >{{$state->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city_id">State</label>

                                            <select name="city_id" id="city_id" class="form-select">
                                                <option value="">---Select City---</option>
                                                @if(old('state_id'))
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : '' }} >{{$city->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Gender</label>

                                            <select name="gender" id="gender" class="form-select" required>
                                                <option value="">{{__('app.select_option')}}</option>
                                                <option value="Male" {{old('gender') == 'Male' ? 'selected' : '' }} >Male</option>
                                                <option value="Female" {{old('gender') == 'Female' ? 'selected' : '' }} >Female</option>
                                                <option value="Others" {{old('gender') == 'Others' ? 'selected' : '' }} >Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Gender</label>
                                            <select class="form-select" id="select-country1" required>
                                                <option value="">Select Gender</option>
                                                <option value="usa">Male</option>
                                                <option value="uk">Female</option>
                                                <option value="france">Others</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your Gender</div>
                                        </div>
                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label for="customFile1" class="form-label">Profile pic</label>
                                            <img src="">
                                            <input type="file" class="form-control" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                        </div>
                                    </div>

                                    @if ($errors->has('image'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                    @endif
                                    <p>Accepted Image Files: JPEG, JPG, PNG <br> Accepted Size: 300 x 300 (1MB)</p>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">

                                        <div class="mb-1">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                       id="validationCheckBootstrap" required/>
                                                <label class="form-check-label" for="validationCheckBootstrap">Agree to
                                                    our terms and conditions</label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


            </section>
            <!-- /Validation -->

        </div>
    </div>

    <!-- END: Content-->

@endsection

@push('scripts')
    <script src="{{asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>

    <script src="{{asset('custom/js/getByParentId.js')}}"></script>

@endpush
