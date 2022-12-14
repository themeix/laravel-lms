@extends('layouts.adminMaster')
@section('title','Edit Country')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Tag</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('location.index')}}">Country List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit Tag
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('location.index')}}">
                        <button type="button" class="btn btn-primary">Country List</button>
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
                            <form class="needs-validation" action="{{route('location.update', [$country->uuid])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Country Name</label>

                                            <input
                                                    type="text"
                                                    name="country_name" id="country_name" value="{{$country->country_name}}"
                                                    class="form-control"
                                                    placeholder="Country Name"
                                                    aria-label="Name"
                                                    aria-describedby="basic-addon-name"
                                                    required
                                            />
                                            @if ($errors->has('country_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('country_name') }}</span>
                                            @endif
                                        </div>



                                        <div class="mb-1">
                                            <label class="form-label" for="name">Short Name</label>

                                            <input
                                                type="text"
                                                name="short_name" id="short_name" value="{{$country->short_name}}"
                                                class="form-control"
                                                placeholder="Tag Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                                style='text-transform:uppercase'
                                            />
                                            @if ($errors->has('short_name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('short_name') }}</span>
                                            @endif
                                        </div>



                                        <div class="mb-1">
                                            <label class="form-label" for="phonecode">Phone Code</label>

                                            <input
                                                type="text"
                                                name="phonecode" id="phonecode" value="{{$country->phonecode}}"
                                                class="form-control"
                                                placeholder="Phone Code"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('phonecode'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('phonecode') }}</span>
                                            @endif
                                        </div>




                                        <div class="mb-1">
                                            <label class="form-label" for="continent">Continent</label>

                                            <input
                                                type="text"
                                                name="continent" id="continent" value="{{$country->continent}}"
                                                class="form-control"
                                                placeholder="Phone Code"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('continent'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('continent') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Update</button>
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
