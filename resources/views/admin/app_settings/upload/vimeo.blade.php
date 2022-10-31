@extends('layouts.adminMaster')
@section('title','Add Vimeo')
@section('content')

    <!-- BEGIN: Content-->


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Add Vimeo</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Vimeo
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
                            <div class="card-body">
                                <form class="form" action="{{route('vimeo-settings.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Vimeo Client ID</label>
                                                <input
                                                    value="{{ env('VIMEO_CLIENT') }}"
                                                    type="text"
                                                    id="VIMEO_CLIENT"
                                                    class="form-control "
                                                    name="VIMEO_CLIENT"
                                                />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Vimeo Secret</label>
                                                <input
                                                    value="{{ env('VIMEO_SECRET') }}"
                                                    type="text"
                                                    id="VIMEO_SECRET"
                                                    class="form-control "
                                                    name="VIMEO_SECRET"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Vimeo Token Access</label>
                                                <input
                                                    value="{{ env('VIMEO_TOKEN_ACCESS') }}"
                                                    type="text"
                                                    id="VIMEO_TOKEN_ACCESS"
                                                    class="form-control "
                                                    name="VIMEO_TOKEN_ACCESS"
                                                />
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Paypal Status</label>
                                                <select name="VIMEO_STATUS" class="form-control">
                                                    <option value="">--select option--</option>
                                                    <option value="active" @if(env('VIMEO_STATUS') == "active") selected @endif>Active</option>
                                                    <option value="deactivated" @if(env('VIMEO_STATUS') == "deactivated") selected @endif>Deactivated</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
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

@push('scripts')

@endpush


