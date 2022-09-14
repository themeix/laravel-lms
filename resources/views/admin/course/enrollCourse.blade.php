@extends('layouts.dashboardMaster')
@section('title','Enroll In Course')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Enroll In Course</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                {{--<li class="breadcrumb-item"><a href="{{route('course.index')}}">Course List</a>
                                </li>--}}

                                <li class="breadcrumb-item active">Enroll In Course
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                {{--<div class="mb-1 breadcrumb-right">
                    <a href="{{route('course.index')}}">
                        <button type="button" class="btn btn-primary">Course List</button>
                    </a>
                </div>--}}
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
                            <form class="needs-validation" novalidate>




                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Select Student</label>
                                            <select class="form-select" id="select-country1" required>
                                                <option value="">Select Student</option>
                                                <option value="usa">USA</option>
                                                <option value="uk">UK</option>
                                                <option value="france">France</option>
                                                <option value="australia">Australia</option>
                                                <option value="spain">Spain</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your country</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1"> Select Course</label>
                                            <select class="form-select" id="select-country1" required>
                                                <option value="">Select Course</option>
                                                <option value="usa">USA</option>
                                                <option value="uk">UK</option>
                                                <option value="france">France</option>
                                                <option value="australia">Australia</option>
                                                <option value="spain">Spain</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your country</div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Enroll</button>
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
