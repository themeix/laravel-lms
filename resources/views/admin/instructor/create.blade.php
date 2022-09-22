@extends('layouts.adminMaster')
@section('title','Create Instructor')


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
                        <h2 class="content-header-title float-start mb-0">Create Instructor</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('instructor.index')}}">Instructor List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Instructor
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
                            <form class="needs-validation" action="{{route('instructor.store')}}" method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">First Name</label>

                                            <input
                                                type="text"
                                                name="first_name" value="{{old('first_name')}}"
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
                                                name="last_name" value="{{old('last_name')}}"
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
                                                name="email" value="{{old('email')}}"
                                                class="form-control"
                                                placeholder="email"
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
                                                name="password" value="{{old('password')}}"
                                                class="form-control"
                                                placeholder="Password"
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
                                            <label class="form-label" for="basic-addon-name">Professional Title</label>

                                            <input
                                                type="text"
                                                name="professional_title" value="{{old('professional_title')}}"
                                                class="form-control"
                                                placeholder="Professional Title"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('professional_title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('professional_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Phone Number</label>

                                            <input
                                                type="text"
                                                name="phone_number" value="{{old('phone_number')}}"
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
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Address</label>

                                            <input
                                                type="text"
                                                name="address" value="{{old('address')}}"
                                                class="form-control"
                                                placeholder="Address"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Zip Code / Postal
                                                Code</label>

                                            <input
                                                type="number"
                                                name="postal_code" value="{{old('postal_code')}}"
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
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">State</label>

                                            <label class="form-label" for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-select">
                                                <option value="">---Select State---</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">City</label>

                                            <label class="form-label" for="city_id">City</label>

                                            <select name="city_id" id="city_id" class="form-select">
                                                <option value="">---Select City---</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Gender</label>
                                            <select name="gender" id="gender" class="form-select" required>
                                                <option value="">---Select Gender---</option>
                                                <option value="Male" {{old('gender') == 'Male' ? 'selected' : '' }} >
                                                    Male
                                                </option>
                                                <option
                                                    value="Female" {{old('gender') == 'Female' ? 'selected' : '' }} >
                                                    Female
                                                </option>
                                                <option
                                                    value="Others" {{old('gender') == 'Others' ? 'selected' : '' }} >
                                                    Others
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Facebook</label>

                                            <input
                                                type="text"
                                                name="social_link[facebook]" value="" placeholder="https://facebook.com"
                                                class="form-control"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">


                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Twitter</label>

                                            <input
                                                type="text"
                                                name="social_link[twitter]" value="" class="form-control"
                                                placeholder="https://twitter.com"
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
                                                name="social_link[linkedin]" value="" class="form-control"
                                                placeholder="https://linkedin.com"
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
                                                name="social_link[pinterest]" value="" class="form-control"
                                                placeholder="https://pinterest.com"
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
                                                name="about_me"

                                                rows="3"
                                                required
                                            >{{ old('about_me') }}</textarea>
                                            @if ($errors->has('about_me'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('about_me') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label for="customFile1" class="form-label">Profile pic</label>
                                            <img src="">
                                            <input type="file" class="form-control" name="image" id="image"
                                                   accept="image/*"
                                                   onchange="previewFile(this)">
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                        @endif
                                        <p>Accepted Image Files: JPEG, JPG, PNG <br> Accepted Size: 300 x 300 (1MB)</p>
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
            $('#country_id').trigger('change');
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
            $('#state_id').trigger('change');
        });

    </script>



@endpush
