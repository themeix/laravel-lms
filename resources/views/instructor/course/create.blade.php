@extends('layouts.instructorMaster')
@section('title','Add Course')

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
                        <h2 class="content-header-title float-start mb-0">Add Course</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>

                                <li class="breadcrumb-item active">Add Course
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
                        <div class="card-body">
                            <form class="needs-validation" method="POST" action="{{route('instructor.course.store')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Course Title</label>

                                            <input
                                                type="text"
                                                name="title" value="{{old('title')}}"
                                                class="form-control"
                                                placeholder="Course Title"
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
                                            <label class="form-label" for="subtitle">Course Subtitle</label>

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


                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="description">Course Description</label>

                                            <textarea
                                                class="form-control"
                                                id="description"
                                                name="description"
                                                placeholder="Describe your course."
                                                rows="3"
                                                required
                                            >{{old('description')}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="category_id">Select Course Category</label>

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
                                            <label class="form-label" for="subcategory_id">Select Course Sub Category</label>

                                            <select class="form-select" name="subcategory_id" id="subcategory_id">
                                                <option value="">---Select Course Sub Category----</option>


                                            </select>

                                            @if ($errors->has('subcategory_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subcategory_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="learner_accessibility">Learner's Accessibility</label>

                                            <select class="form-select learner_accessibility" name="learner_accessibility" id="learner_accessibility" required>
                                                <option value="">Select Option</option>
                                                <option value="1">Paid</option>
                                                <option value="2">Free</option>

                                            </select>

                                            @if ($errors->has('learner_accessibility'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('learner_accessibility') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="title">Course Price</label>

                                            <input
                                                type="number" name="price"
                                                id="price"
                                                value="{{old('price')}}"
                                                class="form-control price"
                                                placeholder="Course Price"
                                                aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                required
                                            />
                                            @if ($errors->has('price'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="language_id">Select Course Language</label>

                                            <select class="form-select" name="language_id" id="language_id" required>
                                                <option value="">---Select Language---</option>
                                                @foreach($languages as $language)
                                                    <option value="{{$language->id}}" {{old('language_id') == $language->id ? 'selected' : '' }}>{{$language->name}}</option>

                                                @endforeach

                                            </select>

                                            @if ($errors->has('language_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('language_id') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="difficulty_level_id">Difficulty Level</label>

                                            <select class="form-select"  name="difficulty_level_id" id="difficulty_level_id" required>
                                                <option value="">---Select Difficulty Level---</option>
                                                @foreach($difficulty_levels as $difficulty_level)

                                                    <option value="{{$difficulty_level->id}}" {{old('difficulty_level_id') == $difficulty_level->id ? 'selected' : '' }}>{{$difficulty_level->name}}</option>

                                                @endforeach

                                            </select>

                                            @if ($errors->has('difficulty_level_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('difficulty_level_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="tag_ids">Tag</label>
                                        <select id="blog-edit-category1" name="tag_ids[]" class="select2 form-select" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="border rounded p-2">
                                            <h4 class="mb-1">Course thumbnail</h4>
                                            <div class="d-flex flex-column flex-md-row">
                                                <img src="{{asset('custom/image/imagePreview.svg')}}" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                                <div class="featured-info">
                                                    <p class="my-50">
                                                        <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                    </p>
                                                    <div class="d-inline-block pb-2">
                                                        <input class="form-control" type="file" name="image" id="blogCustomFile" accept="image/*" onchange="previewFile(this)"/>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                    @endif
                                                    <p>Accepted Image Size: 575 X 450 (1MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="blog-edit-status">Course Introduction Video (Optional)</label>
                                            <select class="form-select intro_video_check" name="intro_video_check" id="blog-edit-status intro_video_check">
                                                <option value=""></option>
                                                <option value="1">Normal Video</option>
                                                <option value="2">Youtube Video</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="mb-2">
                                        </div>
                                        <div class="mb-2">
                                            <input type="file" name="video" id="video" accept="video/mp4"  class="form-control d-none">
                                            <input type="text" name="youtube_video_id" id="youtube_video_id" placeholder="Type your youtube video ID, (only video id)" value="" class="form-control d-none">
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

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/page-blog-edit.js')}}"></script>


   {{-- <script src="{{asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>--}}
    <script src="{{ asset('custom/js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('custom/js/add-repeater.js') }}"></script>

    <script>
        $(function () {
            var subCategorySelectedId = '{{ old('subcategory_id') }}';
            $('#category_id').change(function () {
                var category_id = $(this).val();
                $('#subcategory_id').html('<option value="">---Select SubCategory---</option>');
                if (category_id != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('instructor.course.course.getSubCategory') }}",
                        data: { category_id: category_id }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (subCategorySelectedId == item.id)
                                $('#subcategory_id').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#subcategory_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                    });
                }
            });
            $('#category_id').trigger('change');
        });

        $(document).ready(function () {

            /*$('#blog-edit-category').select2({
                placeholder: '---Select  Key Points---'
            });*/

            $('#blog-edit-category1').select2({
                placeholder: '---Select  Tag---'
            });



            $(".intro_video_check").click(function () {

                var intro_video_check = $(".intro_video_check").val();

                if (intro_video_check == '1') {
                    $('#video').removeClass('d-none');
                    $('.videoSource').removeClass('d-none');
                    $('#youtube_video_id').addClass('d-none');
                }

                if (intro_video_check == '2') {
                    $('#video').addClass('d-none');
                    $('.videoSource').addClass('d-none');
                    $('#youtube_video_id').removeClass('d-none');
                }

                if (intro_video_check == '') {
                    $('#video').addClass('d-none');
                    $('.videoSource').addClass('d-none');
                    $('#youtube_video_id').addClass('d-none');
                }
            });
        });


        /*$(function(){
            $('#learner_accessibility').change(function () {
                var access = $(this).val();
                if (access == '2'){
                    document.getElementById("price").disabled = true;
                    document.getElementById("price").value = 0;
                }
                else{
                    document.getElementById("price").disabled = false;
                }
            });
            $('#learner_accessibility').trigger('change');
        });*/
    </script>

@endpush
