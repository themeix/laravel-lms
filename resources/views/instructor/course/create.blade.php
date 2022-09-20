@extends('layouts.instructorMaster')
@section('title','Dashboard')

@push('styles')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css')}}">
@endpush


@push('scripts')
    <script src="{{asset('app-assets/js/scripts/forms/form-repeater.min.js') }}"></script>

    <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
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
                        <h2 class="content-header-title float-start mb-0">Upload Course</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>

                                <li class="breadcrumb-item active">Upload
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                {{--<div class="mb-1 breadcrumb-right">
                    <a href="{{route('instructor.index')}}">
                        <button type="button" class="btn btn-primary">Instructor List</button>
                    </a>
                </div>--}}
            </div>
        </div>
        <div class="content-body">
            <section class="bs-validation">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Course Details</h3>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Course Title</label>

                                            <input
                                                type="text"
                                                name="title" value="{{old('title')}}"
                                                class="form-control"
                                                placeholder="First Name"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Course Subtitle</label>

                                            <textarea
                                                class="form-control"
                                                id="subtitle"
                                                name="subtitle"
                                                placeholder="Course subtitle in 1000 characters"
                                                rows="3"
                                                required
                                            >{{old('subtitle')}}</textarea>
                                            @if ($errors->has('subtitle'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subtitle') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <div class="row mb-30">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Course Description Key Points</label>

                                        </div>
                                        <div id="add_repeater">
                                            <div data-repeater-list="key_points" class="">
                                                <label for="name" class="text-lg-right text-black"> Name </label>
                                                <div data-repeater-item="" class="form-group row align-items-center">
                                                    <div class="custom-form-group mb-2 col-md-10">
                                                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="Type key point name" required>
                                                    </div>

                                                    <div class="col mb-2">

                                                        <button class="btn btn-outline-danger text-nowrap  waves-effect" data-repeater-delete="" type="button">
                                                            <span>Delete</span>
                                                        </button>


                                                        {{--<a href="javascript:;" data-repeater-delete=""
                                                           class="theme-btn theme-button1 default-delete-btn-red default-hover-btn frontend-remove-btn btn-danger">
                                                            <span class="iconify" data-icon="akar-icons:cross"></span>
                                                        </a>--}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 mb-2">
                                                <button class="btn btn-icon btn-info waves-effect waves-float waves-light" type="button" data-repeater-create="">
                                                    <span>Add New</span>
                                                </button>



                                                {{--<a id="add" href="javascript:;" data-repeater-create=""
                                                   class="theme-btn default-hover-btn theme-button1">
                                                    <span class="iconify" data-icon="akar-icons:plus"></span> Add
                                                </a>--}}
                                            </div>


                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Course Description</label>

                                            <textarea
                                                class="form-control"
                                                id="description"
                                                name="description"
                                                placeholder="Describe your course."
                                                rows="3"
                                                required
                                            >{{old('description')}}</textarea>
                                            @if ($errors->has('subtitle'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subtitle') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Select Course Category</label>

                                            <select class="form-select" name="category_id" id="category_id" required>
                                                <option value="">---Select Course Category----</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('category_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('category_id') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Select Course Sub Category</label>

                                            <select class="form-select" name="category_id" id="category_id" required>
                                                <option value="">---Select Course Sub Category----</option>


                                                @if(old('category_id'))
                                                    @foreach($subCategories as $subcategory)
                                                        <option value="{{$subcategory->id}}" {{old('subcategory_id') == $subcategory->id ? 'selected' : ''}} >{{$subcategory->name}}</option>
                                                    @endforeach
                                                @endif

                                            </select>

                                            @if ($errors->has('subcategory_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subcategory_id') }}</span>
                                            @endif
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

@push('scripts')
    <script src="{{asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>

    <script src="{{ asset('custom/js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('custom/js/add-repeater.js') }}"></script>
@endpush
