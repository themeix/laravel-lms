@extends('layouts.adminMaster')
@section('title','Show Course Details')


@push('styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css')}}">
@endpush

@section('content')

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Show Course Details</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('course.index')}}">Course List
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Show Course
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('course.index')}}">
                        <button type="button" class="btn btn-primary">Course List</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5 order-md-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <img
                                            class="img-fluid rounded mt-3 mb-2"
                                            src="{{getImageFile($course->image)}}"
                                            height="110"
                                            width="200"
                                            alt="User avatar"
                                        />
                                        <div class="user-info text-center">
                                            <h4>{{ $course->title }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        {{--<li class="mb-75">
                                            <span class="fw-bolder me-25">Username:</span>
                                            <span>violet.dev</span>
                                        </li>--}}
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Title:</span>
                                            <span class="status badge badge-glow badge-light-dark "> {{$course->instructor ? $course->instructor->name : '' }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Category:</span>
                                            <span class="status badge badge-glow badge-light-dark "> {{$course->category ? $course->category->name : '' }}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Sub Category:</span>
                                            <span class="status badge badge-glow badge-light-dark ">{{$course->subcategory ? $course->subcategory->name : '' }}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Course Type:</span>

                                            @if($course->learner_accessibility == 1)
                                                <span class="badge badge-glow bg-warning">
                                                    Paid
                                                    </span>
                                            @elseif($course->learner_accessibility == 2)
                                                <span class="badge  badge-glow bg-info">
                                                    Free
                                                </span>
                                            @endif
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Price:</span>
                                            <span>{{$course->price}}</span>
                                        </li>


                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>
                                            @if($course->status == 1)
                                                <span class="badge badge-glow bg-success">
                                                    Approved
                                                    </span>
                                            @elseif($course->status == 2)
                                                <span class="badge badge-glow bg-info">
                                                    Waiting for Approval
                                                    </span>
                                            @elseif($course->status == 3)
                                                <span class="badge badge-glow bg-danger">
                                                    Hold
                                                    </span>
                                            @endif
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->

                        <!--about section start-->
                        <div class="card">
                            <div class="card-body">

                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Course Description</h4>
                                <div class="info-container">
                                    <p>{{ $course->description }}</p>
                                </div>
                            </div>
                        </div>
                        <!--about section end-->

                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                        <div class="card">
                            <h4 class="card-header">Course Lessons And Lectures</h4>
                            <table id="example" class="table table-bordered dataTables_info">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($orderItems as $orderItem)
                                    <tr>
                                        <td>
                                            <a href="{{route('admin.course.view', [@$orderItem->course->uuid])}}"><img src="{{ getImageFile(@$orderItem->course->image_path) }}" alt="course" class="img-fluid" width="80"></a>
                                        </td>
                                        <td>
                                            <span class="data-text"><a href="{{route('admin.course.view', [@$orderItem->course->uuid])}}">{{ @$orderItem->course->title }}</a></span>
                                        </td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!--/ User Content -->
                </div>
            </section>

        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>


    <script src="{{asset('app-assets/js/scripts/pages/app-user-view-account.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/modal-edit-user.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/app-user-view.min.js')}}"></script>
@endpush
