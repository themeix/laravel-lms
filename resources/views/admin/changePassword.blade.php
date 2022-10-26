@extends('layouts.adminMaster')
@section('title','Change Password')
@section('content')

    <!-- BEGIN: Content-->


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Change Password</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>

                                <li class="breadcrumb-item active">Change Password
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{--<div class="card-header">
                                <h4 class="card-title">Multiple Column</h4>
                            </div>--}}
                            <div class="card-body">
                                <form class="form" action="{{route('admin.changePasswordStore')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">

                                            <div class="mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="login-password">Old Password</label>
                                                </div>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input type="password" class="form-control form-control-merge"  id="old_password" name="old_password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="old_password"  required/>
                                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                                                </div>
                                                @if ($errors->has('old_password'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('old_password') }}</span>
                                                @endif
                                            </div>

                                            <div class="mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="login-password">New Password</label>
                                                </div>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input type="password" class="form-control form-control-merge " id="new_password" name="new_password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="new_password"  required/>
                                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                                                </div>
                                                @if ($errors->has('new_password'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('new_password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- Basic Floating Label Form section end -->

    </div>
    </div>

    <!-- END: Content-->

@endsection

@push('script')
    <script src="{{asset('custom/js/image-preview.js')}}"></script>
@endpush
