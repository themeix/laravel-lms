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
                                            <span class="badge bg-light-secondary">Student</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around my-2 pt-75">
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
                                            <span> {{ $student->user->email }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Phone:</span>
                                            <span> {{ $student->phone_number }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>
                                            <span class="badge bg-light-success">Active</span>
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
                                            <span class="fw-bolder me-25">Address:</span>
                                            <span>{{@$student->address}}</span>
                                        </li>

                                    </ul>
                                    <div class="d-flex justify-content-center pt-2">
                                        <a href="{{route('student.edit' , [$student->uuid])}}"
                                           class="btn btn-primary me-1">
                                            Edit
                                        </a>
                                        <a href="javascript:;" class="btn btn-outline-danger suspend-user">Suspended</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->

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
