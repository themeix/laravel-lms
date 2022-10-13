@extends('layouts.adminMaster')
@section('title','Edit Category')
@section('content')

    <!-- BEGIN: Content-->

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category List</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Category
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('category.index')}}">
                        <button type="button" class="btn btn-primary">Category List</button>
                    </a>
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
                                <form class="form" action="{{route('category.update', [$category->uuid])}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">Name</label>
                                                <input
                                                        value="{{$category->name}}"
                                                        type="text"
                                                        id="name"
                                                        class="form-control"
                                                        placeholder="Name"
                                                        name="name"
                                                />
                                                @if ($errors->has('name'))
                                                    <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="image">Image</label>
                                                <img src="">
                                                <input
                                                        type="file"
                                                        id="image"
                                                        class="form-control"
                                                        accept="image/*"
                                                        onchange="previewFile(this)"
                                                        name="image"
                                                />

                                                @if ($errors->has('image'))
                                                    <span class="text-danger"><i
                                                                class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                @endif

                                                <div class="pt-2 ">
                                                    <p> Recommend Size: 80 x 80 (1MB)</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="is_feature">Is Feature</label>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input p-2" type="checkbox"
                                                           id="is_feature"
                                                           value="yes" {{$category->is_feature == 'yes' ? 'checked' : '' }}
                                                           name="is_feature"
                                                    />

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="is_showing_course">Showing Courses in Homepage</label>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input p-2" type="checkbox"
                                                           id="is_showing_course"
                                                           value="yes" {{$category->is_showing_course == 'yes' ? 'checked' : '' }}
                                                           name="is_showing_course"
                                                    />

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12">

                                        <button type="submit" class="btn btn-primary me-1">Update</button>

                                        {{--<button type="reset" class="btn btn-outline-secondary">Reset</button>--}}


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
