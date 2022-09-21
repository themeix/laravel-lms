@extends('layouts.instructorMaster')
@section('title','Dashboard')

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


                                {{--<div class="row mb-30">
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


                                                        --}}{{--<a href="javascript:;" data-repeater-delete=""
                                                           class="theme-btn theme-button1 default-delete-btn-red default-hover-btn frontend-remove-btn btn-danger">
                                                            <span class="iconify" data-icon="akar-icons:cross"></span>
                                                        </a>--}}{{--
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 mb-2">
                                                <button class="btn btn-icon btn-info waves-effect waves-float waves-light" type="button" data-repeater-create="">
                                                    <span>Add New</span>
                                                </button>


                                                --}}{{--<a id="add" href="javascript:;" data-repeater-create=""
                                                   class="theme-btn default-hover-btn theme-button1">
                                                    <span class="iconify" data-icon="akar-icons:plus"></span> Add
                                                </a>--}}{{--
                                            </div>


                                        </div>
                                    </div>
                                </div>--}}


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

                                            <select class="form-select" name="subcategory_id" id="subcategory_id" required>
                                                <option value="">---Select Course Sub Category----</option>


                                                {{--@if(old('category_id'))
                                                    @foreach($subCategories as $subcategory)
                                                        <option value="{{$subcategory->id}}" {{old('subcategory_id') == $subcategory->id ? 'selected' : ''}} >{{$subcategory->name}}</option>
                                                    @endforeach
                                                @endif--}}

                                            </select>

                                            @if ($errors->has('subcategory_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('subcategory_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                {{--<div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="tag">Select Tag</label>

                                            <select class="form-select"  name="tag[]" id="tag" required>
                                                <option value="">---Select Tag----</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}" {{old('$tag_id') == $tag->id ? 'selected' : '' }}>{{$tag->name}}</option>

                                                    --}}{{--<option value="{{$tag->id}}" @if(in_array($tag->id, $selected_tags)) selected @endif>{{$tag->name}}</option>--}}{{--
                                                @endforeach
                                            </select>

                                            @if ($errors->has('tag'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('tag') }}</span>
                                            @endif
                                        </div>
                                </div>--}}



                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="name">Learner's Accessibility</label>

                                            <select class="form-select learner_accessibility" name="learner_accessibility" id="learner_accessibility" required>
                                                <option value="">Select Option</option>
                                                <option value="paid">Paid</option>
                                                <option value="free">Free</option>

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
                                                placeholder="Cours Price"
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
                                            <label class="form-label" for="name">Select Course Language</label>

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
                                            <label class="form-label" for="name">Difficulty Level</label>

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




                                {{--<div class="row">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <label class="label-text-title color-heading font-medium font-16 mb-3">Course thumbnail
                                                <span class="cursor tooltip-show-btn share-referral-big-btn primary-btn get-referral-btn border-0 text-capitalize" data-toggle="popover"  data-bs-placement="bottom" data-bs-content="Meridian sun strikes upper urface of the impenetrable foliage of my trees">
                                                        !
                                                    </span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-30">
                                            <div class="upload-img-box mt-3 height-200">
                                                @if($course->image)
                                                    <img src="{{getImageFile($course->image)}}">
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)" @if(!$course->image) required @endif>
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{__('app.image')}}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-30">
                                            <p class="font-14 color-gray">Preferable image format & size: 575px X 450px (1MB)</p>
                                            <p class="font-14 color-gray">Preferable filetype: jpg, jpeg, png</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <label class="label-text-title color-heading font-medium font-16 mb-3">Course Introduction Video (Optional)</label>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <input type="radio" {{ $course->intro_video_check == 1 ? 'checked' : ''}} id="video_check" class="intro_video_check" name="intro_video_check" value="1">
                                        <label for="video_check">Video Upload</label><br>
                                        <input type="radio" {{ $course->intro_video_check == 2 ? 'checked' : ''}} id="youtube_check" class="intro_video_check" name="intro_video_check" value="2">
                                        <label for="youtube_check">Youtube Video (write only video Id)</label><br>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <input type="file" name="video" id="video" accept="video/mp4" class="form-control d-none">
                                        <input type="text" name="youtube_video_id" id="youtube_video_id" placeholder="Type your youtube video ID" value="{{ $course->youtube_video_id }}" class="form-control d-none">
                                    </div>
                                    @if($course->video)
                                        <div class="col-md-12 mb-30 d-none videoSource">
                                            <video class="uploaded-course-edit-video" controls>
                                                <source src="{{ getVideoFile($course->video) }}" type="video/mp4">
                                            </video>
                                        </div>
                                    @endif

                                    @if ($errors->has('video'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('video') }}</span>
                                    @endif
                                </div>--}}


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
   {{-- <script src="{{ asset('custom/js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('custom/js/add-repeater.js') }}"></script>--}}
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


        $(function(){
            $('#learner_accessibility').change(function () {
                var access = $(this).val();
                if (access == 'free'){
                    document.getElementById("price").disabled = true;
                    document.getElementById("price").value = 0;
                }
                else{
                    document.getElementById("price").disabled = false;
                }
            });
            $('#learner_accessibility').trigger('change');
        });
    </script>

@endpush
