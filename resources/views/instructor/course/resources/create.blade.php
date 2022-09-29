@extends('layouts.adminMaster')
@section('title','Create Resources')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Resource</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('instructor.course.resource.index', [$course->uuid])}}">Resource
                                        List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Resource
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.course.resource.index',[$course->uuid])}}">
                        <button type="button" class="btn btn-primary">Resource List</button>
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
                                  action="{{route('instructor.course.resource.store',[$course->uuid])}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-2">
                                        </div>
                                        <div class="mb-2">
                                            <input type="file" name="file" id="file" title="Upload Your Files"
                                                   class="form-control">

                                            @if ($errors->has('file'))
                                                <span class="text-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('file') }}</span>
                                            @endif
                                        </div>
                                        <p>Accepted files: ZIP</p>

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








