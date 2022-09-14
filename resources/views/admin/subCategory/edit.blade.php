@extends('layouts.dashboardMaster')
@section('title','Edit Sub Category')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Sub Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('subCategory.index')}}">Sub Category List</a>
                                </li>

                                <li class="breadcrumb-item active">Edit Sub Category
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('subCategory.index')}}">
                        <button type="button" class="btn btn-primary">Sub Category List</button>
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
                            <form class="needs-validation" novalidate>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Select Category</label>
                                            <select class="form-select" id="select-country1" required>
                                                <option value="">Select Category</option>
                                                <option value="usa">USA</option>
                                                <option value="uk">UK</option>
                                                <option value="france">France</option>
                                                <option value="australia">Australia</option>
                                                <option value="spain">Spain</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select Category</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Sub Category Name</label>

                                            <input
                                                type="text"
                                                id="basic-addon-name"
                                                class="form-control"
                                                placeholder="Sub Category Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter Sub Category name.</div>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
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
