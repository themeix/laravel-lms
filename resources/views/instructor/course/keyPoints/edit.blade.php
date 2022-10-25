@extends('layouts.instructorMaster')
@section('title','Edit Key Point')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Key Point</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('instructor.course.key-points.index', [$course->uuid])}}">
                                        All key Points List
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Edit Key Point
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.course.key-points.index',[$course->uuid])}}">
                        <button type="button" class="btn btn-primary">All key Points List</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="default-breadcrumb">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><strong>Course</strong> - {{$course->title}} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bs-validation">
                <div class="col-md-12 col-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <h4 class="card-title">Bootstrap Validation</h4>
                        </div>--}}
                        <div class="card-body">
                            <form class="needs-validation invoice-repeater"
                                  action="{{route('instructor.course.key-points.update',[$course->uuid, $key_point->id])}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Key Points Details</label>

                                            <textarea
                                                class="form-control"
                                                id="name"
                                                name="name"
                                                placeholder="Enter your Key Point here."
                                                rows="3"
                                                required
                                            >{{$key_point->name}}</textarea>

                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
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









