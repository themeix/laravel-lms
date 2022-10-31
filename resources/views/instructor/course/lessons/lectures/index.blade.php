@extends('layouts.instructorMaster')
@section('title','Course Lectures')


@push('styles')
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
                        <h2 class="content-header-title float-start mb-0">Course Lectures</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('instructor')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('instructor.course.index')}}">My
                                        Courses</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('instructor.course.lesson.index', $course->uuid)}}">
                                        Lesson List
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Course Lectures
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">


            @if(Session::has('create-message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body">
                                {{ Session::get('create-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('update-message'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                                {{ Session::get('update-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('delete-message'))
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-body">
                                {{ Session::get('delete-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('warning-message'))
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-body">
                                {{ Session::get('warning-message') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <section id="default-breadcrumb">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><strong>Course</strong> - {{$course->title}} |
                                    <strong>Lesson</strong> - {{$course_lesson->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="default-breadcrumb">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation invoice-repeater"
                                      action="{{route('instructor.course.lecture.store',[$course->uuid, $course_lesson->uuid])}}"
                                      method="post"
                                      enctype="multipart/form-data" novalidate>
                                    @csrf


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="blog-edit-status">Type</label>
                                                <select class="form-select intro_video_check" name="type"
                                                        id="blog-edit-status intro_video_check">
                                                    <option value="">---Select Type---</option>
                                                    <option value="video">Video File</option>
                                                    <option value="youtube">Youtube Video</option>
                                                    @if(env('VIMEO_STATUS') == 'active')
                                                        <option value="vimeo">Vimeo</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                            </div>
                                            <div class="mb-2">
                                                <input type="file" name="video_url" id="video_url" accept="video/mp4"
                                                       class="form-control d-none">

                                                <input type="text" name="youtube_url" id="youtube_url"
                                                       placeholder="Type / Paste your youtube video URL" value=""
                                                       class="form-control d-none">

                                                <input type="text" name="vimeo_url" id="vimeo_url"
                                                       placeholder="Type / Paste your vimeo URL" value=""
                                                       class="form-control d-none">
                                            </div>


                                            @if ($errors->has('video_url'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('video_url') }}</span>
                                            @endif
                                            @if ($errors->has('youtube_url'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('youtube_url') }}</span>
                                            @endif
                                            @if ($errors->has('vimeo_url'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('vimeo_url') }}</span>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">Title</label>
                                                <input
                                                    value="{{ old('title') }}"
                                                    type="text"
                                                    id="title"
                                                    class="form-control"
                                                    placeholder="Title"
                                                    name="title"
                                                    required
                                                />
                                                @if ($errors->has('title'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">Learner's Visibility</label>
                                                <select name="lecture_type" class="form-select" required>
                                                    <option value="">--Select Option--</option>
                                                    <option value="1" @if(old('lecture_type') == 1) selected @endif >
                                                        Show
                                                    </option>
                                                    <option value="2" @if(old('lecture_type') == 2) selected @endif >
                                                        Lock
                                                    </option>
                                                </select>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger"><i
                                                            class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="title">

                                                    File Time Duration

                                                </label>
                                                <div style="display: flex; gap: 4px;">
                                                    <div class="col-2">
                                                        <label class="form-label" for="title">Hour</label>
                                                        <input
                                                            value=""
                                                            type="number"
                                                            id="file_duration"
                                                            class="form-control"
                                                            placeholder="HH"
                                                            name="hour"
                                                            required
                                                        />
                                                        @if ($errors->has('hour'))
                                                            <span class="text-danger"><i
                                                                    class="fas fa-exclamation-triangle"></i> {{ $errors->first('hour') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-2">
                                                        <label class="form-label" for="title">Minute</label>
                                                        <input
                                                            value=""
                                                            type="number"
                                                            id="file_duration"
                                                            class="form-control"
                                                            placeholder="MM"
                                                            name="minute"
                                                            required
                                                        />

                                                        @if ($errors->has('minute'))
                                                            <span class="text-danger"><i
                                                                    class="fas fa-exclamation-triangle"></i> {{ $errors->first('minute') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-2">
                                                        <label class="form-label" for="title">Second</label>
                                                        <input
                                                            value=""
                                                            type="number"
                                                            id="file_duration"
                                                            class="form-control"
                                                            placeholder="SS"
                                                            name="second"
                                                            required
                                                        />
                                                        @if ($errors->has('second'))
                                                            <span class="text-danger"><i
                                                                    class="fas fa-exclamation-triangle"></i> {{ $errors->first('second') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="column-search-datatable">
                <div class="card">
                    <div class="card-body indexTable">
                        <div class="col-12">
                            <table id="example" class="table table-bordered dataTables_info" style="color: black;">
                                <thead>
                                <tr>
                                    <th>Lecture No</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($course_lectures as $course_lecture)
                                    <tr class="removable-item">
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{ $course_lecture->title }}
                                        </td>
                                        <td>
                                            @if($course_lecture->lecture_type == 1)
                                                <span class="status badge bg-primary">Show</span>

                                            @elseif($course_lecture->lecture_type ==2)
                                                <span class="status badge bg-success">Lock</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $course_lecture->file_duration }}
                                        </td>
                                        <td>

                                            <div class="action__buttons">
                                                <a href="{{route('instructor.course.lesson.edit', [$course->uuid, $course_lesson->uuid])}}"
                                                   class="btn-action" title="Edit">
                                                    <img src="{{asset('custom/image/edit-2.svg')}}" alt="edit">
                                                </a>


                                                <form
                                                    action="{{route('instructor.course.lesson.delete', [$course->uuid])}}"
                                                    class="mb-0" method="post" class="d-inline">
                                                    @csrf

                                                    <a href="{{route('instructor.course.lesson.delete', [$course->uuid])}}"
                                                       class="btn-action confirm-delete" title="Delete">
                                                        <img src="{{asset('custom/image/trash-2.svg')}}" alt="trash">
                                                    </a>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- END: Content-->

@endsection

@push('scripts')

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });


        $(document).on('click', '.confirm-delete', function (e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent('form').trigger('submit')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
            e.preventDefault();
        });


        $(document).ready(function () {

            $(".intro_video_check").click(function () {

                var intro_video_check = $(".intro_video_check").val();

                if (intro_video_check == 'video') {
                    $('#video_url').removeClass('d-none');
                    $('#vimeo_url').addClass('d-none');
                    $('#youtube_url').addClass('d-none');
                }

                if (intro_video_check == 'youtube') {
                    $('#video_url').addClass('d-none');
                    $('#vimeo_url').addClass('d-none');
                    $('#youtube_url').removeClass('d-none');
                }

                if (intro_video_check == 'vimeo') {
                    $('#video_url').addClass('d-none');
                    $('#vimeo_url').removeClass('d-none');
                    $('#youtube_url').addClass('d-none');
                }

                if (intro_video_check == '') {
                    $('#video').addClass('d-none');
                    $('#vimeo_url').addClass('d-none');
                    $('#youtube_url').addClass('d-none');
                }
            });
        });
    </script>
@endpush
