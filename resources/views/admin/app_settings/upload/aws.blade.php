@extends('layouts.adminMaster')
@section('title','Add AWS')
@section('content')

    <!-- BEGIN: Content-->


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Add AWS</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add AWS
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
                                <form class="form" action="{{route('aws-settings.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Video Storage Driver</label>
                                                <select name="STORAGE_DRIVER" class="form-control">
                                                    <option value="">--select option--</option>
                                                    <option value="public" @if(env('STORAGE_DRIVER') == "public") selected @endif>Public</option>
                                                    <option value="s3" @if(env('STORAGE_DRIVER') == "s3") selected @endif>s3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">AWS Access Key ID</label>
                                                <input
                                                    value="{{ env('AWS_ACCESS_KEY_ID') }}"
                                                    type="text"
                                                    id="AWS_ACCESS_KEY_ID"
                                                    class="form-control "
                                                    name="AWS_ACCESS_KEY_ID"
                                                />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">AWS Secret Access Key</label>
                                                <input
                                                    value="{{ env('AWS_SECRET_ACCESS_KEY') }}"
                                                    type="text"
                                                    id="AWS_SECRET_ACCESS_KEY"
                                                    class="form-control "
                                                    name="AWS_SECRET_ACCESS_KEY"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">AWS Default Region</label>
                                                <input
                                                    value="{{ env('AWS_DEFAULT_REGION') }}"
                                                    type="text"
                                                    id="AWS_DEFAULT_REGION"
                                                    class="form-control "
                                                    name="AWS_DEFAULT_REGION"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">AWS Bucket</label>
                                                <input
                                                    value="{{ env('AWS_BUCKET') }}"
                                                    type="text"
                                                    id="AWS_BUCKET"
                                                    class="form-control "
                                                    name="AWS_BUCKET"
                                                />
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


