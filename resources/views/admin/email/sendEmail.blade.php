@extends('layouts.dashboardMaster')
@section('title','Send Email')


@push('styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
@endpush

@section('content')
    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Send Email</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                {{--<li class="breadcrumb-item"><a href="{{route('instructor.index')}}">Instructor List</a>
                                </li>--}}

                                <li class="breadcrumb-item active">Send Email
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.index')}}">
                        <button type="button" class="btn btn-primary">Instructor List</button>
                    </a>
                </div>
            </div>--}}
        </div>
        <div class="content-body">
            <section class="bs-validation">
                <div class="col-md-12 col-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <h4 class="card-title">Bootstrap Validation</h4>
                        </div>--}}
                        <div class="card-body">
                            <form class="needs-validation" novalidate>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Select Template</label>
                                            <select class="form-select" id="select-country1" required>
                                                <option value="">Select Template</option>
                                                <option value="usa">USA</option>
                                                <option value="uk">UK</option>
                                                <option value="france">France</option>
                                                <option value="australia">Australia</option>
                                                <option value="spain">Spain</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your Template</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Sender Type</label>
                                            <select class="form-select" id="select-country1" required>
                                                <option value="">Sender Type</option>
                                                <option value="usa">Instructor</option>
                                                <option value="uk">Student</option>
                                                <option value="france">Upload csv</option>

                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select Sender Type</div>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Send</button>
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

@push('scripts')
    <script src="{{asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
@endpush
