@extends('layouts.instructorMaster')
@section('title','Create Exam')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Exam</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('instructor.course.index', [$course->uuid])}}">My Courses
                                        List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Exam
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.course.exam.index',[$course->uuid])}}">
                        <button type="button" class="btn btn-primary">Exam List</button>
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
                                  action="{{route('instructor.course.exam.store',[$course->uuid])}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Exam Name</label>

                                            <input type="text" name="name"  placeholder="Enter your Exam Name"
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
                                            <label class="form-label" for="name">Marks Per Question</label>

                                            <input type="number" class="form-control" name="marks_per_question"
                                                   placeholder="Enter Marks Per Question" value="{{ old('marks_per_question') }}">

                                            @if ($errors->has('marks_per_question'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('marks_per_question') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Time Duration (Minutes)</label>

                                            <input type="number" class="form-control" name="duration"
                                                   placeholder="Enter Duration" value="{{ old('duration') }}">

                                            @if ($errors->has('duration'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('duration') }}</span>
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








