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
                                {{--<div class="d-flex justify-content-around my-2 pt-75">
                                    <div class="d-flex align-items-start me-2">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="check" class="font-medium-2"></i>
              </span>
                                        <div class="ms-75">
                                            <h4 class="mb-0">1.23k</h4>
                                            <small>Tasks Done</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
              <span class="badge bg-light-primary p-75 rounded">
                <i data-feather="briefcase" class="font-medium-2"></i>
              </span>
                                        <div class="ms-75">
                                            <h4 class="mb-0">568</h4>
                                            <small>Projects Done</small>
                                        </div>
                                    </div>
                                </div>--}}
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span>{{$instructor->user->email}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Mobile:</span>
                                            <span>{{$instructor->phone_number ?? @$instructor->user->phone_number}}</span>
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
                                    <div class="d-flex justify-content-center pt-2">
                                        <a href="{{route('instructor.edit', [$instructor->uuid])}}"
                                           class="btn btn-primary me-1">
                                            Edit
                                        </a>
                                        <a href="{{route('instructor.delete', [$instructor->uuid])}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->

                        <!-- Social Link Card -->
                        <div class="card">
                            <div class="card-body">

                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Social Links</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Facebook:</span>
                                            <span>{{$instructor->facebook}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Twitter:</span>
                                            <span>{{$instructor->twitter}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">LinkedIn:</span>
                                            <span>{{$instructor->linkedin}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Pinterest:</span>
                                            <span>{{$instructor->pinterest}}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Social Link Card -->

                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                        <!-- Project table -->
                        <div class="card">
                            <h4 class="card-header">User's Projects List</h4>

                        </div>
                        <!-- /Project table -->

                        <!-- Activity Timeline -->
                        <div class="card">
                            <h4 class="card-header">User Activity Timeline</h4>
                            <div class="card-body pt-1">

                            </div>
                        </div>
                        <!-- /Activity Timeline -->

                        <!-- Invoice table -->
                        <div class="card">
                            <h4 class="card-header">User's Projects List</h4>
                        </div>
                        <!-- /Invoice table -->
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
