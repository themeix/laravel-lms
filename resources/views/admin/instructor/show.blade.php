@extends('layouts.adminMaster')
@section('title','Show Instructor')


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
                        <h2 class="content-header-title float-start mb-0">Show Instructor</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('instructor.index')}}">Instructor
                                        List
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Show Instructor
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.index')}}">
                        <button type="button" class="btn btn-primary">Instructor List</button>
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
                                            src="{{ getImageFile($instructor->user ? @$instructor->user->image : '') }}"
                                            height="110"
                                            width="110"
                                            alt="User avatar"
                                        />
                                        <div class="user-info text-center">
                                            <h4>{{$instructor->first_name}} {{$instructor->last_name}}</h4>
                                            <span class="badge badge-glow bg-info">Instructor</span>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span
                                                class="status badge badge-glow badge-light-dark ">{{$instructor->user->email}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Mobile:</span>
                                            <span
                                                class="status badge badge-glow badge-light-dark ">{{$instructor->phone_number ?? @$instructor->user->phone_number}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Country:</span>
                                            <span>{{@$instructor->country->country_name}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">State:</span>
                                            <span>{{@$instructor->state->name}}</span>
                                        </li>

                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Address:</span>
                                            <span>{{$instructor->address}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>

                                            @if($instructor->status == 1)
                                                <span class="badge badge-glow bg-success">
                                                    Approved
                                                    </span>
                                            @elseif($instructor->status == 2)
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
                                    <p>{{ $instructor->about_me }}</p>
                                </div>
                            </div>
                        </div>
                        <!--about section end-->

                        <!-- Social Link Card -->
                        <div class="card">
                            <div class="card-body">

                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Social Links</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Facebook:</span>
                                            <span
                                                class="status badge badge-glow badge-light-dark ">{{$instructor->facebook}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Twitter:</span>
                                            <span
                                                class="status badge badge-glow badge-light-dark ">{{$instructor->twitter}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">LinkedIn:</span>
                                            <span
                                                class="status badge badge-glow badge-light-dark ">{{$instructor->linkedin}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Pinterest:</span>
                                            <span
                                                class="status badge badge-glow badge-light-dark ">{{$instructor->pinterest}}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Social Link Card -->

                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->

                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-2">
                        <div class="row">

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center pb-2">
                                        <div class="avatar bg-light-success p-50 m-0">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-pocket avatar-icon font-medium-3">
                                                    <path
                                                        d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path>
                                                    <polyline points="8 10 12 14 16 10"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                        <h2 class="fw-bolder mt-1">{{$instructor->publishedCourses->count()}}</h2>
                                        <p class="card-text">Approved Courses</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center pb-2">
                                        <div class="avatar bg-light-danger p-50 m-0">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-package font-medium-5">
                                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                                    <path
                                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                                </svg>
                                            </div>
                                        </div>
                                        <h2 class="fw-bolder mt-1">
                                            {{$instructor->pendingCourses->count() + $instructor->holdCourses->count()}}
                                        </h2>
                                        <p class="card-text">Pending Courses</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header flex-column align-items-center pb-2">
                                        <div class="avatar bg-light-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-dollar-sign avatar-icon">
                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <h2 class="fw-bolder mt-1">

                                            @if(get_currency_placement() == 'after')
                                                {{ @$total_earning }} {{ get_currency_symbol() }}
                                            @else
                                                {{ get_currency_symbol() }} {{ @$total_earning }}
                                            @endif

                                        </h2>
                                        <p class="card-text">Total Earning</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Project table -->
                        <div class="card">
                            <h4 class="card-header">All Courses</h4>
                            <table id="example" class="table table-bordered dataTables_info">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Course Title</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <span class="data-text">{{$course->title}}</span>
                                        </td>
                                        <td>
                                            <span class="data-text">
                                                 @if($course->status == 2)

                                                    <span class="badge badge-glow bg-info">
                                                    Pending
                                                    </span>
                                                @endif

                                                @if($course->status == 1)
                                                    <span class="badge badge-glow bg-success">
                                                    Approved
                                                    </span>
                                                @endif

                                                @if($course->status == 3)

                                                    <span class="badge badge-glow bg-warning">
                                                    Hold
                                                    </span>
                                                @endif

                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /Project table -->

                        <!-- Activity Timeline -->
                        {{--<div class="card">
                            <h4 class="card-header">Awards</h4>
                            <table id="example" class="table table-bordered dataTables_info">
                                <thead>
                                <tr>
                                    <th>Title Of The Award</th>
                                    <th>Winning Year</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($instructor->awards as $award)
                                    <tr class="removable-item">
                                        <td>
                                            <span class="data-text">{{$award->name}}</span>
                                        </td>
                                        <td>
                                            <span class="data-text">{{$award->winning_year}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>--}}
                        <!-- /Activity Timeline -->

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
