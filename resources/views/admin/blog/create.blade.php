@extends('layouts.adminMaster')
@section('title','Create Blog Post')


@section('content')

    <!-- BEGIN: Content-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Blog Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blog Post List</a>
                                </li>

                                <li class="breadcrumb-item active">Create Blog Post
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('blog.index')}}">
                        <button type="button" class="btn btn-primary">Blog Post List</button>
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
                            <form class="needs-validation" action="{{route('blog.store')}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name">Name <span
                                                    class="text-danger">*</span></label>

                                            <input
                                                type="text"
                                                name="title" value="{{old('title')}}"
                                                class="form-control slugable"
                                                placeholder="Blog Title"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                                onkeyup="slugable()"
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
                                            <label class="form-label" for="basic-addon-name">Slug <span
                                                    class="text-danger">*</span></label>

                                            <input
                                                type="text"
                                                name="slug" id="slug" value="{{old('slug')}}"
                                                class="form-control slug"
                                                placeholder="slug"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                                onkeyup="getMyself()"
                                           />
                                            @if ($errors->has('slug'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('slug') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Select Blog Category</label>
                                            <select class="form-select" name="blog_category_id" id="blog_category_id"
                                                    required>
                                                <option value="">---Select Blog Category---</option>
                                                @foreach($blogCategories as $blogCategory)
                                                    <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="select-country1">Tag</label>
                                            <select class="js-example-basic-multiple form-select"  name="tag_ids[]" multiple="multiple" id="tag_ids" required>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-addon-name"> Details <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="body"  placeholder="Enter the Details" name="details">{{old('details')}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label for="customFile1" class="form-label">Profile pic</label>
                                            <img src="">
                                            <input type="file" class="form-control" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                        @endif
                                        <p>Accepted Image Files: JPEG, JPG, PNG <br> Recommend Size: 870 x 500 (1MB)</p>
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


@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .ck-editor__editable_inline {
            min-height: 200px; !important;
        }
    </style>
@endpush



@push('scripts')
    <script src="{{asset('custom/js/slug.js')}}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>



        $(document).ready(function () {

            $('.js-example-basic-multiple').select2({
                placeholder: '---Select  Tag---'
            });

            ClassicEditor.create( document.querySelector( '#body' ) )
                .catch( error => {
                    console.error( error );
                } );

        });
    </script>

@endpush





