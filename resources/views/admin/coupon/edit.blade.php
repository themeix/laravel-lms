@extends('layouts.adminMaster')
@section('title','Edit Coupon')


@section('content')
    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Coupon</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('coupon.index')}}">Coupon List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit Coupon
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('coupon.index')}}">
                        <button type="button" class="btn btn-primary">Coupon List</button>
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
                            <form class="needs-validation" action="{{route('coupon.update', $coupon->uuid)}}" method="post" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">

                                            <input type="hidden" name="coupon_code_name" value="{{ $coupon->coupon_code_name }}" >
                                            <input
                                                type="text"
                                                name="coupon_code_name"
                                                value="{{ $coupon->coupon_code_name }}"
                                                class="form-control"
                                                placeholder="Coupon Code Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('coupon_code_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('coupon_code_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="bsDob">Start Date</label>
                                            <input type="text" class="form-control picker" name="start_date" value="{{ $coupon->start_date }}"
                                                   required/>
                                            @if ($errors->has('start_date'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="bsDob">End Date</label>
                                            <input type="text" class="form-control picker" name="end_date" value="{{ $coupon->end_date }}"
                                                   required/>
                                            @if ($errors->has('end_date'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('end_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Coupon Type</label>

                                            <input type="hidden" name="coupon_type" value="{{ $coupon->coupon_type }}" >

                                            <select name="" id="coupon_type" class="form-control" disabled>
                                                <option value="">--Select Option--</option>
                                                <option value="1" @if($coupon->coupon_type == 1) selected @endif>Global</option>
                                                <option value="2" @if($coupon->coupon_type == 2) selected @endif>Instructor</option>
                                                <option value="3" @if($coupon->coupon_type == 3) selected @endif>Course</option>
                                            </select>
                                            @if ($errors->has('coupon_type'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('coupon_type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="row d-none" id="course_id_div">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="Courses">Courses</label>
                                            <select id="course_ids" name="course_ids[]" id="course_ids" class="select2 form-select" multiple>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}"  @if(in_array($course->id, $selectedCourseIDs ?? [])) selected @endif>
                                                        {{ $course->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row d-none" id="instructor_id_div">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="Instructors">Instructors</label>
                                            <select name="instructor_ids[]"  id="instructor_ids" class="select2 form-select" multiple>
                                                @foreach($instructors as $instructor)
                                                    <option value="{{ $instructor->id }}" @if(in_array($instructor->id, $selectedInstructorIDs ?? [])) selected @endif>
                                                        {{ $instructor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Discount (Percentage %)(Ex:
                                                5, 10, 15...)</label>

                                            <input
                                                type="number"
                                                name="percentage" value="{{ $coupon->percentage }}"
                                                class="form-control"
                                                placeholder="%"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('percentage'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('percentage') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Minimum Amount To Apply
                                                Coupon</label>

                                            <input
                                                type="number"
                                                name="minimum_amount" value="{{ $coupon->minimum_amount }}"
                                                class="form-control"
                                                placeholder="Minimum Amount To Apply Coupon"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('minimum_amount'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('minimum_amount') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Maximum Use Limit</label>

                                            <input
                                                type="number"
                                                name="maximum_use_limit" value="{{ $coupon->maximum_use_limit }}"
                                                class="form-control"
                                                placeholder="Maximum Use Limit"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('maximum_use_limit'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('maximum_use_limit') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">--Select Option--</option>
                                                <option value="1" @if($coupon->status == 1) selected @endif>Active</option>
                                                <option value="0" @if($coupon->status != 1) selected @endif>Deactivated</option>
                                            </select>

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
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('custom/js/coupon-create.js')}}"></script>
@endpush
