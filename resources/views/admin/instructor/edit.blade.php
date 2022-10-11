@extends('layouts.adminMaster')
@section('title','Edit Instructor')


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
                        <h2 class="content-header-title float-start mb-0">Edit Instructor</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('instructor.index')}}">Instructor List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit Instructor
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.index')}}">
                        <button type="button" class="btn btn-primary">Instructor List</button>
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
                            <form class="needs-validation" action="{{route('instructor.update', $instructor->uuid)}}" method="post"
                                  novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">First Name</label>

                                            <input
                                                type="text"
                                                name="first_name"
                                                value="{{ $instructor->first_name }}"
                                                class="form-control"
                                                placeholder="First Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('first_name') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your First name.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Last Name</label>

                                            <input
                                                type="text"
                                                name="last_name" value="{{$instructor->last_name}}"
                                                class="form-control"
                                                placeholder="Last Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />

                                            @if ($errors->has('last_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('last_name') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Last name.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-default-email1">Email</label>
                                            <input
                                                type="email"
                                                name="email" value="{{@$instructor->user->email}}"
                                                class="form-control"
                                                placeholder="eamil"
                                                aria-label="john.doe@email.com"
                                                required
                                            />
                                            @if ($errors->has('email'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                                            @endif

                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a valid email</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-default-password1">Password</label>
                                            <input
                                                type="password"
                                                name="password" value=""
                                                class="form-control"
                                                placeholder="password"
                                                required
                                            />
                                            @if ($errors->has('password'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('password') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your password.</div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Professional Title</label>

                                            <input
                                                type="text"
                                                name="professional_title" value="{{$instructor->professional_title}}"
                                                class="form-control"
                                                placeholder="Professional Title"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('professional_title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('professional_title') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Professional Title.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Phone Number</label>

                                            <input
                                                type="text"
                                                name="phone_number" value="{{$instructor->phone_number}}"
                                                class="form-control"
                                                placeholder="Phone Number"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phone_number') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Phone Number.</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Address</label>

                                            <input
                                                type="text"
                                                name="address" value="{{$instructor->address}}"
                                                class="form-control"
                                                placeholder="Address"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Address.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Zip Code / Postal
                                                Code</label>

                                            <input
                                                type="number"
                                                name="postal_code" value="{{$instructor->postal_code}}"
                                                class="form-control"
                                                placeholder="Zip Code / Postal Code"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('postal_code'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('postal_code') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Zip Code / Postal Code.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Country</label>
                                            <select class="form-select" name="country_id" id="country_id" required>
                                                <option value="">--Select Country--</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if(old('country_id'))
                                                        {{old('country_id') == $country->id ? 'selected' : '' }}
                                                        @else
                                                        {{$instructor->country_id == $country->id ? 'selected' : '' }}
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

                                            <select class="form-select" name="state_id" id="state_id" required>
                                                <option value="">--Select State--</option>
                                                @if(old('country_id'))
                                                    @foreach($states as $state)
                                                        <option
                                                            value="{{$state->id}}" {{old('state_id') == $state->id ? 'selected' : ''}} >{{$state->name}}</option>
                                                    @endforeach
                                                @else
                                                    @if($instructor->country)
                                                        @foreach($instructor->country->states as $selected_state)
                                                            <option
                                                                value="{{$selected_state->id}}" {{$instructor->state_id == $selected_state->id ? 'selected' : '' }} >{{$selected_state->name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your State.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">City</label>

                                            <select class="form-select" name="city_id" id="city_id" required>
                                                <option value="">--Select City--</option>
                                                @if(old('state_id'))
                                                    @foreach($cities as $city)
                                                        <option
                                                            value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : '' }} >{{$city->name}}</option>
                                                    @endforeach
                                                @else
                                                    @if($instructor->state)
                                                        @foreach($instructor->state->cities as $selected_city)
                                                            <option
                                                                value="{{$selected_city->id}}" {{$instructor->city_id == $selected_city->id ? 'selected' : '' }} >{{$selected_city->name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your City.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Gender</label>
                                            <select class="form-select" name="gender" id="gender" required>
                                                <option value="">--Select Gender--</option>
                                                <option
                                                    value="Male" {{ $instructor->gender == 'Male' ? 'selected' : '' }} >
                                                    Male
                                                </option>
                                                <option
                                                    value="Female" {{ $instructor->gender == 'Female' ? 'selected' : '' }} >
                                                    Female
                                                </option>
                                                <option
                                                    value="Others" {{ $instructor->gender == 'Others' ? 'selected' : '' }} >
                                                    Others
                                                </option>
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
                                                name="facebook" value="{{ $instructor->facebook }}"
                                                class="form-control"
                                                placeholder="Facebook"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                            />
                                            @if ($errors->has('facebook'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('facebook') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Facebook Link.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Twitter</label>

                                            <input
                                                type="text"
                                                name="twitter" value="{{ $instructor->twitter }}"
                                                class="form-control"
                                                placeholder="Twitter"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('twitter'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('twitter') }}</span>
                                            @endif
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
                                                name="linkedin" value="{{ $instructor->linkedin }}"
                                                class="form-control"
                                                placeholder="Linkedin"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('linkedin'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('linkedin') }}</span>
                                            @endif
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter your Linkedin Link.</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Pinterest</label>

                                            <input
                                                type="text"
                                                name="pinterest" value="{{ $instructor->pinterest }}"
                                                class="form-control"
                                                placeholder="Pinterest"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('pinterest'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('pinterest') }}</span>
                                            @endif
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
                                                name="about_me"
                                                rows="3"
                                                required
                                            >{{ $instructor->about_me }}</textarea>
                                            @if ($errors->has('about_me'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('about_me') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="border rounded p-2">
                                            <h4 class="mb-1">Image</h4>
                                            <div class="d-flex flex-column flex-md-row">

                                                <img src="{{asset('custom/image/imagePreview.svg')}}"
                                                     id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0"
                                                     width="170" height="110" alt=" Image"/>
                                                <div class="featured-info">
                                                    <p class="my-50">
                                                        <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                    </p>
                                                    <div class="d-inline-block">

                                                        <input class="form-control" type="file" name="image"
                                                               id="blogCustomFile" accept="image/*"
                                                               onchange="previewFile(this)"/>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                    @endif
                                                    <p>Accepted Image Files: JPEG, JPG, PNG <br> Accepted Size: 300 x
                                                        300 (1MB)</p>
                                                </div>
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
                        data: { country_id: country_id }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (stateSelectedId == item.id)
                                $('#state_id').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#state_id').append('<option value="'+item.id+'">'+item.name+'</option>');
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
                        data: { state_id: state_id }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (citySelectedId == item.id)
                                $('#city_id').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                    });
                }
            });
        });

    </script>
@endpush
