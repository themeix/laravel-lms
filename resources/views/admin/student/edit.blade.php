@extends('layouts.adminMaster')
@section('title','Edit Student')


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
                        <h2 class="content-header-title float-start mb-0">Edit Student</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('student.index')}}">Student List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit Student
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
                            <form class="needs-validation" method="post" action="{{route('student.update', $student->uuid)}}" enctype="multipart/form-data" novalidate>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">First Name</label>

                                            <input
                                                    type="text"
                                                    id="first_name"
                                                    name="first_name"
                                                    value="{{ $student->first_name }}"
                                                    class="form-control"
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
                                            <label class="form-label" for="basic-addon-name">Last Name</label>

                                            <input
                                                    type="text"
                                                    id="last_name"
                                                    class="form-control"
                                                    value="{{ $student->last_name }}" placeholder="Last name"
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
                                                    value="{{ @$student->user->email }}" placeholder="Email"
                                                    class="form-control"

                                                    aria-label="john.doe@email.com"
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
                                                    type="password"
                                                    id="password"
                                                    class="form-control"
                                                    name="password" value="" placeholder="Password"
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
                                            <label class="form-label" for="basic-addon-name">Phone Number</label>

                                            <input
                                                    type="text"
                                                    name="phone_number" value="{{ $student->phone_number }}"
                                                    class="form-control"
                                                    placeholder="Phone Number"
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
                                                name="address" value="{{ $student->address }}" placeholder="Address"
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
                                            <label class="form-label" for="basic-addon-name">Zip Code / Postal
                                                Code</label>

                                            <input
                                                    type="number"
                                                    name="postal_code" value="{{ $student->postal_code }}"
                                                    class="form-control"
                                                    placeholder="Zip Code / Postal Code"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('postal_code'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('postal_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Country</label>
                                            <select class="form-select" name="country_id" id="country_id" required>
                                                <option value="">{{__('app.select_country')}}</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if(old('country_id'))
                                                        {{old('country_id') == $country->id ? 'selected' : '' }}
                                                        @else
                                                        {{$student->country_id == $country->id ? 'selected' : '' }}
                                                        @endif >{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your country</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">State</label>

                                            <input
                                                    type="text"
                                                    id="basic-addon-name"
                                                    class="form-control"
                                                    placeholder="State"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your State.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">City</label>

                                            <input
                                                    type="text"
                                                    id="basic-addon-name"
                                                    class="form-control"
                                                    placeholder="City"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your City.</div>
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
                                            <label class="form-label" for="basic-addon-name">Facebook</label>

                                            <input
                                                    type="text"
                                                    id="basic-addon-name"
                                                    class="form-control"
                                                    placeholder="Facebook"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Facebook Link.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Twitter</label>

                                            <input
                                                    type="text"
                                                    id="basic-addon-name"
                                                    class="form-control"
                                                    placeholder="Twitter"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Twitter Link.</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Linkedin</label>

                                            <input
                                                    type="text"
                                                    id="basic-addon-name"
                                                    class="form-control"
                                                    placeholder="Linkedin"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Linkedin Link.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Pinterest</label>

                                            <input
                                                    type="text"
                                                    id="basic-addon-name"
                                                    class="form-control"
                                                    placeholder="Pinterest"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Pinterest Link.</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="d-block form-label" for="validationBioBootstrap">Bio</label>
                                            <textarea
                                                    class="form-control"
                                                    id="validationBioBootstrap"
                                                    name="validationBioBootstrap"
                                                    rows="3"
                                                    required
                                            ></textarea>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label for="customFile1" class="form-label">Profile pic</label>
                                            <input class="form-control" type="file" id="customFile1" required/>
                                        </div>
                                    </div>
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
@endpush
