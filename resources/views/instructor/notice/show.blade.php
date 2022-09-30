@extends('layouts.instructorMaster')
@section('title','Show Notice')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Show Notice</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('instructor.courseWiseNotice.index', [$course->uuid])}}">Course Wise Notice
                                        List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Notice
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.notice.index',[$course->uuid])}}">
                        <button type="button" class="btn btn-primary">Notice List</button>
                    </a>
                </div>
            </div>
        </div>

        <section id="default-breadcrumb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Course - {{$course->title}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="content-body">
            <section class="bs-validation">
                <div class="col-md-12 col-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <h4 class="card-title">Bootstrap Validation</h4>
                        </div>--}}
                        <div class="card-body">
                            <div class="mb-2">
                                <h2> Course Topic:  {{$notice->topic}} </h2>
                            </div>

                            <div class="mb-2">
                                <h2>Details: </h2> {{$notice->details}}

                            </div>


                        </div>
                    </div>
                </div>


            </section>
            <!-- /Validation -->

        </div>
    </div>

    <!-- END: Content-->

@endsection








