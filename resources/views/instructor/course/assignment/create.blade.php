@extends('layouts.instructorMaster')
@section('title','Create Assignment')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Assignment</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('instructor.course.assignment.index', [$course->uuid])}}">Assignment
                                        List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Assignment
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.course.assignment.index',[$course->uuid])}}">
                        <button type="button" class="btn btn-primary">Assignment List</button>
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
                            <form class="needs-validation"
                                  action="{{route('instructor.course.assignment.store',[$course->uuid])}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Assignment Topic</label>

                                            <input type="text" name="name" placeholder="Enter your Assignment topic"
                                                   value="{{ old('name') }}" class="form-control">

                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Assignment Marks</label>

                                            <input type="number" class="form-control" name="marks"
                                                   placeholder="Enter your Assignment Marks" value="{{ old('marks') }}">

                                            @if ($errors->has('marks'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('marks') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Assignment Details</label>

                                            <textarea class="form-control" name="description" rows="5"
                                                      placeholder="Enter your Assignment details">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Upload Your Files</label>

                                            <input type="file" name="file" class="form-control"
                                                   title="Upload Your Files"/>

                                            @if ($errors->has('file'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('file') }}</span>
                                            @endif

                                            <p class="font-14 color-heading mt-2 color-gray">Accepted files (PDF or ZIP)
                                                <span class="d-block">Maximum Image Upload Size is <span
                                                        class="color-heading">10mb</span></span></p>

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








