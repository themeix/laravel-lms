@extends('layouts.adminMaster')
@section('title','Show Student')


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
                        <h2 class="content-header-title float-start mb-0">Show Student</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('student.index')}}">Student List
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Show Student
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('student.index')}}">
                        <button type="button" class="btn btn-primary">Student List</button>
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
                                            src="{{getImageFile($student->user ? @$student->user->image : '')}}"
                                            height="110"
                                            width="110"
                                            alt="User avatar"
                                        />
                                        <div class="user-info text-center">
                                            <h4>{{ $student->first_name }} {{ $student->last_name }}</h4>
                                            <span class="badge badge-glow bg-info">Student</span>
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
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span class="status badge badge-glow badge-light-dark "> {{ $student->user->email }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Phone:</span>
                                            <span class="status badge badge-glow badge-light-dark "> {{ $student->phone_number }}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Gender:</span>
                                            <span>{{$student->gender}}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Country:</span>
                                            <span>{{$student->country ? $student->country->country_name : ''}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">State:</span>
                                            <span>{{@$student->state->name}}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">City:</span>
                                            <span>{{@$student->city->name}}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Address:</span>
                                            <span>{{@$student->address}}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>
                                            @if($student->status == 1)
                                                <span class="badge badge-glow bg-success">
                                                    Approved
                                                    </span>
                                            @elseif($student->status == 2)
                                                <span class="badge badge-glow bg-danger">
                                                    Blocked
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

                                <h4 class="fw-bolder border-bottom pb-50 mb-1">About Me</h4>
                                <div class="info-container">
                                    <p>{{ $student->about_me }}</p>
                                </div>
                            </div>
                        </div>
                        <!--about section end-->

                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <div class="row">

                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center pb-2">
                                        <div class="avatar bg-light-success p-50 m-0">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket avatar-icon font-medium-3"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg>
                                            </div>
                                        </div>
                                        <h2 class="fw-bolder mt-1">{{ studentCoursesCount($student->user_id) }}</h2>
                                        <p class="card-text">Total Enrolled Courses</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <h4 class="card-header">Enrolled Courses</h4>
                            <table id="example" class="table table-bordered dataTables_info">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderItems as $orderItem)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <span class="data-text"><a href="{{--{{route('admin.course.view', [@$orderItem->course->uuid])}}--}}">{{ @$orderItem->course->title }}</a></span>
                                        </td>
                                    </tr>
                                @endforeach
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
