@extends('layouts.adminMaster')
@section('title','Create Question')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Question</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('instructor.course.index', @$exam->course->uuid)}}">My Courses
                                        List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Question
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.course.exam.index',@$exam->course->uuid)}}">
                        <button type="button" class="btn btn-primary">Exam List</button>
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
                            <form class="needs-validation"
                                  action="{{route('instructor.exam.save-mcq-question',[$exam->uuid])}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Question {{$exam->questions->count() + 1}}</label>

                                            <input type="text" name="name"  placeholder="Enter your Question"
                                                   value="{{ old('name') }}" class="form-control">

                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            <hr/>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1 d-flex align-items-center gap-50">
                                            <input type="text" name="options[]" required class="form-control" placeholder="Enter your option">

                                            <div class="col-md-4">
                                                <div class="form-check  d-flex align-items-center">
                                                    <input class="form-check-input p-1" type="checkbox"
                                                           name=""
                                                           id="check-all"
                                                           value="" readonly>
                                                    <label class="form-check-label  ps-1 color-heading"
                                                           for="check-all">Correct Answer </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1 d-flex align-items-center gap-50">
                                            <input type="text" name="options[]" required class="form-control" placeholder="Enter your option">

                                            <div class="col-md-4">
                                                <div class="form-check  d-flex align-items-center">
                                                    <input class="form-check-input p-1" type="checkbox"
                                                           name=""
                                                           id="check-all"
                                                           value="" readonly>
                                                    <label class="form-check-label  ps-1 color-heading"
                                                           for="check-all">Correct Answer </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1 d-flex align-items-center gap-50">
                                            <input type="text" name="options[]" required class="form-control" placeholder="Enter your option">

                                            <div class="col-md-4">
                                                <div class="form-check  d-flex align-items-center">
                                                    <input class="form-check-input p-1" type="checkbox"
                                                           name=""
                                                           id="check-all"
                                                           value="" readonly>
                                                    <label class="form-check-label  ps-1 color-heading"
                                                           for="check-all">Correct Answer </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1 d-flex align-items-center gap-50">
                                            <input type="text" name="options[]" required class="form-control" placeholder="Enter your option">

                                            <div class="col-md-4">
                                                <div class="form-check  d-flex align-items-center">
                                                    <input class="form-check-input p-1" type="checkbox"
                                                           name=""
                                                           id="check-all"
                                                           value="" readonly>
                                                    <label class="form-check-label  ps-1 color-heading"
                                                           for="check-all">Correct Answer </label>
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








